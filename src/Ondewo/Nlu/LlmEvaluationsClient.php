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
 * LangSmith-style evaluation surface: datasets, examples, experiments, evaluator
 * runs, feedback (LLM-as-judge / human / heuristic / custom code / pairwise),
 * pairwise comparisons, release gates + persisted gate runs, scorecards,
 * per-project evaluation settings (judge configuration), the evaluator registry,
 * golden-transcript recording from sessions, conversation simulation
 * (standard + adversarial red-teaming), recurring schedules and report artifacts.
 */
class LlmEvaluationsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * region datasets
     *
     * Create a new evaluation dataset.
     * @param \Ondewo\Nlu\CreateLlmEvaluationDatasetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationCreateDataset(\Ondewo\Nlu\CreateLlmEvaluationDatasetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationCreateDataset',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationDataset', 'decode'],
        $metadata, $options);
    }

    /**
     * Get an evaluation dataset by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationDatasetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetDataset(\Ondewo\Nlu\GetLlmEvaluationDatasetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetDataset',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationDataset', 'decode'],
        $metadata, $options);
    }

    /**
     * List evaluation datasets in the project, optionally filtered + paginated.
     * @param \Ondewo\Nlu\ListLlmEvaluationDatasetsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListDatasets(\Ondewo\Nlu\ListLlmEvaluationDatasetsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListDatasets',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationDatasetsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update metadata of an existing evaluation dataset (examples managed via Add/Update/Delete RPCs).
     * @param \Ondewo\Nlu\UpdateLlmEvaluationDatasetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationUpdateDataset(\Ondewo\Nlu\UpdateLlmEvaluationDatasetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationUpdateDataset',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationDataset', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete an evaluation dataset and all owned examples.
     * @param \Ondewo\Nlu\DeleteLlmEvaluationDatasetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationDeleteDataset(\Ondewo\Nlu\DeleteLlmEvaluationDatasetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationDeleteDataset',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion datasets
     *
     * region examples
     *
     * Add a single example to an existing dataset.
     * @param \Ondewo\Nlu\AddLlmEvaluationExampleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationAddExample(\Ondewo\Nlu\AddLlmEvaluationExampleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationAddExample',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationExample', 'decode'],
        $metadata, $options);
    }

    /**
     * Add multiple examples to an existing dataset in one call.
     * @param \Ondewo\Nlu\AddLlmEvaluationExamplesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationAddExamples(\Ondewo\Nlu\AddLlmEvaluationExamplesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationAddExamples',
        $argument,
        ['\Ondewo\Nlu\AddLlmEvaluationExamplesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Get a single evaluation example by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationExampleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetExample(\Ondewo\Nlu\GetLlmEvaluationExampleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetExample',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationExample', 'decode'],
        $metadata, $options);
    }

    /**
     * List examples in a dataset, optionally filtered + paginated.
     * @param \Ondewo\Nlu\ListLlmEvaluationExamplesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListExamples(\Ondewo\Nlu\ListLlmEvaluationExamplesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListExamples',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationExamplesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update fields of an existing evaluation example.
     * @param \Ondewo\Nlu\UpdateLlmEvaluationExampleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationUpdateExample(\Ondewo\Nlu\UpdateLlmEvaluationExampleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationUpdateExample',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationExample', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete an evaluation example.
     * @param \Ondewo\Nlu\DeleteLlmEvaluationExampleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationDeleteExample(\Ondewo\Nlu\DeleteLlmEvaluationExampleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationDeleteExample',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion examples
     *
     * region experiments
     *
     * Run a fresh experiment over a dataset. Long-running operation: the returned
     * Operation resolves to the completed LlmEvaluationExperiment once all
     * evaluators have produced feedback.
     * @param \Ondewo\Nlu\RunLlmEvaluationExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationRunExperiment(\Ondewo\Nlu\RunLlmEvaluationExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationRunExperiment',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieve a previously-run experiment by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetExperiment(\Ondewo\Nlu\GetLlmEvaluationExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetExperiment',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationExperiment', 'decode'],
        $metadata, $options);
    }

    /**
     * List experiments in a project, optionally filtered + paginated.
     * @param \Ondewo\Nlu\ListLlmEvaluationExperimentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListExperiments(\Ondewo\Nlu\ListLlmEvaluationExperimentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListExperiments',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationExperimentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update metadata of an experiment (e.g. baseline pointer, display_name).
     * Evaluator runs and feedback are immutable; use LlmEvaluationSubmitFeedback /
     * LlmEvaluationDeleteFeedback for downstream annotations.
     * @param \Ondewo\Nlu\UpdateLlmEvaluationExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationUpdateExperiment(\Ondewo\Nlu\UpdateLlmEvaluationExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationUpdateExperiment',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationExperiment', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete an experiment and all owned evaluator runs + feedbacks.
     * @param \Ondewo\Nlu\DeleteLlmEvaluationExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationDeleteExperiment(\Ondewo\Nlu\DeleteLlmEvaluationExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationDeleteExperiment',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Cancel a still-running experiment. No-op if already finished.
     * @param \Ondewo\Nlu\CancelLlmEvaluationExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationCancelExperiment(\Ondewo\Nlu\CancelLlmEvaluationExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationCancelExperiment',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationExperiment', 'decode'],
        $metadata, $options);
    }

    /**
     * Compare two-or-more experiments and emit a pairwise comparison report.
     * @param \Ondewo\Nlu\CompareLlmEvaluationExperimentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationCompareExperiments(\Ondewo\Nlu\CompareLlmEvaluationExperimentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationCompareExperiments',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationComparison', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion experiments
     *
     * region feedback
     *
     * Submit a single feedback record (used by human reviewers / external evaluators).
     * @param \Ondewo\Nlu\SubmitLlmEvaluationFeedbackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationSubmitFeedback(\Ondewo\Nlu\SubmitLlmEvaluationFeedbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationSubmitFeedback',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationFeedback', 'decode'],
        $metadata, $options);
    }

    /**
     * List feedback records, optionally filtered + paginated.
     * @param \Ondewo\Nlu\ListLlmEvaluationFeedbackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListFeedback(\Ondewo\Nlu\ListLlmEvaluationFeedbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListFeedback',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationFeedbackResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete a single feedback record.
     * @param \Ondewo\Nlu\DeleteLlmEvaluationFeedbackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationDeleteFeedback(\Ondewo\Nlu\DeleteLlmEvaluationFeedbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationDeleteFeedback',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Update a single feedback record (e.g. correct a human review score or comment).
     * @param \Ondewo\Nlu\UpdateLlmEvaluationFeedbackRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationUpdateFeedback(\Ondewo\Nlu\UpdateLlmEvaluationFeedbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationUpdateFeedback',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationFeedback', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion feedback
     *
     * region release gates
     *
     * Create a new release gate (a named set of thresholds over evaluator scores,
     * regression deltas and telemetry that decides whether a candidate configuration ships).
     * @param \Ondewo\Nlu\CreateLlmEvaluationReleaseGateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationCreateReleaseGate(\Ondewo\Nlu\CreateLlmEvaluationReleaseGateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationCreateReleaseGate',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationReleaseGate', 'decode'],
        $metadata, $options);
    }

    /**
     * Get a release gate by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationReleaseGateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetReleaseGate(\Ondewo\Nlu\GetLlmEvaluationReleaseGateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetReleaseGate',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationReleaseGate', 'decode'],
        $metadata, $options);
    }

    /**
     * List release gates in the project, optionally filtered + paginated.
     * @param \Ondewo\Nlu\ListLlmEvaluationReleaseGatesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListReleaseGates(\Ondewo\Nlu\ListLlmEvaluationReleaseGatesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListReleaseGates',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationReleaseGatesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update an existing release gate. Semantic changes (suite, baseline,
     * evaluators, thresholds, weights, safety) increment the server-managed revision.
     * @param \Ondewo\Nlu\UpdateLlmEvaluationReleaseGateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationUpdateReleaseGate(\Ondewo\Nlu\UpdateLlmEvaluationReleaseGateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationUpdateReleaseGate',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationReleaseGate', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete a release gate and all owned gate runs.
     * @param \Ondewo\Nlu\DeleteLlmEvaluationReleaseGateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationDeleteReleaseGate(\Ondewo\Nlu\DeleteLlmEvaluationReleaseGateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationDeleteReleaseGate',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Run a release gate against a candidate target. Long-running operation: the
     * returned Operation resolves to the completed LlmEvaluationReleaseGateRun once
     * the candidate (and optional safety) experiments finished and the verdict has
     * been computed and persisted server-side.
     * @param \Ondewo\Nlu\RunLlmEvaluationReleaseGateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationRunReleaseGate(\Ondewo\Nlu\RunLlmEvaluationReleaseGateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationRunReleaseGate',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Get a single release gate run (persisted verdict + checks) by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationReleaseGateRunRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetReleaseGateRun(\Ondewo\Nlu\GetLlmEvaluationReleaseGateRunRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetReleaseGateRun',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationReleaseGateRun', 'decode'],
        $metadata, $options);
    }

    /**
     * List release gate runs, optionally filtered + paginated.
     * @param \Ondewo\Nlu\ListLlmEvaluationReleaseGateRunsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListReleaseGateRuns(\Ondewo\Nlu\ListLlmEvaluationReleaseGateRunsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListReleaseGateRuns',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationReleaseGateRunsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion release gates
     *
     * region scorecards
     *
     * Create a new scorecard (weighted multi-criteria roll-up definition).
     * @param \Ondewo\Nlu\CreateLlmEvaluationScorecardRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationCreateScorecard(\Ondewo\Nlu\CreateLlmEvaluationScorecardRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationCreateScorecard',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationScorecard', 'decode'],
        $metadata, $options);
    }

    /**
     * Get a scorecard by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationScorecardRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetScorecard(\Ondewo\Nlu\GetLlmEvaluationScorecardRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetScorecard',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationScorecard', 'decode'],
        $metadata, $options);
    }

    /**
     * List scorecards in the project, optionally filtered + paginated.
     * @param \Ondewo\Nlu\ListLlmEvaluationScorecardsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListScorecards(\Ondewo\Nlu\ListLlmEvaluationScorecardsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListScorecards',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationScorecardsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update an existing scorecard.
     * @param \Ondewo\Nlu\UpdateLlmEvaluationScorecardRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationUpdateScorecard(\Ondewo\Nlu\UpdateLlmEvaluationScorecardRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationUpdateScorecard',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationScorecard', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete a scorecard.
     * @param \Ondewo\Nlu\DeleteLlmEvaluationScorecardRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationDeleteScorecard(\Ondewo\Nlu\DeleteLlmEvaluationScorecardRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationDeleteScorecard',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion scorecards
     *
     * region project settings
     *
     * Get the per-(project, language_code) evaluation settings singleton (judge
     * configuration, default weights, pass cutoffs). The server auto-creates
     * default settings on first access.
     * @param \Ondewo\Nlu\GetLlmEvaluationProjectSettingsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetProjectSettings(\Ondewo\Nlu\GetLlmEvaluationProjectSettingsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetProjectSettings',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationProjectSettings', 'decode'],
        $metadata, $options);
    }

    /**
     * Update the per-(project, language_code) evaluation settings singleton.
     * @param \Ondewo\Nlu\UpdateLlmEvaluationProjectSettingsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationUpdateProjectSettings(\Ondewo\Nlu\UpdateLlmEvaluationProjectSettingsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationUpdateProjectSettings',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationProjectSettings', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion project settings
     *
     * region evaluator registry
     *
     * List the evaluators available on this server, with metadata describing the
     * category, required example fields, multi-turn support, default threshold,
     * judge requirement and configurable parameters of each evaluator.
     * @param \Ondewo\Nlu\ListLlmEvaluationEvaluatorsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListEvaluators(\Ondewo\Nlu\ListLlmEvaluationEvaluatorsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListEvaluators',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationEvaluatorsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion evaluator registry
     *
     * region golden transcripts + simulation
     *
     * Convert a recorded session (or a selection of its session steps) into
     * evaluation examples ("golden transcripts") inside an existing dataset.
     * @param \Ondewo\Nlu\CreateLlmEvaluationExamplesFromSessionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationCreateExamplesFromSession(\Ondewo\Nlu\CreateLlmEvaluationExamplesFromSessionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationCreateExamplesFromSession',
        $argument,
        ['\Ondewo\Nlu\CreateLlmEvaluationExamplesFromSessionResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Generate synthetic multi-turn evaluation conversations by simulating users
     * (persona-driven; STANDARD kind) or attackers (red-teaming; ADVERSARIAL kind)
     * against the live target. Long-running operation: the returned Operation
     * resolves once the generated examples have been persisted into the receiving dataset.
     * @param \Ondewo\Nlu\SimulateLlmEvaluationConversationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationSimulateConversations(\Ondewo\Nlu\SimulateLlmEvaluationConversationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationSimulateConversations',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion golden transcripts + simulation
     *
     * region schedules
     *
     * Create a new schedule for recurring experiment / release gate runs.
     * @param \Ondewo\Nlu\CreateLlmEvaluationScheduleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationCreateSchedule(\Ondewo\Nlu\CreateLlmEvaluationScheduleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationCreateSchedule',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationSchedule', 'decode'],
        $metadata, $options);
    }

    /**
     * Get a schedule by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationScheduleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetSchedule(\Ondewo\Nlu\GetLlmEvaluationScheduleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetSchedule',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationSchedule', 'decode'],
        $metadata, $options);
    }

    /**
     * List schedules in the project, optionally filtered + paginated.
     * @param \Ondewo\Nlu\ListLlmEvaluationSchedulesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListSchedules(\Ondewo\Nlu\ListLlmEvaluationSchedulesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListSchedules',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationSchedulesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update an existing schedule (cron / interval, enabled flag, request template).
     * @param \Ondewo\Nlu\UpdateLlmEvaluationScheduleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationUpdateSchedule(\Ondewo\Nlu\UpdateLlmEvaluationScheduleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationUpdateSchedule',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationSchedule', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete a schedule. Experiments / gate runs already created by it are kept.
     * @param \Ondewo\Nlu\DeleteLlmEvaluationScheduleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationDeleteSchedule(\Ondewo\Nlu\DeleteLlmEvaluationScheduleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationDeleteSchedule',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion schedules
     *
     * region reports
     *
     * Persist a generated report as an immutable artifact (incl. payload bytes).
     * @param \Ondewo\Nlu\CreateLlmEvaluationReportRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationCreateReport(\Ondewo\Nlu\CreateLlmEvaluationReportRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationCreateReport',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationReport', 'decode'],
        $metadata, $options);
    }

    /**
     * Get a report by resource name (incl. payload bytes).
     * @param \Ondewo\Nlu\GetLlmEvaluationReportRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetReport(\Ondewo\Nlu\GetLlmEvaluationReportRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetReport',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationReport', 'decode'],
        $metadata, $options);
    }

    /**
     * List reports, optionally filtered + paginated. Payload bytes are omitted
     * unless explicitly requested via field_mask.
     * @param \Ondewo\Nlu\ListLlmEvaluationReportsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListReports(\Ondewo\Nlu\ListLlmEvaluationReportsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListReports',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationReportsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete a report.
     * @param \Ondewo\Nlu\DeleteLlmEvaluationReportRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationDeleteReport(\Ondewo\Nlu\DeleteLlmEvaluationReportRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationDeleteReport',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion reports
     *
     * region a/b experiments
     *
     * Create a new A/B experiment (a set of routing variants over live
     * DetectIntent traffic). Created in DRAFT status; traffic is only split once
     * it is started via LlmEvaluationStartAbExperiment.
     * @param \Ondewo\Nlu\CreateLlmEvaluationAbExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationCreateAbExperiment(\Ondewo\Nlu\CreateLlmEvaluationAbExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationCreateAbExperiment',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationAbExperiment', 'decode'],
        $metadata, $options);
    }

    /**
     * Get an A/B experiment by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationAbExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetAbExperiment(\Ondewo\Nlu\GetLlmEvaluationAbExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetAbExperiment',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationAbExperiment', 'decode'],
        $metadata, $options);
    }

    /**
     * List A/B experiments in the project, optionally filtered + paginated.
     * @param \Ondewo\Nlu\ListLlmEvaluationAbExperimentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListAbExperiments(\Ondewo\Nlu\ListLlmEvaluationAbExperimentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListAbExperiments',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationAbExperimentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update an existing A/B experiment (variants, traffic config, metadata).
     * Only allowed in DRAFT / STOPPED status; running experiments must be stopped first.
     * @param \Ondewo\Nlu\UpdateLlmEvaluationAbExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationUpdateAbExperiment(\Ondewo\Nlu\UpdateLlmEvaluationAbExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationUpdateAbExperiment',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationAbExperiment', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete an A/B experiment and all owned sticky-assignment rows.
     * @param \Ondewo\Nlu\DeleteLlmEvaluationAbExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationDeleteAbExperiment(\Ondewo\Nlu\DeleteLlmEvaluationAbExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationDeleteAbExperiment',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Start an A/B experiment: validates that the variant traffic weights are
     * well-formed (sum to the configured total), stamps started_at and transitions
     * the experiment to RUNNING so live traffic begins to be split.
     * @param \Ondewo\Nlu\StartLlmEvaluationAbExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationStartAbExperiment(\Ondewo\Nlu\StartLlmEvaluationAbExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationStartAbExperiment',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationAbExperiment', 'decode'],
        $metadata, $options);
    }

    /**
     * Stop a running A/B experiment: stamps stopped_at and transitions to STOPPED.
     * Existing sticky assignments are retained for results computation.
     * @param \Ondewo\Nlu\StopLlmEvaluationAbExperimentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationStopAbExperiment(\Ondewo\Nlu\StopLlmEvaluationAbExperimentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationStopAbExperiment',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationAbExperiment', 'decode'],
        $metadata, $options);
    }

    /**
     * Compute per-variant telemetry rollups for an A/B experiment. Stateless /
     * computed on demand: gathers each variant's sessions and aggregates their
     * LlmTelemetry into a per-variant LlmTelemetryReport. There is no auto-rollout.
     * @param \Ondewo\Nlu\GetLlmEvaluationAbExperimentResultsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetAbExperimentResults(\Ondewo\Nlu\GetLlmEvaluationAbExperimentResultsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetAbExperimentResults',
        $argument,
        ['\Ondewo\Nlu\GetLlmEvaluationAbExperimentResultsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion a/b experiments
     *
     * region a/b rollout
     *
     * Compute a rollout recommendation for an A/B experiment: which variant wins
     * against the control on the chosen optimize metric under the supplied
     * statistical guard-rails (confidence level, minimum sessions per variant,
     * minimum effect size). Stateless / read-only — computed on demand from the
     * per-variant results; nothing is persisted and no traffic / config changes.
     * @param \Ondewo\Nlu\GetLlmEvaluationAbRolloutRecommendationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetAbRolloutRecommendation(\Ondewo\Nlu\GetLlmEvaluationAbRolloutRecommendationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetAbRolloutRecommendation',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationAbRolloutRecommendation', 'decode'],
        $metadata, $options);
    }

    /**
     * Apply a rollout for an A/B experiment: promotes the chosen variant's config
     * as the project's classifier default, stops the experiment, and writes +
     * returns the LlmEvaluationAbRolloutDecision audit record. The operator picks
     * the variant explicitly (there is no auto-rollout). Idempotent: re-applying
     * an already-rolled-out experiment returns the existing decision.
     * @param \Ondewo\Nlu\ApplyLlmEvaluationAbRolloutRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationApplyAbRollout(\Ondewo\Nlu\ApplyLlmEvaluationAbRolloutRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationApplyAbRollout',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationAbRolloutDecision', 'decode'],
        $metadata, $options);
    }

    /**
     * Get the applied rollout decision (audit record) by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationAbRolloutDecisionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetAbRolloutDecision(\Ondewo\Nlu\GetLlmEvaluationAbRolloutDecisionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetAbRolloutDecision',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationAbRolloutDecision', 'decode'],
        $metadata, $options);
    }

    /**
     * List applied rollout decisions in the project, optionally filtered (e.g. by
     * experiment) + paginated.
     * @param \Ondewo\Nlu\ListLlmEvaluationAbRolloutDecisionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListAbRolloutDecisions(\Ondewo\Nlu\ListLlmEvaluationAbRolloutDecisionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListAbRolloutDecisions',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationAbRolloutDecisionsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion a/b rollout
     *
     * region online evaluation
     *
     * Create a new online-evaluation config: a per-(project, language_code)
     * definition selecting a reference-free evaluator set + a sample rate. A
     * swarm-safe background worker samples already-persisted live session steps,
     * scores the recorded answer with these evaluators and enqueues failing steps
     * into the annotation queue.
     * @param \Ondewo\Nlu\CreateLlmEvaluationOnlineConfigRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationCreateOnlineConfig(\Ondewo\Nlu\CreateLlmEvaluationOnlineConfigRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationCreateOnlineConfig',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationOnlineConfig', 'decode'],
        $metadata, $options);
    }

    /**
     * Get an online-evaluation config by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationOnlineConfigRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetOnlineConfig(\Ondewo\Nlu\GetLlmEvaluationOnlineConfigRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetOnlineConfig',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationOnlineConfig', 'decode'],
        $metadata, $options);
    }

    /**
     * List online-evaluation configs in the project, optionally filtered + paginated.
     * @param \Ondewo\Nlu\ListLlmEvaluationOnlineConfigsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListOnlineConfigs(\Ondewo\Nlu\ListLlmEvaluationOnlineConfigsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListOnlineConfigs',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationOnlineConfigsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update an existing online-evaluation config (enabled flag, evaluator set,
     * sample rate, thresholds, session filter).
     * @param \Ondewo\Nlu\UpdateLlmEvaluationOnlineConfigRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationUpdateOnlineConfig(\Ondewo\Nlu\UpdateLlmEvaluationOnlineConfigRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationUpdateOnlineConfig',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationOnlineConfig', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete an online-evaluation config. Already-produced online results and
     * annotation-queue items are kept.
     * @param \Ondewo\Nlu\DeleteLlmEvaluationOnlineConfigRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationDeleteOnlineConfig(\Ondewo\Nlu\DeleteLlmEvaluationOnlineConfigRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationDeleteOnlineConfig',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion online evaluation
     *
     * region online results
     *
     * Get a single online-evaluation result (per scored session step) by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationOnlineResultRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetOnlineResult(\Ondewo\Nlu\GetLlmEvaluationOnlineResultRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetOnlineResult',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationOnlineResult', 'decode'],
        $metadata, $options);
    }

    /**
     * List online-evaluation results, optionally filtered by config / pass-state + paginated.
     * Read-only: result rows are produced by the online-evaluation worker (no Create RPC).
     * @param \Ondewo\Nlu\ListLlmEvaluationOnlineResultsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListOnlineResults(\Ondewo\Nlu\ListLlmEvaluationOnlineResultsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListOnlineResults',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationOnlineResultsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * endregion online results
     *
     * region annotation queue
     *
     * Get a single annotation-queue item by resource name.
     * @param \Ondewo\Nlu\GetLlmEvaluationAnnotationQueueItemRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationGetAnnotationQueueItem(\Ondewo\Nlu\GetLlmEvaluationAnnotationQueueItemRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationGetAnnotationQueueItem',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationAnnotationQueueItem', 'decode'],
        $metadata, $options);
    }

    /**
     * List annotation-queue items, optionally filtered by status / assignee + paginated.
     * Items are enqueued by the online-evaluation worker (no Create RPC).
     * @param \Ondewo\Nlu\ListLlmEvaluationAnnotationQueueItemsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationListAnnotationQueueItems(\Ondewo\Nlu\ListLlmEvaluationAnnotationQueueItemsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationListAnnotationQueueItems',
        $argument,
        ['\Ondewo\Nlu\ListLlmEvaluationAnnotationQueueItemsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update an annotation-queue item (status / assignee / reason transitions:
     * PENDING -> REVIEWED / DISMISSED).
     * @param \Ondewo\Nlu\UpdateLlmEvaluationAnnotationQueueItemRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationUpdateAnnotationQueueItem(\Ondewo\Nlu\UpdateLlmEvaluationAnnotationQueueItemRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationUpdateAnnotationQueueItem',
        $argument,
        ['\Ondewo\Nlu\LlmEvaluationAnnotationQueueItem', 'decode'],
        $metadata, $options);
    }

    /**
     * Promote an annotation-queue item into a regression dataset. Thin server-side
     * composition: delegates to LlmEvaluationCreateExamplesFromSession with the
     * item's session (+ selected steps), flips the item status to PROMOTED and
     * stamps the promoted dataset name. Returns the created example(s).
     * @param \Ondewo\Nlu\PromoteLlmEvaluationAnnotationQueueItemRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function LlmEvaluationPromoteAnnotationQueueItem(\Ondewo\Nlu\PromoteLlmEvaluationAnnotationQueueItemRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.LlmEvaluations/LlmEvaluationPromoteAnnotationQueueItem',
        $argument,
        ['\Ondewo\Nlu\PromoteLlmEvaluationAnnotationQueueItemResponse', 'decode'],
        $metadata, $options);
    }

}
