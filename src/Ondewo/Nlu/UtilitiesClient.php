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
 * This is collection of utility endpoints, intended to language-independent operations, such as code checks, regex checks, etc. Holds a collection of utility functions
 */
class UtilitiesClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Validates the validity of python regexes
     * @param \Ondewo\Nlu\ValidateRegexRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ValidateRegex(\Ondewo\Nlu\ValidateRegexRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Utilities/ValidateRegex',
        $argument,
        ['\Ondewo\Nlu\ValidateRegexResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Validate that entity types with group references have synonyms with
     * capturing groups.
     * @param \Ondewo\Nlu\ValidateEmbeddedRegexRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ValidateEmbeddedRegex(\Ondewo\Nlu\ValidateEmbeddedRegexRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Utilities/ValidateEmbeddedRegex',
        $argument,
        ['\Ondewo\Nlu\ValidateEmbeddedRegexResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Cleans all intent training phrases and entity annotations of parent
     * @param \Ondewo\Nlu\CleanAllIntentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CleanAllIntents(\Ondewo\Nlu\CleanAllIntentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Utilities/CleanAllIntents',
        $argument,
        ['\Ondewo\Nlu\CleanAllIntentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Cleans single intent training phrases and entity annotations
     * @param \Ondewo\Nlu\CleanIntentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CleanIntent(\Ondewo\Nlu\CleanIntentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Utilities/CleanIntent',
        $argument,
        ['\Ondewo\Nlu\CleanIntentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Cleans all entity types of parent
     * @param \Ondewo\Nlu\CleanAllEntityTypesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CleanAllEntityTypes(\Ondewo\Nlu\CleanAllEntityTypesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Utilities/CleanAllEntityTypes',
        $argument,
        ['\Ondewo\Nlu\CleanAllEntityTypesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Cleans entity type
     * @param \Ondewo\Nlu\CleanEntityTypeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CleanEntityType(\Ondewo\Nlu\CleanEntityTypeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Utilities/CleanEntityType',
        $argument,
        ['\Ondewo\Nlu\CleanEntityTypeResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates new training phrases corresponding to intent specified by its intent display name
     * @param \Ondewo\Nlu\AddTrainingPhrasesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddTrainingPhrases(\Ondewo\Nlu\AddTrainingPhrasesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Utilities/AddTrainingPhrases',
        $argument,
        ['\Ondewo\Nlu\AddTrainingPhrasesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates new training phrases corresponding to intent specified by its intent display name from csv file
     * @param \Ondewo\Nlu\AddTrainingPhrasesFromCSVRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddTrainingPhrasesFromCSV(\Ondewo\Nlu\AddTrainingPhrasesFromCSVRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Utilities/AddTrainingPhrasesFromCSV',
        $argument,
        ['\Ondewo\Nlu\AddTrainingPhrasesResponse', 'decode'],
        $metadata, $options);
    }

}
