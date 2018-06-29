<?php
class value_core_mod extends Module{
    function __construct(){
    }
    function script(){
        $js = array(
            'header' => array(
            ),
            'footer' => array(
                'frontend/coreValue.js',
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
        return $this->smarty->display_module('news/core.html');
    }
}
?>