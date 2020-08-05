<?php

namespace Crehler\LocalShopsPlugin\Entity\LocalShopProduct;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                        add(LocalShopProductEntity $entity)
 * @method void                        set(string $key, LocalShopProductEntity $entity)
 * @method LocalShopProductEntity[]    getIterator()
 * @method LocalShopProductEntity[]    getElements()
 * @method LocalShopProductEntity|null get(string $key)
 * @method LocalShopProductEntity|null first()
 * @method LocalShopProductEntity|null last()
 */
class LocalShopProductCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return LocalShopProductEntity::class;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function filterByLocalShopId(string $id): self
    {
        return $this->filter(function (LocalShopProductEntity $localShopProductEntity) use ($id) {
            return $localShopProductEntity->getLocalShopId() === $id;
        });
    }

    /**
     * @param string $id
     * @return $this
     */
    public function filterByProductId(string $id): self
    {
        return $this->filter(function (LocalShopProductEntity $localShopProductEntity) use ($id) {
            return $localShopProductEntity->getProductId() === $id;
        });
    }
}
