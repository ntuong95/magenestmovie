<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 22/09/2018
 * Time: 14:38
 */
namespace Magenest\Movie\Block\Adminhtml\Backend;

use Magenest\Movie\Model\ResourceModel\Module\CollectionFactory as ModuleCollectionFactory;
use Magento\Framework\View\Element\Template;

class Information extends Template{
    protected $_objectManager;
    protected $_customerFactory;
    protected $_productFactory;
    protected $_orderFactory;
    protected $_invoiceFactory;
    protected $_memoFactory;
    protected $moduleFactory;

    public function __construct(
        Template\Context $context,
        ModuleCollectionFactory $moduleFactory,
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productFactory,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderFactory,
        \Magento\Sales\Model\ResourceModel\Order\Invoice\CollectionFactory $invoiceFactory,
        \Magento\Sales\Model\ResourceModel\Order\Creditmemo\CollectionFactory $memoFactory,
        array $data = []
    ) {
        $this->moduleFactory = $moduleFactory;
        $this->_customerFactory = $customerFactory;
        $this->_productFactory = $productFactory;
        $this->_orderFactory = $orderFactory;
        $this->_invoiceFactory = $invoiceFactory;
        $this->_memoFactory = $memoFactory;
        parent::__construct($context, $data);
    }

    public function getModuleCount()
    {
        $collection = $this->moduleFactory->create();
        $number = $collection->count();

        return $number;
    }

    public function getThirdPartyModuleCount()
    {
        $collection = $this->moduleFactory->create();
        $count ='0';
        foreach ($collection as $module)
        {
            $modulename = $module->getData("module");
            if (strpos($modulename, 'Magento') === false) {
                ++$count;
            }
        }
        return $count;
    }

    public function getCustomerCount()
    {
        $collection = $this->_customerFactory->create();
        $number = $collection->count();

        return $number;
    }

    public function getProductCount()
    {
        $collection = $this->_productFactory->create();
        $number = $collection->count();

        return $number;
    }

    public function getOrderCount()
    {
        $collection = $this->_orderFactory->create();
        $number = $collection->count();

        return $number;
    }

    public function getInvoiceCount()
    {
        $collection = $this->_invoiceFactory->create();
        $number = $collection->count();

        return $number;
    }

    public function getMemoCount()
    {
        $collection = $this->_memoFactory->create();
        $number = $collection->count();

        return $number;
    }
}