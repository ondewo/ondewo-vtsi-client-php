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
 * <p>Notifies other systems of VTSI events: calls, callers, listeners, scheduled callers,
 * campaigns, VTSI projects, the project&apos;s Asterisk and softphone accounts. Every event is one
 * value of <a href="index.html#ondewo.vtsi.VtsiEvent">VtsiEvent</a> and is delivered as a
 * <a href="index.html#ondewo.vtsi.VtsiEventMessage">VtsiEventMessage</a>.</p>
 * <p>Two delivery paths: the server-streaming <code>SubscribeVtsiEvents</code> RPC, and WEBHOOKS
 * (an HTTP request per event to a URL of the client&apos;s choice). Which events go to which
 * webhooks is configured per project with EVENT SUBSCRIPTIONS.</p>
 * <p><b>Webhooks are best effort.</b> Each event is sent to a webhook as at most
 * <code>ONDEWO_VTSI_WEBHOOK_MAX_ATTEMPTS</code> HTTP requests (3 by default) with backoff between
 * them; after the last one fails, the event is dropped for that webhook. Pending webhook requests
 * live in the memory of the server replica that produced the event and are lost when it restarts.
 * An overloaded server, or a webhook that keeps timing out, drops events rather than slowing calls
 * down. The same event can arrive more than once (a request whose answer was lost is sent again):
 * de-duplicate by <code>event_id</code>. Requests of one webhook can arrive out of order, because
 * several server replicas send independently: order by <code>resource_sequence</code> per
 * <code>resource_name</code>, then <code>event_time</code>.</p>
 * <p><b>Streams can be resumed.</b> While a project has an open <code>SubscribeVtsiEvents</code>
 * stream or an enabled event subscription, its events are also written to a short-lived journal
 * (24 h by default). A stream that reconnects with its last <code>resume_token</code> receives the
 * events it missed, provided they are still in the journal; nothing else is persisted for
 * redelivery.</p>
 * <p>Use the status RPCs (<code>GetCampaign</code>, <code>ListCalls</code>, the status streams) to
 * reconcile.</p>
 * <p><b>Custom header values are write-only.</b> They are returned as <code>********</code> by every
 * RPC and are never logged.</p>
 * <p>Errors are gRPC status codes: <code>INVALID_ARGUMENT</code>, <code>NOT_FOUND</code>,
 * <code>FAILED_PRECONDITION</code>, <code>RESOURCE_EXHAUSTED</code> (no free stream slot).</p>
 */
