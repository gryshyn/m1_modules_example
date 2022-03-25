<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute('catalog_category', 'description_for_nav',  array(
    'type'                     => 'text',
    'label'                    => 'Description for Nav',
    'input'                    => 'textarea',
    'visible'                  => TRUE,
    'required'                 => FALSE,
    'user_defined'             => FALSE,
    'default'                  => '',
    'global'                   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'group'                    =>  "General Information"
));

$installer->updateAttribute('catalog_category', 'description_for_nav', 'is_wysiwyg_enabled', 1);
$installer->updateAttribute('catalog_category', 'description_for_nav', 'is_html_allowed_on_front', 1);

$installer->endSetup();