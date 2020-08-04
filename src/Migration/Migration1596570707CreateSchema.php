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
        // implement update
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
