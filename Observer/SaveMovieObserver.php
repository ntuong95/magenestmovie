<?php
namespace Magenest\Movie\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
class SaveMovieObserver implements ObserverInterface
{
    /** @var \Psr\Log\LoggerInterface $logger */
    protected $_request;
    protected $logger;
    protected $model;
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\App\RequestInterface $request,
        \Magenest\Movie\Controller\Adminhtml\Movie\Save $model)
    {
        $this->_request = $request;
        $this->logger = $logger;
        $this->model = $model;
    }
    public function execute(Observer $observer)
    {
        $model = $observer->getMovie();
        $model->setData('rating','0'); /**magento API function*/

        $this->logger->debug('Save a Movie');
    }
}