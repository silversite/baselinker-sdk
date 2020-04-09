<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Model;

final class Configuration
{
    public const API_URL = 'https://api.baselinker.com/connector.php';

    public string $token;

    public ?string $password;

    public function __construct(string $token, ?string $password = null)
    {
        $this->token = $token;
        $this->password = $password;
    }

    public function getApiUri(): string
    {
        return self::API_URL;
    }
}
