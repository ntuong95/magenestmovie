<?php
namespace Magenest\Movie\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Disable extends \Magento\Config\Block\System\Config\Form\Field
{
    protected function _getElementHtml(AbstractElement $element)
    {
        /*$element->setData('readonly', 1);*/

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $connection=$objectManager->get('Magento\Framework\App\ResourceConnection')
            ->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION');
        $data = $connection->fetchOne( 'SELECT COUNT(*) AS count FROM magenest_movie' );

        $element->setDisabled('disabled');
        $element->setValue($data);
        return $element->getElementHtml();
    }



//    public function __construct(\Magento\Backend\Block\Template\Context $context, array $data = [])
//    {
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $connection=$objectManager->get('Magento\Framework\App\ResourceConnection')
//            ->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION');
//        $data = $connection->fetchAll( 'SELECT COUNT(*) AS count FROM magenest_movie' );
//        parent::__construct($context, $data);
//        $element->setData($data);
//    }
}

