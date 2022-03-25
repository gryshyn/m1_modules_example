<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute('catalog_category', 'top_description',  array(
    'type'                     => 'text',
    'label'                    => 'Top Description',
    'input'                    => 'textarea',
    'visible'                  => TRUE,
    'required'                 => FALSE,
    'user_defined'             => FALSE,
    'default'                  => '',
    'global'                   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'group'                    =>  "General Information"
));

$installer->updateAttribute('catalog_category', 'top_description', 'is_wysiwyg_enabled', 1);
$installer->updateAttribute('catalog_category', 'top_description', 'is_html_allowed_on_front', 1);

$installer->endSetup();