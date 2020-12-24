<?php

namespace Jane\Component\JsonSchemaRuntime\Tests\Normalizer;

use Jane\Component\JsonSchemaRuntime\Normalizer\ReferenceNormalizer;
use Jane\Component\JsonSchemaRuntime\Reference;
use PHPUnit\Framework\TestCase;

class ReferenceNormalizerTest extends TestCase
{
    /** @var ReferenceNormalizer */
    private $referenceNormalizer;

    protected function setUp(): void
    {
        $this->referenceNormalizer = new ReferenceNormalizer();
    }

    public function testSupports(): void
    {
        $this->assertFalse($this->referenceNormalizer->supportsNormalization('toto'));
        $this->assertTrue($this->referenceNormalizer->supportsNormalization(new Reference('reference', 'schema')));
    }

    /**
     * @dataProvider normalizeProvider
     */
    public function testNormalize($referenceString): void
    {
        $reference = new Reference($referenceString, 'schema');
        $normalized = $this->referenceNormalizer->normalize($reference);

        $this->assertEquals($referenceString, $normalized['$ref']);
    }

    public function normalizeProvider(): array
    {
        return [
            ['#pointer'],
            ['#'],
            ['https://my-site/schema#pointer'],
            ['my-site.com/teest'],
        ];
    }
}
