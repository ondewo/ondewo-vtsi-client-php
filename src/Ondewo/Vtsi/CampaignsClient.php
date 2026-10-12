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
 * <p>Manages the CAMPAIGNS of a VTSI project. A campaign is a named set of outbound calls that VTSI
 * places for the client while keeping at most <code>max_parallel_calls</code> of them running at
 * the same time. If 100 callers are added to a campaign with <code>max_parallel_calls = 10</code>,
 * at any moment at most 10 of those calls are being set up or are connected; the next one starts
 * when one ends.</p>
 * <p>Calls are added to a campaign with
 * <a href="index.html#ondewo.vtsi.Calls.AddCallersToCampaign">Calls.AddCallersToCampaign</a> or
 * <a href="index.html#ondewo.vtsi.Calls.AddScheduledCallersToCampaign">Calls.AddScheduledCallersToCampaign</a>
 * (a server that predates them answers <code>UNIMPLEMENTED</code> and starts nothing); a scheduled call of a campaign is started at or after its scheduled time AND when the campaign has
 * a free slot.</p>
 * <p>A call that fails is retried up to <code>max_attempts</code> times in total, waiting
 * <code>retry_delay</code> between attempts. A call counts as failed only after its last attempt.
 * A failure that cannot succeed by repetition (for example a rejected credential, an invalid
 * configuration) is never retried.</p>
 * <p>Lifecycle: <code>StartCampaign</code> starts a created campaign; <code>StopCampaign</code> lets
 * the ongoing calls finish and starts no new ones; <code>HardStopCampaign</code> ends the ongoing
 * calls immediately and starts no new ones; <code>ResumeCampaign</code> continues a stopped or hard
 * stopped campaign with the calls that have not finished yet.</p>
 * <p>Every RPC about ONE campaign accepts either its resource name or its display name. Display names
 * are unique within a project, so a display name is resolved within the project named by the
 * request&apos;s top-level <code>vtsi_project_name</code>, which is REQUIRED with a display name
 * (<code>INVALID_ARGUMENT</code> when it is empty or malformed) and checked against the campaign
 * when a resource name is used. (The <code>CampaignDisplayName</code> message of 9.0.0, which
 * carried the project and the display name together, was removed in 9.1.0; its field numbers are
 * <code>reserved</code>.)</p>
 * <p>A malformed selector is <code>INVALID_ARGUMENT</code> for every authenticated caller, with or
 * without authorization enforced (also when authorization could resolve no project from it): neither
 * the resource name nor the display name set (also how an old 9.0.0 client&apos;s removed
 * <code>CampaignDisplayName</code> arrives), a malformed resource name, a display name with an empty
 * or malformed <code>vtsi_project_name</code>, and a <code>vtsi_project_name</code> that is not the
 * project of the resource name. With authorization enforced, a well-formed request naming a project
 * the caller holds no role on (an unknown project included) is refused with
 * <code>PERMISSION_DENIED</code> before any lookup, so it is not answered <code>NOT_FOUND</code>, and
 * a caller without a credential is <code>UNAUTHENTICATED</code> whatever it sent.</p>
 * <p>Campaign-level call defaults: <code>campaign_common_services_config</code> and
 * <code>campaign_sip_caller_config</code> of a <code>Campaign</code> are the defaults of EVERY call of
 * the campaign. They are read LIVE when a campaign call is dispatched (every attempt, retries
 * included): the effective configuration of the call is a copy of the campaign&apos;s config with the
 * call&apos;s own <code>StartCallerRequest</code> config merged over it (protobuf
 * <code>MergeFrom</code>), see <a href="index.html#ondewo.vtsi.Campaign">Campaign</a>. The one exception
 * is the callee: <code>campaign_sip_caller_config.callee_id</code> is resolved and FIXED when a call is
 * added (it is that call&apos;s <code>CampaignCall.phone_number</code>), so every attempt of a call dials the
 * number its campaign call reports.</p>
 * <p>Partial responses: <code>ListCampaigns</code>, <code>ListCampaignCalls</code>,
 * <code>CreateCampaign</code>, <code>GetCampaign</code>, <code>UpdateCampaign</code>,
 * <code>DeleteCampaign</code> (paths of <code>DeleteCampaignResponse</code>), the four lifecycle RPCs
 * <code>StartCampaign</code>, <code>StopCampaign</code>, <code>HardStopCampaign</code> and
 * <code>ResumeCampaign</code>, <code>CloneCampaign</code> and <code>GetCampaignCall</code> accept an optional
 * <code>field_mask</code> naming the field paths of the returned resource (for a listing: of each listed
 * element) to populate. A mask never changes what the RPC does. Unset or empty returns every
 * field (one exception: <code>ListCampaigns</code> returns <code>campaign_callers</code> and
 * <code>campaign_callers_truncated</code> only when its mask names them); the identifying <code>name</code> is always populated; an unknown path is rejected with
 * <code>INVALID_ARGUMENT</code> naming it; nested paths through singular message fields (e.g.
 * <code>statistics.completed</code>) are allowed, a path below a repeated or map field is not. The
 * mask is applied after any role-based redaction, so it can only narrow what the caller may see.</p>
 * <p>Callers and calls of a campaign: <code>Campaign.campaign_callers</code> names the callers that placed
 * its calls (bounded); <code>Calls.ListCallers</code> with <code>ListCallersRequest.campaign_name</code> /
 * <code>campaign_display_name</code> lists them paginated as <code>Caller</code> resources, and
 * <code>Calls.ListCalls</code> with <code>CallFilter.campaign_name</code> /
 * <code>campaign_display_name</code> lists the calls they placed as <code>Call</code> resources.</p>
 * <p>Calling window: a campaign with a <code>calling_window</code> starts calls (first attempts, retries and
 * due scheduled calls alike) only inside one of the window&apos;s weekly slots, in the window&apos;s time zone.
 * Outside every slot it stays <code>RUNNING</code> and reports <code>outside_calling_window = true</code>; calls
 * already running are never ended by a slot ending. See
 * <a href="index.html#ondewo.vtsi.CampaignCallingWindow">CampaignCallingWindow</a>.</p>
 * <p>Limits and defaults of the server (environment variables of ondewo-vtsi, read at start-up): at most
 * <code>ONDEWO_VTSI_CAMPAIGN_MAX_CALLS</code> (100000) calls per campaign; <code>max_parallel_calls</code>
 * defaults to <code>ONDEWO_VTSI_CAMPAIGN_DEFAULT_MAX_PARALLEL_CALLS</code> (1) and is at most
 * <code>ONDEWO_VTSI_CAMPAIGN_MAX_PARALLEL_CALLS_LIMIT</code> (1000); <code>max_attempts</code> defaults to 1
 * and is at most <code>ONDEWO_VTSI_CAMPAIGN_MAX_ATTEMPTS_LIMIT</code> (10); <code>retry_delay</code> defaults
 * to <code>ONDEWO_VTSI_CAMPAIGN_DEFAULT_RETRY_DELAY_S</code> (60 s); one <code>AddCallersToCampaign</code> /
 * <code>AddScheduledCallersToCampaign</code> request carries at most 1000 entries (a fixed server limit,
 * <code>INVALID_ARGUMENT</code> above it); <code>CancelCampaignCalls</code> and <code>RetryCampaignCalls</code>
 * act on at most 1000 calls per request. The status stream is bounded by
 * <code>ONDEWO_VTSI_STATUS_STREAM_MAX_DURATION_S</code> (3600 s), sends a keep-alive after
 * <code>ONDEWO_VTSI_STATUS_STREAM_KEEPALIVE_S</code> (15 s) without a change and at most
 * <code>ONDEWO_VTSI_STATUS_STREAM_MAX_CONCURRENT</code> (16) status streams are open per server replica.</p>
 * <p>Authorization (when enforced): every RPC of this service needs <code>PROJECT_EXECUTOR</code> or a
 * higher role (<code>PROJECT_DEVELOPER</code>, <code>PROJECT_ADMIN</code>) on the campaign&apos;s project, or
 * <code>SERVER_ADMIN</code>; credential-bearing call defaults are returned only to the roles named at
 * <code>Campaign.campaign_common_services_config</code>.</p>
 * <p>Errors are reported as gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed name,
 * filter, field mask or value; <code>NOT_FOUND</code> for an unknown project, campaign or campaign
 * call (with authorization enforced: <code>PERMISSION_DENIED</code> for a project the caller holds
 * no role on, or a role below <code>PROJECT_EXECUTOR</code>); <code>UNAUTHENTICATED</code> for a request
 * without a valid credential while authorization is enforced; <code>ALREADY_EXISTS</code> for a
 * <code>display_name</code> already used in the project;
 * <code>FAILED_PRECONDITION</code> for a state that does not allow the operation (each RPC names its
 * cases); <code>ABORTED</code> when a concurrent change won, nothing was stored and the request can
 * be retried; <code>DEADLINE_EXCEEDED</code> for a forced <code>DeleteCampaign</code> whose hang-ups were not
 * confirmed in time (the hard stop stays in effect, retry the request); <code>RESOURCE_EXHAUSTED</code> when
 * the server has no free stream slot.</p>
 */
