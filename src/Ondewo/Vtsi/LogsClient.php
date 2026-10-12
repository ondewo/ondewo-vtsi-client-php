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
 * <p>Reads, follows, exports and erases the CONTAINER LOGS VTSI captures from the per-call
 * ondewo-sip / ondewo-csi containers of a VTSI project. Entries are served from the VTSI database, not
 * from the docker daemon, so the logs of a container that was already removed stay readable until
 * retention or <code>DeleteCallLogs</code> removes them.</p>
 * <p><b>Secrets are redacted server-side</b> in every RPC that returns log text
 * (<code>StreamCallLogs</code>, <code>ListCallLogs</code>, <code>ExportCallLogs</code>): the
 * project&apos;s SIP passwords, the call-control secrets and, unless the operator disabled it
 * (<code>ONDEWO_VTSI_LOG_MASK_IDENTIFIERS</code>, default true), identifiers such as phone numbers. The
 * redaction runs when the entry is read, so a redaction rule added later also applies to entries
 * captured before it.</p>
 * <p>Errors are reported as gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed name,
 * filter, cursor, <code>page_token</code> or <code>field_mask</code> (each naming the field);
 * <code>NOT_FOUND</code> for an unknown project or log stream; <code>RESOURCE_EXHAUSTED</code> when the
 * server already serves its maximum of concurrent streams or exports; <code>UNAVAILABLE</code> when the
 * database cannot be reached.</p>
 * <p>Authorization (only when the server enforces it, see the <code>Projects</code> service): a caller
 * without a credential is <code>UNAUTHENTICATED</code>; every RPC of this service requires
 * <code>PROJECT_DEVELOPER</code> or higher on the project (<code>PROJECT_EXECUTOR</code> and
 * <code>PROJECT_USER</code> are refused, because log text can carry conversation content), otherwise
 * <code>PERMISSION_DENIED</code>, also for an unknown project. A long-running
 * <code>StreamCallLogs</code> or <code>ExportCallLogs</code> re-checks the caller&apos;s role
 * periodically and ends when it was revoked or the credential expired.</p>
 */
