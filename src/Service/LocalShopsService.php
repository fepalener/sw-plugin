<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Service;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;

class LocalShopsService
{
    /** @var EntityRepositoryInterface */
    private $localShopsRepository;

    /**
     * @var EntityRepositoryInterface
     */
    private $localShopsProductRepository;

    public function __construct(EntityRepositoryInterface $localShopsRepository, EntityRepositoryInterface $localShopsProductsRepository)
    {
        $this->localShopsRepository        = $localShopsRepository;
        $this->localShopsProductRepository = $localShopsProductsRepository;
    }

    /**
     * Zwrócenie listy sklepów
     *
     * @param Context $context
     *
     * @return EntitySearchResult
     */
    public function getLocalShops(Context $context)
    {
        return $this->localShopsRepository->search(
            new Criteria(), $context
        );
    }

    /**
     * Zwrócenie listy sklepów wraz z podaniem ilości danego produktu ($productId)
     *
     * @param string $productId
     * @param Context $context
     *
     * @return EntitySearchResult
     */
    public function getLocalShopsProductAvailability($productId, Context $context)
    {
        return $this->localShopsProductRepository->search(
            (new Criteria())
                ->addAssociation('localShop')
                ->addAssociation('product')
                ->addFilter(new EqualsFilter('product.id', $productId)),
            $context
        );
    }

    /**
     * Zwrócenie informacji o ilości danego produktu dostępnej w sklepie
     *
     * @param $localShopId
     * @param $productId
     *
     * @return int
     */
    public function getLocalShopProductAvailability($localShopId, $productId): int
    {
        // @TODO
        return 0;
    }

}
