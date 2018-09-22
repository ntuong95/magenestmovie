<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 22/09/2018
 * Time: 08:24
 */
namespace Magenest\Movie\Controller\Adminhtml\Movie;

use Magenest\Movie\Model\Movie;
use Magento\Backend\App\Action;

class NewAction extends Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $movieDatas = $this->getRequest()->getParam('movie');
        if(is_array($movieDatas)) {
            $movie = $this->_objectManager->create(Movie::class);
            $movie->setData($movieDatas)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }
}