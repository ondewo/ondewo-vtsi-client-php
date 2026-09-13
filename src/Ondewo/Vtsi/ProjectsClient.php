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
class ProjectsClient extends \Grpc\BaseStub {

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
     * Project endpoints
     * ////////////////////////////////////////////////////////////////////////////
     *
     * <p>Create a VTSI project with configs</p>
     * @param \Ondewo\Vtsi\CreateVtsiProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateVtsiProject(\Ondewo\Vtsi\CreateVtsiProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Projects/CreateVtsiProject',
        $argument,
        ['\Ondewo\Vtsi\CreateVtsiProjectResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Get a VTSI project with configs</p>
     * @param \Ondewo\Vtsi\GetVtsiProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetVtsiProject(\Ondewo\Vtsi\GetVtsiProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Projects/GetVtsiProject',
        $argument,
        ['\Ondewo\Vtsi\VtsiProject', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Update a VTSI project with configs</p>
     * @param \Ondewo\Vtsi\UpdateVtsiProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateVtsiProject(\Ondewo\Vtsi\UpdateVtsiProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Projects/UpdateVtsiProject',
        $argument,
        ['\Ondewo\Vtsi\UpdateVtsiProjectResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Delete a VTSI project with configs</p>
     * @param \Ondewo\Vtsi\DeleteVtsiProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteVtsiProject(\Ondewo\Vtsi\DeleteVtsiProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Projects/DeleteVtsiProject',
        $argument,
        ['\Ondewo\Vtsi\DeleteVtsiProjectResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Deploy a VTSI project</p>
     * @param \Ondewo\Vtsi\DeployVtsiProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeployVtsiProject(\Ondewo\Vtsi\DeployVtsiProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Projects/DeployVtsiProject',
        $argument,
        ['\Ondewo\Vtsi\DeployVtsiProjectResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Undeploy a VTSI project</p>
     * @param \Ondewo\Vtsi\UndeployVtsiProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UndeployVtsiProject(\Ondewo\Vtsi\UndeployVtsiProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Projects/UndeployVtsiProject',
        $argument,
        ['\Ondewo\Vtsi\UndeployVtsiProjectResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Get a VTSI project with configs</p>
     * @param \Ondewo\Vtsi\ListVtsiProjectsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListVtsiProjects(\Ondewo\Vtsi\ListVtsiProjectsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.Projects/ListVtsiProjects',
        $argument,
        ['\Ondewo\Vtsi\ListVtsiProjectsResponse', 'decode'],
        $metadata, $options);
    }

}
