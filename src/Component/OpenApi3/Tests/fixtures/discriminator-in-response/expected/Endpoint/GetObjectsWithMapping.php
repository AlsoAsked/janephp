<?php

namespace Jane\Component\OpenApi3\Tests\Expected\Endpoint;

class GetObjectsWithMapping extends \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\BaseEndpoint implements \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\Endpoint
{
    use \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/objects-with-mapping';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Exception\GetObjectsWithMappingBadRequestException
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Exception\GetObjectsWithMappingNotFoundException
     *
     * @return null|\Jane\Component\OpenApi3\Tests\Expected\Model\ObjectOne|\Jane\Component\OpenApi3\Tests\Expected\Model\ObjectTwo
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            $decoded = $serializer->decode($body, 'json');
            if (isset($decoded['type']) && $decoded['type'] === 'obj1') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\ObjectOne');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'obj2') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\ObjectTwo');
            }
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Jane\Component\OpenApi3\Tests\Expected\Exception\GetObjectsWithMappingBadRequestException($serializer->deserialize($body, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\ResponseError', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Jane\Component\OpenApi3\Tests\Expected\Exception\GetObjectsWithMappingNotFoundException($serializer->deserialize($body, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\ResponseError', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}