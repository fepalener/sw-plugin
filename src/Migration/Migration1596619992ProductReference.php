<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;
use Shopware\Core\Framework\Migration\InheritanceUpdaterTrait;

class Migration1596619992ProductReference extends MigrationStep
{
    use InheritanceUpdaterTrait;

    public function getCreationTimestamp(): int
    {
        return 1596619992;
    }

    public function update(Connection $connection): void
    {
        $connection->executeUpdate('
            CREATE TABLE `local_shop_product` (
                `local_shop_id` BINARY(16) NOT NULL,
                `product_id` BINARY(16) NOT NULL,
                `product_version_id` BINARY(16) NOT NULL,
                `quantity` INT(11),
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY(`local_shop_id`, `product_id`, `product_version_id`),
                CONSTRAINT `fk.local_shop_product.local_shop_id` FOREIGN KEY (`local_shop_id`) REFERENCES `local_shop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.local_shop_product.product_id` FOREIGN KEY (`product_id`, `product_version_id`) REFERENCES `product` (`id`, `version_id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
        ');

        $this->updateInheritance($connection, 'product', 'local_shop_product');
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
