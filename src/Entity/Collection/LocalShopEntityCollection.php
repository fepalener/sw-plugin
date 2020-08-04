<?php

namespace Crehler\LocalShopsPlugin\Entity\Collection;

use Crehler\LocalShopsPlugin\Entity\LocalShopEntity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class LocalShopEntityCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return LocalShopEntity::class;
    }
}
