<?php

namespace Jane\Component\OpenApi3\Tests\Expected\Exception;

class GetObjectsNoMappingNotFoundException extends NotFoundException
{
    /**
     * @var \Jane\Component\OpenApi3\Tests\Expected\Model\ResponseError
     */
    private $responseError;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Jane\Component\OpenApi3\Tests\Expected\Model\ResponseError $responseError, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('not found');
        $this->responseError = $responseError;
        $this->response = $response;
    }
    public function getResponseError() : \Jane\Component\OpenApi3\Tests\Expected\Model\ResponseError
    {
        return $this->responseError;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}