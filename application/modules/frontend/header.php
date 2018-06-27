<?php
class header extends Module{    
    function __construct(){
        $this->load->model('gk_model');
    }

    function script(){        
        $js = array(
            'header' => array(
                'libs/jquery.js'
            ),
            'footer' => array(                
                
            )   
        );
        $css = array(
            'school/styles/layout.css'
        );        
        return array('js'=>$js,'css'=>$css);
    }
    
    function submit(){
        
    }
    
    function draw($params = array()){        
        //danh muc tin tuc
        $assign = array(
            'local' => $params['local'],
            'skin_front' => SKIN_SCHOOL          
        );
        $this->smarty->assign($assign);
        $this->load->skins('frontend');
        return $this->smarty->display_module('header/header.html');
    }
}
?>