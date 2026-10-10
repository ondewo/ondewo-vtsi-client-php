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
 * <p>Every RPC about ONE campaign accepts either its resource name or its display name
 * (<a href="index.html#ondewo.vtsi.CampaignDisplayName">CampaignDisplayName</a>); display names are
 * unique within a project.</p>
 * <p>Errors are reported as gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed name,
 * filter, field mask or value; <code>NOT_FOUND</code> for an unknown project, campaign or campaign
 * call; <code>ALREADY_EXISTS</code> for a <code>display_name</code> already used in the project;
 * <code>FAILED_PRECONDITION</code> for a state that does not allow the operation (each RPC names its
 * cases); <code>ABORTED</code> when a concurrent change won, nothing was stored and the request can
 * be retried; <code>RESOURCE_EXHAUSTED</code> when the server has no free stream slot.</p>
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
     * <p>Errors: <code>NOT_FOUND</code> if the project does not exist; <code>ALREADY_EXISTS</code> if
     * the <code>display_name</code> is used in the project; <code>INVALID_ARGUMENT</code> for an
     * output-only field that was set or an out-of-range value.</p>
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
     * <p>Returns a campaign including its statistics.</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>INVALID_ARGUMENT</code> for a malformed name.</p>
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
     * <code>max_parallel_calls</code>, <code>max_attempts</code>, <code>retry_delay</code>. Allowed in
     * every state. Lowering <code>max_parallel_calls</code> never ends a running call: the campaign
     * starts no new call until fewer than the new maximum are running.</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>INVALID_ARGUMENT</code> for an empty mask, an unknown,
     * output-only or immutable path, or an out-of-range value; <code>ALREADY_EXISTS</code> for a
     * <code>display_name</code> used by another campaign of the project.</p>
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
     * <code>ListCalls</code>.</p>
     * <p>Errors: <code>NOT_FOUND</code>; <code>FAILED_PRECONDITION</code> while the campaign is
     * <code>RUNNING</code>, <code>STOPPING</code> or <code>HARD_STOPPING</code> (stop or hard stop it
     * first).</p>
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
     * <p>Lists the campaigns of a project, newest first, filtered and paged, each with its
     * statistics.</p>
     * <p>Errors: <code>NOT_FOUND</code> if the project does not exist; <code>INVALID_ARGUMENT</code>
     * for a negative <code>page_size</code> or a foreign <code>page_token</code>.</p>
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
     * <p>Errors: <code>NOT_FOUND</code>; <code>INVALID_ARGUMENT</code> for a malformed name.</p>
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
     * <p>Errors: <code>NOT_FOUND</code>; <code>INVALID_ARGUMENT</code> for a negative
     * <code>page_size</code> or a foreign <code>page_token</code>.</p>
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
     * <p>Errors: <code>NOT_FOUND</code>; <code>FAILED_PRECONDITION</code> in any other state (use
     * <code>ResumeCampaign</code> for a stopped campaign).</p>
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
     * <code>COMPLETED</code> campaign.</p>
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
     * <code>COMPLETED</code> campaign.</p>
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
     * <code>HARD_STOPPED</code>) and <code>COMPLETED</code>.</p>
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
     * changed. An empty message is sent as a keep-alive. The stream ends when the client
     * disconnects or the server-side maximum stream duration is reached
     * (<code>end_reason</code> set on the last message).</p>
     * <p>Errors: <code>NOT_FOUND</code> if the project does not exist; <code>RESOURCE_EXHAUSTED</code>
     * when the server has no free stream slot.</p>
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

}
