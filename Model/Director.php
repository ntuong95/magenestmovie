<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 13/09/2018
 * Time: 13:45
 */
namespace Magenest\Movie\Model;
use Magento\Framework\Model\AbstractModel;

class Director extends AbstractModel
{
    public function _construct()
    {
        $this->_init('Magenest\Movie\Model\ResourceModel\Director');
    }
}