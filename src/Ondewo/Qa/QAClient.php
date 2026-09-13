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
namespace Ondewo\Qa;

/**
 * gRPC service for QA functionalities.
 */
class QAClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Retrieves an answer based on the provided request.
     * @param \Ondewo\Qa\GetAnswerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAnswer(\Ondewo\Qa\GetAnswerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.qa.QA/GetAnswer',
        $argument,
        ['\Ondewo\Qa\GetAnswerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Runs a web scraper job for specified project IDs.
     * @param \Ondewo\Qa\RunScraperRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RunScraper(\Ondewo\Qa\RunScraperRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.qa.QA/RunScraper',
        $argument,
        ['\Ondewo\Qa\RunScraperResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates the database for specified project IDs.
     * @param \Ondewo\Qa\UpdateDatabaseRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateDatabase(\Ondewo\Qa\UpdateDatabaseRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.qa.QA/UpdateDatabase',
        $argument,
        ['\Ondewo\Qa\UpdateDatabaseResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Runs a training job for the QA system.
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RunTraining(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.qa.QA/RunTraining',
        $argument,
        ['\Ondewo\Qa\RunTrainingResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves the server state for QA.
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetServerState(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.qa.QA/GetServerState',
        $argument,
        ['\Ondewo\Qa\GetServerStateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists project IDs associated with QA.
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListProjectIds(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.qa.QA/ListProjectIds',
        $argument,
        ['\Ondewo\Qa\ListProjectIdsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves the configuration of a specific project.
     * @param \Ondewo\Qa\GetProjectConfigRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetProjectConfig(\Ondewo\Qa\GetProjectConfigRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.qa.QA/GetProjectConfig',
        $argument,
        ['\Ondewo\Qa\GetProjectConfigResponse', 'decode'],
        $metadata, $options);
    }

}
