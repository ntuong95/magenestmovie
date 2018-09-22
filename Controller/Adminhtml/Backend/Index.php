<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 22/09/2018
 * Time: 13:55
 */
namespace Magenest\Movie\Controller\Adminhtml\Backend;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action{
    protected $resultPageFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_Movie::backendinfo');
        $resultPage->addBreadcrumb(__('Backend'),__('Backend'));
        $resultPage->addBreadcrumb(__('Information'), __('Information'));
        $resultPage->getConfig()->getTitle()->prepend(__('Information'));
        return $resultPage;
    }
}