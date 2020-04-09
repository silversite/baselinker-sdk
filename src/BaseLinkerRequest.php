<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker;

use SilverSite\BaseLinker\HttpClient\HttpClientAdapterInterface;
use Symfony\Component\Serializer\SerializerInterface;

class BaseLinkerRequest implements BaseLinkerRequestInterface
{
    private HttpClientAdapterInterface $requestAdapter;

    private SerializerInterface $serializer;

    public function __construct(HttpClientAdapterInterface $requestAdapter, SerializerInterface $serializer)
    {
        $this->requestAdapter = $requestAdapter;
        $this->serializer = $serializer;
    }

    public function post(string $modelClass, string $method, array $parameters = []): object
    {
        $response = $this->requestAdapter->post($method, $parameters);

        return $this->serializer->deserialize($response, $modelClass, 'json');
    }
}
