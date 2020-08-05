<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Entity\LocalShop;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\UpdatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

use Crehler\LocalShopsPlugin\Entity\LocalShopProduct\LocalShopProductDefinition;

class LocalShopDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'local_shop';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return LocalShopEntity::class;
    }

    public function getCollectionClass(): string
    {
        return LocalShopCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            (new StringField('name', 'name', 255))->addFlags(new Required()),
            new StringField('address_city', 'addressCity', 255),
            new StringField('address_zip_code', 'addressZipCode', 32),
            new StringField('address_street', 'addressStreet', 255),
            new StringField('address_building_number', 'addressBuildingNumber', 32),
            new StringField('contact_phone', 'contactPhone', 16),

            new CreatedAtField(),
            new UpdatedAtField(),

            new ManyToManyAssociationField('products', ProductDefinition::class, LocalShopProductDefinition::class, 'local_shop_id', 'product_id'),
        ]);
    }
}
