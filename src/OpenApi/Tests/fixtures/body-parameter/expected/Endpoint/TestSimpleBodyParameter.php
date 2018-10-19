<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\OpenApi\Tests\Expected\Endpoint;

class TestSimpleBodyParameter extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7HttplugEndpoint
{
    /**
     * @param string|resource|\Psr\Http\Message\StreamInterface $requestBody
     */
    public function __construct($requestBody)
    {
        $this->body = $requestBody;
    }

    use \Jane\OpenApiRuntime\Client\Psr7HttplugEndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/test-simple';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, \Http\Message\StreamFactory $streamFactory = null): array
    {
        if (is_string($this->body) or is_resource($this->body) or $this->body instanceof \Psr\Http\Message\StreamInterface) {
            return [['Content-Type' => ['text/plain']], $this->body];
        }

        return [[], null];
    }

    /**
     * {@inheritdoc}
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return null;
        }
    }
}
