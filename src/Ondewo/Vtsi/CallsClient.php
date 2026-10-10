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
     * <p>Adds callers to a campaign instead of starting them. The campaign then starts them, at most
     * <code>max_parallel_calls</code> at a time. The request is atomic: either the campaign (when new), every
     * campaign call is stored, or nothing is. Errors are gRPC status codes (see <code>CampaignAssignment</code>).</p>
     * <p>Rolling updates: a VTSI server that predates this RPC answers <code>UNIMPLEMENTED</code> and starts
     * nothing. Do not fall back to <code>StartCallers</code> on <code>UNIMPLEMENTED</code>; retry later.</p>
     * @param \Ondewo\Vtsi\AddCallersToCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddCallersToCampaign(\Ondewo\Vtsi\AddCallersToCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/AddCallersToCampaign',
        $argument,
        ['\Ondewo\Vtsi\AddCallersToCampaignResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Adds scheduled callers to a campaign: each fires at or after its scheduled time AND when the campaign has a
     * free slot, and follows the campaign&apos;s retries, stop and hard stop. Same atomicity, errors and rolling-update
     * behaviour as <code>AddCallersToCampaign</code>.</p>
     * @param \Ondewo\Vtsi\AddScheduledCallersToCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddScheduledCallersToCampaign(\Ondewo\Vtsi\AddScheduledCallersToCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/AddScheduledCallersToCampaign',
        $argument,
        ['\Ondewo\Vtsi\AddScheduledCallersToCampaignResponse', 'decode'],
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
     * <p>A scheduled caller of a campaign can be cancelled while its campaign call is
     * <code>CAMPAIGN_CALL_STATE_NOT_STARTED</code> or <code>CAMPAIGN_CALL_STATE_RETRY_PENDING</code>;
     * the campaign call then becomes <code>CAMPAIGN_CALL_STATE_CANCELLED</code>. While an attempt is
     * <code>DISPATCHING</code> or <code>IN_PROGRESS</code> the request is refused:
     * <code>cancelled = false</code> and the scheduled caller keeps its status.</p>
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
     * <p>Transfer a call to a phone number, a softphone account, another listener or the listener queue.</p>
     * <p>The target is either the typed <code>target</code> or the legacy raw <code>transfer_id</code>, never both. It is
     * resolved and validated before anything is sent; an invalid target is answered with
     * <code>TRANSFER_OUTCOME_TARGET_INVALID</code> and an <code>error_reason</code>, and the call is untouched.</p>
     * <p><code>TRANSFER_MODE_BLIND</code> (default) sends a SIP REFER and reports its outcome: a refused REFER keeps the
     * call with the bot. <code>TRANSFER_MODE_WARM</code> rings the target into the call first, and the bot leaves only
     * after the target joined (Asterisk 22 only).</p>
     * <p>Telephony outcomes (busy, no answer, REFER rejected) are successful RPCs carrying an <code>outcome</code>.
     * Refusals before any side effect also return a gRPC status with <code>reason=&lt;token&gt;</code> in its details:
     * <code>INVALID_ARGUMENT</code> (both targets set, malformed target), <code>NOT_FOUND</code> (call or target not
     * found, including another project&apos;s), <code>FAILED_PRECONDITION</code> (<code>call-not-connected</code>,
     * <code>amd-in-progress</code>, <code>call-not-yet-identified</code>, <code>participants-present</code>,
     * <code>asterisk-version-unsupported</code>, <code>sip-image-too-old</code>), <code>ABORTED</code>
     * (<code>transfer-in-progress</code>), <code>UNAVAILABLE</code> (<code>sip-unreachable</code>).</p>
     * <p>Authorization: requires the role <code>PROJECT_DEVELOPER</code> or higher on the project, and the server&apos;s
     * Keycloak auth mode <code>ENFORCE</code>; otherwise <code>PERMISSION_DENIED</code>, or
     * <code>FAILED_PRECONDITION</code> with <code>reason=call-supervision-requires-auth</code> when auth is not enforced.
     * Every action writes an audit record (who, call, when, mode, target). No announcement is played to the caller.</p>
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
     * <p>Transfer several calls, each like <code>TransferCall</code>.</p>
     * <p>Authorization: requires the role <code>PROJECT_DEVELOPER</code> or higher on the project, and the server&apos;s
     * Keycloak auth mode <code>ENFORCE</code>; otherwise <code>PERMISSION_DENIED</code>, or
     * <code>FAILED_PRECONDITION</code> with <code>reason=call-supervision-requires-auth</code> when auth is not enforced.
     * Every action writes an audit record (who, call, when, mode, target). No announcement is played to the caller.</p>
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

    /**
     * ////////////////////////////////////////////////////////////////////////////
     * Status stream endpoints
     * ////////////////////////////////////////////////////////////////////////////
     *
     * <p>Streams the status of the callers of a project: a snapshot first
     * (<code>snapshot = true</code>), then every caller whose call or SIP status changed, plus
     * keep-alive messages. Ends when the client disconnects or at the server-side maximum stream
     * duration.</p>
     * <p>Errors: <code>NOT_FOUND</code> for an unknown project; <code>RESOURCE_EXHAUSTED</code> when
     * the server has no free stream slot.</p>
     * @param \Ondewo\Vtsi\StreamCallerStatusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function StreamCallerStatus(\Ondewo\Vtsi\StreamCallerStatusRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.vtsi.Calls/StreamCallerStatus',
        $argument,
        ['\Ondewo\Vtsi\StreamCallResourceStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Streams the status of the listeners of a project, like <code>StreamCallerStatus</code>.</p>
     * @param \Ondewo\Vtsi\StreamListenerStatusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function StreamListenerStatus(\Ondewo\Vtsi\StreamListenerStatusRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.vtsi.Calls/StreamListenerStatus',
        $argument,
        ['\Ondewo\Vtsi\StreamCallResourceStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Streams the status of the scheduled callers of a project, like
     * <code>StreamCallerStatus</code>. The snapshot holds every PENDING and FIRING scheduled caller
     * and those that finished in the last hour.</p>
     * @param \Ondewo\Vtsi\StreamScheduledCallerStatusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function StreamScheduledCallerStatus(\Ondewo\Vtsi\StreamScheduledCallerStatusRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.vtsi.Calls/StreamScheduledCallerStatus',
        $argument,
        ['\Ondewo\Vtsi\StreamCallResourceStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * ////////////////////////////////////////////////////////////////////////////
     * Call control endpoints
     * ////////////////////////////////////////////////////////////////////////////
     *
     * <p>Invite a registered softphone account of the project into a connected call. Returns the participant in
     * <code>PARTICIPANT_STATE_RINGING</code>; follow <code>Call.participants</code> or the events
     * <code>VTSI_EVENT_CALL_PARTICIPANT_*</code> for JOINED, FAILED and LEFT.</p>
     * <p><code>PARTICIPANT_MODE_CONFERENCE</code> (default) joins the softphone into the call: Asterisk mixes the caller,
     * the bot and the participant, and by default the bot keeps talking and listening
     * (<code>BOT_POLICY_ON_JOIN_KEEP</code>). <code>PARTICIPANT_MODE_MONITOR</code> lets the participant listen only.
     * When the bot&apos;s leg ends, every participant is hung up; the caller is handed over only by a WARM
     * <code>TransferCall</code>. Idempotent per <code>request_id</code>.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code>, <code>NOT_FOUND</code> (call or softphone account, including another
     * project&apos;s), <code>FAILED_PRECONDITION</code> (<code>call-not-connected</code>, <code>amd-in-progress</code>,
     * <code>softphone-not-registered</code>, <code>softphone-disabled</code>, <code>softphone-unrouted</code>,
     * <code>call-not-yet-identified</code>, <code>bot-channel-ambiguous</code>, <code>asterisk-not-local</code>,
     * <code>asterisk-version-unsupported</code>), <code>ALREADY_EXISTS</code> (the softphone is already ringing or joined),
     * <code>ABORTED</code> (<code>transfer-in-progress</code>), <code>RESOURCE_EXHAUSTED</code> (participant cap),
     * <code>UNAVAILABLE</code> (<code>asterisk-unreachable</code>).</p>
     * <p>Authorization: requires the role <code>PROJECT_DEVELOPER</code> or higher on the project, and the server&apos;s
     * Keycloak auth mode <code>ENFORCE</code>; otherwise <code>PERMISSION_DENIED</code>, or
     * <code>FAILED_PRECONDITION</code> with <code>reason=call-supervision-requires-auth</code> when auth is not enforced.
     * Every action writes an audit record (who, call, when, mode, target). No announcement is played to the caller.</p>
     * @param \Ondewo\Vtsi\InviteToCallRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function InviteToCall(\Ondewo\Vtsi\InviteToCallRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/InviteToCall',
        $argument,
        ['\Ondewo\Vtsi\InviteToCallResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Hang up a participant of a call (ringing or joined). The participant ends as
     * <code>PARTICIPANT_STATE_LEFT</code> with <code>end_reason = REMOVED</code>; the call and the bot are not
     * affected.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher. Audited like <code>InviteToCall</code>.</p>
     * @param \Ondewo\Vtsi\RemoveCallParticipantRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RemoveCallParticipant(\Ondewo\Vtsi\RemoveCallParticipantRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/RemoveCallParticipant',
        $argument,
        ['\Ondewo\Vtsi\RemoveCallParticipantResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Mute the bot of a connected call and/or stop it listening to the caller, or undo either. Every request sets a
     * desired level and never toggles: a repeat answers <code>changed = false</code>. The bot stays muted while
     * anything else (a TALK take-over of <code>StreamCallAudio</code>, a participant bot policy) also holds it muted.</p>
     * <p>Errors as for <code>InviteToCall</code>, plus <code>FAILED_PRECONDITION</code> <code>reason=sip-image-too-old</code>,
     * <code>ABORTED</code> <code>reason=call-control-busy</code> (another call-control request for the call is running)
     * and <code>UNAVAILABLE</code> <code>reason=sip-unreachable</code> or <code>reason=csi-media-control-failed</code> (the
     * bot did not apply the level: a requested pause is rolled back, a requested mute is kept).</p>
     * <p>Authorization: requires the role <code>PROJECT_DEVELOPER</code> or higher on the project, and the server&apos;s
     * Keycloak auth mode <code>ENFORCE</code>; otherwise <code>PERMISSION_DENIED</code>, or
     * <code>FAILED_PRECONDITION</code> with <code>reason=call-supervision-requires-auth</code> when auth is not enforced.
     * Every action writes an audit record (who, call, when, mode, target). No announcement is played to the caller.</p>
     * @param \Ondewo\Vtsi\SetCallMediaControlRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SetCallMediaControl(\Ondewo\Vtsi\SetCallMediaControlRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/SetCallMediaControl',
        $argument,
        ['\Ondewo\Vtsi\SetCallMediaControlResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Live audio of a connected call, both ways. The first request MUST be <code>config</code> (within 2 seconds).
     * LISTEN receives the caller mixed with the bot. TALK sends the agent&apos;s audio to the caller and REQUIRES
     * <code>take_over</code>: the bot is muted and does not listen while the stream is connected, and resumes when it
     * ends; in TALK the agent hears the caller only. Audio is LINEAR16 little-endian mono in 20 ms frames.</p>
     * <p>Bidirectional streaming: available to native gRPC clients (python, nodejs) only. Browser (grpc-web) clients
     * use <code>ListenCallAudio</code>, plus a softphone (<code>InviteToCall</code>) to talk.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> (no or invalid <code>config</code>, TALK without
     * <code>take_over</code>, wrong frame size), <code>NOT_FOUND</code>, <code>FAILED_PRECONDITION</code>
     * (<code>call-not-connected</code>, <code>amd-in-progress</code>, <code>call-not-yet-identified</code>,
     * <code>bot-still-speaking</code>, <code>sip-image-too-old</code>), <code>RESOURCE_EXHAUSTED</code> (stream cap, a
     * second TALK). A normal end sends one <code>ended</code> message, then OK. A second <code>config</code> or audio
     * sent in LISTEN mode ends the stream with <code>INVALID_ARGUMENT</code>. A client half-close ends the stream
     * (<code>CALL_AUDIO_END_REASON_CLIENT_CLOSED</code>), so a listening client keeps its request stream open.</p>
     * <p>Authorization: requires the role <code>PROJECT_DEVELOPER</code> or higher on the project, and the server&apos;s
     * Keycloak auth mode <code>ENFORCE</code>; otherwise <code>PERMISSION_DENIED</code>, or
     * <code>FAILED_PRECONDITION</code> with <code>reason=call-supervision-requires-auth</code> when auth is not enforced.
     * Every action writes an audit record (who, call, when, mode, target). No announcement is played to the caller.</p>
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\BidiStreamingCall
     */
    public function StreamCallAudio($metadata = [], $options = []) {
        return $this->_bidiRequest('/ondewo.vtsi.Calls/StreamCallAudio',
        ['\Ondewo\Vtsi\StreamCallAudioResponse','decode'],
        $metadata, $options);
    }

    /**
     * <p>Listen-only live audio of a connected call, like <code>StreamCallAudio</code> in LISTEN mode, as a server
     * stream that grpc-web (browser) clients can consume. <code>config.mode</code> must be LISTEN or unspecified and
     * <code>config.take_over</code> must be false, otherwise <code>INVALID_ARGUMENT</code> <code>reason=listen-only</code>.</p>
     * <p>Authorization: requires the role <code>PROJECT_DEVELOPER</code> or higher on the project, and the server&apos;s
     * Keycloak auth mode <code>ENFORCE</code>; otherwise <code>PERMISSION_DENIED</code>, or
     * <code>FAILED_PRECONDITION</code> with <code>reason=call-supervision-requires-auth</code> when auth is not enforced.
     * Every action writes an audit record (who, call, when, mode, target). No announcement is played to the caller.</p>
     * @param \Ondewo\Vtsi\ListenCallAudioRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function ListenCallAudio(\Ondewo\Vtsi\ListenCallAudioRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.vtsi.Calls/ListenCallAudio',
        $argument,
        ['\Ondewo\Vtsi\StreamCallAudioResponse', 'decode'],
        $metadata, $options);
    }

}
