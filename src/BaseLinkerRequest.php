<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker;

use SilverSite\BaseLinker\Exception\RequestError;
use SilverSite\BaseLinker\HttpClient\HttpClientAdapterInterface;
use Symfony\Component\Serializer\SerializerInterface;

final class BaseLinkerRequest implements BaseLinkerRequestInterface
{
    private HttpClientAdapterInterface $requestAdapter;

    private SerializerInterface $serializer;

    public function __construct(HttpClientAdapterInterface $requestAdapter, SerializerInterface $serializer)
    {
        $this->requestAdapter = $requestAdapter;
        $this->serializer = $serializer;
    }

    /**
     * @throws RequestError
     */
    public function post(string $modelClass, string $method, array $parameters = []): object
    {
        $response = $this->requestAdapter->post($method, $parameters);

        $result = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        if ('ERROR' === $result['status']) {
            throw new RequestError(sprintf('%s: %s', $result['error_code'], $result['error_message']));
        }

        return $this->serializer->deserialize($response, $modelClass, 'json');
    }
}
