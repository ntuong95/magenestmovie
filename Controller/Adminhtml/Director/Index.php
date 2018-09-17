<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 17/09/2018
 * Time: 08:08
 */
namespace Magenest\Movie\Controller\Adminhtml\Director;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action{
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
        $resultPage->setActiveMenu('Magenest_Movie:director');
        $resultPage->addBreadcrumb(__('Director'),__('Director'));
        $resultPage->addBreadcrumb(__('Manage Directors'), __('Manage Directors'));
        $resultPage->getConfig()->getTitle()->prepend(__('Directors'));
        return $resultPage;
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_Movie:director');
    }
}