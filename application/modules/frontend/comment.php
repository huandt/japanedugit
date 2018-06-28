<?php
class comment extends Module{
    function __construct(){
        $this->load->model('gk_model');
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
            
        );
        $this->smarty->assign($assign);
        return $this->smarty->display_module('main/comment.html');
    }
}
?>