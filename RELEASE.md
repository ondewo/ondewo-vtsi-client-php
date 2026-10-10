# Release History

*****************

## Release ONDEWO VTSI PHP Client 9.0.0

### Breaking Changes

* Tracking API Version [9.0.0](https://github.com/ondewo/ondewo-vtsi-api/releases/tag/9.0.0) ( [Documentation](https://ondewo.github.io/ondewo-vtsi-api/) ),
  a major release that is binary wire-compatible in both directions but source-breaking:
  * `AsteriskConfigsFiles.sip_conf_file_string` is renamed to `pjsip_conf_file_string` (same field number and type).
    **Migration:** replace `getSipConfFileString()` / `setSipConfFileString()` with `getPjsipConfFileString()` /
    `setPjsipConfFileString()`, the `sip_conf_file_string` key of a constructor `$data` array with
    `pjsip_conf_file_string`, and the JSON key `sipConfFileString` with `pjsipConfFileString`.
  * Eleven singular scalars of `ondewo/vtsi/calls.proto` gained explicit presence (`optional`):
    `InterruptionHandlingConfig.transcribe_on_disabled_interruptions`,
    `TurnDetectionConfig.turn_detection_system_prompt` / `turn_detection_user_prompt`,
    `AudioObjectStorageConfig.activate_audio_object_storage`,
    `AudioObjectStorageServicesActivationConfig.activate_s2t` / `activate_t2s`,
    `MessageBrokerConfig.activate_message_broker` and
    `MessageBrokerServicesActivationConfig.activate_s2t` / `activate_nlu` / `activate_t2s` / `activate_sip`.
    Their getters and setters are unchanged; each now also has `has...()` / `clear...()`. **Migration:** a value set
    explicitly to its default (`false`, `""`) is now sent on the wire and read by the server as an explicit value;
    call `clear...()` (or do not set it) to leave it unset.

### New Features

* New service clients, each a generated `<Service>Client` like the existing ones (use them with
  `Ondewo\Vtsi\Auth\ClientConfig` / `BearerTokenAuthenticator` exactly as `CallsClient`):
  * `Ondewo\Vtsi\CampaignsClient` (`ondewo.vtsi.Campaigns`, `campaigns.proto`): campaign CRUD, start / stop /
    hard stop / resume, statistics, campaign calls and the server stream `StreamCampaignStatus`.
  * `Ondewo\Vtsi\EventsClient` (`ondewo.vtsi.Events`, `events.proto`): VTSI event subscriptions, webhooks
    (incl. `TestWebhook`) and the server stream `SubscribeVtsiEvents`.
  * `Ondewo\Vtsi\SoftphonesClient` (`ondewo.vtsi.Softphones`, `softphones.proto`, marked unreleased / in development
    in the API): softphone accounts, credential rotation, certificates and provisioning (10 RPCs).
* New `Calls` RPCs: `AddCallersToCampaign`, `AddScheduledCallersToCampaign`, the status streams
  `StreamCallerStatus` / `StreamListenerStatus` / `StreamScheduledCallerStatus`, call control `InviteToCall`,
  `RemoveCallParticipant`, `SetCallMediaControl`, live call audio `StreamCallAudio` (bidirectional) and
  `ListenCallAudio` (server stream); idempotency keys on the five batch-creating `Calls` requests; typed transfers
  (`TransferCallRequest.target` / `mode` / `headers` / `ring_timeout_s`, `TransferCallResponse.outcome`).
* Answering machine detection for pooled persistent callers (`AnsweringMachineDetectionConfig`, `AmdAction`,
  `AmdSensitivity`) and the `Call` fields `redial_recommended`, `redial_reason`,
  `answering_machine_detection_end_description`, `media_control`, `participants`, `last_transfer`, `sip_call_id`.
* `AsteriskConfigsVariables`: `sip_trunk_transport`, `sip_trunk_source_cidr`, `sip_trunk_ca_certificates_pem`,
  `sip_trunk_verify_server` and `softphone_permit_cidrs`; `VtsiProject.transfer_phone_number_allowlist`.
* The vendored `ondewo/sip` protos move to [ondewo-sip-api 5.5.0](https://github.com/ondewo/ondewo-sip-api/releases/tag/5.5.0);
  the shipped `Ondewo\Sip` stubs are identical to those of `ondewo/sip-client-php` 5.5.0, so install that version
  next to this one. The vendored NLU, S2T and T2S protos are unchanged.

### Improvements

* Proto compiler pinned to [5.15.5](https://github.com/ondewo/ondewo-proto-compiler/releases/tag/5.15.5).

### Tests

* `tests/Generated/GeneratedCodeTest.php` expects `CampaignsClient`, `EventsClient` and `SoftphonesClient`.
* `tests/Generated/ServiceClientTest.php` constructs each new service client and checks every unary RPC of the new
  services and the new `Calls` RPCs, the six server streams and the bidirectional `StreamCallAudio`.
* `tests/Generated/MessageSerializationTest.php` covers the `pjsip_conf_file_string` rename and an explicit `false` on
  a scalar that gained presence.

*****************

## Release ONDEWO VTSI PHP Client 8.7.1

### Improvements

* Tracking API Version [8.7.0](https://github.com/ondewo/ondewo-vtsi-api/releases/tag/8.7.0) ( [Documentation](https://ondewo.github.io/ondewo-vtsi-api/) )
* New `Ondewo\Vtsi\Auth\ClientConfig` (hand-written, in `auth/`) builds the target and the `$opts` of every
  generated `<Service>Client` for plaintext, TLS and mutual TLS, with the same rules as the other ONDEWO SDKs:
  * `grpcCert`, `grpcClientCert` and `grpcClientKey` take PEM **content**, never a file path; CRLF PEMs work. An
    empty `grpcCert` means the platform's default trust store.
  * `grpcClientCert` / `grpcClientKey` are both-or-neither: half a pair throws `InvalidArgumentException` when the
    config is built and again in `channelCredentials()`, before anything reaches ext-grpc (grpc-core aborts the
    process on a key without its certificate).
  * `useSecureChannel: false` with a client identity throws instead of silently dropping it; a plaintext channel
    logs a warning naming `host:port` on a PSR-3 logger if given, otherwise through `error_log()`.
  * `channelOptions()` refuses a `credentials` option of its own; every other option is passed through.
  * Exception messages name the field and `host:port`, never a PEM or the config. `(string)`, `var_dump()` /
    `print_r()` and `json_encode()` show a non-empty `grpcClientKey` as `***REDACTED***`; `serialize()`,
    `var_export()` and `(array)` are not redacted (documented). The key parameter is `#[\SensitiveParameter]`.
  * `target()` brackets a bare IPv6 literal (`[::1]:50051`) and leaves `[...]` / `scheme:` hosts alone.
  * `ClientConfig::DEFAULT_CHANNEL_OPTIONS` matches ondewo-client-utils-python: message size 2³¹-1 both ways,
    keepalive 30 s with `max_pings_without_data` 2 and no pings without calls, keepalive and HTTP/2 ping timeout
    20 s, reconnect backoff capped at 5 s. Documented gap: no per-method retry policy, only gRPC's transparent
    retries.
* `composer.json` suggests `psr/log` for the insecure-channel warning.
* README section "TLS, mutual TLS and certificates": modes, an openssl test PKI, security notes and troubleshooting.
* `make publish` / the release workflow: Packagist's `202 Accepted` counts as success, and the HTTP-code check no
  longer runs in a separate shell with an empty code (a comment inside the continued shell block split it), which
  failed every publish.
* Proto compiler pinned to [5.15.2](https://github.com/ondewo/ondewo-proto-compiler/releases/tag/5.15.2).
* `make check_build` (run by `make release` before its first push) camel-cases hyphenated proto names
  (`speech-to-text.proto` -> `SpeechToText.php`) instead of failing on them.

### Tests

* `tests/Auth/ClientConfigTest.php` covers `ClientConfig` (100% coverage of `auth/`).
* `tests/Tls/MutualTlsHandshakeTest.php`: real handshakes with a PKI generated at test time (ext-openssl) against a
  python grpcio server: TLS, mutual TLS, CRLF PEMs and `[::1]` connect; a missing or foreign client certificate, a
  wrong CA and the system roots against the test CA fail as `UNAVAILABLE`. CI installs grpcio 1.82.1.
* `tests/ReleaseNotesTest.php` pins the `RELEASE.md` heading and `*****` separator the GitHub release-notes slice
  relies on.

*****************

## Release ONDEWO VTSI PHP Client 8.7.0

### New Features

* Initial release of the ONDEWO VTSI (Virtual Telephony Server Interface) gRPC client for PHP. The whole
  client surface is generated from the [ondewo-vtsi-api](https://github.com/ondewo/ondewo-vtsi-api) protocol
  buffer definitions by the `ondewo-php-proto-compiler` image of
  [ondewo-proto-compiler 5.15.1](https://github.com/ondewo/ondewo-proto-compiler/releases/tag/5.15.1),
  which is vendored as a git submodule and pinned to that tag: protoc's built-in `--php_out` for the messages
  and enums, `grpc_php_plugin` for the `<Service>Client` stubs, and a composer package whose optimized
  classmap autoloader is built and verified inside the image.
* The generated stubs are **committed** under `src/` — 1124 files. VTSI drives whole telephony conversations,
  so its api vendors the NLU, QA, S2T, SIP and T2S protos and this package therefore ships 23 service clients:
  `Ondewo\Vtsi\CallsClient`, `Ondewo\Vtsi\ProjectsClient`, `Ondewo\Vtsi\LogsClient`, the 16
  `Ondewo\Nlu\*Client` stubs, `Ondewo\Qa\QAClient`, `Ondewo\S2t\Speech2TextClient`, `Ondewo\Sip\SipClient`
  and `Ondewo\T2s\Text2SpeechClient`, together with their messages, enums and the non-well-known `google/*`
  protos they import. Packagist serves the tree of a git tag verbatim and composer has no build step, so stubs
  that are not committed do not exist for anybody who installs the package.
* Ships as the composer package `ondewo/vtsi-client-php`, installable with
  `composer require ondewo/vtsi-client-php`. Requires PHP >= 8.1 and the `grpc` PHP extension, which every
  generated `<Service>Client` needs because it extends `\Grpc\BaseStub`, and — for the JSON wire format only —
  `ext-bcmath`.
* Hand-written sources live in `auth/` at the repository root, never in the compiler-owned `src/`.
  `Ondewo\Vtsi\Auth\BearerTokenAuthenticator` turns a token into the `$opts` array a generated stub is
  constructed with and stamps `authorization: Bearer <token>` onto the metadata of every call. The namespace
  is VTSI's own rather than a shared `Ondewo\Auth`, so installing this client next to another ONDEWO PHP
  client cannot collide.
* `make build` reproduces the stubs end to end — pinned submodules, compiler image, generation, ownership
  hand-back and version propagation into `composer.json`.

### Testing

* A real PHPUnit suite under `tests/` exercises the generated code rather than asserting around it: every
  committed class is loaded through the autoloader, `initOnce()` is called on every one of the 29
  `GPBMetadata` descriptors (so a missing transitive import fails CI rather than a consumer's first RPC),
  messages are round-tripped through the binary and JSON wire formats, `proto3 optional` fields are asserted
  to keep their zero values on the wire, enum zero constants are pinned, and the service stubs are constructed
  against a dummy channel and checked for the RPC methods and arities the api declares — including the only
  streaming RPC this client ships, the vendored `ondewo.nlu.Sessions.StreamingDetectIntent`.
* `make coverage` measures the hand-written sources (`phpunit.xml.dist`'s `<source>` is `auth/`) and fails the
  build below 100% line coverage. Generated code is excluded from that metric and covered by the tests above.
* GitHub Actions runs `composer validate`, `php -l`, the suite and the coverage gate on PHP 8.1 and 8.4
  against the committed stubs — no docker image is built and no submodule is checked out there. No step is
  guarded by a directory check, so a tree without code goes red instead of reporting success.
* The job installs `ext-bcmath` alongside `ext-grpc`: `google/protobuf` only *suggests* bcmath, but its
  pure-PHP JSON parser range-checks every integer with `bccomp()`, so `mergeFromJsonString()` on a message
  with an int field dies without it. The suite covers that path explicitly.
* The dev tool chain (PHPUnit, the coverage gate) lives in its own composer project under `tools/`. It is
  deliberately **not** `require-dev` in the root manifest: `composer update --no-dev` still resolves dev
  requirements, and the compiler image resolves the merged manifest with the network disabled, so one
  `require-dev` entry would break `make generate_ondewo_protos`.

### Publishing

* Published to [Packagist](https://packagist.org/packages/ondewo/vtsi-client-php) as `ondewo/vtsi-client-php`.
  Packagist accepts no upload — it serves the tree of a git tag — so `make publish` validates the package and
  then pings `https://packagist.org/api/update-package` with `PACKAGIST_USERNAME` + `PACKAGIST_API_TOKEN` to
  have the new tag crawled. It is wired into `make release` after `push_to_gh`, and
  `make run_release_with_devops` reads both credentials from `account_packagist.env` in the
  `ondewo-devops-accounts` repository. The package still has to be **submitted once by hand**; see README
  "Publishing to Packagist".
* `make packagist_dry_run` is the credential-free half of that path and runs in CI on every push:
  `composer validate`, `composer validate --strict` with the three deliberate warnings enumerated (the
  `version` field and the two exact `google/protobuf` / `grpc/grpc` pins — anything new fails the build), the
  agreement between `ONDEWO_VTSI_VERSION`, `composer.json`, `RELEASE.md` and the git tag, and the exact update
  payload the real publish POSTs.
* `.github/workflows/release.yml` runs on a bare `X.Y.Z` tag push, re-runs the dry run and the full test
  suite against the tagged tree and only then publishes, using GitHub secrets. A missing secret fails its
  first step with an explicit `::error::` instead of posting an unauthenticated request.

*****************
