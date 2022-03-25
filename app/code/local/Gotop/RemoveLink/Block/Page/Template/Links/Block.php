<?php
/**
 * Created by PhpStorm.
 * User: Frime
 * Date: 04.11.2016
 * Time: 19:10
 */ 
class Gotop_RemoveLink_Block_Page_Template_Links_Block extends Mage_Page_Block_Template_Links_Block {
    public function removeLinkByName($name)
    {
        unset($this->_links[$name]);
        return $this;
    }
}