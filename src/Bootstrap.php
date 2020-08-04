<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\DeactivateContext;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

use Symfony\Component\Config\FileLocator;

class Bootstrap extends Plugin
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/Resources/config'));
        $loader->load('services.xml');
    }

    /**
     * @param InstallContext $installContext
     */
    public function install(InstallContext $installContext): void
    {
    }

    /**
     * @param UpdateContext $updateContext
     */
    public function update(UpdateContext $updateContext): void
    {
    }

    /**
     * @param ActivateContext $activateContext
     */
    public function activate(ActivateContext $activateContext): void
    {
    }

    /**
     * @param DeactivateContext $deactivateContext
     */
    public function deactivate(DeactivateContext $deactivateContext): void
    {
    }

    /**
     * @param UninstallContext $uninstallContext
     */
    public function uninstall(UninstallContext $uninstallContext): void
    {
    }
}
