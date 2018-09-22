<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 21/09/2018
 * Time: 16:53
 */
namespace Magenest\Movie\Model;

use Magenest\Movie\Model\ResourceModel\Movie\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $movieCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $movieCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        $this->loadedData = array();
        foreach ($items as $movie) {
            $this->loadedData[$movie->getId()]['movie'] = $movie->getData();
        }
        return $this->loadedData;
    }
}