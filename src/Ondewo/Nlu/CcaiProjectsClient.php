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
 * Service to manage Call Center AI (CCAI service) Projects.
 */
class CcaiProjectsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Retrieves information about a specific CCAI service project.
     * @param \Ondewo\Nlu\GetCcaiProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCcaiProject(\Ondewo\Nlu\GetCcaiProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.CcaiProjects/GetCcaiProject',
        $argument,
        ['\Ondewo\Nlu\CcaiProject', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a new CCAI service project based on the provided request.
     * @param \Ondewo\Nlu\CreateCcaiProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateCcaiProject(\Ondewo\Nlu\CreateCcaiProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.CcaiProjects/CreateCcaiProject',
        $argument,
        ['\Ondewo\Nlu\CreateCcaiProjectResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes a CCAI service project identified by the provided request.
     * @param \Ondewo\Nlu\DeleteCcaiProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteCcaiProject(\Ondewo\Nlu\DeleteCcaiProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.CcaiProjects/DeleteCcaiProject',
        $argument,
        ['\Ondewo\Nlu\DeleteCcaiProjectResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists all CCAI service projects based on the provided request.
     * @param \Ondewo\Nlu\ListCcaiProjectsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListCcaiProjects(\Ondewo\Nlu\ListCcaiProjectsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.CcaiProjects/ListCcaiProjects',
        $argument,
        ['\Ondewo\Nlu\ListCcaiProjectsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates the information of an existing CCAI service project.
     * @param \Ondewo\Nlu\UpdateCcaiProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateCcaiProject(\Ondewo\Nlu\UpdateCcaiProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.CcaiProjects/UpdateCcaiProject',
        $argument,
        ['\Ondewo\Nlu\UpdateCcaiProjectResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves information about a specific CCAI service.
     * @param \Ondewo\Nlu\GetCcaiServiceRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetCcaiService(\Ondewo\Nlu\GetCcaiServiceRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.CcaiProjects/GetCcaiService',
        $argument,
        ['\Ondewo\Nlu\CcaiService', 'decode'],
        $metadata, $options);
    }

}
