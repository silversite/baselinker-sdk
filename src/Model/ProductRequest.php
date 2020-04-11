<?php

declare(strict_types=1);

namespace SilverSite\BaseLinker\Model;

final class ProductRequest implements RequestInterface
{
    public string $storageId;
    public int $categoryId;
    public string $sku;
    public string $name;
    public int $quantity = 0;
    public float $priceGross;
    public float $priceWholesaleNet;
    public int $taxRate;
    public string $description;
    public ?float $weight = null;
    /**
     * @var ImageRequest[]
     */
    public array $images = [];
    public array $features = [];
    public ?string $descriptionExtra1 = null;
    public ?string $descriptionExtra2 = null;
    public ?string $producerName = null;
    public ?int $productId = null;
    public ?string $ean = null;

    public function jsonSerialize(): array
    {
        return [
            'storage_id' => $this->storageId,
            'product_id' => $this->productId,
            'ean' => $this->ean,
            'sku' => $this->sku,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price_brutto' => $this->priceGross,
            'price_wholesale_netto' => $this->priceWholesaleNet,
            'tax_rate' => $this->taxRate,
            'weight' => $this->weight,
            'description' => $this->description,
            'description_extra1' => $this->descriptionExtra1,
            'description_extra2' => $this->descriptionExtra2,
            'man_name' => $this->producerName,
            'category_id' => $this->categoryId,
            'images' => $this->images,
            'features' => $this->features,
        ];
    }
}
