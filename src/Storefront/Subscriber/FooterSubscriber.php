<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Storefront\Subscriber;

use Crehler\LocalShopsPlugin\Service\LocalShopsService;
use Shopware\Storefront\Pagelet\Footer\FooterPageletLoadedEvent;
use Shopware\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FooterSubscriber implements EventSubscriberInterface
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
            FooterPageletLoadedEvent::class => 'getLocalShopsList'
        ];
    }

    public function getLocalShopsList(FooterPageletLoadedEvent $event): void
    {
        /** @var EntitySearchResult $result */
        $result = $this->localShopService->getLocalShops($event->getContext());

        $event->getPagelet()->addExtension('local_shops_list', $result);
    }
}
