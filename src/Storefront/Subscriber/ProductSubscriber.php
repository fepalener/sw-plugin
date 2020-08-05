<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Storefront\Subscriber;

use Crehler\LocalShopsPlugin\Service\LocalShopsService;
use Shopware\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;
use Shopware\Storefront\Page\Product\ProductPageLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductSubscriber implements EventSubscriberInterface
{
    /**
     * @var LocalShopsService
     */
    private $localShopService;

    /**
     * FooterSubscriber constructor.
     * @param LocalShopsService $localShopsService
     */
    public function __construct(LocalShopsService $localShopsService)
    {
        $this->localShopService = $localShopsService;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ProductPageLoadedEvent::class => 'getLocalShopAvailabilityList'
        ];
    }

    public function getLocalShopAvailabilityList(ProductPageLoadedEvent $event): void
    {
        $id = $event->getPage()->getProduct()->getId();

        /** @var EntitySearchResult $result */
        $result = $this->localShopService->getLocalShopsProductAvailability($id, $event->getContext());

        $event->getPage()->addExtension('local_shops_list', $result);
    }
}
