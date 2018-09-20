<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 17/09/2018
 * Time: 16:47
 */
namespace Magenest\Movie\Plugin;

/**change customer's firstname to Magenest when saved*/
class InterceptConfigurable {

    public function aroundGetItemData($subject, $proceed, $item)
    {
        $result = $proceed($item);
        if($item->getProduct()->getTypeId() == \Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE) {
            $result['product_name'] = $result["product_sku"];
        }
        return $result;
    }

}