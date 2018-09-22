<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 21/09/2018
 * Time: 16:21
 */
namespace Magenest\Movie\Controller\Adminhtml\Movie;
use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Movies'));
        return $resultPage;
    }
}