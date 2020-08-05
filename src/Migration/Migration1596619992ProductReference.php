<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1596619992ProductReference extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1596619992;
    }

    public function update(Connection $connection): void
    {
        $connection->executeUpdate('
            CREATE TABLE `local_shop_product` (
                `id` BINARY(16) NOT NULL,
                `local_shop_id` BINARY(16),
                `product_id` BINARY(16),
                `quantity` INT(11),
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY(`id`),
                CONSTRAINT `fk.local_shop_product.local_shop_id` FOREIGN KEY (`local_shop_id`) REFERENCES `local_shop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.local_shop_product.product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
        ');
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
