<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\HttpClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use SilverSite\BaseLinker\Model\Configuration;

final class GuzzleHttpClientAdapter implements HttpClientAdapterInterface
{
    public const REQUEST_POST = 'POST';

    private ClientInterface $httpClient;
    private Configuration $configuration;

    public function __construct(ClientInterface $client, Configuration $configuration)
    {
        $this->httpClient = $client;
        $this->configuration = $configuration;
    }

    /**
     * @throws GuzzleException
     */
    public function post(string $method, array $parameters = []): string
    {
        $response = $this->httpClient->request(
            self::REQUEST_POST,
            $this->configuration->getApiUri(),
            [
                'form_params' => [
                    'token' => $this->configuration->token,
                    'method' => $method,
                    'parameters' => json_encode($parameters, JSON_THROW_ON_ERROR, 512),
                ],
            ]
        );

        return $response->getBody()->getContents();
    }
}
