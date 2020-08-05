<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Service;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;

class LocalShopsService
{
    /** @var EntityRepositoryInterface */
    private $localShopsRepository;

    /**
     * @var EntityRepositoryInterface
     */
    private $localShopsProductRepository;

    public function __construct(EntityRepositoryInterface $localShopsRepository)
    {
        $this->localShopsRepository = $localShopsRepository;
    }

    /**
     * Zwrócenie listy sklepów
     */
    public function getLocalShops()
    {
        /** @var EntityRepositoryInterface $localShopsRepository */
        $localShopRepository = $this->container->get('local_shop.repository');


        // @TODO
        /*
        $this->productRepository->search(
            (new Criteria())->addFilter(new EqualsAnyFilter('name', [
                'Lorem ipsum',
                'Dolor sit amet'
            ])),
            $context
        );
        */
    }

    /**
     * Zwrócenie listy sklepów wraz z podaniem ilości danego produktu ($productId)
     *
     * @param $productId
     */
    public function getLocalShopsProductStock($productId)
    {
        $context = Context::createDefaultContext();

        // @TODO
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('productId', $productId));

        $lineItems = $this->localShopsProductRepository->search($criteria, $context);
    }

    /**
     * Zwrócenie informacji o ilości danego produktu dostępnej w sklepie
     *
     * @param $localShopId
     * @param $productId
     *
     * @return int
     */
    public function getLocalShopProductQuantity($localShopId, $productId): int
    {
        // @TODO
        return 0;
    }

}
