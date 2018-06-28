<?php
class footer extends Module{
    function script(){
        
    }
    function draw(){
        $this->load->skins('frontend');
        
        $assign = array(
            'skin_front' => SKIN_FRONTEND
        );      
        
        $this->smarty->assign($assign);
        return $this->smarty->display_module('footer/footer.html');
    }
}
?>