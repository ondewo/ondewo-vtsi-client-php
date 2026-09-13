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
// File-level comment for <code>ondewo/nlu/rag.proto</code>.
// This file contains a single service <a href="#ondewo.nlu.Rags">Rags</a>. The Rags service provides RAG (Retrieval-Augmented Generation) and web crawler functionality.
// Fields marked as <code>optional</code> carry explicit presence, so that an explicitly set default value (<code>0</code>, <code>false</code>, <code>""</code>) can be distinguished from a field that was never set. Without the <code>optional</code> keyword it would for instance not be possible to distinguish between an integer <code>0</code> and <code>null</code>.
// The marker is applied where that distinction is actually consumed — the partial-update inputs (an unset field leaves the stored value untouched, an explicit default clears it) and the retrieval overrides that are forwarded to RAGFlow (an explicit <code>0.0</code> or <code>false</code> must override the server-side default rather than fall back to it). Fields that carry no such distinction are deliberately left without the keyword, and for message-typed fields it is omitted because proto3 gives them explicit presence anyway.
namespace Ondewo\Nlu;

/**
 * Provides RAG and web crawler endpoints.
 * Most of the RAG related endpoints largely mirror <a href="https://github.com/ondewo/ragflow">RAGFlow's</a> HTTP API endpoints. For more information on RAGFlow refer to the <a href="https://ragflow.io/docs/dev/">official documentation</a>
 */
class RagsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * ===========================================
     * Dataset Management
     * REST: /api/v1/datasets
     * ===========================================
     *
     * RAGFlow endpoint: POST /api/v1/datasets
     *
     * Create a new dataset (knowledge base).<br>
     * @param \Ondewo\Nlu\RagCreateDatasetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagCreateDataset(\Ondewo\Nlu\RagCreateDatasetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagCreateDataset',
        $argument,
        ['\Ondewo\Nlu\RagDataset', 'decode'],
        $metadata, $options);
    }

    /**
     * RAGFlow endpoint: PUT /api/v1/datasets/<dataset_id>
     *
     * Update an existing dataset's configuration.<br>
     * @param \Ondewo\Nlu\RagUpdateDatasetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagUpdateDataset(\Ondewo\Nlu\RagUpdateDatasetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagUpdateDataset',
        $argument,
        ['\Ondewo\Nlu\RagDataset', 'decode'],
        $metadata, $options);
    }

    /**
     * RAGFlow endpoint: DELETE /api/v1/datasets
     *
     * Delete one or more datasets (batch operation).<br>
     * If ids is null or empty, deletes all user's datasets.<br>
     * Deletes all associated documents, files, and chunks.
     * @param \Ondewo\Nlu\RagDeleteRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagDeleteDatasets(\Ondewo\Nlu\RagDeleteRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagDeleteDatasets',
        $argument,
        ['\Ondewo\Nlu\RagPartialSuccess', 'decode'],
        $metadata, $options);
    }

    /**
     * RAGFlow endpoint: GET /api/v1/datasets
     *
     * List datasets with pagination and filtering.<br>
     * Returns datasets from all tenants the user has access to.
     * @param \Ondewo\Nlu\RagListDatasetsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagListDatasets(\Ondewo\Nlu\RagListDatasetsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagListDatasets',
        $argument,
        ['\Ondewo\Nlu\RagDatasetList', 'decode'],
        $metadata, $options);
    }

    /**
     * ========================================================================
     * Document Management
     * REST: /api/v1/datasets/<dataset_id>/documents
     * ========================================================================
     *
     * RAGFlow endpoint: POST /api/v1/datasets/<dataset_id>/documents
     *
     * Uploads a document to a dataset and starts parsing it.<br>
     * If the <code>run</code> field of the returned document is not <code>RAG_DOCUMENT_STATUS_RUNNING</code> this indicates a failure to start parsing the document.
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ClientStreamingCall
     */
    public function RagUploadDocument($metadata = [], $options = []) {
        return $this->_clientStreamRequest('/ondewo.nlu.Rags/RagUploadDocument',
        ['\Ondewo\Nlu\RagDocument','decode'],
        $metadata, $options);
    }

    /**
     * RAGFlow endpoint: PUT /api/v1/datasets/<dataset_id>/documents/<document_id>
     *
     * Update document metadata and configuration.<br>
     * If the chunk method is changed, the document is automatically re-parsed.<br>
     * If the <code>run</code> field of the returned document is not <code>RAG_DOCUMENT_STATUS_RUNNING</code> this indicates a failure to start parsing the document.
     * @param \Ondewo\Nlu\RagUpdateDocumentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagUpdateDocument(\Ondewo\Nlu\RagUpdateDocumentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagUpdateDocument',
        $argument,
        ['\Ondewo\Nlu\RagDocument', 'decode'],
        $metadata, $options);
    }

    /**
     * RAGFlow endpoint: GET /api/v1/datasets/<dataset_id>/documents/<document_id>
     *
     * Download the original document file.<br>
     * Returns binary file stream from storage.<br>
     * First chunk contains metadata, subsequent chunks only contain data.
     * @param \Ondewo\Nlu\RagDownloadDocumentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function RagDownloadDocument(\Ondewo\Nlu\RagDownloadDocumentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.nlu.Rags/RagDownloadDocument',
        $argument,
        ['\Ondewo\Nlu\RagFileChunk', 'decode'],
        $metadata, $options);
    }

    /**
     * RAGFlow endpoint: GET /api/v1/datasets/<dataset_id>/documents
     *
     * List documents in a dataset with pagination and filtering.<br>
     * Supports time range filtering and keyword search.
     * @param \Ondewo\Nlu\RagListDocumentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagListDocuments(\Ondewo\Nlu\RagListDocumentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagListDocuments',
        $argument,
        ['\Ondewo\Nlu\RagDocumentList', 'decode'],
        $metadata, $options);
    }

    /**
     * RAGFlow endpoint: DELETE /api/v1/datasets/<dataset_id>/documents
     *
     * Delete one or more documents from a dataset (batch operation).<br>
     * If ids empty, deletes all documents. Removes chunks and storage files.
     * @param \Ondewo\Nlu\RagDeleteDocumentsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagDeleteDocuments(\Ondewo\Nlu\RagDeleteDocumentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagDeleteDocuments',
        $argument,
        ['\Ondewo\Nlu\RagPartialSuccess', 'decode'],
        $metadata, $options);
    }

    /**
     * ========================================================================
     * Chunk Management
     * REST: /api/v1/datasets/<dataset_id>/chunks, /api/v1/datasets/<dataset_id>/documents/<document_id>/chunks, /api/v1/retrieval
     * ========================================================================
     *
     * RAGFlow endpoint: POST /api/v1/retrieval
     *
     * Retrieve chunks using vector similarity search.<br>
     * Supports reranking, metadata filtering, and knowledge graph retrieval.
     * @param \Ondewo\Nlu\RagRetrievalRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagRetrieval(\Ondewo\Nlu\RagRetrievalRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagRetrieval',
        $argument,
        ['\Ondewo\Nlu\RagRetrievalResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * RAGFlow endpoint: POST /api/v1/datasets/<dataset_id>/chunks
     *
     * Start parsing documents into chunks.<br>
     * Queues documents for background processing.
     * @param \Ondewo\Nlu\RagDocumentIdsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagParseDocuments(\Ondewo\Nlu\RagDocumentIdsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagParseDocuments',
        $argument,
        ['\Ondewo\Nlu\RagPartialSuccess', 'decode'],
        $metadata, $options);
    }

    /**
     * RAGFlow endpoint: DELETE /api/v1/datasets/<dataset_id>/chunks
     *
     * Stop parsing documents.
     * @param \Ondewo\Nlu\RagDocumentIdsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagStopParsing(\Ondewo\Nlu\RagDocumentIdsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagStopParsing',
        $argument,
        ['\Ondewo\Nlu\RagPartialSuccess', 'decode'],
        $metadata, $options);
    }

    /**
     * ========================================================================
     * Crawler
     * ========================================================================
     *
     * Create a rag crawler for a dataset of an agent.
     * @param \Ondewo\Nlu\RagCreateCrawlerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagCreateCrawler(\Ondewo\Nlu\RagCreateCrawlerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagCreateCrawler',
        $argument,
        ['\Ondewo\Nlu\RagCrawler', 'decode'],
        $metadata, $options);
    }

    /**
     * Get a rag crawler by resource name.
     * @param \Ondewo\Nlu\RagGetCrawlerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagGetCrawler(\Ondewo\Nlu\RagGetCrawlerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagGetCrawler',
        $argument,
        ['\Ondewo\Nlu\RagCrawler', 'decode'],
        $metadata, $options);
    }

    /**
     * List rag crawlers of a dataset for the specified agent.
     * @param \Ondewo\Nlu\RagListCrawlersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagListCrawlers(\Ondewo\Nlu\RagListCrawlersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagListCrawlers',
        $argument,
        ['\Ondewo\Nlu\RagListCrawlersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update a rag crawler (partial update of configuration fields).
     * @param \Ondewo\Nlu\RagUpdateCrawlerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagUpdateCrawler(\Ondewo\Nlu\RagUpdateCrawlerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagUpdateCrawler',
        $argument,
        ['\Ondewo\Nlu\RagCrawler', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete a rag crawler of a dataset for the specified agent.
     * @param \Ondewo\Nlu\RagDeleteCrawlerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagDeleteCrawler(\Ondewo\Nlu\RagDeleteCrawlerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagDeleteCrawler',
        $argument,
        ['\Ondewo\Nlu\RagDeleteCrawlerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Run a crawler.
     * @param \Ondewo\Nlu\RagStartCrawlerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagStartCrawler(\Ondewo\Nlu\RagStartCrawlerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagStartCrawler',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Stop a pending or running crawler run.
     * @param \Ondewo\Nlu\RagStopCrawlerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagStopCrawler(\Ondewo\Nlu\RagStopCrawlerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagStopCrawler',
        $argument,
        ['\Ondewo\Nlu\RagStopCrawlerResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Get a crawler run by resource name.
     * @param \Ondewo\Nlu\RagGetCrawlerRunRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagGetCrawlerRun(\Ondewo\Nlu\RagGetCrawlerRunRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagGetCrawlerRun',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * List crawler runs for a crawler.
     * @param \Ondewo\Nlu\RagListCrawlerRunsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagListCrawlerRuns(\Ondewo\Nlu\RagListCrawlerRunsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagListCrawlerRuns',
        $argument,
        ['\Ondewo\Nlu\RagListCrawlerRunsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete crawler runs by explicit run names and/or crawler names.
     * @param \Ondewo\Nlu\RagDeleteCrawlerRunsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagDeleteCrawlerRuns(\Ondewo\Nlu\RagDeleteCrawlerRunsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagDeleteCrawlerRuns',
        $argument,
        ['\Ondewo\Nlu\RagDeleteCrawlerRunsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Get a single crawler result by crawler run resource name and URL.
     * @param \Ondewo\Nlu\RagGetCrawlerResultRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagGetCrawlerResult(\Ondewo\Nlu\RagGetCrawlerResultRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagGetCrawlerResult',
        $argument,
        ['\Ondewo\Nlu\RagCrawlerResult', 'decode'],
        $metadata, $options);
    }

    /**
     * Get crawler results by crawler run resource name.
     * @param \Ondewo\Nlu\RagGetCrawlerResultsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagGetCrawlerResults(\Ondewo\Nlu\RagGetCrawlerResultsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagGetCrawlerResults',
        $argument,
        ['\Ondewo\Nlu\RagGetCrawlerResultsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Add rag crawler output to one or more datasets.
     * @param \Ondewo\Nlu\RagAddCrawlerResultsToDatasetsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagAddCrawlerResultsToDatasets(\Ondewo\Nlu\RagAddCrawlerResultsToDatasetsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagAddCrawlerResultsToDatasets',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Remove previously imported crawler output from one or more datasets.
     * @param \Ondewo\Nlu\RagRemoveCrawlerResultsFromDatasetsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagRemoveCrawlerResultsFromDatasets(\Ondewo\Nlu\RagRemoveCrawlerResultsFromDatasetsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagRemoveCrawlerResultsFromDatasets',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Get datasets currently attached to a crawler.
     * @param \Ondewo\Nlu\RagGetCrawlerAttachedDatasetsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagGetCrawlerAttachedDatasets(\Ondewo\Nlu\RagGetCrawlerAttachedDatasetsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagGetCrawlerAttachedDatasets',
        $argument,
        ['\Ondewo\Nlu\RagGetCrawlerAttachedDatasetsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete multiple crawlers.
     * @param \Ondewo\Nlu\RagDeleteCrawlersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagDeleteCrawlers(\Ondewo\Nlu\RagDeleteCrawlersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagDeleteCrawlers',
        $argument,
        ['\Ondewo\Nlu\RagDeleteCrawlersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Get crawler run logs.
     * @param \Ondewo\Nlu\RagGetCrawlerRunLogsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RagGetCrawlerRunLogs(\Ondewo\Nlu\RagGetCrawlerRunLogsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Rags/RagGetCrawlerRunLogs',
        $argument,
        ['\Ondewo\Nlu\RagGetCrawlerRunLogsResponse', 'decode'],
        $metadata, $options);
    }

}
