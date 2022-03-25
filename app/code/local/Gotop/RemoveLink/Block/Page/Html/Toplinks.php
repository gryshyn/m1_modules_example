<?php
/**
 * Created by PhpStorm.
 * User: Frime
 * Date: 04.11.2016
 * Time: 19:09
 */ 
class Gotop_RemoveLink_Block_Page_Html_Toplinks extends Mage_Page_Block_Html_Toplinks {
    public function removeLinkByName($name)
    {
        unset($this->_links[$name]);
        return $this;
    }
}