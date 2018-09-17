<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 12/09/2018
 * Time: 10:42
 */
namespace Magenest\Movie\Block\Adminhtml\Movie;
use Magento\Backend\Block\Widget\Grid as WidgetGrid;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended /**extended adds filters to the grid*/
{
    /**
     * @var \Magenest\Movie\Model\Resource\Movie\Collection
     */
    protected $_subscriptionCollection;
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Magenest\Movie\Model\ResourceModel\Movie\Collection $subscriptionCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Magenest\Movie\Model\ResourceModel\Movie\Collection $subscriptionCollection, /**loads magenest_movie table*/
        array $data = []
    ) {
        $this->_subscriptionCollection = $subscriptionCollection;
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No Movies Found'));




    }
    /**
     * Initialize the subscription collection
     *
     * @return WidgetGrid
     */
    protected function _prepareCollection() /**assign collection to class*/
    {
        $this->setCollection($this->_subscriptionCollection);
        return parent::_prepareCollection();
    }

    /**
     * Prepare grid columns
     *
     * @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'movie_id',
            [
                'header' => __('ID'),
                'index' => 'movie_id',
            ]
        );
        $this->addColumn(
            'name',
            [
                'header' => __('Name'),
                'index' => 'name',
            ]
        );
        $this->addColumn(
            'description',
            [
                'header' => __('Description'),
                'index' => 'description',
            ]
        );
        $this->addColumn(
            'rating',
            [
                'header' => __('Rating'),
                'index' => 'rating',
            ]
        );
        $this->addColumn(
            'director_id',
            [
                'header' => __('Director ID'),
                'index' => 'director_id',
            ]
        );
        return $this;
    }
}