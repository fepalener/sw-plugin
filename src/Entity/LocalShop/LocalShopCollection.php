<?php

namespace Crehler\LocalShopsPlugin\Entity\LocalShop;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                 add(LocalShopEntity $entity)
 * @method void                 set(string $key, LocalShopEntity $entity)
 * @method LocalShopEntity[]    getIterator()
 * @method LocalShopEntity[]    getElements()
 * @method LocalShopEntity|null get(string $key)
 * @method LocalShopEntity|null first()
 * @method LocalShopEntity|null last()
 */
class LocalShopCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return LocalShopEntity::class;
    }
}
