<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Model;

final class ImageRequest implements RequestInterface
{
    public ?string $url = null;
    public ?string $data = null;

    public function jsonSerialize(): string
    {
        if (null !== $this->url) {
            return \sprintf('url:%s', $this->url);
        }

        return \sprintf('data:%s', $this->data);
    }
}
