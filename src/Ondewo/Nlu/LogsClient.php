<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2020-2026 ONDEWO GmbH
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
namespace Ondewo\Nlu;

/**
 * <p>Reads, follows, exports and erases the logs ONDEWO CAI captures: the log records of the CAI gRPC server
 * processes themselves (every worker of every replica), the output of the docker containers that remote
 * operations run (build cache, training, RAG crawl, LLM evaluation and simulation, RAGFlow upload / removal /
 * re-parse) and of the short-lived helper containers that prepare them (hardware check, GPU pre-allocation).
 * Long-running operations that run inside a CAI worker (agent export, import, restore, re-index, ranking
 * optimization) are covered too: the server records they emit carry the operation&apos;s name.</p>
 * <p>Entries are served from the CAI database, not from the docker daemon, so the logs of a container that was
 * already removed, and of a server process that already exited, stay readable until retention or
 * <code>DeleteLogs</code> removes them.</p>
 * <p><b>Secrets are redacted server-side</b> when an entry is captured and again when it is read, so a
 * redaction rule added later also applies to entries captured before it.</p>
 * <p>Errors are reported as gRPC status codes: <code>INVALID_ARGUMENT</code> for a malformed name, filter,
 * cursor, <code>resume_token</code>, <code>page_token</code> or <code>field_mask</code> (each naming the field);
 * <code>NOT_FOUND</code> for an unknown log stream or operation, and for one the caller may not read;
 * <code>RESOURCE_EXHAUSTED</code> when the server process already serves its maximum of concurrent streams or
 * exports; <code>UNAVAILABLE</code> when the logs API is disabled (<code>ONDEWO_NLU_CAI_LOG_API_ENABLED</code>)
 * or the database cannot be reached; <code>UNAUTHENTICATED</code> without a valid credential;
 * <code>PERMISSION_DENIED</code> when the caller may read no logs at all.</p>
 * <p>Authorization: entries that belong to no project (the server&apos;s own records outside any project RPC
 * or operation) require the server permission <code>ServerPermission.Logs.ReadServerLogs</code>, granted to
 * <code>SERVER_ADMIN</code> by default; a caller holding it reads every entry. Without it a caller reads only
 * the entries tagged with a project in which it holds <code>ProjectPermission.Logs.ReadProjectLogs</code>,
 * granted to <code>PROJECT_DEVELOPER</code> and above by default; entries of other projects are filtered out
 * and are never reported as existing. <code>DeleteLogs</code> requires
 * <code>ServerPermission.Logs.DeleteLogs</code>, granted to <code>SERVER_ADMIN</code> only. A long-running
 * <code>StreamLogs</code> or <code>ExportLogs</code> re-checks the caller periodically and ends when the access
 * was revoked or the credential expired.</p>
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
     * region Log endpoints
     * ////////////////////////////////////////////////////////////////////////////
     *
     * <p>Streams captured log entries as they are written, in the manner of <code>docker logs --follow</code>.
     * The stream replays <code>tail_lines</code> historical entries and then follows. It stays open until the
     * capture of every matching log stream has terminated (only possible when the filter selects container
     * streams alone: the server&apos;s own log streams never terminate while the server runs), until the client
     * disconnects, or until the server-side maximum stream duration is reached.</p>
     * <p>Limits: at most <code>ONDEWO_NLU_CAI_LOG_STREAM_MAX_DURATION_S</code> (default 3600) seconds per stream,
     * after which the server sends a final message with <code>end_reason_code =
     * CAI_LOG_STREAM_END_REASON_MAX_DURATION</code> and a <code>resume_token</code> to reconnect with; at most
     * <code>ONDEWO_NLU_CAI_LOG_MAX_CONCURRENT_STREAMS</code> (default 8) concurrent streams per server process,
     * beyond which a new stream is <code>RESOURCE_EXHAUSTED</code>. The server sends NO keep-alive message: a
     * quiet filter sends nothing, so a client must not treat silence as a dead stream (use HTTP/2 keep-alive
     * pings to detect a dead connection).</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a filter carrying <code>start_time</code> or
     * <code>end_time</code>, an <code>after_seq</code> with a filter that does not resolve to exactly one log
     * stream, a malformed <code>resume_token</code>, an invalid <code>regex</code> or an unknown
     * <code>field_mask</code> path; <code>NOT_FOUND</code> for a named log stream or operation the caller may
     * not read; <code>RESOURCE_EXHAUSTED</code> as above, and when one read of the stored entries exceeds
     * <code>ONDEWO_NLU_CAI_LOG_QUERY_TIMEOUT_S</code> (narrow the filter); <code>UNAVAILABLE</code> when the
     * database cannot be reached (reconnect with the last <code>resume_token</code>). When the caller&apos;s
     * access is revoked or its credential expires during the stream, the server sends a final message
     * (<code>CAI_LOG_STREAM_END_REASON_PERMISSION_REVOKED</code> /
     * <code>CAI_LOG_STREAM_END_REASON_CREDENTIALS_EXPIRED</code>, with a <code>resume_token</code>) and ends the
     * stream with <code>PERMISSION_DENIED</code> / <code>UNAUTHENTICATED</code>.</p>
     * @param \Ondewo\Nlu\StreamLogsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function StreamLogs(\Ondewo\Nlu\StreamLogsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.nlu.Logs/StreamLogs',
        $argument,
        ['\Ondewo\Nlu\StreamLogsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Returns a bounded, filtered page of captured log entries. Supports a time window, severity filtering, a
     * regular expression, a plain-text search and cursor paging in both directions for infinite scrolling.</p>
     * <p>No time window is required: without <code>start_time</code> / <code>end_time</code> the window is the
     * newest <code>max_lines</code> matching entries (or, with <code>oldest_first</code>, the oldest after the
     * cursor). With <code>include_counts</code> the response also carries the number of matching entries per
     * severity. The <code>next_resume_token</code> of a response can be handed to <code>StreamLogs</code> to
     * continue live exactly where the page ended, without a gap or a duplicate.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for an invalid or over-long <code>regex</code>, a
     * <code>start_time</code> after <code>end_time</code>, <code>before_seq</code> / <code>after_seq</code>
     * combined with <code>resume_token</code> or with a filter that does not resolve to exactly one log stream, a
     * negative <code>before_seq</code> / <code>after_seq</code>, a malformed <code>resume_token</code> or an
     * unknown <code>field_mask</code> path; <code>NOT_FOUND</code> for a named log stream or operation the caller
     * may not read; <code>RESOURCE_EXHAUSTED</code> when the query exceeds
     * <code>ONDEWO_NLU_CAI_LOG_QUERY_TIMEOUT_S</code> (narrow the filter: log streams, time window or severity);
     * <code>UNAVAILABLE</code> when the database cannot be reached.</p>
     * <p>A page is bounded by size as well as by <code>max_lines</code>: when its messages would exceed the
     * server&apos;s size budget it is cut (a forward page keeps its oldest entries, a backward page its newest)
     * and reported with <code>truncated = true</code>; the cursors continue exactly where it was cut.</p>
     * @param \Ondewo\Nlu\ListLogsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Nlu\ListLogsResponse>
     */
    public function ListLogs(\Ondewo\Nlu\ListLogsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Logs/ListLogs',
        $argument,
        ['\Ondewo\Nlu\ListLogsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Returns one log stream, i.e. the capture of one server process or of one container.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed <code>name</code> or an unknown
     * <code>field_mask</code> path; <code>NOT_FOUND</code> for an unknown log stream or one the caller may not
     * read.</p>
     * @param \Ondewo\Nlu\GetLogStreamRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Nlu\CaiLogStream>
     */
    public function GetLogStream(\Ondewo\Nlu\GetLogStreamRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Logs/GetLogStream',
        $argument,
        ['\Ondewo\Nlu\CaiLogStream', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Lists the log streams CAI has captured. A server process yields a new log stream every time it starts,
     * and a container every time it is (re)started under a new container id. Ordered by
     * <code>capture_started_at</code>, newest first.</p>
     * <p>A caller without <code>ServerPermission.Logs.ReadServerLogs</code> sees only the log streams of the
     * projects in which it holds <code>ProjectPermission.Logs.ReadProjectLogs</code>; the server&apos;s own log
     * streams are not listed to it, although <code>ListLogs</code> and <code>StreamLogs</code> return their
     * entries that are tagged with such a project.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a malformed <code>page_token</code>,
     * <code>CAI_LOG_CAPTURE_STATE_UNSPECIFIED</code> in <code>capture_states</code> or an unknown
     * <code>field_mask</code> path.</p>
     * @param \Ondewo\Nlu\ListLogStreamsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Nlu\ListLogStreamsResponse>
     */
    public function ListLogStreams(\Ondewo\Nlu\ListLogStreamsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Logs/ListLogStreams',
        $argument,
        ['\Ondewo\Nlu\ListLogStreamsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Exports the captured log entries matching a filter as a file: plain text, NDJSON or CSV, streamed in
     * chunks. Entries are exported oldest first with the same filter semantics and the same server-side secret
     * redaction as <code>ListLogs</code>; unlike <code>ListLogs</code> the content filters are applied to EVERY
     * entry of the window. Concatenating the <code>chunk</code>s of all messages in order yields the file.</p>
     * <p>A bounded time window is REQUIRED: <code>filter.start_time</code> AND <code>filter.end_time</code> must
     * both be set, with <code>start_time</code> before <code>end_time</code>.</p>
     * <p>Limits: each <code>chunk</code> is at most 1 MiB; an export holds at most
     * <code>ONDEWO_NLU_CAI_LOG_EXPORT_MAX_ENTRIES</code> (default 1000000) entries and at most
     * <code>ONDEWO_NLU_CAI_LOG_EXPORT_MAX_BYTES</code> (default 1 GiB) of output. When a limit is reached the
     * export ends early with <code>truncated = true</code> on the last message; so does an export one of whose
     * reads exceeds <code>ONDEWO_NLU_CAI_LOG_QUERY_TIMEOUT_S</code>. At most
     * <code>ONDEWO_NLU_CAI_LOG_MAX_CONCURRENT_EXPORTS</code> (default 1) exports run per server process, beyond
     * which a new one is <code>RESOURCE_EXHAUSTED</code>.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for a missing, empty or inverted time window, an invalid
     * <code>regex</code> or an unknown <code>format</code> value; <code>NOT_FOUND</code> for a named log stream
     * or operation the caller may not read; <code>RESOURCE_EXHAUSTED</code> as above. A revoked access or an
     * expired credential ends the export with <code>PERMISSION_DENIED</code> / <code>UNAUTHENTICATED</code> and
     * no last message.</p>
     * @param \Ondewo\Nlu\ExportLogsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function ExportLogs(\Ondewo\Nlu\ExportLogsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.nlu.Logs/ExportLogs',
        $argument,
        ['\Ondewo\Nlu\ExportLogsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Permanently deletes captured log entries matching a filter. Only the identity filters and the time
     * window apply; content filters are rejected. A time window alone is a valid filter. A log stream whose last
     * entry was deleted is removed too, unless it is still <code>CAI_LOG_CAPTURE_STATE_CAPTURING</code>. A
     * capture that is still running keeps writing, so entries emitted after the deletion are stored again.</p>
     * <p>Idempotent: repeating a deletion succeeds and reports <code>0</code> deleted entries. With
     * <code>validate_only</code> nothing is deleted and the counts are what would be deleted.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for an empty filter, a content filter (<code>text</code>,
     * <code>regex</code>, <code>log_levels</code>, <code>min_log_level</code>,
     * <code>include_unleveled_lines</code>, <code>emitter_prefixes</code>, <code>thread_names</code>,
     * <code>trace_ids</code>; presence alone counts) or a <code>start_time</code> after <code>end_time</code>;
     * <code>PERMISSION_DENIED</code> without <code>ServerPermission.Logs.DeleteLogs</code>;
     * <code>RESOURCE_EXHAUSTED</code> when one deletion step exceeds <code>ONDEWO_NLU_CAI_LOG_QUERY_TIMEOUT_S</code>
     * (what was deleted until then stays deleted; repeat the request); <code>UNAVAILABLE</code> when the database
     * cannot be reached.</p>
     * @param \Ondewo\Nlu\DeleteLogsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Nlu\DeleteLogsResponse>
     */
    public function DeleteLogs(\Ondewo\Nlu\DeleteLogsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Logs/DeleteLogs',
        $argument,
        ['\Ondewo\Nlu\DeleteLogsResponse', 'decode'],
        $metadata, $options);
    }

}
