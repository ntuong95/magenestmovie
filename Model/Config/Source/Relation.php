<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 12/09/2018
 * Time: 15:38
 */
namespace Magenest\Movie\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class  Relation implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => '1',
                'label' => __('show')
            ],
            [
                'value' => '2',
                'label' => __('not-show')
            ],
        ];
    }
}