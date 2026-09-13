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
 * A context represents additional information included with user input or with an intent returned by the Dialogflow API. Contexts are helpful for differentiating user input which may be vague or have a different meaning depending on additional details from your application such as user setting and preferences, previous user input, where the user is in your application, geographic location, and so on.
 *
 * You can include contexts as input parameters of a <a href="index.html#ondewo.nlu.Sessions.DetectIntent">DetectIntent</a> (or <a href="index.html#ondewo.nlu.Sessions.StreamingDetectIntent">StreamingDetectIntent</a>) request, or as output contexts included in the returned intent.
 * Contexts expire when an intent is matched, after the number of <code>DetectIntent</code> requests specified by the <code>lifespan_count</code> parameter, or after 10 minutes if no intents are matched for a <code>DetectIntent</code> request.
 * For more information about contexts, see the <a href="https://dialogflow.com/docs/contexts">Dialogflow documentation</a>.
 */
class ContextsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns the list of all contexts in the specified session.
     * @param \Ondewo\Nlu\ListContextsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListContexts(\Ondewo\Nlu\ListContextsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Contexts/ListContexts',
        $argument,
        ['\Ondewo\Nlu\ListContextsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves the specified context.
     * @param \Ondewo\Nlu\GetContextRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetContext(\Ondewo\Nlu\GetContextRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Contexts/GetContext',
        $argument,
        ['\Ondewo\Nlu\Context', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a context.
     * @param \Ondewo\Nlu\CreateContextRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateContext(\Ondewo\Nlu\CreateContextRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Contexts/CreateContext',
        $argument,
        ['\Ondewo\Nlu\Context', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates the specified context.
     * @param \Ondewo\Nlu\UpdateContextRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateContext(\Ondewo\Nlu\UpdateContextRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Contexts/UpdateContext',
        $argument,
        ['\Ondewo\Nlu\Context', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes the specified context.
     * @param \Ondewo\Nlu\DeleteContextRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteContext(\Ondewo\Nlu\DeleteContextRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Contexts/DeleteContext',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes all active contexts in the specified session.
     * @param \Ondewo\Nlu\DeleteAllContextsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteAllContexts(\Ondewo\Nlu\DeleteAllContextsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Contexts/DeleteAllContexts',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

}
