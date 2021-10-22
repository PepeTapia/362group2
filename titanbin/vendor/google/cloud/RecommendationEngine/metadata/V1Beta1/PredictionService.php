<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/recommendationengine/v1beta1/prediction_service.proto

namespace GPBMetadata\Google\Cloud\Recommendationengine\V1Beta1;

class PredictionService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Cloud\Recommendationengine\V1Beta1\UserEvent::initOnce();
        \GPBMetadata\Google\Protobuf\Struct::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
Bgoogle/cloud/recommendationengine/v1beta1/prediction_service.proto)google.cloud.recommendationengine.v1beta1google/api/field_behavior.protogoogle/api/resource.proto:google/cloud/recommendationengine/v1beta1/user_event.protogoogle/protobuf/struct.protogoogle/api/client.proto"�
PredictRequestC
name (	B5�A�A/
-recommendationengine.googleapis.com/PlacementM

user_event (24.google.cloud.recommendationengine.v1beta1.UserEventB�A
	page_size (B�A

page_token (	B�A
filter (	B�A
dry_run (B�AZ
params (2E.google.cloud.recommendationengine.v1beta1.PredictRequest.ParamsEntryB�AZ
labels	 (2E.google.cloud.recommendationengine.v1beta1.PredictRequest.LabelsEntryB�AE
ParamsEntry
key (	%
value (2.google.protobuf.Value:8-
LabelsEntry
key (	
value (	:8"�
PredictResponse\\
results (2K.google.cloud.recommendationengine.v1beta1.PredictResponse.PredictionResult
recommendation_token (	 
items_missing_in_catalog (	
dry_run (Z
metadata (2H.google.cloud.recommendationengine.v1beta1.PredictResponse.MetadataEntry
next_page_token (	�
PredictionResult

id (	t

ItemMetadataEntry
key (	%
value (2.google.protobuf.Value:8G

key (	%
value (2.google.protobuf.Value:82�
PredictionService�
Predict9.google.cloud.recommendationengine.v1beta1.PredictRequest:.google.cloud.recommendationengine.v1beta1.PredictResponse"q���Y"T/v1beta1/{name=projects/*/locations/*/catalogs/*/eventStores/*/placements/*}:predict:*�Aname,user_eventW�A#recommendationengine.googleapis.com�A.https://www.googleapis.com/auth/cloud-platformB�
-com.google.cloud.recommendationengine.v1beta1PZ]google.golang.org/genproto/googleapis/cloud/recommendationengine/v1beta1;recommendationengine�RECAI�)Google.Cloud.RecommendationEngine.V1Beta1�)Google\\Cloud\\RecommendationEngine\\V1beta1�,Google::Cloud::RecommendationEngine::V1beta1bproto3'
        , true);

        static::$is_initialized = true;
    }
}