class LogsClient extends \Grpc\BaseStub {

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
     * Call log endpoints
     * ////////////////////////////////////////////////////////////////////////////
     *
     * <p>Streams the container logs of the ondewo-sip / ondewo-csi containers of a VTSI project as
     * they are captured, in the manner of <code>docker logs --follow</code>. The stream replays
     * <code>tail_lines</code> historical entries and then follows. It stays open until the capture
     * of every matching log stream has terminated, until the client disconnects, or until the
     * server-side maximum stream duration is reached.</p>
     * <p>Entries are served from the VTSI database rather than from the docker daemon, so a
     * container that has already been removed still streams. Secrets are redacted server-side.</p>
     * <p>Limits: at most <code>ONDEWO_VTSI_LOG_STREAM_MAX_DURATION_S</code> (default 3600) seconds per
     * stream, after which the server sends a final message with <code>end_reason_code =
     * LOG_STREAM_END_REASON_MAX_DURATION</code> and a <code>resume_token</code> to reconnect with; at most
     * <code>ONDEWO_VTSI_LOG_MAX_CONCURRENT_STREAMS</code> (default 16) concurrent streams per server,
     * beyond which a new stream is <code>RESOURCE_EXHAUSTED</code>. New entries are polled every
     * <code>ONDEWO_VTSI_LOG_STREAM_POLL_INTERVAL_S</code> (default 0.5) seconds. The server sends NO
     * keep-alive message: a quiet container sends nothing, so a client must not treat silence as a dead
     * stream (use HTTP/2 keep-alive pings to detect a dead connection).</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed <code>vtsi_project_name</code>, a filter
     * carrying <code>start_time</code> or <code>end_time</code>, an <code>after_seq</code> with a filter
     * that does not resolve to exactly one log stream, or a malformed <code>resume_token</code>;
     * <code>NOT_FOUND</code> for an unknown project; <code>RESOURCE_EXHAUSTED</code> as above. When the
     * caller&apos;s role is revoked or its credential expires during the stream, the server sends a final
     * message (<code>LOG_STREAM_END_REASON_PERMISSION_REVOKED</code> /
     * <code>LOG_STREAM_END_REASON_CREDENTIALS_EXPIRED</code>, with a <code>resume_token</code>) and ends
     * the stream with <code>PERMISSION_DENIED</code> / <code>UNAUTHENTICATED</code>.</p>
     * <p>Authorization: <code>PROJECT_DEVELOPER</code> or higher on the project.</p>
     * @param \Ondewo\Vtsi\StreamCallLogsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function StreamCallLogs(\Ondewo\Vtsi\StreamCallLogsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.vtsi.Logs/StreamCallLogs',
        $argument,
        ['\Ondewo\Vtsi\StreamCallLogsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Returns a bounded, filtered page of captured container log entries. Supports a time window,
     * severity filtering, a regular expression, a plain-text search and cursor paging in both
     * directions for infinite scrolling. Secrets are redacted server-side.</p>
     * <p>No time window is required: without <code>start_time</code> / <code>end_time</code> the window is
     * the newest <code>max_lines</code> matching entries (or, with <code>oldest_first</code>, the oldest
     * after the cursor). With <code>include_counts</code> the response also carries the number of matching
     * entries per severity.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed <code>vtsi_project_name</code>, an invalid
     * or over-long <code>regex</code>, a <code>start_time</code> after <code>end_time</code>,
     * <code>before_seq</code> / <code>after_seq</code> combined with <code>resume_token</code> or with a
     * filter that does not resolve to exactly one log stream, a malformed <code>resume_token</code> or an
     * unknown <code>field_mask</code> path; <code>NOT_FOUND</code> for an unknown project.</p>
     * <p>Authorization: <code>PROJECT_DEVELOPER</code> or higher on the project.</p>
     * @param \Ondewo\Vtsi\ListCallLogsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListCallLogs(\Ondewo\Vtsi\ListCallLogsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Logs/ListCallLogs',
        $argument,
        ['\Ondewo\Vtsi\ListCallLogsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Returns the capture state of a single log stream, i.e. of one capture generation of one
     * container.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed <code>vtsi_project_name</code> or
     * <code>name</code>, for a log stream that belongs to another project than
     * <code>vtsi_project_name</code>, or for an unknown <code>field_mask</code> path;
     * <code>NOT_FOUND</code> for an unknown project or log stream.</p>
     * <p>Authorization: <code>PROJECT_DEVELOPER</code> or higher on the project.</p>
     * @param \Ondewo\Vtsi\GetCallLogStreamRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCallLogStream(\Ondewo\Vtsi\GetCallLogStreamRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Logs/GetCallLogStream',
        $argument,
        ['\Ondewo\Vtsi\CallLogStream', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Lists the log streams VTSI has captured for a project. A single container yields a new log
     * stream every time it is recreated, because a recreated container is a new docker container
     * whose previous logs no longer exist.</p>
     * <p>Ordered by <code>capture_started_at</code>, newest first (ties by an internal id, so the order is
     * stable).</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed <code>vtsi_project_name</code>, a negative
     * <code>page_size</code>, a malformed <code>page_token</code>,
     * <code>LOG_CAPTURE_STATE_UNSPECIFIED</code> in <code>capture_states</code> or an unknown
     * <code>field_mask</code> path; <code>NOT_FOUND</code> for an unknown project.</p>
     * <p>Authorization: <code>PROJECT_DEVELOPER</code> or higher on the project.</p>
     * @param \Ondewo\Vtsi\ListCallLogStreamsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListCallLogStreams(\Ondewo\Vtsi\ListCallLogStreamsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Logs/ListCallLogStreams',
        $argument,
        ['\Ondewo\Vtsi\ListCallLogStreamsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Permanently deletes captured log entries matching a filter. This is the erasure path for
     * data-subject requests: retention answers &quot;delete everything older than N days&quot;, this
     * answers &quot;delete everything for this call or this phone number&quot;.</p>
     * <p>Only the identity filters and the time window apply; a time window ALONE (no identity filter)
     * is a valid filter and deletes every entry of the project inside it. The deletion is permanent and
     * runs in batches; a log stream whose last entry was deleted is removed too, unless it is still
     * <code>LOG_CAPTURE_STATE_CAPTURING</code>.</p>
     * <p><b>Race with live capture:</b> the deletion removes what is stored when it runs. A container
     * whose capture is still running keeps being captured, so entries it emits AFTER the deletion are
     * stored again (there is no tombstone). To erase the logs of a call completely, delete them after
     * the call ended and its capture is <code>LOG_CAPTURE_STATE_STOPPED</code>, or repeat the deletion.</p>
     * <p>Idempotent: repeating a deletion succeeds and reports <code>0</code> deleted entries. With
     * <code>validate_only</code> nothing is deleted and the counts are what would be deleted.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed <code>vtsi_project_name</code>, an empty
     * filter (a filter whose only field is <code>call_types = [BOTH]</code> counts as empty), a content
     * filter (<code>text</code>, <code>regex</code>, <code>log_levels</code>, <code>min_log_level</code>,
     * <code>include_unleveled_lines</code>, <code>log_sources</code>, <code>channels</code>,
     * <code>emitter_prefixes</code>, <code>thread_names</code>; presence alone counts) or a
     * <code>start_time</code> after <code>end_time</code>; <code>NOT_FOUND</code> for an unknown
     * project.</p>
     * <p>Authorization: <code>PROJECT_DEVELOPER</code> or higher on the project. Every deletion is logged
     * by the server with the project, the filter fields in scope and the deleted counts.</p>
     * @param \Ondewo\Vtsi\DeleteCallLogsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteCallLogs(\Ondewo\Vtsi\DeleteCallLogsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Logs/DeleteCallLogs',
        $argument,
        ['\Ondewo\Vtsi\DeleteCallLogsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Exports the captured log entries matching a filter as a file: plain text, NDJSON or CSV,
     * streamed in chunks. Entries are exported oldest first, with the same filter semantics and the same
     * server-side secret redaction as <code>ListCallLogs</code>; unlike <code>ListCallLogs</code> the
     * content filters are applied to EVERY entry of the window, never only inside a page. Concatenating
     * the <code>chunk</code>s of all messages in order yields the file.</p>
     * <p>A bounded time window is REQUIRED: <code>filter.start_time</code> AND
     * <code>filter.end_time</code> must both be set, with <code>start_time</code> before
     * <code>end_time</code>, because an export reads every entry of the window. (This is stricter than
     * <code>ListCallLogs</code>, which needs no window because it reads one bounded page.)</p>
     * <p>Limits: each <code>chunk</code> is at most 1 MiB; an export holds at most
     * <code>ONDEWO_VTSI_LOG_EXPORT_MAX_ENTRIES</code> (default 1000000) entries and at most
     * <code>ONDEWO_VTSI_LOG_EXPORT_MAX_BYTES</code> (default 1 GiB) of output. When a limit is reached the
     * export ends early with <code>truncated = true</code> on the last message; narrow the window (e.g.
     * start a new export at the timestamp of the last exported entry). At most
     * <code>ONDEWO_VTSI_LOG_MAX_CONCURRENT_EXPORTS</code> (default 2) exports run per server, beyond which
     * a new one is <code>RESOURCE_EXHAUSTED</code>. The export is a snapshot of what is stored when each
     * entry is read; entries captured during the export may or may not be included.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed <code>vtsi_project_name</code>, a missing,
     * empty or inverted time window, an invalid <code>regex</code> or an unknown
     * <code>format</code> value; <code>NOT_FOUND</code> for an unknown project;
     * <code>RESOURCE_EXHAUSTED</code> as above. A role revoked or a credential expired during the export
     * ends it with <code>PERMISSION_DENIED</code> / <code>UNAUTHENTICATED</code> and no last message.</p>
     * <p>Authorization: <code>PROJECT_DEVELOPER</code> or higher on the project.</p>
     * @param \Ondewo\Vtsi\ExportCallLogsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function ExportCallLogs(\Ondewo\Vtsi\ExportCallLogsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.vtsi.Logs/ExportCallLogs',
        $argument,
        ['\Ondewo\Vtsi\ExportCallLogsResponse', 'decode'],
        $metadata, $options);
    }

}
