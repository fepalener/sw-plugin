<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Storefront\Subscriber;

use Crehler\LocalShopsPlugin\Entity\LocalShop\LocalShopEntity;
use Crehler\LocalShopsPlugin\Service\LocalShopsService;

use Shopware\Core\Checkout\Cart\Cart;
use Shopware\Core\Framework\Struct\ArrayEntity;
use Shopware\Storefront\Page\Checkout\Confirm\CheckoutConfirmPageLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CheckoutSubscriber implements EventSubscriberInterface
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
            CheckoutConfirmPageLoadedEvent::class => 'getLocalShopProductAvailabilityList'
        ];
    }

    public function getLocalShopProductAvailabilityList(CheckoutConfirmPageLoadedEvent $event): void
    {
        /** @var Cart $cart */
        $cart = $event->getPage()->getCart();

        $result = [];

        /** @var LocalShopEntity $localShop */
        foreach ($this->localShopService->getLocalShops($event->getContext()) as $localShop) {
            $canRealizeCart = true;

            foreach ($cart->getLineItems() as $lineItem) {
                $id       = $lineItem->getReferencedId();
                $quantity = $lineItem->getQuantity();

                if ($this->localShopService->getLocalShopProductAvailability($localShop->getId(), $id, $event->getContext()) < $quantity) {
                    $canRealizeCart = false;
                    breaK;
                }
            }

            $localShop->addExtension('canRealizeCart', new ArrayEntity(['available' => $canRealizeCart]));
            $result[] = $localShop;
        }

        $event->getPage()->addExtension('local_shops', new ArrayEntity($result));
    }
}
