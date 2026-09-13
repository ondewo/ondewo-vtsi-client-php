<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2021 ONDEWO GmbH
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
namespace Ondewo\Vtsi;

/**
 * <p>ONDEWO VTSI API</p>
 */
class CallsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * ////////////////////////////////////////////////////////////////////////////
     * Caller and Listener endpoints
     * ////////////////////////////////////////////////////////////////////////////
     *
     * <p>Start single caller instance for a specific nlu-project.</p>
     * @param \Ondewo\Vtsi\StartCallerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StartCaller(\Ondewo\Vtsi\StartCallerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StartCaller',
        $argument,
        ['\Ondewo\Vtsi\StartCallerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Start multiple ondewo-sip callers instances for a specific nlu-project.</p>
     * @param \Ondewo\Vtsi\StartCallersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StartCallers(\Ondewo\Vtsi\StartCallersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StartCallers',
        $argument,
        ['\Ondewo\Vtsi\StartCallersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Lists all available callers</p>
     * @param \Ondewo\Vtsi\ListCallersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListCallers(\Ondewo\Vtsi\ListCallersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/ListCallers',
        $argument,
        ['\Ondewo\Vtsi\ListCallersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Gets a caller</p>
     * @param \Ondewo\Vtsi\GetCallerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCaller(\Ondewo\Vtsi\GetCallerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/GetCaller',
        $argument,
        ['\Ondewo\Vtsi\Caller', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Deletes a caller</p>
     * @param \Ondewo\Vtsi\DeleteCallerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteCaller(\Ondewo\Vtsi\DeleteCallerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/DeleteCaller',
        $argument,
        ['\Ondewo\Vtsi\DeleteCallerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Deletes multiple callers</p>
     * @param \Ondewo\Vtsi\DeleteCallersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteCallers(\Ondewo\Vtsi\DeleteCallersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/DeleteCallers',
        $argument,
        ['\Ondewo\Vtsi\DeleteCallersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Stops a caller</p>
     * @param \Ondewo\Vtsi\StopCallerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StopCaller(\Ondewo\Vtsi\StopCallerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StopCaller',
        $argument,
        ['\Ondewo\Vtsi\StopCallerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Stops multiple callers</p>
     * @param \Ondewo\Vtsi\StopCallersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StopCallers(\Ondewo\Vtsi\StopCallersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StopCallers',
        $argument,
        ['\Ondewo\Vtsi\StopCallersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Start single listener instance for a specific nlu-project.</p>
     * @param \Ondewo\Vtsi\StartListenerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StartListener(\Ondewo\Vtsi\StartListenerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StartListener',
        $argument,
        ['\Ondewo\Vtsi\StartListenerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Start multiple ondewo-sip listeners instances for a specific nlu-project.</p>
     * @param \Ondewo\Vtsi\StartListenersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StartListeners(\Ondewo\Vtsi\StartListenersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StartListeners',
        $argument,
        ['\Ondewo\Vtsi\StartListenersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Stop a ondewo-sip listeners instances for a specific nlu-project.</p>
     * @param \Ondewo\Vtsi\StopListenerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StopListener(\Ondewo\Vtsi\StopListenerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StopListener',
        $argument,
        ['\Ondewo\Vtsi\StopListenerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Stop multiple ondewo-sip listeners instances for a specific nlu-project.</p>
     * @param \Ondewo\Vtsi\StopListenersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StopListeners(\Ondewo\Vtsi\StopListenersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StopListeners',
        $argument,
        ['\Ondewo\Vtsi\StopListenersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Lists all available listeners</p>
     * @param \Ondewo\Vtsi\ListListenersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListListeners(\Ondewo\Vtsi\ListListenersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/ListListeners',
        $argument,
        ['\Ondewo\Vtsi\ListListenersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Gets a listener</p>
     * @param \Ondewo\Vtsi\GetListenerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetListener(\Ondewo\Vtsi\GetListenerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/GetListener',
        $argument,
        ['\Ondewo\Vtsi\Listener', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Deletes a listener</p>
     * @param \Ondewo\Vtsi\DeleteListenerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteListener(\Ondewo\Vtsi\DeleteListenerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/DeleteListener',
        $argument,
        ['\Ondewo\Vtsi\DeleteListenerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Deletes multiple listeners</p>
     * @param \Ondewo\Vtsi\DeleteListenersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteListeners(\Ondewo\Vtsi\DeleteListenersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/DeleteListeners',
        $argument,
        ['\Ondewo\Vtsi\DeleteListenersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Start a single ondewo-sip caller instance at a scheduled time</p>
     * @param \Ondewo\Vtsi\StartScheduledCallerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StartScheduledCaller(\Ondewo\Vtsi\StartScheduledCallerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StartScheduledCaller',
        $argument,
        ['\Ondewo\Vtsi\StartScheduledCallerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Start multiple ondewo-sip caller instances, each at its own scheduled time</p>
     * @param \Ondewo\Vtsi\StartScheduledCallersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StartScheduledCallers(\Ondewo\Vtsi\StartScheduledCallersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StartScheduledCallers',
        $argument,
        ['\Ondewo\Vtsi\StartScheduledCallersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Gets a scheduled caller</p>
     * @param \Ondewo\Vtsi\GetScheduledCallerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetScheduledCaller(\Ondewo\Vtsi\GetScheduledCallerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/GetScheduledCaller',
        $argument,
        ['\Ondewo\Vtsi\ScheduledCaller', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Lists the scheduled callers of a vtsi-project</p>
     * @param \Ondewo\Vtsi\ListScheduledCallersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListScheduledCallers(\Ondewo\Vtsi\ListScheduledCallersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/ListScheduledCallers',
        $argument,
        ['\Ondewo\Vtsi\ListScheduledCallersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Cancels a scheduled caller that has not fired yet</p>
     * @param \Ondewo\Vtsi\CancelScheduledCallerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CancelScheduledCaller(\Ondewo\Vtsi\CancelScheduledCallerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/CancelScheduledCaller',
        $argument,
        ['\Ondewo\Vtsi\CancelScheduledCallerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Stop/kill a ondewo-sip listener or caller instance for a specific vtsi-project.</p>
     * @param \Ondewo\Vtsi\StopCallRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StopCall(\Ondewo\Vtsi\StopCallRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StopCall',
        $argument,
        ['\Ondewo\Vtsi\StopCallResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Stop/kill a list of ondewo-sip listener or caller instances for a specific vtsi-project.</p>
     * <p>Stops both Listener and Caller calls</p>
     * @param \Ondewo\Vtsi\StopCallsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StopCalls(\Ondewo\Vtsi\StopCallsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StopCalls',
        $argument,
        ['\Ondewo\Vtsi\StopCallsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Stop/kill all ondewo-sip listener or caller instance for a specific nlu-project.</p>
     * <p>Stops all Listener and Caller calls</p>
     * @param \Ondewo\Vtsi\StopAllCallsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StopAllCalls(\Ondewo\Vtsi\StopAllCallsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/StopAllCalls',
        $argument,
        ['\Ondewo\Vtsi\StopCallsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Transfer a call from a listener to another</p>
     * @param \Ondewo\Vtsi\TransferCallRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function TransferCall(\Ondewo\Vtsi\TransferCallRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/TransferCall',
        $argument,
        ['\Ondewo\Vtsi\TransferCallResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Transfer a call from a listener to another</p>
     * @param \Ondewo\Vtsi\TransferCallsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function TransferCalls(\Ondewo\Vtsi\TransferCallsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/TransferCalls',
        $argument,
        ['\Ondewo\Vtsi\TransferCallsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Get call log for single call instance</p>
     * @param \Ondewo\Vtsi\GetCallRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCall(\Ondewo\Vtsi\GetCallRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/GetCall',
        $argument,
        ['\Ondewo\Vtsi\Call', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Get call log for all call instances</p>
     * @param \Ondewo\Vtsi\ListCallsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListCalls(\Ondewo\Vtsi\ListCallsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/ListCalls',
        $argument,
        ['\Ondewo\Vtsi\ListCallsResponse', 'decode'],
        $metadata, $options);
    }

}
