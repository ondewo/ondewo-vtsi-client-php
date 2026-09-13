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
 * service to send requests to a webhook server
 */
class WebhookClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * send a request for /response_refinement/ to the webhook server
     * fulfillment messages can be overwritten by the webhook server
     * @param \Ondewo\Nlu\WebhookRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ResponseRefinement(\Ondewo\Nlu\WebhookRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Webhook/ResponseRefinement',
        $argument,
        ['\Ondewo\Nlu\WebhookResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * send a request for /slot_filling/ to the webhook server
     * parameter values can be provided &amp;
     * context information can be changed by the webhook server
     * @param \Ondewo\Nlu\WebhookRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SlotFilling(\Ondewo\Nlu\WebhookRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Webhook/SlotFilling',
        $argument,
        ['\Ondewo\Nlu\WebhookResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * send a Ping to the webhook server to verify server health
     * will return True if http status_code==200 is detected in the response
     * @param \Ondewo\Nlu\PingRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Ping(\Ondewo\Nlu\PingRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Webhook/Ping',
        $argument,
        ['\Ondewo\Nlu\PingResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a session entity type.
     *
     * If the specified session entity type already exists, overrides the session
     * entity type.
     *
     * This method doesn&apos;t work with Google Assistant integration.
     * Contact Dialogflow support if you need to use session entities
     * with Google Assistant integration.
     * @param \Ondewo\Nlu\CreateSessionEntityTypeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateSessionEntityType(\Ondewo\Nlu\CreateSessionEntityTypeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Webhook/CreateSessionEntityType',
        $argument,
        ['\Ondewo\Nlu\SessionEntityType', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates the specified session entity type.
     *
     * This method doesn&apos;t work with Google Assistant integration.
     * Contact Dialogflow support if you need to use session entities
     * with Google Assistant integration.
     * @param \Ondewo\Nlu\UpdateSessionEntityTypeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateSessionEntityType(\Ondewo\Nlu\UpdateSessionEntityTypeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Webhook/UpdateSessionEntityType',
        $argument,
        ['\Ondewo\Nlu\SessionEntityType', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes the specified session entity type.
     *
     * This method doesn&apos;t work with Google Assistant integration.
     * Contact Dialogflow support if you need to use session entities
     * with Google Assistant integration.
     * @param \Ondewo\Nlu\DeleteSessionEntityTypeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteSessionEntityType(\Ondewo\Nlu\DeleteSessionEntityTypeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Webhook/DeleteSessionEntityType',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

}
