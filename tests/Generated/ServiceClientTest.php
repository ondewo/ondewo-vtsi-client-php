<?php

declare(strict_types=1);

namespace Ondewo\Vtsi\Tests\Generated;

use Grpc\BaseStub;
use Grpc\ChannelCredentials;
use Ondewo\Nlu\SessionsClient;
use Ondewo\Vtsi\Auth\BearerTokenAuthenticator;
use Ondewo\Vtsi\CallsClient;
use Ondewo\Vtsi\CampaignsClient;
use Ondewo\Vtsi\EventsClient;
use Ondewo\Vtsi\SoftphonesClient;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;

/**
 * Constructs the generated service stubs against a dummy target. gRPC channels connect lazily, so
 * nothing here touches the network - but the stub, its channel options and its method surface are
 * all real.
 *
 * PRODUCT-SPECIFIC: the service and method names below come from ondewo-vtsi-api (the
 * `StreamingDetectIntent` case from the NLU protos it vendors).
 */
final class ServiceClientTest extends TestCase
{
    private const DUMMY_TARGET = 'localhost:50051';

    /**
     * @var list<BaseStub>
     */
    private array $openClients = [];

    protected function tearDown(): void
    {
        foreach ($this->openClients as $client) {
            $client->close();
        }
        $this->openClients = [];

        parent::tearDown();
    }

    public function testAServiceClientIsConstructedAgainstAnInsecureChannel(): void
    {
        $client = $this->open(new CallsClient(self::DUMMY_TARGET, [
            'credentials' => ChannelCredentials::createInsecure(),
        ]));

        self::assertInstanceOf(BaseStub::class, $client);
        // Contains, not equals: gRPC canonicalises the target (`dns:///localhost:50051`) in some
        // core versions.
        self::assertStringContainsString(self::DUMMY_TARGET, $client->getTarget());
    }

    public function testAServiceClientAcceptsTheHandWrittenBearerAuthenticator(): void
    {
        $authenticator = new BearerTokenAuthenticator('a-token');

        // The point of the hand-written auth surface: its output IS a valid `$opts` array for a
        // generated stub. \Grpc\BaseStub rejects a missing `credentials` key and a non-callable
        // `update_metadata`, so constructing successfully proves both.
        $client = $this->open(new CallsClient(self::DUMMY_TARGET, $authenticator->channelOptions()));

        self::assertStringContainsString(self::DUMMY_TARGET, $client->getTarget());
    }

    /**
     * @param class-string<BaseStub> $client
     */
    #[DataProvider('vtsiServiceClients')]
    public function testEveryVtsiServiceClientIsConstructedAgainstAnInsecureChannel(string $client): void
    {
        $stub = $this->open(new $client(self::DUMMY_TARGET, [
            'credentials' => ChannelCredentials::createInsecure(),
        ]));

        self::assertInstanceOf(BaseStub::class, $stub);
        self::assertStringContainsString(self::DUMMY_TARGET, $stub->getTarget());
    }

    /**
     * The services of ondewo-vtsi-api 9.0.0 that ondewo-vtsi-api 8.7.0 did not have.
     *
     * @return iterable<string, array{class-string<BaseStub>}>
     */
    public static function vtsiServiceClients(): iterable
    {
        yield 'Campaigns' => [CampaignsClient::class];
        yield 'Events' => [EventsClient::class];
        yield 'Softphones' => [SoftphonesClient::class];
    }

    /**
     * @param class-string<BaseStub> $client
     */
    #[DataProvider('unaryMethods')]
    public function testTheExpectedUnaryMethodsExist(string $client, string $method): void
    {
        self::assertTrue(
            method_exists($client, $method),
            $client . '::' . $method . '() is missing from the generated stub'
        );

        $reflected = new ReflectionMethod($client, $method);
        self::assertTrue($reflected->isPublic());
        // <request message>, array $metadata = [], array $options = []
        self::assertSame(3, $reflected->getNumberOfParameters());
        self::assertSame(1, $reflected->getNumberOfRequiredParameters());
    }

    /**
     * Unary RPCs of `ondewo.vtsi.Calls` (the service that starts, stops and lists the callers,
     * listeners and calls a VTSI project runs), `ondewo.vtsi.Campaigns`, `ondewo.vtsi.Events` and
     * `ondewo.vtsi.Softphones`.
     *
     * @return iterable<string, array{class-string<BaseStub>, string}>
     */
    public static function unaryMethods(): iterable
    {
        foreach (self::UNARY_METHODS as $client => $methods) {
            foreach ($methods as $method) {
                yield $method => [$client, $method];
            }
        }
    }

