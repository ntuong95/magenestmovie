<?php
namespace Magenest\Movie\Model\ResourceModel\MovieList;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\MovieList', 'Magenest\Movie\Model\ResourceModel\MovieList');
    }

    protected function _initSelect()
    {
        parent::_initSelect();

        $this->getSelect()->joinLeft(
            ['secondTable' => $this->getTable('magenest_director')], //2nd table name by which you want to join
            'main_table.director_id= secondTable.director_id', // common column which available in both table
            ['name AS directorname'] // '*' define that you want all column of 2nd table. if you want some particular column then you can define as ['column1','column2']
        );
    }
}