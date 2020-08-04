<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Entity;

use Crehler\LocalShopsPlugin\Entity\Collection\LocalShopCollection;
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
            new StringField('name',                    'name'),
            new StringField('address_city',            'addressCity'),
            new StringField('address_zip_code',        'addressZipCode'),
            new StringField('address_street',          'addressStreet'),
            new StringField('address_building_number', 'addressBuildingNumber'),
            new StringField('contactPhone',            'contactPhone')
        ]);
    }
}
