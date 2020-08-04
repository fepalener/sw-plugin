<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Entity\Definition;

use Crehler\LocalShopsPlugin\Entity\Collection\LocalShopEntityCollection;
use Crehler\LocalShopsPlugin\Entity\LocalShopEntity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class LocalShopEntityDefinition extends EntityDefinition
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
        return LocalShopEntityCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            new StringField('name',                    'name'),
            new StringField('address_city',            'addressCity'),
            new StringField('address_zip_code',        'addressZipCode'),
            new StringField('address_street',          'addressStreet'),
            new StringField('address_building_number', 'addressBuildingNumber'),
            new StringField('contactPhone',            'contact_phone')
        ]);
    }
}
