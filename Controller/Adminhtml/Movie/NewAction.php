<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 17/09/2018
 * Time: 08:08
 */
namespace Magenest\Movie\Controller\Adminhtml\Movie;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;

class NewAction extends Action{
    /**
     * Redirect result factory
     *
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    public $resultForwardFactory;

    public function __construct(
        Context $context,
        ForwardFactory $resultForwardFactory
    )
    {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }
    /**
     * forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        $resultForward->forward('edit');
        return $resultForward;
    }
}