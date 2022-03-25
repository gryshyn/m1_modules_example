<?php
/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 24/05/17
 * Time: 13:16
 */
class Gotop_CitySelector_Block_Adminhtml_City_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _getModel(){
        return Mage::registry('current_model');
    }

    protected function _getHelper(){
        return Mage::helper('gotop_cityselector');
    }

    protected function _getModelTitle(){
        return 'City';
    }

    protected function _prepareForm()
    {
        $model  = $this->_getModel();
        $modelTitle = $this->_getModelTitle();
        $form   = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save'),
            'method'    => 'post'
        ));

        $fieldset   = $form->addFieldset('base_fieldset', array(
            'legend'    => $this->_getHelper()->__("$modelTitle Information"),
            'class'     => 'fieldset-wide',
        ));

        if ($model && $model->getId()) {
            $modelPk = $model->getResource()->getIdFieldName();
            $fieldset->addField($modelPk, 'hidden', array(
                'name' => $modelPk,
            ));
        }

        $fieldset->addField('gotop_cityselector_name', 'text', array(
            'label' => $this->__('Title'),
            'required' => true,
            'name' => 'gotop_cityselector_name',
        ));

        $fieldset->addField('gotop_cityselector_phone_1', 'text', array(
            'label' => $this->__('Phone 1'),
            'required' => true,
            'name' => 'gotop_cityselector_phone_1',
        ));

        $fieldset->addField('gotop_cityselector_phone_2', 'text', array(
            'label' => $this->__('Phone 2'),
            'required' => true,
            'name' => 'gotop_cityselector_phone_2',
        ));

//        $fieldset->addField('created', 'date', array(
//            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
//            'image' => $this->getSkinUrl('images/grid-cal.gif'),
//            'label' => $this->__('Created'),
//            'name' => 'created'
//        ));


//        $fieldset->addField('name', 'text' /* select | multiselect | hidden | password | ...  */, array(
//            'name'      => 'name',
//            'label'     => $this->_getHelper()->__('Label here'),
//            'title'     => $this->_getHelper()->__('Tooltip text here'),
//            'required'  => true,
//            'options'   => array( OPTION_VALUE => OPTION_TEXT, ),                 // used when type = "select"
//            'values'    => array(array('label' => LABEL, 'value' => VALUE), ),    // used when type = "multiselect"
//            'style'     => 'css rules',
//            'class'     => 'css classes',
//        ));
//          // custom renderer (optional)
//          $renderer = $this->getLayout()->createBlock('Block implementing Varien_Data_Form_Element_Renderer_Interface');
//          $field->setRenderer($renderer);

//      // New Form type element (extends Varien_Data_Form_Element_Abstract)
//        $fieldset->addType('custom_element','MyCompany_MyModule_Block_Form_Element_Custom');  // you can use "custom_element" as the type now in ::addField([name], [HERE], ...)


        if($model){
            $form->setValues($model->getData());
        }
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
