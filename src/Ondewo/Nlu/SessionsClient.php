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
 * A session represents an interaction with a user. You retrieve user input and pass it to the <a href="index.html#ondewo.nlu.Sessions.DetectIntent">DetectIntent</a> (or <a href="index.html#ondewo.nlu.Sessions.StreamingDetectIntent">StreamingDetectIntent</a>) method to determine user intent and respond.
 */
class SessionsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Processes a natural language query and returns structured, actionable data
     * as a result. This method is not idempotent, because it may cause contexts
     * and session entity types to be updated, which in turn might affect
     * results of future queries.
     * @param \Ondewo\Nlu\DetectIntentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DetectIntent(\Ondewo\Nlu\DetectIntentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/DetectIntent',
        $argument,
        ['\Ondewo\Nlu\DetectIntentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Processes a natural language query in audio format in a streaming fashion
     * and returns structured, actionable data as a result. This method is only
     * available via the gRPC API (not REST).
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\BidiStreamingCall
     */
    public function StreamingDetectIntent($metadata = [], $options = []) {
        return $this->_bidiRequest('/ondewo.nlu.Sessions/StreamingDetectIntent',
        ['\Ondewo\Nlu\StreamingDetectIntentResponse','decode'],
        $metadata, $options);
    }

    /**
     * *** SESSION RELATED ENDPOINTS *** //
     *
     * ListSessions: returns list of sessions from ondewo-kb; by default returns only session IDs
     * @param \Ondewo\Nlu\ListSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListSessions(\Ondewo\Nlu\ListSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListSessions',
        $argument,
        ['\Ondewo\Nlu\ListSessionsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * GetSession: returns a session(=conversation) from ondewo-kb
     * @param \Ondewo\Nlu\GetSessionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetSession(\Ondewo\Nlu\GetSessionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/GetSession',
        $argument,
        ['\Ondewo\Nlu\Session', 'decode'],
        $metadata, $options);
    }

    /**
     * CreateSession: creates and returns a session(=conversation) from ondewo-kb
     * @param \Ondewo\Nlu\CreateSessionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateSession(\Ondewo\Nlu\CreateSessionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/CreateSession',
        $argument,
        ['\Ondewo\Nlu\Session', 'decode'],
        $metadata, $options);
    }

    /**
     * CreateSessionStep: creates a new session step for a session
     * @param \Ondewo\Nlu\CreateSessionStepRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateSessionStep(\Ondewo\Nlu\CreateSessionStepRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/CreateSessionStep',
        $argument,
        ['\Ondewo\Nlu\SessionStep', 'decode'],
        $metadata, $options);
    }

    /**
     * GetSessionStep: gets an existing session step of a session
     * @param \Ondewo\Nlu\GetSessionStepRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetSessionStep(\Ondewo\Nlu\GetSessionStepRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/GetSessionStep',
        $argument,
        ['\Ondewo\Nlu\SessionStep', 'decode'],
        $metadata, $options);
    }

    /**
     * UpdateSessionStep: updates an existing session step in a session
     * @param \Ondewo\Nlu\UpdateSessionStepRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateSessionStep(\Ondewo\Nlu\UpdateSessionStepRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/UpdateSessionStep',
        $argument,
        ['\Ondewo\Nlu\SessionStep', 'decode'],
        $metadata, $options);
    }

    /**
     * DeleteSessionStep: deletes an existing session step from the session
     * @param \Ondewo\Nlu\DeleteSessionStepRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteSessionStep(\Ondewo\Nlu\DeleteSessionStepRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/DeleteSessionStep',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * DeleteSession: delete a session(=conversation) from ondewo-kb (for testing only)
     * @param \Ondewo\Nlu\DeleteSessionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteSession(\Ondewo\Nlu\DeleteSessionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/DeleteSession',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * *** SESSION-LABEL RELATED ENDPOINTS *** //
     *
     * Returns the list of labels attached to a single session.
     * @param \Ondewo\Nlu\ListSessionLabelsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListSessionLabels(\Ondewo\Nlu\ListSessionLabelsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListSessionLabels',
        $argument,
        ['\Ondewo\Nlu\ListSessionLabelsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of labels observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListSessionLabelsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListSessionLabelsOfAllSessions(\Ondewo\Nlu\ListSessionLabelsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListSessionLabelsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListSessionLabelsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of language codes observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListLanguageCodesOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListLanguageCodesOfAllSessions(\Ondewo\Nlu\ListLanguageCodesOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListLanguageCodesOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListLanguageCodesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of intents matched across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListMatchedIntentsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListMatchedIntentsOfAllSessions(\Ondewo\Nlu\ListMatchedIntentsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListMatchedIntentsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListMatchedIntentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of entity types recognised across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListMatchedEntityTypesOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListMatchedEntityTypesOfAllSessions(\Ondewo\Nlu\ListMatchedEntityTypesOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListMatchedEntityTypesOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListMatchedEntityTypesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of <code>user_id</code> values observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListUserIdsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListUserIdsOfAllSessions(\Ondewo\Nlu\ListUserIdsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListUserIdsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListUserIdsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of <code>identified_user_id</code> values observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListIdentifiedUserIdsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListIdentifiedUserIdsOfAllSessions(\Ondewo\Nlu\ListIdentifiedUserIdsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListIdentifiedUserIdsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListIdentifiedUserIdsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of intent tags observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListTagsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListTagsOfAllSessions(\Ondewo\Nlu\ListTagsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListTagsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListTagsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of input contexts observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListInputContextsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListInputContextsOfAllSessions(\Ondewo\Nlu\ListInputContextsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListInputContextsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListInputContextsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of output contexts observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListOutputContextsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListOutputContextsOfAllSessions(\Ondewo\Nlu\ListOutputContextsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListOutputContextsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListOutputContextsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of <code>Intent.Message.Platform</code> values observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListPlatformsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListPlatformsOfAllSessions(\Ondewo\Nlu\ListPlatformsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListPlatformsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListPlatformsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of <code>account_id</code> values observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListAccountIdsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListAccountIdsOfAllSessions(\Ondewo\Nlu\ListAccountIdsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListAccountIdsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListAccountIdsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of <code>property_id</code> values observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListPropertyIdsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListPropertyIdsOfAllSessions(\Ondewo\Nlu\ListPropertyIdsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListPropertyIdsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListPropertyIdsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of <code>datastream_id</code> values observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListDatastreamIdsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListDatastreamIdsOfAllSessions(\Ondewo\Nlu\ListDatastreamIdsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListDatastreamIdsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListDatastreamIdsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the distinct set of <code>origin_id</code> values observed across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListOriginIdsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListOriginIdsOfAllSessions(\Ondewo\Nlu\ListOriginIdsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListOriginIdsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListOriginIdsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Attaches the supplied labels to a session and returns the updated session.
     * @param \Ondewo\Nlu\AddSessionLabelsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddSessionLabels(\Ondewo\Nlu\AddSessionLabelsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/AddSessionLabels',
        $argument,
        ['\Ondewo\Nlu\Session', 'decode'],
        $metadata, $options);
    }

    /**
     * Removes the supplied labels from a session and returns the updated session.
     * @param \Ondewo\Nlu\DeleteSessionLabelsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteSessionLabels(\Ondewo\Nlu\DeleteSessionLabelsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/DeleteSessionLabels',
        $argument,
        ['\Ondewo\Nlu\Session', 'decode'],
        $metadata, $options);
    }

    /**
     * Appends a comment to a session and returns the persisted comment.
     * @param \Ondewo\Nlu\AddSessionCommentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddSessionComment(\Ondewo\Nlu\AddSessionCommentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/AddSessionComment',
        $argument,
        ['\Ondewo\Nlu\Comment', 'decode'],
        $metadata, $options);
    }

    /**
     * Removes the comments named in the request from a session and returns the updated session.
     * @param \Ondewo\Nlu\DeleteSessionCommentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteSessionComments(\Ondewo\Nlu\DeleteSessionCommentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/DeleteSessionComments',
        $argument,
        ['\Ondewo\Nlu\Session', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates an existing comment on a session and returns the updated session.
     * @param \Ondewo\Nlu\UpdateSessionCommentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateSessionComments(\Ondewo\Nlu\UpdateSessionCommentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/UpdateSessionComments',
        $argument,
        ['\Ondewo\Nlu\Session', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists the comments attached to a session with pagination support, optionally narrowed by resolved status.
     * @param \Ondewo\Nlu\ListSessionCommentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListSessionComments(\Ondewo\Nlu\ListSessionCommentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListSessionComments',
        $argument,
        ['\Ondewo\Nlu\ListSessionCommentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists the comments attached to all sessions of the agent with pagination support,
     * optionally narrowed by a SessionFilter and by resolved status.
     * @param \Ondewo\Nlu\ListSessionCommentsOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListSessionCommentsOfAllSessions(\Ondewo\Nlu\ListSessionCommentsOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListSessionCommentsOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListSessionCommentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * *** SESSION-FEEDBACK RELATED ENDPOINTS *** //
     *
     * Records user feedback (thumbs up/down + optional comment + optional score/categorical value) about a
     * whole session and returns the persisted feedback. Works for authenticated reviewers/test users and,
     * where enabled, anonymous production end-users (webchat/webphone).
     * @param \Ondewo\Nlu\AddSessionFeedbackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddSessionFeedback(\Ondewo\Nlu\AddSessionFeedbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/AddSessionFeedback',
        $argument,
        ['\Ondewo\Nlu\SessionFeedback', 'decode'],
        $metadata, $options);
    }

    /**
     * Records user feedback about a single session step (turn), pinned to the exact response, and returns
     * the persisted feedback.
     * @param \Ondewo\Nlu\AddSessionStepFeedbackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddSessionStepFeedback(\Ondewo\Nlu\AddSessionStepFeedbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/AddSessionStepFeedback',
        $argument,
        ['\Ondewo\Nlu\SessionFeedback', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a single session/step feedback by its resource name.
     * @param \Ondewo\Nlu\GetSessionFeedbackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetSessionFeedback(\Ondewo\Nlu\GetSessionFeedbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/GetSessionFeedback',
        $argument,
        ['\Ondewo\Nlu\SessionFeedback', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates an existing feedback (a user revising their thumbs / comment) and returns it.
     * @param \Ondewo\Nlu\UpdateSessionFeedbackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateSessionFeedback(\Ondewo\Nlu\UpdateSessionFeedbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/UpdateSessionFeedback',
        $argument,
        ['\Ondewo\Nlu\SessionFeedback', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes a feedback (a user withdrawing their feedback).
     * @param \Ondewo\Nlu\DeleteSessionFeedbackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteSessionFeedback(\Ondewo\Nlu\DeleteSessionFeedbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/DeleteSessionFeedback',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists all feedback (session-level and step-level) attached to a session with pagination support.
     * @param \Ondewo\Nlu\ListSessionFeedbackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListSessionFeedback(\Ondewo\Nlu\ListSessionFeedbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListSessionFeedback',
        $argument,
        ['\Ondewo\Nlu\ListSessionFeedbackResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists feedback across all sessions of the agent, optionally narrowed by a SessionFilter.
     * @param \Ondewo\Nlu\ListSessionFeedbackOfAllSessionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListSessionFeedbackOfAllSessions(\Ondewo\Nlu\ListSessionFeedbackOfAllSessionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListSessionFeedbackOfAllSessions',
        $argument,
        ['\Ondewo\Nlu\ListSessionFeedbackResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns aggregated feedback statistics for an agent (thumbs up/down counts + breakdowns), optionally
     * rolling up existing session reviews and comments as additional quality signals.
     * @param \Ondewo\Nlu\GetFeedbackStatisticsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFeedbackStatistics(\Ondewo\Nlu\GetFeedbackStatisticsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/GetFeedbackStatistics',
        $argument,
        ['\Ondewo\Nlu\GetFeedbackStatisticsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns feedback statistics bucketed over time for trend charts.
     * @param \Ondewo\Nlu\GetFeedbackStatisticsTimeSeriesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetFeedbackStatisticsTimeSeries(\Ondewo\Nlu\GetFeedbackStatisticsTimeSeriesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/GetFeedbackStatisticsTimeSeries',
        $argument,
        ['\Ondewo\Nlu\GetFeedbackStatisticsTimeSeriesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * *** SESSION-REVIEW RELATED ENDPOINTS *** //
     *
     * ListSessionReviews:
     * returns list of session reviews from ondewo-kb; by default only returns session review IDs
     * @param \Ondewo\Nlu\ListSessionReviewsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListSessionReviews(\Ondewo\Nlu\ListSessionReviewsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListSessionReviews',
        $argument,
        ['\Ondewo\Nlu\ListSessionReviewsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * GetSessionReview:
     * returns a session-review from ondewo-kb or computes the first review if none exists
     * @param \Ondewo\Nlu\GetSessionReviewRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetSessionReview(\Ondewo\Nlu\GetSessionReviewRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/GetSessionReview',
        $argument,
        ['\Ondewo\Nlu\SessionReview', 'decode'],
        $metadata, $options);
    }

    /**
     * GetLatestSessionReview:
     * returns a session-review from ondewo-kb or computes the first review if none exists
     * @param \Ondewo\Nlu\GetLatestSessionReviewRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetLatestSessionReview(\Ondewo\Nlu\GetLatestSessionReviewRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/GetLatestSessionReview',
        $argument,
        ['\Ondewo\Nlu\SessionReview', 'decode'],
        $metadata, $options);
    }

    /**
     * CreateSessionReview:
     * persist a session review in ondewo-kb
     * as a side effect: also update training data in ondewo-cai
     * @param \Ondewo\Nlu\CreateSessionReviewRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateSessionReview(\Ondewo\Nlu\CreateSessionReviewRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/CreateSessionReview',
        $argument,
        ['\Ondewo\Nlu\SessionReview', 'decode'],
        $metadata, $options);
    }

    /**
     * RPC to get audio files based on specified criteria.
     * Retrieves information about audio files associated with specific sessions.
     * Returns a response containing details of the requested audio files.
     * @param \Ondewo\Nlu\GetAudioFilesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAudioFiles(\Ondewo\Nlu\GetAudioFilesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/GetAudioFiles',
        $argument,
        ['\Ondewo\Nlu\GetAudioFilesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * RPC to add audio files to a session.
     * Adds new audio files to the specified session, providing details about each file.
     * Returns a response containing information about the added audio files.
     * @param \Ondewo\Nlu\AddAudioFilesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddAudioFiles(\Ondewo\Nlu\AddAudioFilesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/AddAudioFiles',
        $argument,
        ['\Ondewo\Nlu\AddAudioFilesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * RPC to delete specified audio files.
     * Deletes audio files associated with specific sessions based on unique identifiers.
     * Returns an empty response indicating the successful deletion of the specified audio files.
     * @param \Ondewo\Nlu\DeleteAudioFilesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteAudioFiles(\Ondewo\Nlu\DeleteAudioFilesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/DeleteAudioFiles',
        $argument,
        ['\Ondewo\Nlu\DeleteAudioFilesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * RPC to get a consolidated audio file for a specific session.
     * Retrieves a single audio file that combines all audio files associated with the specified session.
     * Returns details of the consolidated audio file.
     * @param \Ondewo\Nlu\GetAudioFileOfSessionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetAudioFileOfSession(\Ondewo\Nlu\GetAudioFileOfSessionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/GetAudioFileOfSession',
        $argument,
        ['\Ondewo\Nlu\AudioFileResource', 'decode'],
        $metadata, $options);
    }

    /**
     * RPC to get a list audio files for a specific session.
     * Retrieves a single audio file that combines all audio files associated with the specified session.
     * @param \Ondewo\Nlu\ListAudioFilesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListAudioFiles(\Ondewo\Nlu\ListAudioFilesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Sessions/ListAudioFiles',
        $argument,
        ['\Ondewo\Nlu\ListAudioFilesResponse', 'decode'],
        $metadata, $options);
    }

}
