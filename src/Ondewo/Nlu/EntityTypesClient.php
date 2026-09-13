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
namespace Ondewo\Nlu;

/**
 * Entities are extracted from user input and represent parameters that are meaningful to your application. For example, a date range, a proper name such as a geographic location or landmark, and so on. Entities represent actionable data for your application.
 *
 * When you define an entity, you can also include synonyms that all map to that entity. For example, &quot;soft drink&quot;, &quot;soda&quot;, &quot;pop&quot;, and so on.
 *
 * There are three types of entities:
 *
 * <ul>
 *   <li><strong>System</strong> - entities that are defined by the Dialogflow API for common data types such as date, time, currency, and so on. A system entity is represented by the <code>EntityType</code> type.</li>
 *
 *   <li><strong>Developer</strong> - entities that are defined by you that represent actionable data that is meaningful to your application. For example, you could define a <code>pizza.sauce</code> entity for red or white pizza sauce, a <code>pizza.cheese</code> entity for the different types of cheese on a pizza, a <code>pizza.topping</code> entity for different toppings, and so on. A developer entity is represented by the <code>EntityType</code> type.</li>
 *
 *   <li><strong>User</strong> - entities that are built for an individual user such as favorites, preferences, playlists, and so on. A user entity is represented by the <a href="index.html#ondewo.nlu.SessionEntityType">SessionEntityType</a> type.</li>
 * </ul>
 *
 * For more information about entity types, see the <a href="https://dialogflow.com/docs/entities">Dialogflow documentation</a>.
 */
class EntityTypesClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the list of all entity types in the specified agent.
     * @param \Ondewo\Nlu\ListEntityTypesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListEntityTypes(\Ondewo\Nlu\ListEntityTypesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/ListEntityTypes',
        $argument,
        ['\Ondewo\Nlu\ListEntityTypesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves the specified entity type.
     * @param \Ondewo\Nlu\GetEntityTypeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetEntityType(\Ondewo\Nlu\GetEntityTypeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/GetEntityType',
        $argument,
        ['\Ondewo\Nlu\EntityType', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates an entity type in the specified agent.
     * @param \Ondewo\Nlu\CreateEntityTypeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateEntityType(\Ondewo\Nlu\CreateEntityTypeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/CreateEntityType',
        $argument,
        ['\Ondewo\Nlu\EntityType', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates the specified entity type.
     * @param \Ondewo\Nlu\UpdateEntityTypeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateEntityType(\Ondewo\Nlu\UpdateEntityTypeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/UpdateEntityType',
        $argument,
        ['\Ondewo\Nlu\EntityType', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes the specified entity type.
     * @param \Ondewo\Nlu\DeleteEntityTypeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteEntityType(\Ondewo\Nlu\DeleteEntityTypeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/DeleteEntityType',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates/Creates multiple entity types in the specified agent.
     *
     * Operation &lt;response: <a href="index.html#ondewo.nlu.BatchUpdateEntityTypesResponse">BatchUpdateEntityTypesResponse</a>,
     *            metadata: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#struct">google.protobuf.Struct</a>&gt;
     * @param \Ondewo\Nlu\BatchUpdateEntityTypesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchUpdateEntityTypes(\Ondewo\Nlu\BatchUpdateEntityTypesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/BatchUpdateEntityTypes',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes entity types in the specified agent.
     *
     * Operation &lt;response: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#empty">google.protobuf.Empty</a>,
     *            metadata: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#struct">google.protobuf.Struct</a>&gt;
     * @param \Ondewo\Nlu\BatchDeleteEntityTypesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchDeleteEntityTypes(\Ondewo\Nlu\BatchDeleteEntityTypesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/BatchDeleteEntityTypes',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves the specified entity .
     * @param \Ondewo\Nlu\GetEntityRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetEntity(\Ondewo\Nlu\GetEntityRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/GetEntity',
        $argument,
        ['\Ondewo\Nlu\EntityType\Entity', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates an entity  in the specified agent.
     * @param \Ondewo\Nlu\CreateEntityRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateEntity(\Ondewo\Nlu\CreateEntityRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/CreateEntity',
        $argument,
        ['\Ondewo\Nlu\EntityType\Entity', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates the specified entity .
     * @param \Ondewo\Nlu\UpdateEntityRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateEntity(\Ondewo\Nlu\UpdateEntityRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/UpdateEntity',
        $argument,
        ['\Ondewo\Nlu\EntityType\Entity', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes the specified entity .
     * @param \Ondewo\Nlu\DeleteEntityRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteEntity(\Ondewo\Nlu\DeleteEntityRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/DeleteEntity',
        $argument,
        ['\Ondewo\Nlu\DeleteEntityStatus', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates an entity value in an entity type.
     * @param \Ondewo\Nlu\BatchCreateEntitiesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchCreateEntities(\Ondewo\Nlu\BatchCreateEntitiesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/BatchCreateEntities',
        $argument,
        ['\Ondewo\Nlu\BatchEntitiesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates a specific entity value.
     * @param \Ondewo\Nlu\BatchUpdateEntitiesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchUpdateEntities(\Ondewo\Nlu\BatchUpdateEntitiesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/BatchUpdateEntities',
        $argument,
        ['\Ondewo\Nlu\BatchEntitiesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Gets a specific entity value.
     * @param \Ondewo\Nlu\BatchGetEntitiesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchGetEntities(\Ondewo\Nlu\BatchGetEntitiesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/BatchGetEntities',
        $argument,
        ['\Ondewo\Nlu\BatchEntitiesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes the specified entity value.
     * @param \Ondewo\Nlu\BatchDeleteEntitiesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchDeleteEntities(\Ondewo\Nlu\BatchDeleteEntitiesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/BatchDeleteEntities',
        $argument,
        ['\Ondewo\Nlu\BatchDeleteEntitiesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * List entities of an entity type
     * @param \Ondewo\Nlu\ListEntitiesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListEntities(\Ondewo\Nlu\ListEntitiesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.EntityTypes/ListEntities',
        $argument,
        ['\Ondewo\Nlu\ListEntitiesResponse', 'decode'],
        $metadata, $options);
    }

}
