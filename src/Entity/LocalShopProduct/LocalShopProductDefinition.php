<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Entity\LocalShopProduct;

use Crehler\LocalShopsPlugin\Entity\LocalShop\LocalShopDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IntField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\UpdatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class LocalShopProductDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'local_shop_product';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return LocalShopProductCollection::class;
    }

    public function getEntityClass(): string
    {
        return LocalShopProductEntity::class;
    }

    public function getDefaults(): array
    {
        return [
            'quantity' => 0,
        ];
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new FkField('local_shop_id', 'localShopId', LocalShopDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new FkField('product_id', 'productId', ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ReferenceVersionField(ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),

            (new IntField('quantity', 'quantity'))->addFlags(new Required()),

            new ManyToOneAssociationField('localShop', 'local_shop_id', LocalShopDefinition::class),
            new ManyToOneAssociationField('product', 'product_id', ProductDefinition::class),

            new CreatedAtField(),
            new UpdatedAtField()
        ]);
    }
}
