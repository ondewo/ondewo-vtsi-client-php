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
 * Server project statistics
 */
class ServerStatisticsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the count of projects in the CAI server
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetProjectCount(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ServerStatistics/GetProjectCount',
        $argument,
        ['\Ondewo\Nlu\StatResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the count of projects of a user
     * @param \Ondewo\Nlu\GetUserProjectCountRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetUserProjectCount(\Ondewo\Nlu\GetUserProjectCountRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ServerStatistics/GetUserProjectCount',
        $argument,
        ['\Ondewo\Nlu\StatResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the users count within a project
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetUserCount(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ServerStatistics/GetUserCount',
        $argument,
        ['\Ondewo\Nlu\StatResponse', 'decode'],
        $metadata, $options);
    }

}
