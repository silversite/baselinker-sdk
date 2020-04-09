<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Model;

final class Storage
{
    public string $id;
    public string $name;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
