<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2021 ONDEWO GmbH
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
namespace Ondewo\Vtsi;

/**
 * <p>ONDEWO VTSI API</p>
 * <p>Manages the IVR MENUS of a VTSI project: keypad (DTMF) menus that a caller dialling one of the project&apos;s
 * inbound phone numbers goes through BEFORE a bot or a person takes the call (&quot;press 1 for sales, 2 for
 * billing&quot;). A menu is a graph of nodes (<code>IvrNode</code>): MENU (a prompt and one key), PLAY (a prompt),
 * SCHEDULE (opening hours), ROUTE (to a listener, the listener queue, a softphone account or a phone number),
 * GOTO_MENU (into another menu of the project) and HANGUP. The project&apos;s Asterisk executes a menu as generated
 * dialplan: a menu keeps running while VTSI is down, and no user text ever reaches the dialplan.</p>
 * <p>Lifecycle: <code>CreateIvrMenu</code> / <code>UpdateIvrMenu</code> save a DRAFT revision (every save is
 * validated; <code>ValidateIvrMenu</code> returns every issue at once). Nothing routes until
 * <code>PublishIvrMenu</code> renders a revision into the project&apos;s Asterisk and switches the menu&apos;s
 * <code>inbound_phone_numbers</code> to it; a failed publish leaves the previous published revision live. A caller
 * inside a menu during a publish finishes on the revision they entered. <code>TestIvrMenu</code> runs a scripted
 * test call through the published revision inside the Asterisk, and <code>GetIvrMenuTest</code> reports it.</p>
 * <p>A bot reached through a menu learns the path: the headers <code>X-ondewo-ivr-menu</code> (the menu&apos;s
 * display name, sanitized), <code>X-ondewo-ivr-path</code> (the option labels taken, e.g.
 * <code>main:1&gt;billing:2</code>) and <code>X-ondewo-dialed-number</code> become parameters of the bot&apos;s
 * SIP context, and the call records them in <code>Call.ivr_menu_display_name</code> / <code>Call.ivr_path</code>,
 * and the menu&apos;s resource name in <code>Call.ivr_menu_name</code>.
 * Labels therefore must never carry a secret.</p>
 * <p>Deployment switch: with <code>ONDEWO_VTSI_IVR_ACTIVE=false</code> (the default) every RPC of this service
 * answers <code>UNIMPLEMENTED</code> with <code>reason=ivr-disabled</code>. <code>VtsiProject.ivr_menus_enabled</code>
 * switches the routes of one project off, and <code>VtsiProject.feature_availability.ivr</code> says whether a project
 * can use IVR menus at all (a project whose Asterisk is not run by this server cannot: Publish is refused with
 * <code>FAILED_PRECONDITION</code> <code>reason=asterisk-not-local</code>).</p>
 * <p>Limits: <code>ONDEWO_VTSI_IVR_MAX_NODES</code> nodes per menu (100),
 * <code>ONDEWO_VTSI_IVR_MAX_MENUS_PER_PROJECT</code> menus (50), <code>ONDEWO_VTSI_IVR_MAX_PROMPT_BYTES</code> per uploaded prompt (1048576),
 * <code>ONDEWO_VTSI_IVR_MAX_PROMPTS_TOTAL_BYTES</code> per menu (52428800), <code>ONDEWO_VTSI_IVR_MAX_HOPS</code> node
 * entries per call across menus (50; the call is then hung up).</p>
 * <p>Every RPC about ONE menu accepts its resource name; Get and Delete also accept its display name, unique within a
 * project and resolved within <code>vtsi_project_name</code>, which is then REQUIRED.</p>
 * <p>Authorization (Keycloak auth mode <code>ENFORCE</code>, as Campaigns): <code>PROJECT_DEVELOPER</code> or higher
 * for Create, Update, Delete, Publish, Clone and Test; <code>PROJECT_EXECUTOR</code> or higher for Get, List,
 * Validate, ListRevisions, GetDialplan and GetIvrMenuTest. Every change emits its <code>VTSI_EVENT_IVR_MENU_*</code>
 * event; a request with <code>validate_only</code> emits nothing.</p>
 */
class IvrMenusClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * <p>Creates an IVR menu as a DRAFT (revision 1). Nothing routes until it is published.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> with the code and path of the FIRST error issue (see
     * <code>IvrMenuIssue</code>; <code>ValidateIvrMenu</code> returns all of them), a set output-only field, or a
     * malformed <code>idempotency_key</code>; <code>ALREADY_EXISTS</code> for a display name the project already has;
     * <code>RESOURCE_EXHAUSTED</code> beyond <code>ONDEWO_VTSI_IVR_MAX_MENUS_PER_PROJECT</code>;
     * <code>NOT_FOUND</code> for an unknown project.</p>
     * @param \Ondewo\Vtsi\CreateIvrMenuRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\IvrMenu>
     */
    public function CreateIvrMenu(\Ondewo\Vtsi\CreateIvrMenuRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/CreateIvrMenu',
        $argument,
        ['\Ondewo\Vtsi\IvrMenu', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Returns an IVR menu at its current revision.</p>
     * @param \Ondewo\Vtsi\GetIvrMenuRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\IvrMenu>
     */
    public function GetIvrMenu(\Ondewo\Vtsi\GetIvrMenuRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/GetIvrMenu',
        $argument,
        ['\Ondewo\Vtsi\IvrMenu', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Updates the fields named in <code>update_mask</code> and saves a new DRAFT revision (+1) when a graph field
     * changed. <code>layout</code> alone is saved without a new revision.</p>
     * <p>Errors: as <code>CreateIvrMenu</code>, plus <code>ABORTED</code> <code>reason=revision-mismatch</code> when
     * <code>expected_revision</code> is set and not the current revision.</p>
     * @param \Ondewo\Vtsi\UpdateIvrMenuRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\IvrMenu>
     */
    public function UpdateIvrMenu(\Ondewo\Vtsi\UpdateIvrMenuRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/UpdateIvrMenu',
        $argument,
        ['\Ondewo\Vtsi\IvrMenu', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Deletes an IVR menu and all its revisions; its bound phone numbers fall back to the project&apos;s routing
     * without a menu at once.</p>
     * <p>Errors: <code>FAILED_PRECONDITION</code> <code>reason=menu-published</code> for a PUBLISHED menu with bound
     * phone numbers unless <code>force</code>; <code>FAILED_PRECONDITION</code> <code>reason=menu-referenced</code>
     * while a GOTO_MENU node of another menu names it; <code>NOT_FOUND</code> for an unknown menu.</p>
     * @param \Ondewo\Vtsi\DeleteIvrMenuRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\DeleteIvrMenuResponse>
     */
    public function DeleteIvrMenu(\Ondewo\Vtsi\DeleteIvrMenuRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/DeleteIvrMenu',
        $argument,
        ['\Ondewo\Vtsi\DeleteIvrMenuResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Lists the IVR menus of a project.</p>
     * @param \Ondewo\Vtsi\ListIvrMenusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\ListIvrMenusResponse>
     */
    public function ListIvrMenus(\Ondewo\Vtsi\ListIvrMenusRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/ListIvrMenus',
        $argument,
        ['\Ondewo\Vtsi\ListIvrMenusResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Runs every check of Create, Update and Publish on the given draft and returns ALL issues with their node
     * paths. Writes nothing and emits nothing.</p>
     * @param \Ondewo\Vtsi\ValidateIvrMenuRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\ValidateIvrMenuResponse>
     */
    public function ValidateIvrMenu(\Ondewo\Vtsi\ValidateIvrMenuRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/ValidateIvrMenu',
        $argument,
        ['\Ondewo\Vtsi\ValidateIvrMenuResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Renders the given (or the current) revision into the project&apos;s Asterisk: prompts synthesized or copied,
     * the dialplan reloaded and read back, every prompt checked, and only then the bound phone numbers switched to
     * it. Any failure restores the previous dialplan, leaves the previous published revision live and answers the
     * menu with <code>IVR_MENU_STATE_PUBLISH_FAILED</code> and <code>state_message</code>. Re-validates first,
     * because the allowlist, the softphone accounts or the listeners may have changed since the save. Binding or
     * unbinding a phone number ends no call.</p>
     * <p>Errors: <code>INVALID_ARGUMENT</code> for an error issue; <code>ABORTED</code>
     * <code>reason=revision-mismatch</code> for a revision that is not current; <code>FAILED_PRECONDITION</code>
     * <code>reason=asterisk-not-local</code>, <code>reason=project-not-deployed</code> or
     * <code>reason=ivr-entry-hook-missing</code> (a project whose own dialplan lacks the IVR entry hook);
     * <code>FAILED_PRECONDITION</code> <code>reason=target-menu-not-published</code> when a GOTO_MENU node names a
     * menu that is not published.</p>
     * @param \Ondewo\Vtsi\PublishIvrMenuRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\IvrMenu>
     */
    public function PublishIvrMenu(\Ondewo\Vtsi\PublishIvrMenuRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/PublishIvrMenu',
        $argument,
        ['\Ondewo\Vtsi\IvrMenu', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Copies a menu (its current or a given revision) into a new DRAFT menu without phone numbers.</p>
     * @param \Ondewo\Vtsi\CloneIvrMenuRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\IvrMenu>
     */
    public function CloneIvrMenu(\Ondewo\Vtsi\CloneIvrMenuRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/CloneIvrMenu',
        $argument,
        ['\Ondewo\Vtsi\IvrMenu', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Lists the saved revisions of a menu, newest first.</p>
     * @param \Ondewo\Vtsi\ListIvrMenuRevisionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\ListIvrMenuRevisionsResponse>
     */
    public function ListIvrMenuRevisions(\Ondewo\Vtsi\ListIvrMenuRevisionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/ListIvrMenuRevisions',
        $argument,
        ['\Ondewo\Vtsi\ListIvrMenuRevisionsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Starts a test call through the PUBLISHED revision of a menu and returns at once with the test in
     * <code>IVR_MENU_TEST_STATE_RUNNING</code>; poll <code>GetIvrMenuTest</code> for the result. The test call runs
     * INSIDE the project&apos;s Asterisk: a local channel enters the menu, presses the scripted keys and records the
     * nodes it passes. No SIP container, no bot and no NLU session take part, and every ROUTE node is a stub that
     * records the target and hangs up: a test NEVER dials a listener, a softphone or a phone number.</p>
     * <p>Errors: <code>FAILED_PRECONDITION</code> <code>reason=menu-not-published</code>,
     * <code>reason=asterisk-not-local</code> or <code>reason=project-not-deployed</code>;
     * <code>INVALID_ARGUMENT</code> for invalid steps or a <code>max_duration_s</code> above
     * <code>ONDEWO_VTSI_IVR_TEST_MAX_DURATION_S</code>.</p>
     * @param \Ondewo\Vtsi\TestIvrMenuRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\IvrMenuTest>
     */
    public function TestIvrMenu(\Ondewo\Vtsi\TestIvrMenuRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/TestIvrMenu',
        $argument,
        ['\Ondewo\Vtsi\IvrMenuTest', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Returns a test started by <code>TestIvrMenu</code>: its state and the path traversed so far. A test is kept
     * for 24 hours after it finished, then <code>NOT_FOUND</code>.</p>
     * @param \Ondewo\Vtsi\GetIvrMenuTestRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\IvrMenuTest>
     */
    public function GetIvrMenuTest(\Ondewo\Vtsi\GetIvrMenuTestRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/GetIvrMenuTest',
        $argument,
        ['\Ondewo\Vtsi\IvrMenuTest', 'decode'],
        $metadata, $options);
    }

    /**
     * <p>Returns the rendered dialplan of one revision, read-only, for support.</p>
     * <p>Errors: <code>FAILED_PRECONDITION</code> <code>reason=revision-not-rendered</code> for a revision that is no
     * longer (or was never) in the project&apos;s Asterisk.</p>
     * @param \Ondewo\Vtsi\GetIvrMenuDialplanRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall<\Ondewo\Vtsi\GetIvrMenuDialplanResponse>
     */
    public function GetIvrMenuDialplan(\Ondewo\Vtsi\GetIvrMenuDialplanRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ondewo.vtsi.IvrMenus/GetIvrMenuDialplan',
        $argument,
        ['\Ondewo\Vtsi\GetIvrMenuDialplanResponse', 'decode'],
        $metadata, $options);
    }

}