class CampaignsClient extends \Grpc\BaseStub {

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
     * Campaign endpoints
     * ////////////////////////////////////////////////////////////////////////////
     *
     * <p>Creates a campaign in state <code>CAMPAIGN_STATE_CREATED</code>. Calls are added with
     * <code>AddCallersToCampaign</code> / <code>AddScheduledCallersToCampaign</code>; nothing is dialled before
     * <code>StartCampaign</code>.</p>
     * <p>With an <code>idempotency_key</code>, a retry of the same request returns the first attempt&apos;s
     * campaign instead of creating a second one (see <code>CreateCampaignRequest.idempotency_key</code>).
     * Emits <code>VTSI_EVENT_CAMPAIGN_CREATED</code>.</p>
     * <p>Errors: <code>NOT_FOUND</code> if the project does not exist; <code>ALREADY_EXISTS</code> if
     * the <code>display_name</code> is used in the project; <code>INVALID_ARGUMENT</code> for a malformed
     * <code>vtsi_project_name</code>, an output-only field that was set, an out-of-range value, an invalid
     * <code>calling_window</code>, a malformed <code>idempotency_key</code>, an <code>idempotency_key</code>
     * reused with a different request or an unknown <code>field_mask</code> path; <code>ABORTED</code> while
     * a first attempt with the same <code>idempotency_key</code> is still running.</p>
     * @param \Ondewo\Vtsi\CreateCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateCampaign(\Ondewo\Vtsi\CreateCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/CreateCampaign',
        $argument,
        ['\Ondewo\Vtsi\Campaign', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Returns a campaign including its statistics, its call defaults and its callers
     * (<code>campaign_callers</code>).</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>INVALID_ARGUMENT</code> for a malformed name, a
     * <code>display_name</code> without <code>vtsi_project_name</code> or an unknown
     * <code>field_mask</code> path.</p>
     * @param \Ondewo\Vtsi\GetCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCampaign(\Ondewo\Vtsi\GetCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/GetCampaign',
        $argument,
        ['\Ondewo\Vtsi\Campaign', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Updates the fields named in <code>update_mask</code>: <code>display_name</code>,
     * <code>max_parallel_calls</code>, <code>max_attempts</code>, <code>retry_delay</code>,
     * <code>campaign_common_services_config</code>, <code>campaign_sip_caller_config</code> and
     * <code>calling_window</code> (each also by a nested sub-path). Allowed in every state. A changed
     * <code>calling_window</code> applies from the next dispatch decision (within about one second); it never
     * ends a running call. Lowering <code>max_parallel_calls</code>
     * never ends a running call: the campaign starts no new call until fewer than the new maximum are
     * running. A changed call default applies to every campaign call dispatched after the update,
     * retries included; a call already dispatched keeps the configuration it was started with. The
     * exception is <code>campaign_sip_caller_config.callee_id</code>, which is fixed per call when the call
     * is added and therefore applies only to calls added after the update.</p>
     * <p>Emits <code>VTSI_EVENT_CAMPAIGN_UPDATED</code> (attribute <code>updated_fields</code>) and, when
     * <code>max_parallel_calls</code> changed, <code>VTSI_EVENT_CAMPAIGN_MAX_PARALLEL_CALLS_CHANGED</code>.</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>INVALID_ARGUMENT</code> for an empty mask, an unknown,
     * output-only or immutable path, an out-of-range value, an invalid <code>calling_window</code> or an
     * unknown <code>field_mask</code> path; <code>ALREADY_EXISTS</code> for a
     * <code>display_name</code> used by another campaign of the project; <code>ABORTED</code> when a concurrent
     * update of the same campaign won (nothing was written; retry).</p>
     * @param \Ondewo\Vtsi\UpdateCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateCampaign(\Ondewo\Vtsi\UpdateCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/UpdateCampaign',
        $argument,
        ['\Ondewo\Vtsi\Campaign', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Deletes a campaign and its campaign calls. Its scheduled callers that have not fired yet are
     * cancelled. Calls that already ran are not touched and stay visible through
     * <code>ListCalls</code>, but no longer as calls OF the campaign: the attempt history that linked them
     * to it is deleted with it, so <code>ListCalls</code> with <code>CallFilter.campaign_name</code> /
     * <code>campaign_display_name</code> of a deleted campaign answers <code>NOT_FOUND</code> (list them by
     * caller or without the campaign selector), and <code>Calls.ListCallers</code> with the campaign selector
     * likewise.</p>
     * <p>With <code>force</code>, a campaign that is <code>RUNNING</code>, <code>STOPPING</code> or
     * <code>HARD_STOPPING</code> is hard stopped first (exactly as by <code>HardStopCampaign</code>) and deleted
     * as soon as the end of each of its calls is confirmed. The RPC waits for that, at most
     * <code>ONDEWO_VTSI_CAMPAIGN_FORCE_DELETE_WAIT_S</code> (30 s by default) and never past the client&apos;s
     * deadline; when the hang-ups are not confirmed by then it answers <code>DEADLINE_EXCEEDED</code>, the
     * campaign stays <code>HARD_STOPPING</code> (then <code>HARD_STOPPED</code>) and is NOT deleted: repeat the
     * request. Idempotent: a repeated forced delete of a campaign that is still hard stopping waits again.</p>
     * <p>Emits <code>VTSI_EVENT_CAMPAIGN_DELETED</code> (preceded, with <code>force</code> on a running
     * campaign, by <code>VTSI_EVENT_CAMPAIGN_HARD_STOP_REQUESTED</code> and
     * <code>VTSI_EVENT_CAMPAIGN_HARD_STOPPED</code>).</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>FAILED_PRECONDITION</code> without <code>force</code> while
     * the campaign is <code>RUNNING</code>, <code>STOPPING</code> or <code>HARD_STOPPING</code> (stop or hard
     * stop it first, or set <code>force</code>); <code>DEADLINE_EXCEEDED</code> with <code>force</code> as
     * described above; <code>INVALID_ARGUMENT</code> for a malformed name, a <code>display_name</code> without
     * <code>vtsi_project_name</code> or an unknown <code>field_mask</code> path.</p>
     * @param \Ondewo\Vtsi\DeleteCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteCampaign(\Ondewo\Vtsi\DeleteCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/DeleteCampaign',
        $argument,
        ['\Ondewo\Vtsi\DeleteCampaignResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Lists the campaigns of a project, filtered, ordered by <code>ListCampaignsRequest.order_by</code>
     * (newest first by default) and paged, each with its
     * statistics. <code>campaign_callers</code> and <code>campaign_callers_truncated</code> are left empty
     * unless <code>field_mask</code> names them, and a page that carries them holds at most 20 campaigns (see
     * <code>ListCampaignsRequest.field_mask</code>).</p>
     * <p>Errors: <code>NOT_FOUND</code> if the project does not exist; <code>INVALID_ARGUMENT</code>
     * for a malformed <code>vtsi_project_name</code>, a negative <code>page_size</code>, a foreign
     * <code>page_token</code> (also one issued for another filter or <code>order_by</code>), an unknown
     * <code>order_by</code> or <code>states</code> value, <code>created_after</code> not before
     * <code>created_before</code> or an unknown <code>field_mask</code> path.</p>
     * @param \Ondewo\Vtsi\ListCampaignsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListCampaigns(\Ondewo\Vtsi\ListCampaignsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/ListCampaigns',
        $argument,
        ['\Ondewo\Vtsi\ListCampaignsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Returns the progress of a campaign: how many of its calls are not started, in progress,
     * waiting for a retry, completed, failed and cancelled, and how many attempts were made.</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>INVALID_ARGUMENT</code> for a malformed name or a
     * <code>display_name</code> without <code>vtsi_project_name</code>.</p>
     * @param \Ondewo\Vtsi\GetCampaignStatisticsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCampaignStatistics(\Ondewo\Vtsi\GetCampaignStatisticsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/GetCampaignStatistics',
        $argument,
        ['\Ondewo\Vtsi\CampaignStatistics', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Lists the calls of a campaign in the order they were added, filtered and paged, each with
     * its current SIP status, the SIP status description and its attempts.</p>
     * <p>The filters of <code>ListCampaignCallsRequest</code> are combined by AND; the values of one
     * repeated filter by OR.</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>INVALID_ARGUMENT</code> for a negative
     * <code>page_size</code>, a foreign <code>page_token</code> (also one issued for another filter), a
     * <code>display_name</code> without <code>vtsi_project_name</code>, a malformed campaign call name or one
     * of another campaign in <code>campaign_call_names</code>, more than 1000 <code>phone_numbers</code> or
     * <code>campaign_call_names</code>, a negative <code>min_attempts</code>, an unknown enum value in
     * <code>states</code> / <code>sources</code>, <code>finish_time_min</code> not before
     * <code>finish_time_max</code> or an unknown <code>field_mask</code> path.</p>
     * @param \Ondewo\Vtsi\ListCampaignCallsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListCampaignCalls(\Ondewo\Vtsi\ListCampaignCallsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/ListCampaignCalls',
        $argument,
        ['\Ondewo\Vtsi\ListCampaignCallsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Starts a <code>CAMPAIGN_STATE_CREATED</code> campaign. Idempotent on a
     * <code>RUNNING</code> campaign.</p>
     * <p>A campaign with a <code>calling_window</code> started outside every slot is <code>RUNNING</code>
     * with <code>outside_calling_window = true</code> and dials from the next slot on. Emits
     * <code>VTSI_EVENT_CAMPAIGN_STARTED</code> (nothing on the idempotent repeat).</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>FAILED_PRECONDITION</code> in any other state (use
     * <code>ResumeCampaign</code> for a stopped campaign); <code>INVALID_ARGUMENT</code> for a malformed name, neither selector set, a
     * <code>display_name</code> without <code>vtsi_project_name</code> or a <code>vtsi_project_name</code>
     * that is not the campaign&apos;s project, or an unknown <code>field_mask</code> path.</p>
     * @param \Ondewo\Vtsi\StartCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StartCampaign(\Ondewo\Vtsi\StartCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/StartCampaign',
        $argument,
        ['\Ondewo\Vtsi\Campaign', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Stops a campaign gracefully: no new call is started, the calls that are running continue
     * until they end, then the campaign is <code>CAMPAIGN_STATE_STOPPED</code>. Returns the campaign
     * in <code>STOPPING</code> (or already <code>STOPPED</code> when no call was running).
     * Idempotent on <code>STOPPING</code>, <code>STOPPED</code>, <code>HARD_STOPPING</code> and
     * <code>HARD_STOPPED</code>.</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>FAILED_PRECONDITION</code> on a
     * <code>COMPLETED</code> campaign; <code>INVALID_ARGUMENT</code> for a malformed name, neither selector set, a
     * <code>display_name</code> without <code>vtsi_project_name</code> or a <code>vtsi_project_name</code>
     * that is not the campaign&apos;s project, or an unknown <code>field_mask</code> path.</p>
     * @param \Ondewo\Vtsi\StopCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function StopCampaign(\Ondewo\Vtsi\StopCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/StopCampaign',
        $argument,
        ['\Ondewo\Vtsi\Campaign', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Stops a campaign immediately: no new call is started and the server hangs up every running
     * call of the campaign right away. The campaign stays <code>CAMPAIGN_STATE_HARD_STOPPING</code>
     * until the end of each of those calls is CONFIRMED (its call record is no longer active), then
     * becomes <code>CAMPAIGN_STATE_HARD_STOPPED</code>; with a reachable call infrastructure this
     * takes seconds, scaled by the number of running calls. A hang-up that fails is repeated every
     * few seconds, and the campaign does not report <code>HARD_STOPPED</code> while one of its calls
     * is still up. Calls ended this way are <code>CAMPAIGN_CALL_STATE_CANCELLED</code>; a call that
     * finished on its own before the hard stop keeps its own outcome. Calls not started yet stay
     * <code>NOT_STARTED</code> / <code>RETRY_PENDING</code> and run after <code>ResumeCampaign</code>.
     * Returns the campaign in <code>HARD_STOPPING</code> (or already <code>HARD_STOPPED</code>).
     * Idempotent on <code>HARD_STOPPING</code> and <code>HARD_STOPPED</code>.</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>FAILED_PRECONDITION</code> on a
     * <code>COMPLETED</code> campaign; <code>INVALID_ARGUMENT</code> for a malformed name, neither selector set, a
     * <code>display_name</code> without <code>vtsi_project_name</code> or a <code>vtsi_project_name</code>
     * that is not the campaign&apos;s project, or an unknown <code>field_mask</code> path.</p>
     * @param \Ondewo\Vtsi\HardStopCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function HardStopCampaign(\Ondewo\Vtsi\HardStopCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/HardStopCampaign',
        $argument,
        ['\Ondewo\Vtsi\Campaign', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Resumes a <code>STOPPING</code>, <code>STOPPED</code> or <code>HARD_STOPPED</code>
     * campaign: it becomes <code>RUNNING</code> and continues with the calls that are not finished.
     * Idempotent on <code>RUNNING</code>.</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>FAILED_PRECONDITION</code> on <code>CREATED</code>
     * (use <code>StartCampaign</code>), <code>HARD_STOPPING</code> (wait until it is
     * <code>HARD_STOPPED</code>) and <code>COMPLETED</code>; <code>INVALID_ARGUMENT</code> for a malformed name, neither selector set, a
     * <code>display_name</code> without <code>vtsi_project_name</code> or a <code>vtsi_project_name</code>
     * that is not the campaign&apos;s project, or an unknown <code>field_mask</code> path.</p>
     * @param \Ondewo\Vtsi\ResumeCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ResumeCampaign(\Ondewo\Vtsi\ResumeCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/ResumeCampaign',
        $argument,
        ['\Ondewo\Vtsi\Campaign', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Streams the status and progress of the campaigns of a project. The first message is a
     * snapshot (<code>snapshot = true</code>) of every matching campaign; every later message
     * carries only the campaigns (and, with <code>include_calls</code>, the campaign calls) that
     * changed. Changes are polled every <code>ONDEWO_VTSI_STATUS_STREAM_POLL_INTERVAL_S</code> (1 s by
     * default). An empty message is sent as a keep-alive when nothing changed for
     * <code>ONDEWO_VTSI_STATUS_STREAM_KEEPALIVE_S</code> (15 s by default).</p>
     * <p>The stream ends when the client disconnects, or the server ends it with a last message carrying
     * <code>end_reason</code> and <code>end_reason_type</code>: at the maximum stream duration
     * <code>ONDEWO_VTSI_STATUS_STREAM_MAX_DURATION_S</code> (3600 s by default,
     * <code>STREAM_END_REASON_MAX_DURATION</code>), when the server shuts down
     * (<code>STREAM_END_REASON_SERVER_SHUTDOWN</code>) and when the project is deleted
     * (<code>STREAM_END_REASON_PROJECT_DELETED</code>). Reconnect and treat the new snapshot as authoritative.
     * A client that blocks one send for longer than <code>ONDEWO_VTSI_STREAM_STALL_TIMEOUT_S</code> (30 s by
     * default) is disconnected without a last message (the RPC ends <code>CANCELLED</code>). While
     * authorization is enforced, the caller&apos;s role is re-checked periodically; a revoked role ends the
     * RPC with <code>PERMISSION_DENIED</code>, an expired credential with <code>UNAUTHENTICATED</code>.</p>
     * <p>Errors: <code>NOT_FOUND</code> if the project does not exist; <code>INVALID_ARGUMENT</code> for a
     * malformed <code>vtsi_project_name</code>, a malformed entry of <code>campaign_names</code>, a campaign
     * name of another project, or an unknown value or <code>CAMPAIGN_STATE_UNSPECIFIED</code> in
     * <code>states</code> (a well-formed campaign name of the project that names no campaign is accepted and
     * matches nothing); <code>RESOURCE_EXHAUSTED</code> when the server has no free stream slot
     * (<code>ONDEWO_VTSI_STATUS_STREAM_MAX_CONCURRENT</code>, 16 per replica by default).</p>
     * @param \Ondewo\Vtsi\StreamCampaignStatusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function StreamCampaignStatus(\Ondewo\Vtsi\StreamCampaignStatusRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.vtsi.Campaigns/StreamCampaignStatus',
        $argument,
        ['\Ondewo\Vtsi\StreamCampaignStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * ////////////////////////////////////////////////////////////////////////////
     * Campaign call endpoints
     * ////////////////////////////////////////////////////////////////////////////
     *
     * <p>Returns one call of a campaign, with its current SIP status and, with
     * <code>include_attempts</code>, its attempts. Read-only, no event.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed <code>name</code> or an unknown
     * <code>field_mask</code> path; <code>NOT_FOUND</code> for an unknown project, campaign or campaign call
     * (also one deleted with its campaign); <code>PERMISSION_DENIED</code> / <code>UNAUTHENTICATED</code> as
     * for every RPC of this service.</p>
     * @param \Ondewo\Vtsi\GetCampaignCallRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCampaignCall(\Ondewo\Vtsi\GetCampaignCallRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/GetCampaignCall',
        $argument,
        ['\Ondewo\Vtsi\CampaignCall', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Cancels calls of a campaign that have not started an attempt that is still running: each selected
     * call in <code>CAMPAIGN_CALL_STATE_NOT_STARTED</code> or <code>CAMPAIGN_CALL_STATE_RETRY_PENDING</code>
     * becomes <code>CAMPAIGN_CALL_STATE_CANCELLED</code> (its <code>finish_time</code> set, counted in
     * <code>CampaignStatistics.cancelled</code>); the scheduled caller of a call added by
     * <code>AddScheduledCallersToCampaign</code> is cancelled with it. Mirrors
     * <code>Calls.CancelScheduledCaller</code>: a call whose attempt is <code>DISPATCHING</code> or
     * <code>IN_PROGRESS</code> is NOT cancelled (and its call is not hung up; use
     * <code>HardStopCampaign</code> or <code>Calls.StopCall</code>) and is reported in <code>refused</code>,
     * like a call that is already finished; a refusal is not an error.</p>
     * <p>Selection: <code>campaign_call_names</code>, <code>states</code>, or both (then a named call must
     * also be in one of the states). At most 1000 calls are acted on per request: with <code>states</code>
     * the first 1000 matching calls by <code>position</code>, and <code>remaining_count</code> says how many
     * more match; repeat the request until it is 0. Each call is cancelled atomically on its own (the request
     * as a whole is not atomic); a call that a replica starts dispatching while the request runs is refused,
     * never cancelled half-way. Allowed in every campaign state. When it leaves a <code>RUNNING</code>
     * campaign without an unfinished call, the campaign becomes <code>COMPLETED</code> at the next engine
     * tick. Idempotent: a repeat refuses the calls it already cancelled with
     * <code>reason=already-finished</code>.</p>
     * <p>Emits <code>VTSI_EVENT_CAMPAIGN_CALL_CANCELLED</code> per cancelled call,
     * <code>VTSI_EVENT_SCHEDULED_CALLER_CANCELLED</code> per cancelled scheduled caller, and the usual
     * throttled <code>VTSI_EVENT_CAMPAIGN_PROGRESS</code>.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed selector (as <code>GetCampaign</code>), neither
     * <code>campaign_call_names</code> nor <code>states</code> set, more than 1000 names, a malformed campaign
     * call name or one of another campaign, a state other than <code>NOT_STARTED</code> /
     * <code>RETRY_PENDING</code> in <code>states</code>; <code>NOT_FOUND</code> for an unknown project or
     * campaign (an unknown but well-formed campaign call name of the campaign is a refusal with
     * <code>reason=not-found</code>, not an error).</p>
     * @param \Ondewo\Vtsi\CancelCampaignCallsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CancelCampaignCalls(\Ondewo\Vtsi\CancelCampaignCallsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/CancelCampaignCalls',
        $argument,
        ['\Ondewo\Vtsi\CancelCampaignCallsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Puts FAILED or CANCELLED calls of a campaign back into the queue with a fresh attempt budget: each
     * selected call gets <code>additional_attempts</code> more attempts on top of the attempts it already
     * made, and becomes <code>CAMPAIGN_CALL_STATE_RETRY_PENDING</code> with <code>next_attempt_time</code> =
     * the later of now and <code>not_before</code> (or <code>CAMPAIGN_CALL_STATE_NOT_STARTED</code> when it
     * never made an attempt, e.g. a scheduled call cancelled before it fired). <code>finish_time</code> and
     * <code>last_error</code> are cleared; <code>attempt_history</code> is kept and continues with the next
     * <code>attempt_number</code>. The call keeps its <code>phone_number</code> and its own configuration;
     * the campaign&apos;s call defaults are read live at the next dispatch as for every attempt.</p>
     * <p>A call added by <code>AddScheduledCallersToCampaign</code> keeps following its scheduled caller,
     * which returns to <code>SCHEDULED</code> with its scheduled time moved to the call&apos;s
     * <code>next_attempt_time</code> (<code>VTSI_EVENT_SCHEDULED_CALLER_UPDATED</code>).</p>
     * <p>Effect on the campaign: a <code>COMPLETED</code> campaign becomes <code>RUNNING</code> again (as when
     * calls are added by a <code>CampaignAssignment</code>); every other state is kept, so a stopped campaign
     * runs the calls after <code>ResumeCampaign</code> and a <code>CREATED</code> one after
     * <code>StartCampaign</code>. The calls are dispatched under <code>max_parallel_calls</code> and the
     * <code>calling_window</code> like any other.</p>
     * <p>Selection exactly as <code>CancelCampaignCalls</code> (names, states or both; at most 1000 calls per
     * request, <code>remaining_count</code>); a selected call that is not <code>FAILED</code> or
     * <code>CANCELLED</code> is reported in <code>refused</code>. A failure that cannot succeed by repetition
     * (e.g. a rejected credential) is retried too: fix its cause first, otherwise the campaign may be
     * auto-stopped again. Not idempotent: each request adds a new budget to the calls it requeues, but a
     * repeat finds them <code>RETRY_PENDING</code> / <code>NOT_STARTED</code> and refuses them.</p>
     * <p>Emits <code>VTSI_EVENT_CAMPAIGN_CALL_REQUEUED</code> per requeued call (attributes
     * <code>attempt_limit</code>, <code>next_attempt_time</code>), <code>VTSI_EVENT_CAMPAIGN_RESUMED</code>
     * when a <code>COMPLETED</code> campaign became <code>RUNNING</code>, and the throttled
     * <code>VTSI_EVENT_CAMPAIGN_PROGRESS</code>.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> as <code>CancelCampaignCalls</code>, except that
     * <code>states</code> may only hold <code>FAILED</code> / <code>CANCELLED</code>, plus
     * <code>additional_attempts</code> outside 0 to <code>ONDEWO_VTSI_CAMPAIGN_MAX_ATTEMPTS_LIMIT</code> (10)
     * and <code>not_before</code> more than 7 days ahead; <code>NOT_FOUND</code> for an unknown project or
     * campaign; <code>FAILED_PRECONDITION</code> when the campaign is <code>HARD_STOPPING</code> (wait until it
     * is <code>HARD_STOPPED</code>).</p>
     * @param \Ondewo\Vtsi\RetryCampaignCallsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RetryCampaignCalls(\Ondewo\Vtsi\RetryCampaignCallsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/RetryCampaignCalls',
        $argument,
        ['\Ondewo\Vtsi\RetryCampaignCallsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Creates a new campaign in the same project as a copy of an existing one, server side, so the
     * stored credentials of its call defaults are preserved without ever being returned to the client (a
     * Get-then-Create round trip would copy the REDACTED defaults). Copied: <code>max_parallel_calls</code>,
     * <code>max_attempts</code>, <code>retry_delay</code>, <code>campaign_common_services_config</code>,
     * <code>campaign_sip_caller_config</code> and <code>calling_window</code>. Not copied: the state (the
     * clone is <code>CAMPAIGN_STATE_CREATED</code>), statistics, callers and every other output-only
     * field.</p>
     * <p>With <code>include_calls</code>, the source&apos;s calls whose state is in <code>call_states</code>
     * (empty: every state) are copied as new <code>NOT_STARTED</code> calls in their original order
     * (<code>position</code> renumbered from 1), each with its own stored configuration and its fixed
     * <code>phone_number</code>, no attempt and no history. A copied call that was added by
     * <code>AddScheduledCallersToCampaign</code> gets a new scheduled caller with the same scheduled time
     * (a time in the past is due as soon as the clone runs). The whole clone is atomic: the campaign and every
     * copied call (and scheduled caller) are stored, or nothing is. The source is read in one consistent
     * snapshot and is not changed.</p>
     * <p>With an <code>idempotency_key</code>, a retry of the same request returns the first attempt&apos;s
     * clone (see <code>CreateCampaignRequest.idempotency_key</code>). Emits
     * <code>VTSI_EVENT_CAMPAIGN_CREATED</code> for the clone with the attributes <code>cloned_from</code>
     * (the source&apos;s resource name) and <code>copied_call_count</code>, and, when calls were copied,
     * <code>VTSI_EVENT_CAMPAIGN_CALLS_ADDED</code> and one <code>VTSI_EVENT_SCHEDULED_CALLER_CREATED</code> per
     * new scheduled caller.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed source selector (as <code>GetCampaign</code>),
     * a <code>new_display_name</code> over 128 characters, <code>call_states</code> without
     * <code>include_calls</code> or holding an unknown value, a malformed or reused
     * <code>idempotency_key</code> or an unknown <code>field_mask</code> path; <code>NOT_FOUND</code> for an
     * unknown project or source campaign; <code>ALREADY_EXISTS</code> when <code>new_display_name</code> is used
     * in the project; <code>FAILED_PRECONDITION</code> when the copied calls would exceed
     * <code>ONDEWO_VTSI_CAMPAIGN_MAX_CALLS</code>; <code>ABORTED</code> while a first attempt with the same
     * <code>idempotency_key</code> is still running.</p>
     * @param \Ondewo\Vtsi\CloneCampaignRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CloneCampaign(\Ondewo\Vtsi\CloneCampaignRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Campaigns/CloneCampaign',
        $argument,
        ['\Ondewo\Vtsi\Campaign', 'decode'],
        $metadata, $options);
    }

}
