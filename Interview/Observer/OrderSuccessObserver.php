<?php
namespace Inov8\Interview\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Sales\Api\Data\OrderInterface;
use Inov8\Interview\Model\OrderDetailsFactory;

class OrderSuccessObserver implements ObserverInterface
{
    protected $orderDetailsFactory;

    public function __construct(OrderDetailsFactory $orderDetailsFactory)
    {
        $this->orderDetailsFactory = $orderDetailsFactory;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();

        $orderDetails = $this->orderDetailsFactory->create();
        $orderDetails->setEmail($order->getCustomerEmail());
        $orderDetails->setFirstName($order->getCustomerFirstname());
        $orderDetails->setLastName($order->getCustomerLastname());
        $orderDetails->save();
    }
}
