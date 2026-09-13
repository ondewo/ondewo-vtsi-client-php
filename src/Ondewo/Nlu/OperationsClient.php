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
 * Manages long-running operations with an API service.
 *
 * When an API method normally takes long time to complete, it can be designed to return <a href="index.html#ondewo.nlu.Operation">Operation</a> to the client, and the client can use this interface to receive the real response asynchronously by polling the operation resource, or pass the operation resource to another API (such as Google Cloud Pub/Sub API) to receive the response.  Any API service that returns long-running operations should implement the <code>Operations</code> interface so developers can have a consistent client experience.
 */
class OperationsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Lists operations that match the specified filter in the request. If the
     * server doesn&apos;t support this method, it returns <code>UNIMPLEMENTED</code>.
     * <br>
     * NOTE: the <code>name</code> binding below allows API services to override the binding
     * to use different resource name schemes, such as <code>users/&#42;/operations</code>.
     * @param \Ondewo\Nlu\ListOperationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListOperations(\Ondewo\Nlu\ListOperationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Operations/ListOperations',
        $argument,
        ['\Ondewo\Nlu\ListOperationsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Gets the latest state of a long-running operation.  Clients can use this
     * method to poll the operation result at intervals as recommended by the API
     * service.
     * @param \Ondewo\Nlu\GetOperationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetOperation(\Ondewo\Nlu\GetOperationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Operations/GetOperation',
        $argument,
        ['\Ondewo\Nlu\Operation', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes a long-running operation. This method indicates that the client is
     * no longer interested in the operation result. It does not cancel the
     * operation. If the server doesn&apos;t support this method, it returns
     * <code>google.rpc.Code.UNIMPLEMENTED</code>
     * @param \Ondewo\Nlu\DeleteOperationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteOperation(\Ondewo\Nlu\DeleteOperationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Operations/DeleteOperation',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Starts asynchronous cancellation on a long-running operation.  The server
     * makes a best effort to cancel the operation, but success is not
     * guaranteed.  If the server doesn&apos;t support this method, it returns
     * <code>google.rpc.Code.UNIMPLEMENTED</code>.  Clients can use
     * <a href="index.html#ondewo.nlu.Operations.GetOperation">Operations.GetOperation</a> or
     * other methods to verify whether the cancellation succeeded or whether the
     * operation completed despite cancellation. On successful cancellation,
     * the operation is not deleted; instead, it becomes an operation with
     * an <a href="index.html#ondewo.nlu.Operation">Operation.error</a> value with a <a href="https://developers.google.com/actions-center/reference/grpc-api/status_codes">google.rpc.Status.code</a>
     * of 1, corresponding to <code>Code.CANCELLED</code>.
     * @param \Ondewo\Nlu\CancelOperationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CancelOperation(\Ondewo\Nlu\CancelOperationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Operations/CancelOperation',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Streams the live container logs of a remote-operation container (LLM evaluation, simulation,
     * crawl, training) as they are produced, in the manner of <code>docker logs --follow</code>.
     * The stream stays open until the container exits or the client disconnects. Each message is a
     * single parsed log line. Secrets in the log text are redacted server-side before streaming.
     * @param \Ondewo\Nlu\StreamRemoteOperationContainerLogsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function StreamRemoteOperationContainerLogs(\Ondewo\Nlu\StreamRemoteOperationContainerLogsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.nlu.Operations/StreamRemoteOperationContainerLogs',
        $argument,
        ['\Ondewo\Nlu\RemoteOperationContainerLogLine', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a bounded, filtered snapshot of a remote-operation container&apos;s logs. Supports a
     * time window (<code>start_time</code> / <code>end_time</code>), a minimum loguru log level,
     * a regular-expression match on the message, and a cap on the number of returned lines. Secrets
     * in the log text are redacted server-side before the response is returned.
     * @param \Ondewo\Nlu\GetRemoteOperationContainerLogsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetRemoteOperationContainerLogs(\Ondewo\Nlu\GetRemoteOperationContainerLogsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Operations/GetRemoteOperationContainerLogs',
        $argument,
        ['\Ondewo\Nlu\GetRemoteOperationContainerLogsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns the health and lifecycle status of a remote-operation container: whether it still
     * exists, whether it is running/exited, its exit code, OOM-kill flag and Docker health status.
     * @param \Ondewo\Nlu\GetRemoteOperationContainerStatusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetRemoteOperationContainerStatus(\Ondewo\Nlu\GetRemoteOperationContainerStatusRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Operations/GetRemoteOperationContainerStatus',
        $argument,
        ['\Ondewo\Nlu\RemoteOperationContainerStatus', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists every docker container that a remote operation started (a single operation may run several
     * containers sequentially, e.g. hardware-check, GPU pre-allocation, build-cache and one training
     * container per algorithm). When <code>include_sub_operations</code> is set, the containers of the
     * operation&apos;s sub-operations are included as well. Each entry carries the container id + name,
     * its host, lifecycle state and whether logs are still available (live or persisted).
     * @param \Ondewo\Nlu\ListRemoteOperationContainersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListRemoteOperationContainers(\Ondewo\Nlu\ListRemoteOperationContainersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Operations/ListRemoteOperationContainers',
        $argument,
        ['\Ondewo\Nlu\ListRemoteOperationContainersResponse', 'decode'],
        $metadata, $options);
    }

}
