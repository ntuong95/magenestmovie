<?php
namespace Magenest\Movie\Model\ResourceModel;

class Module extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('setup_module', 'module');
    }
}