<?php
class main extends Module{
    function __construct(){
        $this->load->model('gk_model');
        $this->load->library('Image');
    }
    function script(){
        $js = array(
            'header' => array(
            ),
            'footer' => array(               
            )   
        );        

        $css = array();
                
        return array('js'=>$js,'css'=>$css);
    }
    function draw(){
        $this->load->skins('frontend');
        
        $assign = array(
            'skin_front' => SKIN_FRONTEND
        );
        $this->smarty->assign($assign);
        return $this->smarty->display_module('main/main.html');
    }
}
?>