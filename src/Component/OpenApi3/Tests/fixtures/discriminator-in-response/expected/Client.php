<?php

namespace Jane\Component\OpenApi3\Tests\Expected;

class Client extends \Jane\Component\OpenApi3\Tests\Expected\Runtime\Client\Client
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Exception\GetObjectsNoMappingBadRequestException
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Exception\GetObjectsNoMappingNotFoundException
     *
     * @return null|\Jane\Component\OpenApi3\Tests\Expected\Model\ObjectOne|\Jane\Component\OpenApi3\Tests\Expected\Model\ObjectTwo|\Psr\Http\Message\ResponseInterface
     */
    public function getObjectsNoMapping(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Jane\Component\OpenApi3\Tests\Expected\Endpoint\GetObjectsNoMapping(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Exception\GetObjectsWithMappingBadRequestException
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Exception\GetObjectsWithMappingNotFoundException
     *
     * @return null|\Jane\Component\OpenApi3\Tests\Expected\Model\ObjectOne|\Jane\Component\OpenApi3\Tests\Expected\Model\ObjectTwo|\Psr\Http\Message\ResponseInterface
     */
    public function getObjectsWithMapping(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Jane\Component\OpenApi3\Tests\Expected\Endpoint\GetObjectsWithMapping(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Exception\GetObjectsWithAnyOfBadRequestException
     * @throws \Jane\Component\OpenApi3\Tests\Expected\Exception\GetObjectsWithAnyOfNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function getObjectsWithAnyOf(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Jane\Component\OpenApi3\Tests\Expected\Endpoint\GetObjectsWithAnyOf(), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array(), array $additionalNormalizers = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Jane\Component\OpenApi3\Tests\Expected\Normalizer\JaneObjectNormalizer());
        if (count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}