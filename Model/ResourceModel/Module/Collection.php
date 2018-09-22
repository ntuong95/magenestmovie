<?php
namespace Magenest\Movie\Model\ResourceModel\Module;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\Module', 'Magenest\Movie\Model\ResourceModel\Module');
    }
}