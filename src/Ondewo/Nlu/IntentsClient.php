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
 * An intent represents a mapping between input from a user and an action to be taken by your application. When you pass user input to the <a href="index.html#ondewo.nlu.Sessions.DetectIntent">DetectIntent</a> (or <a href="index.html#ondewo.nlu.Sessions.StreamingDetectIntent">StreamingDetectIntent</a>) method, the Dialogflow API analyzes the input and searches for a matching intent. If no match is found, the Dialogflow API returns a fallback intent (<code>is_fallback</code> = true).
 *
 * You can provide additional information for the Dialogflow API to use to match user input to an intent by adding the following to your intent.
 *
 * <ul>
 *   <li><strong>Contexts</strong> - provide additional context for intent analysis. For example, if an intent is related to an object in your application that plays music, you can provide a context to determine when to match the intent if the user input is &quot;turn it off&quot;.  You can include a context that matches the intent when there is previous user input of &quot;play music&quot;, and not when there is previous user input of &quot;turn on the light&quot;.</li>
 *
 *   <li><strong>Events</strong> - allow for matching an intent by using an event name instead of user input. Your application can provide an event name and related parameters to the Dialogflow API to match an intent. For example, when your application starts, you can send a welcome event with a user name parameter to the Dialogflow API to match an intent with a personalized welcome message for the user.</li>
 *
 *   <li><strong>Training phrases</strong> - provide examples of user input to train the Dialogflow API agent to better match intents.</li>
 * </ul>
 *
 * For more information about intents, see the <a href="https://dialogflow.com/docs/intents">Dialogflow documentation</a>.
 */
class IntentsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the list of all intents in the specified agent.
     * @param \Ondewo\Nlu\ListIntentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListIntents(\Ondewo\Nlu\ListIntentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/ListIntents',
        $argument,
        ['\Ondewo\Nlu\ListIntentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves the specified intent.
     * @param \Ondewo\Nlu\GetIntentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetIntent(\Ondewo\Nlu\GetIntentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/GetIntent',
        $argument,
        ['\Ondewo\Nlu\Intent', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates an intent in the specified agent.
     * @param \Ondewo\Nlu\CreateIntentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateIntent(\Ondewo\Nlu\CreateIntentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/CreateIntent',
        $argument,
        ['\Ondewo\Nlu\Intent', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates the specified intent.
     * @param \Ondewo\Nlu\UpdateIntentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateIntent(\Ondewo\Nlu\UpdateIntentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/UpdateIntent',
        $argument,
        ['\Ondewo\Nlu\Intent', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes the specified intent.
     * @param \Ondewo\Nlu\DeleteIntentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteIntent(\Ondewo\Nlu\DeleteIntentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/DeleteIntent',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates/Creates multiple intents in the specified agent.
     *
     * Operation &lt;response: <a href="index.html#ondewo.nlu.BatchUpdateIntentsResponse">BatchUpdateIntentsResponse</a>&gt;
     * @param \Ondewo\Nlu\BatchUpdateIntentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchUpdateIntents(\Ondewo\Nlu\BatchUpdateIntentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchUpdateIntents',
        $argument,
        ['\Ondewo\Nlu\BatchUpdateIntentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes intents in the specified agent.
     * <br>
     * Operation &lt;response: <a href="https://protobuf.dev/reference/protobuf/google.protobuf/#empty">google.protobuf.Empty</a>&gt;
     * @param \Ondewo\Nlu\BatchDeleteIntentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchDeleteIntents(\Ondewo\Nlu\BatchDeleteIntentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchDeleteIntents',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Tags a specific intent with tag(s)
     * @param \Ondewo\Nlu\IntentTagRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function TagIntent(\Ondewo\Nlu\IntentTagRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/TagIntent',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes tag(s) for a specific intent
     * @param \Ondewo\Nlu\IntentTagRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteIntentTag(\Ondewo\Nlu\IntentTagRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/DeleteIntentTag',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Gets all the tags for a specific intent
     * @param \Ondewo\Nlu\GetIntentTagsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetIntentTags(\Ondewo\Nlu\GetIntentTagsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/GetIntentTags',
        $argument,
        ['\Ondewo\Nlu\GetIntentTagsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Gets all the tags for all the intents
     * @param \Ondewo\Nlu\GetAllIntentTagsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAllIntentTags(\Ondewo\Nlu\GetAllIntentTagsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/GetAllIntentTags',
        $argument,
        ['\Ondewo\Nlu\GetIntentTagsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * ************************ Training Phrase RPC Endpoints ***************************
     *
     * Creates batch of training phrases
     * @param \Ondewo\Nlu\BatchCreateTrainingPhrasesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchCreateTrainingPhrases(\Ondewo\Nlu\BatchCreateTrainingPhrasesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchCreateTrainingPhrases',
        $argument,
        ['\Ondewo\Nlu\BatchTrainingPhrasesStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieve a training phrases batch of the specified names.
     * @param \Ondewo\Nlu\BatchGetTrainingPhrasesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchGetTrainingPhrases(\Ondewo\Nlu\BatchGetTrainingPhrasesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchGetTrainingPhrases',
        $argument,
        ['\Ondewo\Nlu\BatchTrainingPhrasesStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates batch of training phrases
     * @param \Ondewo\Nlu\BatchUpdateTrainingPhrasesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchUpdateTrainingPhrases(\Ondewo\Nlu\BatchUpdateTrainingPhrasesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchUpdateTrainingPhrases',
        $argument,
        ['\Ondewo\Nlu\BatchTrainingPhrasesStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete a training phrases batch of the specified names.
     * @param \Ondewo\Nlu\BatchDeleteTrainingPhrasesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchDeleteTrainingPhrases(\Ondewo\Nlu\BatchDeleteTrainingPhrasesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchDeleteTrainingPhrases',
        $argument,
        ['\Ondewo\Nlu\BatchDeleteTrainingPhrasesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * List training phrases (of a specific intent).
     * @param \Ondewo\Nlu\ListTrainingPhrasesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListTrainingPhrases(\Ondewo\Nlu\ListTrainingPhrasesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/ListTrainingPhrases',
        $argument,
        ['\Ondewo\Nlu\ListTrainingPhrasesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * ************************ Response RPC Endpoints ***************************
     *
     * Creates batch of intent messages
     * @param \Ondewo\Nlu\BatchCreateResponseMessagesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchCreateResponseMessages(\Ondewo\Nlu\BatchCreateResponseMessagesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchCreateResponseMessages',
        $argument,
        ['\Ondewo\Nlu\BatchResponseMessagesStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieve a intent messages batch of the specified names.
     * @param \Ondewo\Nlu\BatchGetResponseMessagesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchGetResponseMessages(\Ondewo\Nlu\BatchGetResponseMessagesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchGetResponseMessages',
        $argument,
        ['\Ondewo\Nlu\BatchResponseMessagesStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates batch of intent messages
     * @param \Ondewo\Nlu\BatchUpdateResponseMessagesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchUpdateResponseMessages(\Ondewo\Nlu\BatchUpdateResponseMessagesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchUpdateResponseMessages',
        $argument,
        ['\Ondewo\Nlu\BatchResponseMessagesStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete a intent messages batch of the specified names.
     * @param \Ondewo\Nlu\BatchDeleteResponseMessagesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchDeleteResponseMessages(\Ondewo\Nlu\BatchDeleteResponseMessagesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchDeleteResponseMessages',
        $argument,
        ['\Ondewo\Nlu\BatchDeleteResponseMessagesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * List messages (of a specific intent).
     * @param \Ondewo\Nlu\ListResponseMessagesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListResponseMessages(\Ondewo\Nlu\ListResponseMessagesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/ListResponseMessages',
        $argument,
        ['\Ondewo\Nlu\ListResponseMessagesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * ************************ Parameter RPC Endpoints ***************************
     *
     * Creates batch of intent messages
     * @param \Ondewo\Nlu\BatchCreateParametersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchCreateParameters(\Ondewo\Nlu\BatchCreateParametersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchCreateParameters',
        $argument,
        ['\Ondewo\Nlu\BatchParametersStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieve a intent messages batch of the specified names.
     * @param \Ondewo\Nlu\BatchGetParametersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchGetParameters(\Ondewo\Nlu\BatchGetParametersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchGetParameters',
        $argument,
        ['\Ondewo\Nlu\BatchParametersStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates batch of intent messages
     * @param \Ondewo\Nlu\BatchUpdateParametersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchUpdateParameters(\Ondewo\Nlu\BatchUpdateParametersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchUpdateParameters',
        $argument,
        ['\Ondewo\Nlu\BatchParametersStatusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete a intent messages batch of the specified names.
     * @param \Ondewo\Nlu\BatchDeleteParametersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function BatchDeleteParameters(\Ondewo\Nlu\BatchDeleteParametersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/BatchDeleteParameters',
        $argument,
        ['\Ondewo\Nlu\BatchDeleteParametersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * List messages (of a specific intent).
     * @param \Ondewo\Nlu\ListParametersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListParameters(\Ondewo\Nlu\ListParametersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/ListParameters',
        $argument,
        ['\Ondewo\Nlu\ListParametersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * List Training phrases (of a specific intent).
     * @param \Ondewo\Nlu\ListTrainingPhrasesofIntentsWithEnrichmentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListTrainingPhrasesofIntentsWithEnrichment(\Ondewo\Nlu\ListTrainingPhrasesofIntentsWithEnrichmentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Intents/ListTrainingPhrasesofIntentsWithEnrichment',
        $argument,
        ['\Ondewo\Nlu\ListTrainingPhrasesofIntentsWithEnrichmentResponse', 'decode'],
        $metadata, $options);
    }

}
