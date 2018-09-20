<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 17/09/2018
 * Time: 16:47
 */
namespace Magenest\Movie\Plugin;

/**change product name to child product's name, works with modified image alt, else use $result['sku']*/
/**$item->_children[0]->_origData["name"] is possible replacement*/
class InterceptConfigurable {

    public function aroundGetItemData($subject, $proceed, $item)
    {
        $result = $proceed($item);
        if($item->getProduct()->getTypeId() == \Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE) {
            $result['product_name'] = $result["product_image"]["alt"];
        }
        return $result;
    }

}