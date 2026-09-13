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

}
