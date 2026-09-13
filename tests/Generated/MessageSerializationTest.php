<?php

declare(strict_types=1);

namespace Ondewo\Vtsi\Tests\Generated;

use Google\Protobuf\Timestamp;
use Ondewo\Nlu\Agent;
use Ondewo\Nlu\AgentStatus;
use Ondewo\Nlu\AgentView;
use Ondewo\Nlu\ListAgentsRequest;
use Ondewo\Nlu\RagUpdateDatasetRequest;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

/**
 * Wire-level exercise of the generated messages. These are the assertions that catch a broken
 * generator: a field that is declared but never written, a presence field that silently drops its
 * zero value, an enum whose zero constant moved.
 *
 * PRODUCT-SPECIFIC: the messages below come from the ondewo-nlu-api protos that ondewo-vtsi-api
 * vendors and this client therefore ships. Replicating this suite to another ONDEWO client means
 * swapping them for that api's own messages.
 */
final class MessageSerializationTest extends TestCase
{
    public function testAMessageSurvivesABinaryRoundTrip(): void
    {
        $agent = new Agent();
        $agent->setParent('projects/6b2c8e5a/agent');
        $agent->setDisplayName('ondewo-test-agent');
        $agent->setDefaultLanguageCode('de');
        $agent->setSupportedLanguageCodes(['en', 'fr']);
        $agent->setTimeZone('Europe/Vienna');
        $agent->setStatus(AgentStatus::INACTIVE);
        $agent->setCreatedAt(new Timestamp(['seconds' => 1700000000, 'nanos' => 123]));

        $bytes = $agent->serializeToString();
        self::assertNotSame('', $bytes, 'a populated message serialised to zero bytes');

        $parsed = new Agent();
        $parsed->mergeFromString($bytes);

        self::assertSame('projects/6b2c8e5a/agent', $parsed->getParent());
        self::assertSame('ondewo-test-agent', $parsed->getDisplayName());
        self::assertSame('de', $parsed->getDefaultLanguageCode());
        self::assertSame(['en', 'fr'], iterator_to_array($parsed->getSupportedLanguageCodes()));
        self::assertSame('Europe/Vienna', $parsed->getTimeZone());
        self::assertSame(AgentStatus::INACTIVE, $parsed->getStatus());

        self::assertTrue($parsed->hasCreatedAt());
        self::assertSame(1700000000, $parsed->getCreatedAt()->getSeconds());
        self::assertSame(123, $parsed->getCreatedAt()->getNanos());

        // Byte-for-byte stability, which field-by-field getters alone would not prove.
        self::assertSame($bytes, $parsed->serializeToString());
    }

    public function testAnUnsetSubMessageStaysUnset(): void
    {
        $agent = new Agent();
        $agent->setDisplayName('no-timestamps');

        self::assertFalse($agent->hasCreatedAt());
        self::assertNull($agent->getCreatedAt());

        $agent->setCreatedAt(new Timestamp(['seconds' => 1]));
        self::assertTrue($agent->hasCreatedAt());

        $agent->clearCreatedAt();
        self::assertFalse($agent->hasCreatedAt());
    }

    public function testAProto3OptionalFieldKeepsItsZeroValueOnTheWire(): void
    {
        // The failure this guards against is the one that bit the Angular target: an explicit
        // presence field whose ZERO value is indistinguishable from "unset" and is therefore
        // never written, so a client cannot clear a string or send `0`.
        $request = new RagUpdateDatasetRequest();
        $request->setDatasetId('dataset-1');
        $request->setDescription('');
        $request->setPagerank(0);

        self::assertTrue($request->hasDescription());
        self::assertTrue($request->hasPagerank());

        $parsed = new RagUpdateDatasetRequest();
        $parsed->mergeFromString($request->serializeToString());

        self::assertTrue($parsed->hasDescription(), 'an explicitly set empty string was dropped on the wire');
        self::assertSame('', $parsed->getDescription());
        self::assertTrue($parsed->hasPagerank(), 'an explicitly set 0 was dropped on the wire');
        self::assertSame(0, $parsed->getPagerank());

        // ... and an untouched presence field must stay absent.
        $untouched = new RagUpdateDatasetRequest();
        self::assertFalse($untouched->hasDescription());
        $reparsed = new RagUpdateDatasetRequest();
        $reparsed->mergeFromString($untouched->serializeToString());
        self::assertFalse($reparsed->hasDescription());
    }

    public function testAMessageSurvivesAJsonRoundTrip(): void
    {
        $request = new ListAgentsRequest();
        $request->setPageToken('page-2');
        $request->setAgentView(AgentView::AGENT_VIEW_FULL);

        $json = $request->serializeToJsonString();
        self::assertJson($json);

        $parsed = new ListAgentsRequest();
        $parsed->mergeFromJsonString($json);

        self::assertSame('page-2', $parsed->getPageToken());
        self::assertSame(AgentView::AGENT_VIEW_FULL, $parsed->getAgentView());
    }

    public function testTheEnumZeroValueIsTheUnspecifiedMember(): void
    {
        self::assertSame(0, AgentView::AGENT_VIEW_UNSPECIFIED);
        self::assertSame('AGENT_VIEW_UNSPECIFIED', AgentView::name(AgentView::AGENT_VIEW_UNSPECIFIED));
        self::assertSame(AgentView::AGENT_VIEW_FULL, AgentView::value('AGENT_VIEW_FULL'));

        // The zero value must be requestable, i.e. it must be the DEFAULT of a field typed by it.
        self::assertSame(AgentView::AGENT_VIEW_UNSPECIFIED, (new ListAgentsRequest())->getAgentView());
    }

    public function testAnUnknownEnumMemberIsRejected(): void
    {
        $this->expectException(UnexpectedValueException::class);

        AgentView::name(4242);
    }
}
