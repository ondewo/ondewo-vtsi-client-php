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
 * Project Root Statistics
 */
class ProjectStatisticsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the intent count within a project
     * @param \Ondewo\Nlu\GetIntentCountRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetIntentCount(\Ondewo\Nlu\GetIntentCountRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectStatistics/GetIntentCount',
        $argument,
        ['\Ondewo\Nlu\StatResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the entity types count within a project
     * @param \Ondewo\Nlu\GetEntityTypeCountRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetEntityTypeCount(\Ondewo\Nlu\GetEntityTypeCountRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectStatistics/GetEntityTypeCount',
        $argument,
        ['\Ondewo\Nlu\StatResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the users count within a project
     * @param \Ondewo\Nlu\GetProjectStatRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetUserCount(\Ondewo\Nlu\GetProjectStatRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectStatistics/GetUserCount',
        $argument,
        ['\Ondewo\Nlu\StatResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the sessions count within a project
     * @param \Ondewo\Nlu\GetProjectStatRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetSessionCount(\Ondewo\Nlu\GetProjectStatRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectStatistics/GetSessionCount',
        $argument,
        ['\Ondewo\Nlu\StatResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the training phrases count within a project
     * @param \Ondewo\Nlu\GetProjectElementStatRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetTrainingPhraseCount(\Ondewo\Nlu\GetProjectElementStatRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectStatistics/GetTrainingPhraseCount',
        $argument,
        ['\Ondewo\Nlu\StatResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the responses count within a project
     * @param \Ondewo\Nlu\GetProjectElementStatRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetResponseCount(\Ondewo\Nlu\GetProjectElementStatRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectStatistics/GetResponseCount',
        $argument,
        ['\Ondewo\Nlu\StatResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the entity value count within a project
     * @param \Ondewo\Nlu\GetProjectElementStatRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetEntityValueCount(\Ondewo\Nlu\GetProjectElementStatRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectStatistics/GetEntityValueCount',
        $argument,
        ['\Ondewo\Nlu\StatResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the entity synonyms count within a project
     * @param \Ondewo\Nlu\GetProjectElementStatRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetEntitySynonymCount(\Ondewo\Nlu\GetProjectElementStatRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectStatistics/GetEntitySynonymCount',
        $argument,
        ['\Ondewo\Nlu\StatResponse', 'decode'],
        $metadata, $options);
    }

}
