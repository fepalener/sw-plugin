<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Entity\LocalShop;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

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
            new StringField('contactPhone', 'contactPhone', 16)
        ]);
    }
}
