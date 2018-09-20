<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 19/09/2018
 * Time: 15:36
 */
namespace Magenest\Movie\Model;

class OverrideImage extends \Magento\ConfigurableProduct\CustomerData\ConfigurableItem
{
    public function getProductForThumbnail()
    {
        $product = $this->getChildProduct();
        return $product;
    }
}
