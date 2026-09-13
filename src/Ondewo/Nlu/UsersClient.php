<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2020-2025 ONDEWO GmbH
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
 * gRPC service for managing users and server roles.
 */
class UsersClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Creates a user.
     * @param \Ondewo\Nlu\CreateUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateUser(\Ondewo\Nlu\CreateUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/CreateUser',
        $argument,
        ['\Ondewo\Nlu\User', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves a user by identifier.
     * @param \Ondewo\Nlu\GetUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetUser(\Ondewo\Nlu\GetUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/GetUser',
        $argument,
        ['\Ondewo\Nlu\User', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves user information by identifier.
     * @param \Ondewo\Nlu\GetUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetUserInfo(\Ondewo\Nlu\GetUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/GetUserInfo',
        $argument,
        ['\Ondewo\Nlu\UserInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes a user by identifier.
     * @param \Ondewo\Nlu\GetUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteUser(\Ondewo\Nlu\GetUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/DeleteUser',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates a user.
     * @param \Ondewo\Nlu\UpdateUserRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateUser(\Ondewo\Nlu\UpdateUserRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/UpdateUser',
        $argument,
        ['\Ondewo\Nlu\User', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists users.
     * @param \Ondewo\Nlu\ListUsersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListUsers(\Ondewo\Nlu\ListUsersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/ListUsers',
        $argument,
        ['\Ondewo\Nlu\ListUsersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists user information.
     * @param \Ondewo\Nlu\ListUsersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListUserInfos(\Ondewo\Nlu\ListUsersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/ListUserInfos',
        $argument,
        ['\Ondewo\Nlu\ListUserInfosResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a server role.
     * @param \Ondewo\Nlu\CreateServerRoleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateServerRole(\Ondewo\Nlu\CreateServerRoleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/CreateServerRole',
        $argument,
        ['\Ondewo\Nlu\ServerRole', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves a server role by ID.
     * @param \Ondewo\Nlu\GetServerRoleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetServerRole(\Ondewo\Nlu\GetServerRoleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/GetServerRole',
        $argument,
        ['\Ondewo\Nlu\ServerRole', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes a server role by ID.
     * @param \Ondewo\Nlu\DeleteServerRoleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteServerRole(\Ondewo\Nlu\DeleteServerRoleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/DeleteServerRole',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates a server role.
     * @param \Ondewo\Nlu\UpdateServerRoleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateServerRole(\Ondewo\Nlu\UpdateServerRoleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/UpdateServerRole',
        $argument,
        ['\Ondewo\Nlu\ServerRole', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists server roles.
     * @param \Ondewo\Nlu\ListServerRolesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListServerRoles(\Ondewo\Nlu\ListServerRolesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/ListServerRoles',
        $argument,
        ['\Ondewo\Nlu\ListServerRolesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists server permissions.
     * @param \Ondewo\Nlu\ListServerPermissionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListServerPermissions(\Ondewo\Nlu\ListServerPermissionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/ListServerPermissions',
        $argument,
        ['\Ondewo\Nlu\ListServerPermissionsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Checks login.
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CheckLogin(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/CheckLogin',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists notifications based on specified filters.
     * @param \Ondewo\Nlu\ListNotificationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ListNotifications(\Ondewo\Nlu\ListNotificationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/ListNotifications',
        $argument,
        ['\Ondewo\Nlu\ListNotificationsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Sets the flagged status for multiple notifications.
     * @param \Ondewo\Nlu\SetNotificationsFlaggedStatusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SetNotificationsFlaggedStatus(\Ondewo\Nlu\SetNotificationsFlaggedStatusRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/SetNotificationsFlaggedStatus',
        $argument,
        ['\Ondewo\Nlu\ListNotificationsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Sets the read status for multiple notifications.
     * @param \Ondewo\Nlu\SetNotificationsReadStatusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SetNotificationsReadStatus(\Ondewo\Nlu\SetNotificationsReadStatusRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/SetNotificationsReadStatus',
        $argument,
        ['\Ondewo\Nlu\ListNotificationsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Adds one or more notifications.
     * @param \Ondewo\Nlu\AddNotificationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function AddNotifications(\Ondewo\Nlu\AddNotificationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/AddNotifications',
        $argument,
        ['\Ondewo\Nlu\AddNotificationsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves a single notification by its resource name.
     * @param \Ondewo\Nlu\GetNotificationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetNotification(\Ondewo\Nlu\GetNotificationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/GetNotification',
        $argument,
        ['\Ondewo\Nlu\Notification', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates a single notification, applying only the fields named in the update mask.
     * @param \Ondewo\Nlu\UpdateNotificationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateNotification(\Ondewo\Nlu\UpdateNotificationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/UpdateNotification',
        $argument,
        ['\Ondewo\Nlu\Notification', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes one or more notifications by their resource names.
     * @param \Ondewo\Nlu\DeleteNotificationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteNotifications(\Ondewo\Nlu\DeleteNotificationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/DeleteNotifications',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Streams notifications for the authenticated caller in real time: each newly-added notification that
     * matches the request filter is pushed to the client as it is created (backed server-side by a
     * Postgres LISTEN/NOTIFY channel). The stream stays open until the client disconnects. When
     * <code>include_existing</code> is set the currently-stored matching notifications are replayed first
     * (newest last) before switching to the live tail.
     * @param \Ondewo\Nlu\StreamNotificationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function StreamNotifications(\Ondewo\Nlu\StreamNotificationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/ondewo.nlu.Users/StreamNotifications',
        $argument,
        ['\Ondewo\Nlu\Notification', 'decode'],
        $metadata, $options);
    }

    /**
     * Retrieves user preferences based on the provided request.
     * @param \Ondewo\Nlu\GetUserPreferencesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetUserPreferences(\Ondewo\Nlu\GetUserPreferencesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/GetUserPreferences',
        $argument,
        ['\Ondewo\Nlu\GetUserPreferencesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Sets or updates user preferences based on the provided request.
     * @param \Ondewo\Nlu\SetUserPreferencesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SetUserPreferences(\Ondewo\Nlu\SetUserPreferencesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/SetUserPreferences',
        $argument,
        ['\Ondewo\Nlu\SetUserPreferencesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes specific user preferences based on the provided request.
     * @param \Ondewo\Nlu\DeleteUserPreferencesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteUserPreferences(\Ondewo\Nlu\DeleteUserPreferencesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/DeleteUserPreferences',
        $argument,
        ['\Ondewo\Nlu\DeleteUserPreferencesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes all user preferences for a specific user, optionally filtered by a substring.
     * @param \Ondewo\Nlu\DeleteAllUserPreferencesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeleteAllUserPreferences(\Ondewo\Nlu\DeleteAllUserPreferencesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.nlu.Users/DeleteAllUserPreferences',
        $argument,
        ['\Ondewo\Nlu\DeleteUserPreferencesResponse', 'decode'],
        $metadata, $options);
    }

}
