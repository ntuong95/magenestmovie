<?php
namespace Magenest\Movie\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Disableactor extends \Magento\Config\Block\System\Config\Form\Field
{
    protected function _getElementHtml(AbstractElement $element)
    {
        /*$element->setData('readonly', 1);*/
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $connection=$objectManager->get('Magento\Framework\App\ResourceConnection')
            ->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION');
        $dataactor = $connection->fetchOne( 'SELECT COUNT(*) AS count FROM magenest_actor' );

        $element->setData('readonly', 1);
        $element->setValue($dataactor);
        return $element->getElementHtml();
    }
}