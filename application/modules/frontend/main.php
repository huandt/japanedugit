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
        $courses = $this->gk_model->select(FE_COURSE,'*',array(),array(),'time_created DESC',6);
        
        $assign = array(
            'skin_front' => SKIN_FRONTEND,
            'courses' => $courses,
            'storeData' => STORE_IMAGE,
        );
        $this->smarty->assign($assign);
        return $this->smarty->display_module('main/main.html');
    }
}
?>