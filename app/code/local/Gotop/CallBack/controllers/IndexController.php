<?php

/**
 * Created by PhpStorm.
 * User: Frime
 * Date: 04.11.2016
 * Time: 18:19
 */
class Gotop_CallBack_IndexController extends Mage_Core_Controller_Front_Action
{

    const XML_PATH_EMAIL_RECIPIENT = 'contacts/email/recipient_email';
    const XML_PATH_EMAIL_SENDER = 'contacts/email/sender_email_identity';
    const XML_PATH_EMAIL_TEMPLATE = 'gotop_callback/email/email_template';
    const XML_PATH_EMAIL_TEMPLATE_PATH = 'gotop_callback/email/';
    const XML_PATH_ENABLED = 'contacts/contacts/enabled';

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function postAction()
    {
        $post = $this->getRequest()->getPost();
        if ($post) {
            $translate = Mage::getSingleton('core/translate');
            /* @var $translate Mage_Core_Model_Translate */
            $translate->setTranslateInline(false);
            $data=array();
            try {
                if (Zend_Validate::is(trim($post['hideit']), 'NotEmpty')) {
                    throw new Exception();
                }
                $postObject = new Varien_Object();
                $postObject->setData($post);
                if (isset($post['product_id'])) {
                    $_product = Mage::getModel('catalog/product')->load($post['product_id']);
                    $data['product']=$_product;
                }
                $mailTemplate = Mage::getModel('core/email_template');
                /* @var $mailTemplate Mage_Core_Model_Email_Template */
                $mailTemplate->setDesignConfig(array('area' => 'frontend'));
                $data['data']=$postObject;
                if (isset($post['email'])) {
                    $mailTemplate->setReplyTo($post['email']);
                } else {
                    $mailTemplate->setReplyTo(Mage::getStoreConfig(self::XML_PATH_EMAIL_SENDER));
                }

                if($post['email_template']){
                    $emailTemplate=self::XML_PATH_EMAIL_TEMPLATE_PATH.$post['email_template'];
                }else{
                    $emailTemplate=self::XML_PATH_EMAIL_TEMPLATE;
                }
                $mailTemplate->sendTransactional(
                    Mage::getStoreConfig($emailTemplate),
                    Mage::getStoreConfig(self::XML_PATH_EMAIL_SENDER),
                    Mage::getStoreConfig(self::XML_PATH_EMAIL_RECIPIENT),
                    null,
                    $data
                );

                if (!$mailTemplate->getSentSuccess()) {
                    throw new Exception();
                }

                $translate->setTranslateInline(true);

                echo Mage::helper('gotop_callback')->__('Your inquiry was submitted and will be responded to as soon as possible. Thank you for contacting us.');
                return;
            } catch (Exception $e) {
                $translate->setTranslateInline(true);
                echo Mage::helper('gotop_callback')->__('Unable to submit your request. Please, try again later');
                return;
            }

        } else {
            return;
        }
    }

}