class EventsClient extends \Grpc\BaseStub {

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
     * Event subscription endpoints
     * ////////////////////////////////////////////////////////////////////////////
     *
     * <p>Creates an event subscription: which events of the project are delivered to which
     * webhooks. A subscription without webhooks is usable by <code>SubscribeVtsiEvents</code>.</p>
     * <p>Errors: <code>NOT_FOUND</code> for an unknown project or webhook; <code>INVALID_ARGUMENT</code>
     * for no events and <code>all_events</code> unset, <code>events</code> together with
     * <code>all_events</code>, <code>VTSI_EVENT_UNSPECIFIED</code> or a reserved value, a webhook or a
     * campaign name of another project, a malformed campaign name, or an output-only field that was
     * set. A campaign named in <code>campaign_names</code> need not exist (it may be created later
     * or deleted since).</p>
     * @param \Ondewo\Vtsi\CreateVtsiEventSubscriptionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateVtsiEventSubscription(\Ondewo\Vtsi\CreateVtsiEventSubscriptionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Events/CreateVtsiEventSubscription',
        $argument,
        ['\Ondewo\Vtsi\VtsiEventSubscription', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Returns an event subscription.</p>
     * @param \Ondewo\Vtsi\GetVtsiEventSubscriptionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetVtsiEventSubscription(\Ondewo\Vtsi\GetVtsiEventSubscriptionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Events/GetVtsiEventSubscription',
        $argument,
        ['\Ondewo\Vtsi\VtsiEventSubscription', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Updates the fields named in <code>update_mask</code>: <code>display_name</code>,
     * <code>events</code>, <code>all_events</code>, <code>resource_name_prefixes</code>,
     * <code>campaign_names</code>, <code>webhook_names</code>, <code>disabled</code>. Takes effect
     * within a few seconds on every server replica.</p>
     * @param \Ondewo\Vtsi\UpdateVtsiEventSubscriptionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateVtsiEventSubscription(\Ondewo\Vtsi\UpdateVtsiEventSubscriptionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Events/UpdateVtsiEventSubscription',
        $argument,
        ['\Ondewo\Vtsi\VtsiEventSubscription', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Deletes an event subscription. Open <code>SubscribeVtsiEvents</code> streams that name it
     * end with <code>end_reason</code> set.</p>
     * @param \Ondewo\Vtsi\DeleteVtsiEventSubscriptionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteVtsiEventSubscription(\Ondewo\Vtsi\DeleteVtsiEventSubscriptionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Events/DeleteVtsiEventSubscription',
        $argument,
        ['\Ondewo\Vtsi\DeleteVtsiEventSubscriptionResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Lists the event subscriptions of a project, paged.</p>
     * @param \Ondewo\Vtsi\ListVtsiEventSubscriptionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListVtsiEventSubscriptions(\Ondewo\Vtsi\ListVtsiEventSubscriptionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Events/ListVtsiEventSubscriptions',
        $argument,
        ['\Ondewo\Vtsi\ListVtsiEventSubscriptionsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * ////////////////////////////////////////////////////////////////////////////
     * Webhook endpoints
     * ////////////////////////////////////////////////////////////////////////////
     *
     * <p>Creates a webhook: an HTTP(S) endpoint that receives one request per event, with a JSON
     * body holding the <code>VtsiEventMessage</code> (proto3 JSON, original field names).</p>
     * <p>Errors: <code>NOT_FOUND</code> for an unknown project; <code>INVALID_ARGUMENT</code> for a
     * URL that is not http(s), has no host, carries user information (use a custom header for
     * credentials) or exceeds 2048 characters; for a reserved or malformed header name, a header
     * value with a line break, too many or too long headers; or for a timeout outside
     * 1 s to 30 s.</p>
     * @param \Ondewo\Vtsi\CreateWebhookRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateWebhook(\Ondewo\Vtsi\CreateWebhookRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Events/CreateWebhook',
        $argument,
        ['\Ondewo\Vtsi\Webhook', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Returns a webhook. Custom header values are masked.</p>
     * @param \Ondewo\Vtsi\GetWebhookRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetWebhook(\Ondewo\Vtsi\GetWebhookRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Events/GetWebhook',
        $argument,
        ['\Ondewo\Vtsi\Webhook', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Updates the fields named in <code>update_mask</code>: <code>display_name</code>,
     * <code>url</code>, <code>http_method</code>, <code>custom_headers</code>, <code>disabled</code>,
     * <code>timeout</code>. <code>custom_headers</code> replaces the whole map; a value equal to the
     * mask <code>********</code> keeps the stored value of that header, so a Get-modify-Update
     * round trip does not overwrite secrets with the mask.</p>
     * <p>Moving the webhook to another origin (scheme, host or port of <code>url</code>) while custom
     * headers are stored requires re-sending <code>custom_headers</code> in the same request, with
     * their REAL values (or an empty map to drop them): the stored values are never carried to a new
     * origin, and an update that leaves <code>custom_headers</code> out of the mask or sends the mask
     * value <code>********</code> for any header is rejected with <code>INVALID_ARGUMENT</code> naming
     * the headers. A new path on the same origin keeps the stored values.</p>
     * @param \Ondewo\Vtsi\UpdateWebhookRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateWebhook(\Ondewo\Vtsi\UpdateWebhookRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Events/UpdateWebhook',
        $argument,
        ['\Ondewo\Vtsi\Webhook', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Deletes a webhook and removes it from every event subscription.</p>
     * @param \Ondewo\Vtsi\DeleteWebhookRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteWebhook(\Ondewo\Vtsi\DeleteWebhookRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Events/DeleteWebhook',
        $argument,
        ['\Ondewo\Vtsi\DeleteWebhookResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Lists the webhooks of a project, paged. Custom header values are masked.</p>
     * @param \Ondewo\Vtsi\ListWebhooksRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListWebhooks(\Ondewo\Vtsi\ListWebhooksRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Events/ListWebhooks',
        $argument,
        ['\Ondewo\Vtsi\ListWebhooksResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Sends one <code>VTSI_EVENT_WEBHOOK_TEST</code> event to a webhook now, without retries,
     * and reports the outcome. Works on a disabled webhook too, and ignores an open circuit.</p>
     * <p>Errors: <code>NOT_FOUND</code>. A failed delivery is reported in the response, not as an
     * error status.</p>
     * @param \Ondewo\Vtsi\TestWebhookRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function TestWebhook(\Ondewo\Vtsi\TestWebhookRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Events/TestWebhook',
        $argument,
        ['\Ondewo\Vtsi\TestWebhookResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * ////////////////////////////////////////////////////////////////////////////
     * Event stream endpoint
     * ////////////////////////////////////////////////////////////////////////////
     *
     * <p>Streams the events of a project as they happen, selected either by a named event
     * subscription or by an inline filter. An empty message is sent as a keep-alive. After a
     * disconnect, pass the last <code>resume_token</code> to continue where the stream stopped;
     * events older than the server&apos;s retention (24 h by default) are no longer available, and
     * the journal records a project&apos;s events only while it has an open stream (and for 1 h
     * after the last one closed) or an enabled event subscription. A stream sees events of other
     * server replicas from at most a few seconds after it opened. A client that stops reading for
     * longer than the server&apos;s stall timeout (30 s by default) is disconnected; reconnect with
     * the <code>resume_token</code>. When the project is deleted, the stream delivers
     * <code>VTSI_EVENT_VTSI_PROJECT_DELETED</code> and ends.</p>
     * <p>Errors: <code>NOT_FOUND</code> for an unknown project or subscription;
     * <code>INVALID_ARGUMENT</code> for a malformed <code>resume_token</code>;
     * <code>FAILED_PRECONDITION</code> for a disabled subscription; <code>RESOURCE_EXHAUSTED</code>
     * when the server has no free stream slot.</p>
     * @param \Ondewo\Vtsi\SubscribeVtsiEventsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function SubscribeVtsiEvents(\Ondewo\Vtsi\SubscribeVtsiEventsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.vtsi.Events/SubscribeVtsiEvents',
        $argument,
        ['\Ondewo\Vtsi\SubscribeVtsiEventsResponse', 'decode'],
        $metadata, $options);
    }

}
