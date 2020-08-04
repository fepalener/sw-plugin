<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1596570707CreateSchema extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1596570707;
    }

    public function update(Connection $connection): void
    {
        $connection->executeUpdate('
            CREATE TABLE `local_shop` (
                `id`                      BINARY(16) NOT NULL,
                `name`                    VARCHAR(255) COLLATE utf8mb4_unicode_ci NULL,
                `address_city`            VARCHAR(255) COLLATE utf8mb4_unicode_ci NULL,
                `address_zip_code`        VARCHAR(255) COLLATE utf8mb4_unicode_ci NULL,
                `address_street`          VARCHAR(255) COLLATE utf8mb4_unicode_ci NULL,
                `address_building_number` VARCHAR(255) COLLATE utf8mb4_unicode_ci NULL,
                `contact_phone`           VARCHAR(255) COLLATE utf8mb4_unicode_ci NULL,
                `created_at`              DATETIME(3) NOT NULL,
                `updated_at`              DATETIME(3) NULL,
                PRIMARY KEY (`id`)
            ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
        ');
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