    /**
     * @var array<class-string<BaseStub>, list<string>>
     */
    private const UNARY_METHODS = [
        CallsClient::class => [
            'StartCaller',
            'StartCallers',
            'ListCallers',
            'GetCaller',
            'DeleteCaller',
            'StopCaller',
            'StartListener',
            'StopListener',
            'ListListeners',
            'GetListener',
            'StartScheduledCaller',
            'CancelScheduledCaller',
            'StopCall',
            'StopAllCalls',
            'TransferCall',
            'GetCall',
            'ListCalls',
            'AddCallersToCampaign',
            'AddScheduledCallersToCampaign',
            'InviteToCall',
            'RemoveCallParticipant',
            'SetCallMediaControl',
        ],
        CampaignsClient::class => [
            'CreateCampaign',
            'GetCampaign',
            'UpdateCampaign',
            'DeleteCampaign',
            'ListCampaigns',
            'GetCampaignStatistics',
            'ListCampaignCalls',
            'StartCampaign',
            'StopCampaign',
            'HardStopCampaign',
            'ResumeCampaign',
        ],
        EventsClient::class => [
            'CreateVtsiEventSubscription',
            'GetVtsiEventSubscription',
            'UpdateVtsiEventSubscription',
            'DeleteVtsiEventSubscription',
            'ListVtsiEventSubscriptions',
            'CreateWebhook',
            'GetWebhook',
            'UpdateWebhook',
            'DeleteWebhook',
            'ListWebhooks',
            'TestWebhook',
        ],
        SoftphonesClient::class => [
            'CreateSoftphoneAccount',
            'GetSoftphoneAccount',
            'UpdateSoftphoneAccount',
            'DeleteSoftphoneAccount',
            'ListSoftphoneAccounts',
            'RotateSoftphoneCredentials',
            'ListSoftphoneCertificates',
            'GetSoftphoneCertificate',
            'RevokeSoftphoneCertificate',
            'GetSoftphoneProvisioning',
        ],
    ];

    /**
     * @param class-string<BaseStub> $client
     */
    #[DataProvider('serverStreamingMethods')]
    public function testTheExpectedServerStreamingMethodsExist(string $client, string $method): void
    {
        self::assertTrue(
            method_exists($client, $method),
            $client . '::' . $method . '() is missing from the generated stub'
        );

        $reflected = new ReflectionMethod($client, $method);
        self::assertTrue($reflected->isPublic());
        // A server stream still takes its single request message, unlike a bidi one.
        self::assertSame(3, $reflected->getNumberOfParameters());
        self::assertSame(1, $reflected->getNumberOfRequiredParameters());
    }

    /**
     * @return iterable<string, array{class-string<BaseStub>, string}>
     */
    public static function serverStreamingMethods(): iterable
    {
        yield 'StreamCallerStatus' => [CallsClient::class, 'StreamCallerStatus'];
        yield 'StreamListenerStatus' => [CallsClient::class, 'StreamListenerStatus'];
        yield 'StreamScheduledCallerStatus' => [CallsClient::class, 'StreamScheduledCallerStatus'];
        yield 'ListenCallAudio' => [CallsClient::class, 'ListenCallAudio'];
        yield 'StreamCampaignStatus' => [CampaignsClient::class, 'StreamCampaignStatus'];
        yield 'SubscribeVtsiEvents' => [EventsClient::class, 'SubscribeVtsiEvents'];
    }

    public function testTheCallAudioStreamIsBidirectional(): void
    {
        self::assertTrue(method_exists(CallsClient::class, 'StreamCallAudio'));

        $reflected = new ReflectionMethod(CallsClient::class, 'StreamCallAudio');
        // A bidi stream takes no request message - only $metadata and $options.
        self::assertSame(2, $reflected->getNumberOfParameters());
        self::assertSame(0, $reflected->getNumberOfRequiredParameters());
    }

    public function testABidirectionalStreamingMethodIsGenerated(): void
    {
        self::assertTrue(method_exists(SessionsClient::class, 'StreamingDetectIntent'));

        $reflected = new ReflectionMethod(SessionsClient::class, 'StreamingDetectIntent');
        // A bidi stream takes no request message - only $metadata and $options.
        self::assertSame(0, $reflected->getNumberOfRequiredParameters());
    }

    public function testTheGeneratedMethodSurfaceIsNotEmpty(): void
    {
        $methods = get_class_methods(CallsClient::class);

        self::assertContains('StartCaller', $methods);
        self::assertGreaterThan(
            20,
            count($methods),
            'CallsClient exposes suspiciously few methods - the service proto may not have been compiled'
        );
    }

    private function open(BaseStub $client): BaseStub
    {
        $this->openClients[] = $client;

        return $client;
    }
}
