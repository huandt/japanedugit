<?php
class collaborate_mod extends Module{
    function __construct(){
        $this->load->library('Image');
    }
    function script(){
        $js = array(
            'header' => array(
            ),
            'footer' => array(               
            )   
        );        
                
        return array('js'=>$js,'css'=>$css);
    }
    function draw($param){
        $this->load->skins('frontend');
        $assign = array(
            'local'  => $param['local'],
            'skin_front' => SKIN_FRONTEND
        );
        $this->smarty->assign($assign);
        return $this->smarty->display_module('news/collaborate.html');
    }
}
?>