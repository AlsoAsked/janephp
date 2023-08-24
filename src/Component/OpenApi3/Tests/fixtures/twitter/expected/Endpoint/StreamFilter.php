<?php

namespace Jane\Component\OpenApi3\Tests\Expected\Endpoint;

class StreamFilter extends \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\BaseEndpoint implements \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\Endpoint
{
    protected $accept;
    /**
     * Streams tweets matching a user's active rule set.
     *
     * @param array $queryParameters {
     *     @var array $expansions A comma-separated list of tweet expansions.
     * }
     * @param array $accept Accept content header application/json|application/problem+json
     */
    public function __construct(array $queryParameters = array(), array $accept = array())
    {
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }
    use \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/labs/1/tweets/stream/filter';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        if (empty($this->accept)) {
            return array('Accept' => array('application/json', 'application/problem+json'));
        }
        return $this->accept;
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('expansions'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('expansions', array('array'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     *
     * @return null|\Jane\Component\OpenApi3\Tests\Expected\Model\Error|\Jane\Component\OpenApi3\Tests\Expected\Model\GenericProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\InvalidRequestProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\ClientForbiddenProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\ResourceNotFoundProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\ResourceUnauthorizedProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\DisallowedResourceProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\UnsupportedAuthenticationProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\UsageCapExceededProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\ConnectionExceptionProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\ClientDisconnectedProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\OperationalDisconnectProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\RulesCapProblem|\Jane\Component\OpenApi3\Tests\Expected\Model\InvalidRuleProblem
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
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