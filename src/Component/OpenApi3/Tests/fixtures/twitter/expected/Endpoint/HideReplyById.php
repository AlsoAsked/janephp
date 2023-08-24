<?php

namespace Jane\Component\OpenApi3\Tests\Expected\Endpoint;

class HideReplyById extends \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\BaseEndpoint implements \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\Endpoint
{
    protected $id;
    protected $accept;
    /**
     * Tweet ID in the path is that of the reply to hide.
     *
     * @param string $id The ID of the reply that you want to hide.
     * @param null|\Jane\Component\OpenApi3\Tests\Expected\Model\HideReplyRequest $requestBody 
     * @param array $accept Accept content header application/json|application/problem+json
     */
    public function __construct(string $id, ?\Jane\Component\OpenApi3\Tests\Expected\Model\HideReplyRequest $requestBody = null, array $accept = array())
    {
        $this->id = $id;
        $this->body = $requestBody;
        $this->accept = $accept;
    }
    use \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'PUT';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/labs/1/tweets/{id}/hidden');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Jane\Component\OpenApi3\Tests\Expected\Model\HideReplyRequest) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        if (empty($this->accept)) {
            return array('Accept' => array('application/json', 'application/problem+json'));
        }
        return $this->accept;
    }
    /**
     * {@inheritdoc}
     *
     *
     * @return null|\Jane\Component\OpenApi3\Tests\Expected\Model\HideReplyResponse|\Jane\Component\OpenApi3\Tests\Expected\Model\Error|\Jane\Component\OpenApi3\Tests\Expected\Model\GenericProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\InvalidRequestProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\ClientForbiddenProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\ResourceNotFoundProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\ResourceUnauthorizedProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\DisallowedResourceProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\UnsupportedAuthenticationProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\UsageCapExceededProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\ConnectionExceptionProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\ClientDisconnectedProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\OperationalDisconnectProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\RulesCapProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\InvalidRuleProblem
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\HideReplyResponse', 'json');
        }
        if (mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\Error', 'json');
        }
        if (mb_strpos($contentType, 'application/problem+json') !== false) {
            $decoded = $serializer->decode($body, 'json');
            if (isset($decoded['type']) && $decoded['type'] === 'about:blank') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\GenericProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/invalid-request') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\InvalidRequestProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/client-forbidden') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\ClientForbiddenProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/resource-not-found') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\ResourceNotFoundProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/not-authorized-for-resource') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\ResourceUnauthorizedProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/disallowed-resource') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\DisallowedResourceProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/unsupported-authentication') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\UnsupportedAuthenticationProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/usage-capped') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\UsageCapExceededProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/streaming-connection') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\ConnectionExceptionProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/client-disconnected') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\ClientDisconnectedProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/operational-disconnect') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\OperationalDisconnectProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/rule-cap') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\RulesCapProblem');
            }
            if (isset($decoded['type']) && $decoded['type'] === 'https://api.twitter.com/labs/1/problems/invalid-rules') {
                return $serializer->denormalize($decoded, 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\InvalidRuleProblem');
            }
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}