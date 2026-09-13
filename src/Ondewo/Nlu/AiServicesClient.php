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
 * The Central class defining the ondewo ai services
 */
class AiServicesClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Processes a natural language query and returns detected entities
     * @param \Ondewo\Nlu\ExtractEntitiesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ExtractEntities(\Ondewo\Nlu\ExtractEntitiesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.AiServices/ExtractEntities',
        $argument,
        ['\Ondewo\Nlu\ExtractEntitiesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Generates a list of training phrases
     * @param \Ondewo\Nlu\GenerateUserSaysRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateUserSays(\Ondewo\Nlu\GenerateUserSaysRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.AiServices/GenerateUserSays',
        $argument,
        ['\Ondewo\Nlu\GenerateUserSaysResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Generate responses from all intents using synonyms
     * @param \Ondewo\Nlu\GenerateResponsesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GenerateResponses(\Ondewo\Nlu\GenerateResponsesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.AiServices/GenerateResponses',
        $argument,
        ['\Ondewo\Nlu\GenerateResponsesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Generates alternative phrase based on original phrase
     * @param \Ondewo\Nlu\GetAlternativeSentencesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAlternativeSentences(\Ondewo\Nlu\GetAlternativeSentencesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.AiServices/GetAlternativeSentences',
        $argument,
        ['\Ondewo\Nlu\GetAlternativeSentencesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Generates alternative training phrase based on original training phrase
     * @param \Ondewo\Nlu\GetAlternativeTrainingPhrasesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAlternativeTrainingPhrases(\Ondewo\Nlu\GetAlternativeTrainingPhrasesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.AiServices/GetAlternativeTrainingPhrases',
        $argument,
        ['\Ondewo\Nlu\GetAlternativeTrainingPhrasesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Generates synonyms for a certain word
     * @param \Ondewo\Nlu\GetSynonymsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetSynonyms(\Ondewo\Nlu\GetSynonymsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.AiServices/GetSynonyms',
        $argument,
        ['\Ondewo\Nlu\GetSynonymsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Preprocess text and detects intents in a sentence
     * @param \Ondewo\Nlu\ClassifyIntentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ClassifyIntents(\Ondewo\Nlu\ClassifyIntentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.AiServices/ClassifyIntents',
        $argument,
        ['\Ondewo\Nlu\ClassifyIntentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Processes a natural language query and returns detected entities
     * @param \Ondewo\Nlu\ExtractEntitiesFuzzyRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ExtractEntitiesFuzzy(\Ondewo\Nlu\ExtractEntitiesFuzzyRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.AiServices/ExtractEntitiesFuzzy',
        $argument,
        ['\Ondewo\Nlu\ExtractEntitiesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Generates a single response from a Large Language Model (LLM).
     * This RPC method allows a client to make a request to the LLM and receive
     * a single complete response based on the input parameters provided.
     * @param \Ondewo\Nlu\LlmGenerateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmGenerate(\Ondewo\Nlu\LlmGenerateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.AiServices/LlmGenerate',
        $argument,
        ['\Ondewo\Nlu\LlmGenerateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Generates a response from the LLM in a streaming format.
     * This RPC allows continuous streaming of responses from the model,
     * which is useful for real-time applications or large outputs.
     * @param \Ondewo\Nlu\LlmGenerateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function StreamingLlmGenerate(\Ondewo\Nlu\LlmGenerateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.nlu.AiServices/StreamingLlmGenerate',
        $argument,
        ['\Ondewo\Nlu\StreamingLlmGenerateResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists available Large Language Models (LLMs) for a specified CCAI service.
     * This RPC method allows clients to retrieve metadata about all LLM models associated
     * with a particular service within a project, including model names, descriptions, and providers.
     * @param \Ondewo\Nlu\ListLlmModelsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListLlmModels(\Ondewo\Nlu\ListLlmModelsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.AiServices/ListLlmModels',
        $argument,
        ['\Ondewo\Nlu\ListLlmModelsResponse', 'decode'],
        $metadata, $options);
    }

}
