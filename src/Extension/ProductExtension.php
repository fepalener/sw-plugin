<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Extension;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Inherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

use Crehler\LocalShopsPlugin\Entity\LocalShop\LocalShopDefinition;
use Crehler\LocalShopsPlugin\Entity\LocalShopProduct\LocalShopProductDefinition;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new ManyToManyAssociationField(
                'localShops',
                LocalShopDefinition::class,
                LocalShopProductDefinition::class,
                'product_id',
                'local_shop_id'
            ))->addFlags(new Inherited())
        );
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}
