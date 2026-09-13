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
 * Project roles
 */
class ProjectRolesClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates a project role by creating the knowledge base master
     * @param \Ondewo\Nlu\CreateProjectRoleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateProjectRole(\Ondewo\Nlu\CreateProjectRoleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectRoles/CreateProjectRole',
        $argument,
        ['\Ondewo\Nlu\ProjectRole', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a project role by getting the knowledge base master
     * @param \Ondewo\Nlu\GetProjectRoleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetProjectRole(\Ondewo\Nlu\GetProjectRoleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectRoles/GetProjectRole',
        $argument,
        ['\Ondewo\Nlu\ProjectRole', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes project role
     * @param \Ondewo\Nlu\DeleteProjectRoleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteProjectRole(\Ondewo\Nlu\DeleteProjectRoleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectRoles/DeleteProjectRole',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates project role
     * @param \Ondewo\Nlu\UpdateProjectRoleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateProjectRole(\Ondewo\Nlu\UpdateProjectRoleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectRoles/UpdateProjectRole',
        $argument,
        ['\Ondewo\Nlu\ProjectRole', 'decode'],
        $metadata, $options);
    }

    /**
     * List project roles
     * @param \Ondewo\Nlu\ListProjectRolesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListProjectRoles(\Ondewo\Nlu\ListProjectRolesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.ProjectRoles/ListProjectRoles',
        $argument,
        ['\Ondewo\Nlu\ListProjectRolesResponse', 'decode'],
        $metadata, $options);
    }

}
