<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 17/09/2018
 * Time: 11:30
 */
namespace Magenest\Movie\Block\Adminhtml\Movie;


class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Initialize blog post edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'movie_id';
        $this->_blockGroup = 'Magenest_Movie';
        $this->_controller = 'adminhtml_movie';

        parent::_construct();

        if ($this->_isAllowedAction('Magenest_Movie::save')) {
            $this->buttonList->update('save', 'label', __('Save Movie'));
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }
    }

    /**
     * Retrieve text for header element depending on loaded post
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('magenest_movie')->getId()) {
            return __("Edit Movie '%1'", $this->escapeHtml($this->_coreRegistry->registry('magenest_movie')->getName()));
        } else {
            return __('New Movie');
        }
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('movie/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}
