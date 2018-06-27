<?php
class footer extends Module{
    function script(){
        
    }
    function draw(){
        $this->load->skins('frontend');
        return $this->smarty->display_module('footer/footer.html');
    }
}
?>