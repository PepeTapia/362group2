# -*- coding: utf-8 -*- #
# Copyright 2016 Google LLC. All Rights Reserved.
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#    http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

"""A command that prints an access token for Application Default Credentials.
"""

from __future__ import absolute_import
from __future__ import division
from __future__ import unicode_literals

from google.auth import exceptions as google_auth_exceptions
from google.oauth2 import credentials as google_auth_creds
from googlecloudsdk.api_lib.auth import util as auth_util
from googlecloudsdk.calliope import base
from googlecloudsdk.calliope import exceptions as c_exc
from googlecloudsdk.core import log
from googlecloudsdk.core import properties
from googlecloudsdk.core import requests
from googlecloudsdk.core.credentials import creds as c_creds
from googlecloudsdk.core.credentials import google_auth_credentials as c_google_auth
from googlecloudsdk.core.credentials import store as c_store

import six


class PrintAccessToken(base.Command):
  r"""Print an access token for your current Application Default Credentials.

  {command} generates and prints an access token for the current
  Application Default Credential (ADC). The ADC can be specified either by
  setting the `GOOGLE_APPLICATION_CREDENTIALS` environment variable to the path
  of a service account key file (JSON) or using
  `gcloud auth application-default login`.

  The access token generated by {command} is useful for manually testing
  APIs via curl or similar tools.

  In order to print details of the access token, such as the associated account
  and the token's expiration time in seconds, run:

    $ curl -H "Content-Type: application/x-www-form-urlencoded" \
    -d "access_token=$(gcloud auth application-default print-access-token)" \
    https://www.googleapis.com/oauth2/v1/tokeninfo

  Note that token itself may not be enough to access some services.
  If you use the token with curl or similar tools, you may see
  permission errors similar to "Your application has authenticated using end
  user credentials from the Google Cloud SDK or Google Cloud Shell".
  If it happens, you may need to provide a quota project in the
  "X-Goog-User-Project" header. For example,

    $ curl -H "X-Goog-User-Project: your-project" \
        -H \
        "Authorization: Bearer $(gcloud auth application-default \
     print-access-token)" foo.googleapis.com

  The identity that granted the token must have the serviceusage.services.use
  permission on the provided project. See
  https://cloud.google.com/apis/docs/system-parameters for more
  information.
  """

  @staticmethod
  def Args(parser):
    parser.display_info.AddFormat('value(token)')

  def Run(self, args):
    """Run the helper command."""
    impersonate_service_account = (
        properties.VALUES.auth.impersonate_service_account.Get())
    if impersonate_service_account:
      log.warning(
          "Impersonate service account '{}' is detected. This command cannot be"
          ' used to print the access token for an impersonate account. The '
          "token below is still the application default credentials' access "
          'token.'.format(impersonate_service_account))

    try:
      creds, _ = c_creds.GetGoogleAuthDefault().default(
          scopes=[auth_util.CLOUD_PLATFORM_SCOPE])
    except google_auth_exceptions.DefaultCredentialsError as e:
      log.debug(e, exc_info=True)
      raise c_exc.ToolException(six.text_type(e))

    # Converts the user credentials so that it can handle reauth during refresh.
    if isinstance(creds, google_auth_creds.Credentials):
      creds = c_google_auth.UserCredWithReauth.FromGoogleAuthUserCredentials(
          creds)
    with c_store.HandleGoogleAuthCredentialsRefreshError(for_adc=True):
      creds.refresh(requests.GoogleAuthRequest())
    return creds