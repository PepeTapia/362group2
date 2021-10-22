<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/osconfig/v1/patch_jobs.proto

namespace Google\Cloud\OsConfig\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A step that runs an executable for a PatchJob.
 *
 * Generated from protobuf message <code>google.cloud.osconfig.v1.ExecStep</code>
 */
class ExecStep extends \Google\Protobuf\Internal\Message
{
    /**
     * The ExecStepConfig for all Linux VMs targeted by the PatchJob.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.ExecStepConfig linux_exec_step_config = 1;</code>
     */
    private $linux_exec_step_config = null;
    /**
     * The ExecStepConfig for all Windows VMs targeted by the PatchJob.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.ExecStepConfig windows_exec_step_config = 2;</code>
     */
    private $windows_exec_step_config = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\OsConfig\V1\ExecStepConfig $linux_exec_step_config
     *           The ExecStepConfig for all Linux VMs targeted by the PatchJob.
     *     @type \Google\Cloud\OsConfig\V1\ExecStepConfig $windows_exec_step_config
     *           The ExecStepConfig for all Windows VMs targeted by the PatchJob.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Osconfig\V1\PatchJobs::initOnce();
        parent::__construct($data);
    }

    /**
     * The ExecStepConfig for all Linux VMs targeted by the PatchJob.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.ExecStepConfig linux_exec_step_config = 1;</code>
     * @return \Google\Cloud\OsConfig\V1\ExecStepConfig|null
     */
    public function getLinuxExecStepConfig()
    {
        return isset($this->linux_exec_step_config) ? $this->linux_exec_step_config : null;
    }

    public function hasLinuxExecStepConfig()
    {
        return isset($this->linux_exec_step_config);
    }

    public function clearLinuxExecStepConfig()
    {
        unset($this->linux_exec_step_config);
    }

    /**
     * The ExecStepConfig for all Linux VMs targeted by the PatchJob.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.ExecStepConfig linux_exec_step_config = 1;</code>
     * @param \Google\Cloud\OsConfig\V1\ExecStepConfig $var
     * @return $this
     */
    public function setLinuxExecStepConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\OsConfig\V1\ExecStepConfig::class);
        $this->linux_exec_step_config = $var;

        return $this;
    }

    /**
     * The ExecStepConfig for all Windows VMs targeted by the PatchJob.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.ExecStepConfig windows_exec_step_config = 2;</code>
     * @return \Google\Cloud\OsConfig\V1\ExecStepConfig|null
     */
    public function getWindowsExecStepConfig()
    {
        return isset($this->windows_exec_step_config) ? $this->windows_exec_step_config : null;
    }

    public function hasWindowsExecStepConfig()
    {
        return isset($this->windows_exec_step_config);
    }

    public function clearWindowsExecStepConfig()
    {
        unset($this->windows_exec_step_config);
    }

    /**
     * The ExecStepConfig for all Windows VMs targeted by the PatchJob.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.ExecStepConfig windows_exec_step_config = 2;</code>
     * @param \Google\Cloud\OsConfig\V1\ExecStepConfig $var
     * @return $this
     */
    public function setWindowsExecStepConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\OsConfig\V1\ExecStepConfig::class);
        $this->windows_exec_step_config = $var;

        return $this;
    }

}
