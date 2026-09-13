<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2018 Google Inc.
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
// Modifications Copyright 2020-2026 ONDEWO GmbH
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
// File-level comment for <code>ondewo/nlu/agent.proto</code>.
//
// This file contains a single service <a href="index.html#ondewo.nlu.Agents">Agents</a>.
//
// The most important messages is <a href="index.html#ondewo.nlu.Agent">Agent</a> and its most complicated field is <code>configs</code>.
namespace Ondewo\Nlu;

/**
 * Agents are best described as Natural Language Understanding (NLU) modules that transform user requests into actionable data. You can include agents in your app, product, or service to determine user intent and respond to the user in a natural way.
 *
 * After you create an agent, you can add <a href="index.html#ondewo.nlu.Intent">Intents</a>, <a href="index.html#ondewo.nlu.Context">Contexts</a>, <a href="index.html#ondewo.nlu.EntityType">Entity Types</a>, <a href="index.html#ondewo.nlu.WebhookRequest">Webhooks</a>, and so on to manage the flow of a conversation and match user input to predefined intents and actions.
 *
 * You can create an agent using both Dialogflow Standard Edition and Dialogflow Enterprise Edition. For details, see <a href="https://docs.cloud.google.com/dialogflow/docs/editions">Dialogflow Editions</a>.
 *
 * You can save your agent for backup or versioning by exporting the agent by using the <a href="index.html#ondewo.nlu.Agents.ExportAgent">ExportAgent</a> method. You can import a saved agent by using the <a href="index.html#ondewo.nlu.Agents.ImportAgent">ImportAgent</a> method.
 *
 * Dialogflow provides several <a href="https://dialogflow.com/docs/prebuilt-agents">prebuilt agents</a> for common conversation scenarios such as determining a date and time, converting currency, and so on.
 *
 * For more information about agents, see the <a href="https://dialogflow.com/docs/agents">Dialogflow documentation</a>.
 */
class AgentsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates the specified agent.
     *
     * Examples:
     *
     * <pre>
     * grpcurl -plaintext -H 'Authorization: Bearer <jwt>' -d '{
     *   "agent": {
     *     "display_name": "My Pizza Bot",
     *     "default_language_code": "en",
     *     "supported_language_codes": ["en"],
     *     "time_zone": "Europe/Vienna",
     *     "nlu_platform": "ONDEWO"
     *   }
     * }' localhost:50055 ondewo.nlu.Agents.CreateAgent
     * </pre>
     *
     * <samp>{
     *   "parent": "projects/76aaf4f3-a1f6-4fda-b4b3-351c64e65bc4/agent",
     *   "display_name": "Pizza Bot",
     *   "default_language_code": "en",
     *   "supported_language_codes": [
     *     "en"
     *   ],
     *   "time_zone": "Europe/Vienna",
     *   "nlu_platform": "ONDEWO",
     *   "owner_id": "5aac51b8-668f-49dd-913f-cc683e56af34"
     * }
     * </samp>
     * @param \Ondewo\Nlu\CreateAgentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateAgent(\Ondewo\Nlu\CreateAgentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/CreateAgent',
        $argument,
        ['\Ondewo\Nlu\Agent', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates the specified agent.
     *
     * Examples:
     *
     * <pre>
     * grpcurl -plaintext -H 'Authorization: Bearer <jwt>' -d '{
     *   "agent": {
     *     "parent": "projects/76aaf4f3-a1f6-4fda-b4b3-351c64e65bc4/agent",
     *     "display_name": "Pizza Bot 2",
     *     "supported_language_codes": ["en", "de"]
     *   },
     *   "update_mask": {
     *     "paths": [
     *       "agent.display_name",
     *       "agent.supported_language_codes"
     *     ]
     *   }
     * }' localhost:50055 ondewo.nlu.Agents.UpdateAgent
     * </pre>
     *
     * <samp>{
     *   "parent": "projects/76aaf4f3-a1f6-4fda-b4b3-351c64e65bc4/agent",
     *   "display_name": "Pizza Bot 2",
     *   "default_language_code": "en",
     *   "supported_language_codes": [
     *     "en",
     *     "de"
     *   ],
     *   "time_zone": "Europe/Vienna",
     *   "nlu_platform": "ONDEWO",
     *   "owner_id": "5aac51b8-668f-49dd-913f-cc683e56af34"
     * }
     * </samp>
     * @param \Ondewo\Nlu\UpdateAgentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateAgent(\Ondewo\Nlu\UpdateAgentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/UpdateAgent',
        $argument,
        ['\Ondewo\Nlu\Agent', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves the specified agent.
     *
     * Examples:
     *
     * <pre>
     * grpcurl -plaintext -H 'Authorization: Bearer <jwt>' -d '{
     *   "parent": "projects/76aaf4f3-a1f6-4fda-b4b3-351c64e65bc4/agent"
     * }' localhost:50055 ondewo.nlu.Agents.GetAgent
     * </pre>
     * <samp>{
     *   "parent": "projects/76aaf4f3-a1f6-4fda-b4b3-351c64e65bc4/agent",
     *   "display_name": "Pizza Bot 2",
     *   "default_language_code": "en",
     *   "supported_language_codes": [
     *     "en",
     *     "de"
     *   ],
     *   "time_zone": "Europe/Vienna",
     *   "nlu_platform": "ONDEWO",
     *   "configs": {...},
     *   "owner_id": "5aac51b8-668f-49dd-913f-cc683e56af34"
     * }
     * </samp>
     * @param \Ondewo\Nlu\GetAgentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAgent(\Ondewo\Nlu\GetAgentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetAgent',
        $argument,
        ['\Ondewo\Nlu\Agent', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes the specified agent.
     *
     * Examples:
     *
     * <pre>
     * grpcurl -plaintext -H 'Authorization: Bearer <jwt>' -d '{
     *   "parent": "projects/76aaf4f3-a1f6-4fda-b4b3-351c64e65bc4/agent"
     * }' localhost:50055 ondewo.nlu.Agents.DeleteAgent
     * </pre>
     * <samp>{}</samp>
     * @param \Ondewo\Nlu\DeleteAgentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteAgent(\Ondewo\Nlu\DeleteAgentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/DeleteAgent',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes all agents in the server (for development purposes only).
     *
     * Examples:
     *
     * <pre>
     * grpcurl -plaintext -H 'Authorization: Bearer <jwt>' localhost:50055 ondewo.nlu.Agents.DeleteAllAgents
     * </pre>
     * <samp>{}</samp>
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteAllAgents(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/DeleteAllAgents',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists agents in the server associated to the current user
     *
     * Examples:
     *
     * <pre>
     * grpcurl -plaintext -H 'Authorization: Bearer <jwt>' localhost:50055 ondewo.nlu.Agents.ListAgents
     * </pre>
     * <samp>{
     *   "agents_with_owners": [
     *     {
     *       "agent": {
     *         "parent": "projects/76aaf4f3-a1f6-4fda-b4b3-351c64e65bc4/agent",
     *         "display_name": "Pizza Bot 2",
     *         "owner_id": "5aac51b8-668f-49dd-913f-cc683e56af34"
     *       },
     *       "owner": {
     *         "user_id": "5aac51b8-668f-49dd-913f-cc683e56af34",
     *         "display_name": "admin",
     *         "server_role_id": 3,
     *         "user_email": "admin@ondewo.com"
     *       }
     *     }
     *   ],
     *   "next_page_token": "current_index-1"
     * }
     * </samp>
     * @param \Ondewo\Nlu\ListAgentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListAgents(\Ondewo\Nlu\ListAgentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/ListAgents',
        $argument,
        ['\Ondewo\Nlu\ListAgentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists agents in the server associated to the given user
     *
     * Examples:
     *
     * <pre>
     * grpcurl -plaintext -H 'Authorization: Bearer <jwt>' localhost:50055 ondewo.nlu.Agents.ListAgentsOfUser
     * </pre>
     * <samp>{
     *   "agents_of_user_with_owners": [
     *     {
     *       "agent_with_owner": {
     *         "agent": {
     *           "parent": "projects/76aaf4f3-a1f6-4fda-b4b3-351c64e65bc4/agent",
     *           "display_name": "Pizza Bot 2",
     *           "owner_id": "5aac51b8-668f-49dd-913f-cc683e56af34"
     *         },
     *         "owner": {
     *           "user_id": "5aac51b8-668f-49dd-913f-cc683e56af34",
     *           "display_name": "admin",
     *           "server_role_id": 3,
     *           "user_email": "admin@ondewo.com"
     *         }
     *       },
     *       "project_role": {
     *         "role_id": 4,
     *         "name": "ADMIN"
     *       }
     *     }
     *   ],
     *   "next_page_token": "current_index-1"
     * }
     * </samp>
     * @param \Ondewo\Nlu\ListAgentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListAgentsOfUser(\Ondewo\Nlu\ListAgentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/ListAgentsOfUser',
        $argument,
        ['\Ondewo\Nlu\ListAgentsOfUserResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists all agents in the server
     *
     * Examples:
     *
     * <pre>
     * grpcurl -plaintext -H 'Authorization: Bearer <jwt>' localhost:50055 ondewo.nlu.Agents.ListAllAgents
     * </pre>
     * <samp>{
     *   "agents_with_owners": [
     *     {
     *       "agent": {
     *         "parent": "projects/76aaf4f3-a1f6-4fda-b4b3-351c64e65bc4/agent",
     *         "display_name": "Pizza Bot 2",
     *         "owner_id": "5aac51b8-668f-49dd-913f-cc683e56af34"
     *       },
     *       "owner": {
     *         "user_id": "5aac51b8-668f-49dd-913f-cc683e56af34",
     *         "display_name": "admin",
     *         "server_role_id": 3,
     *         "user_email": "admin@ondewo.com"
     *       }
     *     }
     *   ],
     *   "next_page_token": "current_index-1"
     * }
     * </samp>
     * @param \Ondewo\Nlu\ListAgentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListAllAgents(\Ondewo\Nlu\ListAgentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/ListAllAgents',
        $argument,
        ['\Ondewo\Nlu\ListAgentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Adds a user with specified id to the project (agent)
     * @param \Ondewo\Nlu\AddUserToProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddUserToProject(\Ondewo\Nlu\AddUserToProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/AddUserToProject',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Removes a user with specified id from the project (agent)
     * @param \Ondewo\Nlu\RemoveUserFromProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RemoveUserFromProject(\Ondewo\Nlu\RemoveUserFromProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/RemoveUserFromProject',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists users in the project (agent)
     * @param \Ondewo\Nlu\ListUsersInProjectRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListUsersInProject(\Ondewo\Nlu\ListUsersInProjectRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/ListUsersInProject',
        $argument,
        ['\Ondewo\Nlu\ListUsersInProjectResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Gets information from the platform
     * <br>
     * Request parameter:
     * <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#empty">google.protobuf.Empty</a>
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetPlatformInfo(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetPlatformInfo',
        $argument,
        ['\Ondewo\Nlu\GetPlatformInfoResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * List permissions from the project (agent)
     * @param \Ondewo\Nlu\ListProjectPermissionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListProjectPermissions(\Ondewo\Nlu\ListProjectPermissionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/ListProjectPermissions',
        $argument,
        ['\Ondewo\Nlu\ListProjectPermissionsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Trains the specified agent.
     *
     * Operation &lt;response: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#empty">google.protobuf.Empty</a>,
     *            metadata: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#struct">google.protobuf.Struct</a>&gt;
     * @param \Ondewo\Nlu\TrainAgentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function TrainAgent(\Ondewo\Nlu\TrainAgentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/TrainAgent',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Builds cache for the specified agent.
     *
     * Operation &lt;response: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#empty">google.protobuf.Empty</a>,
     *            metadata: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#struct">google.protobuf.Struct</a>&gt;
     * @param \Ondewo\Nlu\BuildCacheRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BuildCache(\Ondewo\Nlu\BuildCacheRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/BuildCache',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Exports the specified agent to a ZIP file.
     * <br>
     * Operation &lt;response: <a href="index.html#ondewo.nlu.ExportAgentResponse">ExportAgentResponse</a>,
     *            metadata: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#struct">google.protobuf.Struct</a>&gt;
     * @param \Ondewo\Nlu\ExportAgentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ExportAgent(\Ondewo\Nlu\ExportAgentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/ExportAgent',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Exports the specified train agent to a ZIP file after train-test split, returns the test TrainingPhrase list.
     *
     * @param \Ondewo\Nlu\ExportBenchmarkAgentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ExportBenchmarkAgent(\Ondewo\Nlu\ExportBenchmarkAgentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/ExportBenchmarkAgent',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Imports the specified agent from a ZIP file.
     * <br>
     * Uploads new intents and entity types without deleting the existing ones.
     * Intents and entity types with the same name are replaced with the new
     * versions from ImportAgentRequest.
     * <br>
     * Operation &lt;response: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#empty">google.protobuf.Empty</a>,
     *            metadata: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#struct">google.protobuf.Struct</a>&gt;
     * @param \Ondewo\Nlu\ImportAgentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ImportAgent(\Ondewo\Nlu\ImportAgentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/ImportAgent',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Ondewo\Nlu\MigrateAgentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function MigrateAgent(\Ondewo\Nlu\MigrateAgentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/MigrateAgent',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Ondewo\Nlu\OptimizeRankingMatchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function OptimizeRankingMatch(\Ondewo\Nlu\OptimizeRankingMatchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/OptimizeRankingMatch',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Restores the specified agent from a ZIP file.
     * <br>
     * Replaces the current agent version with a new one. All the intents and
     * entity types in the older version are deleted.
     * <br>
     * Operation &lt;response: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#empty">google.protobuf.Empty</a>,
     *            metadata: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#struct">google.protobuf.Struct</a>&gt;
     * @param \Ondewo\Nlu\RestoreAgentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RestoreAgent(\Ondewo\Nlu\RestoreAgentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/RestoreAgent',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Gets statistics for the agent
     * @param \Ondewo\Nlu\GetAgentStatisticsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAgentStatistics(\Ondewo\Nlu\GetAgentStatisticsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetAgentStatistics',
        $argument,
        ['\Ondewo\Nlu\GetAgentStatisticsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Ondewo\Nlu\GetSessionsStatisticsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetSessionsStatistics(\Ondewo\Nlu\GetSessionsStatisticsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetSessionsStatistics',
        $argument,
        ['\Ondewo\Nlu\GetSessionsStatisticsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Gets LLM telemetry statistics for sessions bucketed over time (time series).
     * Supports LLM-typed report types (SESSION_LLM_*) only.
     * @param \Ondewo\Nlu\GetSessionsStatisticsTimeSeriesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetSessionsStatisticsTimeSeries(\Ondewo\Nlu\GetSessionsStatisticsTimeSeriesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetSessionsStatisticsTimeSeries',
        $argument,
        ['\Ondewo\Nlu\GetSessionsStatisticsTimeSeriesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Sets status for the agent
     * @param \Ondewo\Nlu\SetAgentStatusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SetAgentStatus(\Ondewo\Nlu\SetAgentStatusRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/SetAgentStatus',
        $argument,
        ['\Ondewo\Nlu\Agent', 'decode'],
        $metadata, $options);
    }

    /**
     * Sets resources
     * @param \Ondewo\Nlu\SetResourcesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SetResources(\Ondewo\Nlu\SetResourcesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/SetResources',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes resources
     * @param \Ondewo\Nlu\DeleteResourcesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteResources(\Ondewo\Nlu\DeleteResourcesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/DeleteResources',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Exports resources
     * @param \Ondewo\Nlu\ExportResourcesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ExportResources(\Ondewo\Nlu\ExportResourcesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/ExportResources',
        $argument,
        ['\Ondewo\Nlu\ExportResourcesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Get statuses of models related to project
     * @param \Ondewo\Nlu\GetModelStatusesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetModelStatuses(\Ondewo\Nlu\GetModelStatusesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetModelStatuses',
        $argument,
        ['\Ondewo\Nlu\GetModelStatusesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Get all set platform name mappings for an Agent
     * @param \Ondewo\Nlu\GetPlatformMappingRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetPlatformMapping(\Ondewo\Nlu\GetPlatformMappingRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetPlatformMapping',
        $argument,
        ['\Ondewo\Nlu\PlatformMapping', 'decode'],
        $metadata, $options);
    }

    /**
     * Set platform name mappings for an Agent
     * @param \Ondewo\Nlu\PlatformMapping $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SetPlatformMapping(\Ondewo\Nlu\PlatformMapping $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/SetPlatformMapping',
        $argument,
        ['\Ondewo\Nlu\PlatformMapping', 'decode'],
        $metadata, $options);
    }

    /**
     * Full text search endpoint in entity types
     * @param \Ondewo\Nlu\FullTextSearchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFullTextSearchEntityType(\Ondewo\Nlu\FullTextSearchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetFullTextSearchEntityType',
        $argument,
        ['\Ondewo\Nlu\FullTextSearchResponseEntityType', 'decode'],
        $metadata, $options);
    }

    /**
     * Full text search endpoint in entities
     * @param \Ondewo\Nlu\FullTextSearchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFullTextSearchEntity(\Ondewo\Nlu\FullTextSearchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetFullTextSearchEntity',
        $argument,
        ['\Ondewo\Nlu\FullTextSearchResponseEntity', 'decode'],
        $metadata, $options);
    }

    /**
     * Full text search endpoint in entity synonyms
     * @param \Ondewo\Nlu\FullTextSearchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFullTextSearchEntitySynonym(\Ondewo\Nlu\FullTextSearchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetFullTextSearchEntitySynonym',
        $argument,
        ['\Ondewo\Nlu\FullTextSearchResponseEntitySynonym', 'decode'],
        $metadata, $options);
    }

    /**
     * Full text search endpoint in intents
     * @param \Ondewo\Nlu\FullTextSearchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFullTextSearchIntent(\Ondewo\Nlu\FullTextSearchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetFullTextSearchIntent',
        $argument,
        ['\Ondewo\Nlu\FullTextSearchResponseIntent', 'decode'],
        $metadata, $options);
    }

    /**
     * Full text search endpoint in context ins of intents
     * @param \Ondewo\Nlu\FullTextSearchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFullTextSearchIntentContextIn(\Ondewo\Nlu\FullTextSearchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetFullTextSearchIntentContextIn',
        $argument,
        ['\Ondewo\Nlu\FullTextSearchResponseIntentContextIn', 'decode'],
        $metadata, $options);
    }

    /**
     * Full text search endpoint in context outs of intents
     * @param \Ondewo\Nlu\FullTextSearchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFullTextSearchIntentContextOut(\Ondewo\Nlu\FullTextSearchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetFullTextSearchIntentContextOut',
        $argument,
        ['\Ondewo\Nlu\FullTextSearchResponseIntentContextOut', 'decode'],
        $metadata, $options);
    }

    /**
     * Full text search endpoint in user says of intents
     * @param \Ondewo\Nlu\FullTextSearchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFullTextSearchIntentUsersays(\Ondewo\Nlu\FullTextSearchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetFullTextSearchIntentUsersays',
        $argument,
        ['\Ondewo\Nlu\FullTextSearchResponseIntentUsersays', 'decode'],
        $metadata, $options);
    }

    /**
     * Full text search endpoint in tags of intents
     * @param \Ondewo\Nlu\FullTextSearchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFullTextSearchIntentTags(\Ondewo\Nlu\FullTextSearchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetFullTextSearchIntentTags',
        $argument,
        ['\Ondewo\Nlu\FullTextSearchResponseIntentTags', 'decode'],
        $metadata, $options);
    }

    /**
     * Full text search endpoint in responses of intents
     * @param \Ondewo\Nlu\FullTextSearchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFullTextSearchIntentResponse(\Ondewo\Nlu\FullTextSearchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetFullTextSearchIntentResponse',
        $argument,
        ['\Ondewo\Nlu\FullTextSearchResponseIntentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Full text search endpoint in parameters of intents
     * @param \Ondewo\Nlu\FullTextSearchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFullTextSearchIntentParameters(\Ondewo\Nlu\FullTextSearchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/GetFullTextSearchIntentParameters',
        $argument,
        ['\Ondewo\Nlu\FullTextSearchResponseIntentParameters', 'decode'],
        $metadata, $options);
    }

    /**
     * Force reindexing Intent and Entity data of Agent
     * @param \Ondewo\Nlu\ReindexAgentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ReindexAgent(\Ondewo\Nlu\ReindexAgentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/ReindexAgent',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a project-scoped technical user (a normal, 2FA-exempt account holding
     * PROJECT_EXECUTOR on this one project) for headless/machine access (e.g.
     * ondewo-sip/csi/vtsi) via the ROPC login bridge. The generated password is
     * returned ONCE in the response and is not retrievable afterwards.
     * @param \Ondewo\Nlu\CreateProjectTechnicalUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateProjectTechnicalUser(\Ondewo\Nlu\CreateProjectTechnicalUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/CreateProjectTechnicalUser',
        $argument,
        ['\Ondewo\Nlu\CreateProjectTechnicalUserResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists the project-scoped technical users of the project (agent).
     * @param \Ondewo\Nlu\ListProjectTechnicalUsersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListProjectTechnicalUsers(\Ondewo\Nlu\ListProjectTechnicalUsersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/ListProjectTechnicalUsers',
        $argument,
        ['\Ondewo\Nlu\ListProjectTechnicalUsersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes a project-scoped technical user (removes the Keycloak user and the
     * project membership/projection rows).
     * @param \Ondewo\Nlu\DeleteProjectTechnicalUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteProjectTechnicalUser(\Ondewo\Nlu\DeleteProjectTechnicalUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/DeleteProjectTechnicalUser',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Rotates the password of a project-scoped technical user. Invalidates the old
     * password and returns the new generated password ONCE in the response.
     * @param \Ondewo\Nlu\RotateProjectTechnicalUserPasswordRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RotateProjectTechnicalUserPassword(\Ondewo\Nlu\RotateProjectTechnicalUserPasswordRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Agents/RotateProjectTechnicalUserPassword',
        $argument,
        ['\Ondewo\Nlu\RotateProjectTechnicalUserPasswordResponse', 'decode'],
        $metadata, $options);
    }

}
