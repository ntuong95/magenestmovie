<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 17/09/2018
 * Time: 11:34
 */
namespace Magenest\Movie\Block\Adminhtml\Movie\Edit;


class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected $_systemStore;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setId('movie_form');
        $this->setTitle(__('Movie Information'));
    }

    protected function _prepareForm()
    {
        /** @var \Magenest\Movie\Model\Movie $model */
        $model = $this->_coreRegistry->registry('magenest_movie');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('movie_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('movie_id', 'hidden', ['name' => 'movie_id']);
        }


        $fieldset->addField(
            'name',
            'text',
            ['name' => 'name', 'label' => __('Movie Name'), 'title' => __('Movie Name'), 'required' => true]
        );

        $fieldset->addField(
            'description',
            'text',
            ['name' => 'description', 'label' => __('Movie Description'), 'title' => __('Movie Description'), 'required' => false]
        );

        $fieldset->addField(
            'rating',
            'text',
            ['name' => 'rating', 'label' => __('Rating'), 'title' => __('Rating'), 'required' => false]
        );

        $fieldset->addField(
            'diretor_id',
            'text',
            ['name' => 'director_id', 'label' => __('Director ID'), 'title' => __('Director ID'), 'required' => false]
        );



//        $fieldset->addField(
//            'url_key',
//            'text',
//            [
//                'name' => 'url_key',
//                'label' => __('URL Key'),
//                'title' => __('URL Key'),
//                'required' => true,
//                'class' => 'validate-xml-identifier'
//            ]
//        );

//        $fieldset->addField(
//            'is_active',
//            'select',
//            [
//                'label' => __('Status'),
//                'title' => __('Status'),
//                'name' => 'is_active',
//                'required' => true,
//                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
//            ]
//        );
//        if (!$model->getId()) {
//            $model->setData('is_active', '1');
//        }
//
//        $fieldset->addField(
//            'content',
//            'editor',
//            [
//                'name' => 'content',
//                'label' => __('Content'),
//                'title' => __('Content'),
//                'style' => 'height:36em',
//                'required' => true
//            ]
//        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
