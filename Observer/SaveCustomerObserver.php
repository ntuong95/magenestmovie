<?php
namespace Magenest\Movie\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SaveCustomerObserver implements ObserverInterface{
    public function execute(Observer $observer)
    {
        $customer = $observer->getCustomer();
        $customer->setFirstname('Magenest');
    }
}