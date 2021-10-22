<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/accessapproval/v1/accessapproval.proto

namespace Google\Cloud\AccessApproval\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A decision that has been made to approve access to a resource.
 *
 * Generated from protobuf message <code>google.cloud.accessapproval.v1.ApproveDecision</code>
 */
class ApproveDecision extends \Google\Protobuf\Internal\Message
{
    /**
     * The time at which approval was granted.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp approve_time = 1;</code>
     */
    private $approve_time = null;
    /**
     * The time at which the approval expires.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp expire_time = 2;</code>
     */
    private $expire_time = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\Timestamp $approve_time
     *           The time at which approval was granted.
     *     @type \Google\Protobuf\Timestamp $expire_time
     *           The time at which the approval expires.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Accessapproval\V1\Accessapproval::initOnce();
        parent::__construct($data);
    }

    /**
     * The time at which approval was granted.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp approve_time = 1;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getApproveTime()
    {
        return isset($this->approve_time) ? $this->approve_time : null;
    }

    public function hasApproveTime()
    {
        return isset($this->approve_time);
    }

    public function clearApproveTime()
    {
        unset($this->approve_time);
    }

    /**
     * The time at which approval was granted.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp approve_time = 1;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setApproveTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->approve_time = $var;

        return $this;
    }

    /**
     * The time at which the approval expires.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp expire_time = 2;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getExpireTime()
    {
        return isset($this->expire_time) ? $this->expire_time : null;
    }

    public function hasExpireTime()
    {
        return isset($this->expire_time);
    }

    public function clearExpireTime()
    {
        unset($this->expire_time);
    }

    /**
     * The time at which the approval expires.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp expire_time = 2;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setExpireTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->expire_time = $var;

        return $this;
    }

}
