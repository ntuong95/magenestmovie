<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 21/09/2018
 * Time: 10:26
 */
namespace Magenest\Movie\Ui\Component\Listing\Column;

use \Magento\Sales\Api\OrderRepositoryInterface;
use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Ui\Component\Listing\Columns\Column;
use \Magento\Framework\Api\SearchCriteriaBuilder;

class Oddeven extends Column{
    protected $_orderRepository;
    protected $_searchCriteria;

    public function __construct(ContextInterface $context,
                                UiComponentFactory $uiComponentFactory,
                                OrderRepositoryInterface $orderRepository,
                                SearchCriteriaBuilder $criteria,
                                array $components = [],
                                array $data = [])
    {
        $this->_orderRepository = $orderRepository;
        $this->_searchCriteria  = $criteria;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {

                $order  = $this->_orderRepository->get($item["entity_id"]);
                $status = $order->getData("increment_id");

                if($status %2 != 0){
                    $message = 'Odd';
                }
                else{
                    $message = 'Even';
                }

                /**styling output*/

                $class = '';
                switch ($message) {
                    case 'Odd':
                        $class = 'grid-severity-critical';
                        break;
                    case 'Even':
                        $class = 'grid-severity-notice';
                        break;
                }

                $item[$this->getData('name')] = '<span class="' . $class . '"><span>' . $message . '</span></span>';
            }
        }

        return $dataSource;
    }
}