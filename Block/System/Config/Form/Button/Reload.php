<?php
namespace Magenest\Movie\Block\System\Config\Form\Button;
class Reload extends \Magento\Config\Block\System\Config\Form\Field
{
    const RELOAD_TEMPLATE = 'system/config/button/button.phtml';
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (!$this->getTemplate()) {
            $this->setTemplate(static::RELOAD_TEMPLATE);
        }
        return $this;
    }
    /**
     * Render button
     *
     * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        // Remove scope label
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::render($element);
    }
    /**
     * Return ajax url for button
     *
     * @return string
     */
    public function getAjaxCheckUrl()
    {
        return $this->getUrl('addbutton/listdata'); //hit controller by ajax call on button click.
    }
    /**
     * Get the button and scripts contents
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        //$originalData = $element->getOriginalData();
        $this->addData(
            [
                'id'        => 'addbutton_button',
                'button_label'     => _('Reload'),
                'onclick'   => 'javascript:check(); return false;'
            ]
        );
        return $this->_toHtml();
    }
}