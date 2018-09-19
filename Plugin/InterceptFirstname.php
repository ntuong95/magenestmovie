<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 17/09/2018
 * Time: 16:47
 */
namespace Magenest\Movie\Plugin;

use Magento\Customer\Model\Data\Customer;

/**change customer's firstname to Magenest when saved*/
class InterceptFirstname extends Customer{

    public function aroundgetFirstname( )
    {
        return 'Magenest';
    }
}