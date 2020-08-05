<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Entity\LocalShopProduct;

use Crehler\LocalShopsPlugin\Entity\LocalShop\LocalShopEntity;
use Shopware\Core\Content\Product\ProductEntity;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class LocalShopProductEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $localShopId;

    /**
     * @var string
     */
    protected $productId;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var LocalShopEntity
     */
    protected $localShop;

    /**
     * @var ProductEntity
     */
    protected $product;

    /**
     * @return string
     */
    public function getLocalShopId(): string
    {
        return $this->localShopId;
    }

    /**
     * @param string $localShopId
     */
    public function setLocalShopId(string $localShopId): void
    {
        $this->localShopId = $localShopId;
    }

    /**
     * @return string
     */
    public function getProductId(): string
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     */
    public function setProductId(string $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return ProductEntity|null
     */
    public function getProduct(): ?ProductEntity
    {
        return $this->product;
    }

    /**
     * @param ProductEntity|null $product
     */
    public function setProduct(?ProductEntity $product): void
    {
        $this->product = $product;
    }

    /**
     * @return LocalShopEntity|null
     */
    public function getLocalShop(): ?LocalShopEntity
    {
        return $this->localShop;
    }

    /**
     * @param LocalShopEntity|null $localShop
     */
    public function setLocalShop(?LocalShopEntity $localShop): void
    {
        $this->localShop = $localShop;
    }
}

