<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Entity\LocalShop;

use Crehler\LocalShopsPlugin\Entity\LocalShopProduct\LocalShopProductCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Shopware\Core\Content\Product\ProductCollection;

class LocalShopEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $addressCity;

    /**
     * @var string|null
     */
    protected $addressZipCode;

    /**
     * @var string|null
     */
    protected $addressStreet;

    /**
     * @var string|null
     */
    protected $addressBuildingNumber;

    /**
     * @var string|null
     */
    protected $contactPhone;

    /**
     * @var ProductCollection|null
     */
    protected $products;

    /**
     * @var LocalShopProductCollection|null
     */
    protected $shopProducts;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getAddressCity(): ?string
    {
        return $this->addressCity;
    }

    /**
     * @param string $addressCity
     */
    public function setAddressCity(string $addressCity): void
    {
        $this->addressCity = $addressCity;
    }

    /**
     * @return string|null
     */
    public function getAddressZipCode(): ?string
    {
        return $this->addressZipCode;
    }

    /**
     * @param string $addressZipCode
     */
    public function setAddressZipCode(string $addressZipCode): void
    {
        $this->addressZipCode = $addressZipCode;
    }

    /**
     * @return string|null
     */
    public function getAddressStreet(): ?string
    {
        return $this->addressStreet;
    }

    /**
     * @param string $addressStreet
     */
    public function setAddressStreet(string $addressStreet): void
    {
        $this->addressStreet = $addressStreet;
    }

    /**
     * @return string|null
     */
    public function getAddressBuildingNumber(): ?string
    {
        return $this->addressBuildingNumber;
    }

    /**
     * @param string $addressBuildingNumber
     */
    public function setAddressBuildingNumber(string $addressBuildingNumber): void
    {
        $this->addressBuildingNumber = $addressBuildingNumber;
    }

    /**
     * @return string|null
     */
    public function getContactPhone(): ?string
    {
        return $this->contactPhone;
    }

    /**
     * @param string $contactPhone
     */
    public function setContactPhone(string $contactPhone): void
    {
        $this->contactPhone = $contactPhone;
    }

    /**
     * @return ProductCollection|null
     */
    public function getProducts(): ?ProductCollection
    {
        return $this->products;
    }

    /**
     * @param ProductCollection $products
     */
    public function setProducts(ProductCollection $products): void
    {
        $this->products = $products;
    }

    /**
     * @return LocalShopProductCollection|null
     */
    public function getShopProducts(): ?LocalShopProductCollection
    {
        return $this->shopProducts;
    }

    /**
     * @param LocalShopProductCollection|null $shopProducts
     */
    public function setShopProducts(?LocalShopProductCollection $shopProducts): void
    {
        $this->shopProducts = $shopProducts;
    }
}
