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
     * <p>Starts one caller in a VTSI project: an ondewo-sip container that places one outbound call to
     * <code>sip_caller_config.callee_id</code> (or a pooled caller of the server&apos;s caller pool that runs the same
     * configuration). The configuration is validated first, including live checks against the upstream services;
     * nothing is started when it fails. Not idempotent: every successful request places a new call (send it as a
     * batch of one with an <code>idempotency_key</code> to make it idempotent). <code>validate_only</code> runs the
     * validation alone.</p>
     * <p>Errors are gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed or invalid request or
     * configuration (also when the NLU credentials are refused) or an unknown <code>field_mask</code> path;
     * <code>NOT_FOUND</code> for an unknown project; <code>FAILED_PRECONDITION</code> when an upstream config lacks
     * the required TLS certificate (<code>UPSTREAM_TLS_REQUIRED</code>) or the project is not deployed;
     * <code>RESOURCE_EXHAUSTED</code> when the project reached its caller limit; <code>UNAVAILABLE</code> when an
     * upstream service could not be reached; with authorization enforced <code>PERMISSION_DENIED</code>.</p>
     * <p>Events: <code>VTSI_EVENT_CALLER_STARTED</code> or <code>VTSI_EVENT_CALLER_START_FAILED</code>, then the
     * events of the call (<code>VTSI_EVENT_CALL_*</code>). None with <code>validate_only</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Starts several callers, each like <code>StartCaller</code>. Not atomic: every caller is started on its own;
     * a caller that fails to start is rolled back and has no entry in the response, which accounts for it in
     * <code>StartCallersResponse.error_message</code>. The project&apos;s caller limit is checked for the batch as a
     * whole before anything is started (<code>RESOURCE_EXHAUSTED</code>, nothing started). Idempotent per
     * <code>idempotency_key</code>.</p>
     * <p>Authorization: as <code>StartCaller</code>.</p>
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
     * <p>Lists the callers of a VTSI project, ordered by the caller&apos;s uuid (the last segment of
     * <code>name</code>), ascending: a stable order, not a chronological one. Paged with <code>page_size</code> /
     * <code>page_token</code>; <code>total_size</code> counts every match.</p>
     * <p>With <code>campaign_name</code> or <code>campaign_display_name</code> set, lists only the callers of that
     * campaign: the callers that placed at least one attempt of one of its campaign calls (see
     * <code>ListCallersRequest.campaign_name</code>). <code>active_only</code> and <code>sip_status_types</code>
     * narrow the listing further.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed request, an invalid selector, a negative
     * <code>page_size</code>, a <code>page_token</code> of another listing or an unknown <code>field_mask</code>
     * path; <code>NOT_FOUND</code> for an unknown project or campaign; with authorization enforced
     * <code>PERMISSION_DENIED</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Gets a caller, populated according to <code>call_view</code> and <code>field_mask</code>.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed name or an unknown <code>field_mask</code> path;
     * <code>NOT_FOUND</code> for an unknown project or caller, or a caller of another project; with authorization
     * enforced <code>PERMISSION_DENIED</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Updates the STORED configuration of a caller: the fields named in <code>update_mask</code>, i.e.
     * <code>sip_caller_config</code> and <code>common_services_config</code> or any nested sub-path of them.
     * Allowed whether or not the caller has a call running.</p>
     * <p>A running call and its container are NEVER changed: nothing is restarted, redeployed or reconfigured,
     * and the call goes on with the configuration its container was deployed with.</p>
     * <p>When the stored configuration takes effect: a caller is ONE call (every <code>StartCaller</code> creates
     * a new caller carrying its own configuration, and no RPC redeploys an existing one), so for a caller that
     * is not pooled the update changes ONLY the stored and returned configuration and never any present or
     * future call. The one case in which the server deploys a container from a caller&apos;s stored
     * configuration is a POOLED (persistent) caller, which the server keeps warm between calls: when the server
     * recycles the pooled callers of a project onto its Asterisk (an <code>UpdateVtsiProject</code> of a
     * deployed project, the recovery after the project&apos;s Asterisk restarted, a change of the project&apos;s
     * TLS trust anchor), the pooled caller it starts in place of this one is deployed from the stored, i.e.
     * updated, configuration. An in-place restart of a pooled caller&apos;s container (the call monitor&apos;s
     * health recovery) keeps the configuration the container was deployed with. Until it is recycled, an idle
     * pooled caller is matched to later <code>StartCaller</code> requests by the configuration its container
     * RUNS, never by an updated stored configuration it does not run.</p>
     * <p>Updating a caller never changes a campaign: the attempts of a campaign call take their configuration
     * from the campaign and the campaign call, never from a <code>Caller</code>.</p>
     * <p>A STOPPED caller (its call ended and its configuration was released) has no stored configuration left:
     * the update starts from an empty one, so it must state a complete configuration
     * (<code>sip_caller_config</code> and <code>common_services_config</code>), and a partial one is refused as a
     * configuration a <code>StartCallerRequest</code> would be refused for. Nothing is deployed.</p>
     * <p>Credentials follow their endpoint: an update that MOVES an upstream (the <code>host</code>,
     * <code>port</code> or <code>grpc_cert</code> of the NLU, S2T or T2S <code>*_base_config</code>, or the
     * <code>host</code> / ports of <code>csi_vtsi_config.message_broker_config.rabbit_mq_config</code>) must
     * also write every credential path of that upstream that holds a stored value -- the NLU
     * <code>credentials</code>, <code>auth_token</code>, <code>http_basic_auth_token</code> and
     * <code>contexts</code>, the S2T <code>s2t_transcribe_request_config</code>, the T2S
     * <code>t2s_request_config</code>, the RabbitMQ <code>user</code> and <code>password</code> -- named itself
     * or by a shorter path, with the values to use. A stored credential is never sent to an endpoint the request
     * moved without restating it, also not for the live validation of the result.</p>
     * <p>Errors are gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed <code>caller.name</code>,
     * an empty <code>update_mask</code>, an unknown, output-only or immutable <code>update_mask</code> path, an
     * update that moves an upstream without restating its stored credentials (naming the paths to add), a
     * resulting configuration that a <code>StartCallerRequest</code> carrying it would be refused for, or an
     * unknown <code>field_mask</code> path (each naming the path or field); <code>NOT_FOUND</code> for an
     * unknown caller or project; <code>ABORTED</code> when concurrent updates kept changing the caller, or while
     * an update, deploy or undeploy of its project is still running (an update waits for it, for a bounded time,
     * so that a recycle of the project cannot lose it), nothing being written (retry the request); with
     * authorization enforced <code>PERMISSION_DENIED</code> for a project the caller holds no role on.</p>
     * <p>Events: <code>VTSI_EVENT_CALLER_UPDATED</code> (none with <code>validate_only</code>).</p>
     * <p>Authorization: the role that may start and stop callers of the project (<code>PROJECT_EXECUTOR</code>
     * or higher).</p>
     * @param \Ondewo\Vtsi\UpdateCallerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateCaller(\Ondewo\Vtsi\UpdateCallerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/UpdateCaller',
        $argument,
        ['\Ondewo\Vtsi\UpdateCallerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Updates several callers, each like <code>UpdateCaller</code>. Not atomic: every entry is applied on its
     * own and reported in <code>UpdateCallersResponse.update_caller_responses</code>, in request order; an entry
     * that fails changes nothing and does not stop the others. Errors of the request as a whole (see
     * <code>UpdateCallersRequest</code>) are gRPC status codes, and then no entry is applied.</p>
     * <p>Authorization: as <code>UpdateCaller</code>.</p>
     * @param \Ondewo\Vtsi\UpdateCallersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateCallers(\Ondewo\Vtsi\UpdateCallersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/UpdateCallers',
        $argument,
        ['\Ondewo\Vtsi\UpdateCallersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Deletes a caller: stops it if it still runs (hanging up its call) and removes it, so it is no longer
     * listed or returned. Its call records (and their participants) are deleted with it and are no longer returned
     * by <code>GetCall</code> / <code>ListCalls</code>; stop it instead to keep them.</p>
     * <p>Errors are gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed name or an unknown
     * <code>field_mask</code> path; <code>NOT_FOUND</code> for an unknown caller, a caller of another project, or a
     * caller that was already deleted (so deleting is NOT idempotent: a repeat answers <code>NOT_FOUND</code>);
     * with authorization enforced <code>PERMISSION_DENIED</code>.</p>
     * <p>Events: <code>VTSI_EVENT_CALLER_DELETED</code> (and <code>VTSI_EVENT_CALL_STOPPED</code> for a call that
     * was hung up).</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Deletes several callers, each like <code>DeleteCaller</code>. Not atomic: every caller is deleted on its own
     * and reported in its own entry, whose <code>error_message</code> carries the gRPC status code name
     * <code>DeleteCaller</code> would have answered (e.g. <code>NOT_FOUND: ...</code>); an entry that fails does not
     * stop the others. The request as a whole is refused, nothing being deleted, for no entry or more than 1000
     * distinct names, and, when <code>vtsi_project_name</code> is set, as described there.</p>
     * <p>Authorization: as <code>DeleteCaller</code>.</p>
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
     * <p>Stops a caller: hangs up its call if one is up and releases its container and SIP account. The caller
     * stays listed (with <code>active = false</code>) until it is deleted, and its stored configuration stays
     * updatable (see <code>UpdateCaller</code>). A pooled caller is taken out of the pool.</p>
     * <p>Errors are gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed name or an unknown
     * <code>field_mask</code> path; <code>NOT_FOUND</code> for an unknown caller, a caller of another project, or a
     * caller that is already stopped (so stopping is NOT idempotent: a repeat answers <code>NOT_FOUND</code>); with
     * authorization enforced <code>PERMISSION_DENIED</code>.</p>
     * <p>Events: <code>VTSI_EVENT_CALLER_STOPPED</code> (and <code>VTSI_EVENT_CALL_STOPPED</code> for a call that
     * was hung up).</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Stops several callers, each like <code>StopCaller</code>, with the per-entry results and the request-level
     * errors of <code>DeleteCallers</code>.</p>
     * <p>Authorization: as <code>StopCaller</code>.</p>
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
     * <p>Starts one listener in a VTSI project: an ondewo-sip container registered on the project&apos;s Asterisk
     * that answers inbound calls, one after the other (persistent). Validation, <code>validate_only</code>, errors
     * (<code>RESOURCE_EXHAUSTED</code> for the project&apos;s listener limit) and idempotency as for
     * <code>StartCaller</code>.</p>
     * <p>Events: <code>VTSI_EVENT_LISTENER_STARTED</code> or <code>VTSI_EVENT_LISTENER_START_FAILED</code>. None with
     * <code>validate_only</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Starts several listeners, each like <code>StartListener</code>, with the batch semantics of
     * <code>StartCallers</code> (a listener that fails to start has no entry and is accounted for in
     * <code>StartListenersResponse.error_message</code>).</p>
     * <p>Authorization: as <code>StartListener</code>.</p>
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
     * <p>Stops a listener: hangs up its call if one is up and releases its container and SIP account. A stopped
     * listener has no stored configuration left (see <code>UpdateListener</code>). Errors and idempotency as for
     * <code>StopCaller</code> (a listener that is already stopped is <code>NOT_FOUND</code>).</p>
     * <p>Events: <code>VTSI_EVENT_LISTENER_STOPPED</code> (and <code>VTSI_EVENT_CALL_STOPPED</code> for a call that
     * was hung up).</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Stops several listeners, each like <code>StopListener</code>, with the per-entry results and the
     * request-level errors of <code>DeleteCallers</code>.</p>
     * <p>Authorization: as <code>StopListener</code>.</p>
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
     * <p>Lists the listeners of a VTSI project, ordered by the listener&apos;s uuid (the last segment of
     * <code>name</code>), ascending. Paging, <code>total_size</code>, filters and errors as for
     * <code>ListCallers</code> (without a campaign selector).</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Gets a listener, populated according to <code>call_view</code> and <code>field_mask</code>. Errors as for
     * <code>GetCaller</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Updates the STORED configuration of a listener: the fields named in <code>update_mask</code>, i.e.
     * <code>sip_base_config</code> and <code>common_services_config</code> or any nested sub-path of them.
     * Allowed whether or not the listener&apos;s container is running or has a call, as long as the listener is
     * DEPLOYED: a stopped listener has no stored configuration (it is deployed again only by a
     * <code>StartListener</code> carrying a complete one) and is <code>NOT_FOUND</code>, unlike a stopped caller,
     * which <code>UpdateCaller</code> accepts with a complete configuration.</p>
     * <p>A running container and every call it takes are NEVER changed: nothing is restarted, redeployed or
     * reconfigured, and the running container answers its calls with the configuration it was deployed with
     * until it is replaced.</p>
     * <p>When the stored configuration takes effect: only when the server RECREATES the listener from it, i.e.
     * when it recycles the listeners of the project onto its Asterisk: an <code>UpdateVtsiProject</code> of a
     * deployed project, the recovery after the project&apos;s Asterisk restarted, or a change of the
     * project&apos;s TLS trust anchor. The listener the server starts in place of this one is deployed from the
     * stored, i.e. updated, configuration. An in-place restart of the listener&apos;s container (the
     * server&apos;s restore of listener containers when it starts, the call monitor&apos;s restart of an
     * unhealthy container, a <code>docker restart</code>) keeps the configuration the container was deployed
     * with. A listener that is never recycled keeps the update only as its stored (and returned)
     * configuration.</p>
     * <p>Errors as for <code>UpdateCaller</code> (the credential rule included), with
     * <code>StartListenerRequest</code> as the validation of the resulting configuration, and
     * <code>NOT_FOUND</code> also for a stopped listener.</p>
     * <p>Events: <code>VTSI_EVENT_LISTENER_UPDATED</code> (none with <code>validate_only</code>).</p>
     * <p>Authorization: the role that may start and stop listeners of the project (<code>PROJECT_EXECUTOR</code>
     * or higher).</p>
     * @param \Ondewo\Vtsi\UpdateListenerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateListener(\Ondewo\Vtsi\UpdateListenerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/UpdateListener',
        $argument,
        ['\Ondewo\Vtsi\UpdateListenerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Updates several listeners, each like <code>UpdateListener</code>, with the per-entry results and the
     * request-level errors of <code>UpdateCallers</code>.</p>
     * <p>Authorization: as <code>UpdateListener</code>.</p>
     * @param \Ondewo\Vtsi\UpdateListenersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateListeners(\Ondewo\Vtsi\UpdateListenersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/UpdateListeners',
        $argument,
        ['\Ondewo\Vtsi\UpdateListenersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Deletes a listener: stops it if it still runs (hanging up its call) and removes it, with its call
     * records, like <code>DeleteCaller</code>. Errors and idempotency as for <code>DeleteCaller</code> (a repeat
     * answers <code>NOT_FOUND</code>).</p>
     * <p>Events: <code>VTSI_EVENT_LISTENER_DELETED</code> (and <code>VTSI_EVENT_CALL_STOPPED</code> for a call that
     * was hung up).</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Deletes several listeners, each like <code>DeleteListener</code>, with the per-entry results and the
     * request-level errors of <code>DeleteCallers</code>.</p>
     * <p>Authorization: as <code>DeleteListener</code>.</p>
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
     * <p>Creates a scheduled caller: a caller that the server starts at or after <code>scheduled_time</code>, like a
     * <code>StartCaller</code> of the stored request. The request is checked structurally now; the live checks of
     * the configuration run when it fires, and a failure then leaves the scheduled caller
     * <code>SCHEDULED_CALLER_STATUS_FAILED</code> with its <code>error_message</code>. A <code>scheduled_time</code> in
     * the past is due at once. Not idempotent (use <code>StartScheduledCallers</code> with an
     * <code>idempotency_key</code>).</p>
     * <p>Errors are gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed request, a missing
     * <code>scheduled_time</code>, a nested request with its own <code>field_mask</code> or
     * <code>validate_only</code>, or an unknown <code>field_mask</code> path; <code>NOT_FOUND</code> for an unknown
     * project; <code>RESOURCE_EXHAUSTED</code> when the project reached its caller limit; with authorization
     * enforced <code>PERMISSION_DENIED</code>.</p>
     * <p>Events: <code>VTSI_EVENT_SCHEDULED_CALLER_CREATED</code>; later <code>VTSI_EVENT_SCHEDULED_CALLER_FIRED</code>,
     * <code>VTSI_EVENT_SCHEDULED_CALLER_RETRY_SCHEDULED</code> or <code>VTSI_EVENT_SCHEDULED_CALLER_FAILED</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Creates several scheduled callers, each like <code>StartScheduledCaller</code>, at most 1000. Not atomic: an
     * entry that fails is reported in its own <code>error_message</code> and does not stop the others. Idempotent
     * per <code>idempotency_key</code>.</p>
     * <p>Authorization: as <code>StartScheduledCaller</code>.</p>
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
     * <p>Gets a scheduled caller, populated according to <code>call_view</code> and <code>field_mask</code>.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed name or an unknown <code>field_mask</code> path;
     * <code>NOT_FOUND</code> for an unknown project or scheduled caller, or one of another project; with
     * authorization enforced <code>PERMISSION_DENIED</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Lists the scheduled callers of a VTSI project, ordered by <code>scheduled_time</code>, oldest first,
     * optionally narrowed by state, campaign and a <code>scheduled_time</code> window. Paging,
     * <code>total_size</code> and errors as for <code>ListCallers</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Changes the <code>scheduled_time</code> and/or the <code>sip_caller_config.sip_headers</code> of a scheduled
     * caller that has not fired yet; the only updatable <code>update_mask</code> paths (see
     * <code>UpdateScheduledCallerRequest.update_mask</code>). Allowed only while the status is
     * <code>SCHEDULED_CALLER_STATUS_PENDING</code>; for a scheduled caller of a campaign only while its campaign call
     * is <code>CAMPAIGN_CALL_STATE_NOT_STARTED</code> (a retry of a campaign call is timed by the campaign&apos;s
     * <code>retry_delay</code>). The check and the write are one atomic step, so a scheduled caller that fires
     * concurrently is either updated before it fires or refused. Updating to the stored values is accepted and
     * changes nothing.</p>
     * <p>Errors are gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed name, an empty
     * <code>update_mask</code>, a path that is not updatable, an unset <code>scheduled_time</code> named by the
     * mask, invalid <code>sip_headers</code>, or an unknown <code>field_mask</code> path (each naming the path);
     * <code>NOT_FOUND</code> for an unknown project or scheduled caller, or one of another project;
     * <code>FAILED_PRECONDITION</code> when it is no longer PENDING (<code>reason=not-pending</code>) or its campaign
     * call has started (<code>reason=campaign-call-started</code>); with authorization enforced
     * <code>PERMISSION_DENIED</code>.</p>
     * <p>Events: <code>VTSI_EVENT_SCHEDULED_CALLER_UPDATED</code> when something changed.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
     * @param \Ondewo\Vtsi\UpdateScheduledCallerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateScheduledCaller(\Ondewo\Vtsi\UpdateScheduledCallerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/UpdateScheduledCaller',
        $argument,
        ['\Ondewo\Vtsi\ScheduledCaller', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Cancels a scheduled caller that has not fired yet: a PENDING scheduled caller becomes
     * <code>SCHEDULED_CALLER_STATUS_CANCELLED</code> and never fires. A scheduled caller that is no longer PENDING
     * (firing, done, failed or already cancelled) is not an error: the response says <code>cancelled = false</code>
     * and carries its current <code>status</code>, so cancelling is idempotent.</p>
     * <p>A scheduled caller of a campaign can be cancelled while its campaign call is
     * <code>CAMPAIGN_CALL_STATE_NOT_STARTED</code> or <code>CAMPAIGN_CALL_STATE_RETRY_PENDING</code>;
     * the campaign call then becomes <code>CAMPAIGN_CALL_STATE_CANCELLED</code>. While an attempt is
     * <code>DISPATCHING</code> or <code>IN_PROGRESS</code> the request is refused:
     * <code>cancelled = false</code>, an <code>error_message</code> saying why, and the scheduled caller keeps its
     * status.</p>
     * <p>Errors are gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed name or an unknown
     * <code>field_mask</code> path; <code>NOT_FOUND</code> for an unknown project or scheduled caller, or one of
     * another project; with authorization enforced <code>PERMISSION_DENIED</code>.</p>
     * <p>Events: <code>VTSI_EVENT_SCHEDULED_CALLER_CANCELLED</code>, only when <code>cancelled = true</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Cancels several scheduled callers, each like <code>CancelScheduledCaller</code>, at most 1000. Not atomic:
     * every entry is applied on its own and reported in <code>CancelScheduledCallersResponse</code>, in request
     * order; a failed entry carries an <code>error_message</code> prefixed with the gRPC status code name
     * <code>CancelScheduledCaller</code> would have answered (e.g. <code>NOT_FOUND: ...</code>) and does not stop
     * the others. Errors of the request as a whole (see <code>CancelScheduledCallersRequest</code>) are gRPC status
     * codes, and then nothing is cancelled.</p>
     * <p>Events: one <code>VTSI_EVENT_SCHEDULED_CALLER_CANCELLED</code> per entry with <code>cancelled = true</code>.</p>
     * <p>Authorization: as <code>CancelScheduledCaller</code>.</p>
     * @param \Ondewo\Vtsi\CancelScheduledCallersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CancelScheduledCallers(\Ondewo\Vtsi\CancelScheduledCallersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/CancelScheduledCallers',
        $argument,
        ['\Ondewo\Vtsi\CancelScheduledCallersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Retries a FAILED scheduled caller by creating a NEW scheduled caller from its stored request: the same
     * <code>sip_caller_config</code> and <code>common_services_config</code>, <code>status = PENDING</code>, the
     * <code>scheduled_time</code> of the request (unset: now), and <code>retry_of_scheduled_caller_name</code> naming
     * the failed one, whose <code>retried_by_scheduled_caller_name</code> is set to the new one in the same atomic
     * step. The failed scheduled caller itself is not changed otherwise, so its <code>error_message</code> and
     * <code>fired_at</code> stay as the history of the failed attempt. Returns the new scheduled caller.</p>
     * <p>Idempotency: a FAILED scheduled caller is retried at most once. A repeat of the request answers
     * <code>ALREADY_EXISTS</code> naming the retry in its message (read
     * <code>retried_by_scheduled_caller_name</code>); to retry again after the retry failed too, retry the new
     * one.</p>
     * <p>Errors are gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed name or an unknown
     * <code>field_mask</code> path; <code>NOT_FOUND</code> for an unknown project or scheduled caller, or one of
     * another project; <code>FAILED_PRECONDITION</code> for a scheduled caller that is not
     * <code>SCHEDULED_CALLER_STATUS_FAILED</code> (<code>reason=not-failed</code>) or that belongs to a campaign
     * (<code>reason=campaign-scheduled-caller</code>: a campaign call is retried by the campaign&apos;s
     * <code>max_attempts</code>); <code>ALREADY_EXISTS</code> when it was already retried;
     * <code>RESOURCE_EXHAUSTED</code> when the project reached its caller limit; with authorization enforced
     * <code>PERMISSION_DENIED</code>.</p>
     * <p>Events: <code>VTSI_EVENT_SCHEDULED_CALLER_CREATED</code> for the new scheduled caller.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
     * @param \Ondewo\Vtsi\RetryScheduledCallerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RetryScheduledCaller(\Ondewo\Vtsi\RetryScheduledCallerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/RetryScheduledCaller',
        $argument,
        ['\Ondewo\Vtsi\ScheduledCaller', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Stops a call: hangs it up if it is still active and stops (releases) the listener or caller that serves
     * it, like <code>StopCaller</code> / <code>StopListener</code>. A call that already ended is not an error: its
     * listener or caller is still released if it is deployed, and when there was nothing left to release the
     * response carries <code>error_message = Call ... was not released</code>, so a repeat succeeds with that
     * message.</p>
     * <p>Errors are gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed request or an unknown
     * <code>field_mask</code> path; <code>NOT_FOUND</code> for an unknown project or call, or a call of another
     * project; with authorization enforced <code>PERMISSION_DENIED</code>.</p>
     * <p>Events: <code>VTSI_EVENT_CALL_STOPPED</code>, and <code>VTSI_EVENT_CALLER_STOPPED</code> /
     * <code>VTSI_EVENT_LISTENER_STOPPED</code> for the released resource.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Stops several calls of one project, each like <code>StopCall</code>, at most 1000 distinct names. Not
     * atomic: every call is stopped on its own and reported in its own entry, in request order; a failed entry
     * carries an <code>error_message</code> prefixed with the gRPC status code name <code>StopCall</code> would have
     * answered and does not stop the others. No entry, more than 1000 names or a malformed
     * <code>vtsi_project_name</code> is <code>INVALID_ARGUMENT</code>, an unknown project <code>NOT_FOUND</code>, and
     * then nothing is stopped.</p>
     * <p>Authorization: as <code>StopCall</code>.</p>
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
     * <p>Stops every call of a VTSI project (listener and caller calls alike), or, with
     * <code>call_filter</code>, those it matches, each like <code>StopCall</code>. Not atomic and not bounded in
     * size; a project with nothing to stop answers an empty response, so the RPC is idempotent. If a stop fails
     * part-way, the remaining calls are still stopped one by one and every call gets its own entry.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed request, an invalid <code>call_filter</code> or an
     * unknown <code>field_mask</code> path; <code>NOT_FOUND</code> for an unknown project or campaign; with
     * authorization enforced <code>PERMISSION_DENIED</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Transfer several calls, each like <code>TransferCall</code>, at most 1000. Not atomic: every transfer is
     * run on its own and reported in its own entry, in request order; an entry <code>TransferCall</code> would have
     * refused with a gRPC status carries that refusal in its <code>error_message</code> (prefixed with the status
     * code name) and does not stop the others. Idempotent per entry <code>request_id</code>.</p>
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
     * <p>Gets a call, populated according to <code>call_view</code> and <code>field_mask</code> (the call&apos;s log
     * lines are read with <code>Logs.ListCallLogs</code>). <code>FULL</code> also returns every participant ever
     * invited into the call (see <code>Call.participants</code>).</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed name or an unknown <code>field_mask</code> path;
     * <code>NOT_FOUND</code> for an unknown project or call, or a call of another project; with authorization
     * enforced <code>PERMISSION_DENIED</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Lists the calls of a VTSI project, ended ones included, narrowed by <code>call_filter</code>, ordered by
     * <code>call_sorting</code> (default: by <code>start_time</code>, oldest first) and paged with
     * <code>page_size</code> / <code>page_token</code>; <code>total_size</code> counts every match.</p>
     * <p>With <code>call_filter.campaign_name</code> or <code>call_filter.campaign_display_name</code> set, lists
     * only the calls of that campaign: the calls placed by the attempts of its campaign calls.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed request, an invalid filter, a negative
     * <code>page_size</code>, a <code>page_token</code> of another listing or an unknown <code>field_mask</code>
     * path; <code>NOT_FOUND</code> for an unknown project or campaign; with authorization enforced
     * <code>PERMISSION_DENIED</code>.</p>
     * <p>Authorization: <code>PROJECT_EXECUTOR</code> or higher on the project.</p>
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
     * <p>Aggregate figures (totals, active calls, counts by SIP status type, by call type, by AMD verdict and by
     * transfer outcome, durations, redial recommendations) over the calls of a VTSI project that
     * <code>call_filter</code> matches; see <code>CallStatistics</code>. Read only, no side effect.</p>
     * <p>Errors: as for <code>ListCalls</code> (an invalid filter is <code>INVALID_ARGUMENT</code>, an unknown project
     * or campaign <code>NOT_FOUND</code>).</p>
     * <p>Authorization: as <code>ListCalls</code> (<code>PROJECT_EXECUTOR</code> or higher on the project).</p>
     * @param \Ondewo\Vtsi\GetCallStatisticsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCallStatistics(\Ondewo\Vtsi\GetCallStatisticsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/GetCallStatistics',
        $argument,
        ['\Ondewo\Vtsi\CallStatistics', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Updates the descriptive metadata of a call: the only updatable <code>update_mask</code> path is
     * <code>labels</code>. Allowed on active and ended calls. Refused for the WAITING call of a persistent
     * listener or a pooled caller (status <code>NO_ONGOING_CALL</code>, not active: the record that waits for the
     * next call, which <code>ListCalls</code> returns too) with <code>FAILED_PRECONDITION</code> and
     * <code>reason=call-not-started</code> in the details: label the call once it has started. It changes only
     * the stored call record: the live call, its SIP container, its status and its media are never touched, and
     * nothing is sent to the call. Idempotent: writing the stored labels again changes nothing.</p>
     * <p>Events: <code>VTSI_EVENT_CALL_UPDATED</code> when the labels changed.</p>
     * <p>Errors are gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed <code>call.name</code>, an
     * empty <code>update_mask</code>, any path other than <code>labels</code> (every other field of a
     * <code>Call</code> is output only), a path below <code>labels</code>, labels outside the bounds of
     * <code>Call.labels</code>, or an unknown <code>field_mask</code> path (each naming the path or label);
     * <code>NOT_FOUND</code> for an unknown call or project; <code>FAILED_PRECONDITION</code>
     * (<code>reason=call-not-started</code>) for a waiting call; with authorization enforced
     * <code>PERMISSION_DENIED</code> for a project the caller holds no role on.</p>
     * <p>Authorization: the role that may stop calls of the project (<code>PROJECT_EXECUTOR</code> or
     * higher).</p>
     * @param \Ondewo\Vtsi\UpdateCallRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateCall(\Ondewo\Vtsi\UpdateCallRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/UpdateCall',
        $argument,
        ['\Ondewo\Vtsi\UpdateCallResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Updates several calls, each like <code>UpdateCall</code>, with the per-entry results and the
     * request-level errors of <code>UpdateCallers</code>.</p>
     * <p>Authorization: as <code>UpdateCall</code>.</p>
     * @param \Ondewo\Vtsi\UpdateCallsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateCalls(\Ondewo\Vtsi\UpdateCallsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Calls/UpdateCalls',
        $argument,
        ['\Ondewo\Vtsi\UpdateCallsResponse', 'decode'],
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
     * affected. Returns the participant after the request.</p>
     * <p>Idempotent: a participant that already FAILED or LEFT (for whatever reason) is returned unchanged with OK,
     * and nothing is sent.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed request; <code>NOT_FOUND</code> with
     * <code>reason=call-not-found</code> for an unknown call or a call of another project, and with
     * <code>reason=participant-not-found</code> for an unknown <code>participant_id</code> or a participant of
     * another call; <code>ABORTED</code> with <code>reason=call-control-busy</code> while another call-control
     * request for the call runs (retry); <code>UNAVAILABLE</code> with <code>reason=asterisk-unreachable</code> when
     * the hang-up could not be sent; with authorization enforced <code>PERMISSION_DENIED</code>.</p>
     * <p>Events: <code>VTSI_EVENT_CALL_PARTICIPANT_LEFT</code> (or <code>VTSI_EVENT_CALL_PARTICIPANT_FAILED</code>
     * for a participant that was still ringing).</p>
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
     * <p>Both settings <code>CALL_MEDIA_SETTING_UNCHANGED</code> is a valid read of the current state: it answers
     * the effective <code>state</code> with <code>changed = false</code>, changes nothing, and writes no audit record
     * and no event (see <code>SetCallMediaControlRequest.bot_voice</code>).</p>
     * <p>Events: <code>VTSI_EVENT_CALL_BOT_MUTED</code> / <code>VTSI_EVENT_CALL_BOT_UNMUTED</code> /
     * <code>VTSI_EVENT_CALL_LISTENING_PAUSED</code> / <code>VTSI_EVENT_CALL_LISTENING_RESUMED</code> when the
     * effective state changed.</p>
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
