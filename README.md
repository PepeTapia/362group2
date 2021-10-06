# Iteration 2:

Project hosted on Google Cloud and files stored in Google Cloud Storage.

- app.yaml handles static files for website.
- index.php handles redirecting requests.

## **SETUP:**

**If you downloaded my .7zip file from Discord and extracted to "C:/Users/name", you just need to do Step 1, Step 3, and Step 7.**

1. Download Cloud SDK installer and initialize GCloud to our project: https://cloud.google.com/sdk/docs/quickstart

2. Clone github and extract titanbin file to "C:/Users/name" 

3. In cmd, type "cd C:/Users/name/titanbin"

4. Next, type "compose install"

5. After installation finishes, delete the compose.lock file in titanbin directory

6. You will also need "keyfile.json" file in titanbin directory to connect to Google Cloud Storage in home.php, which can be downloaded from our Discord.

7. Now, you can either host locally or type "gcloud app deploy" to host web application to Google Cloud. 

## **NOTE:**
For **_href_** attributes, you can put just the file name and its type ("test.php") and set up what directories the file is in via index.php.

**EXAMPLE:**

![example](https://user-images.githubusercontent.com/55907638/135773345-4fa579a4-65d7-45b6-a6d9-26f998cff46f.png)
