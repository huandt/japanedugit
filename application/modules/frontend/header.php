<?php
class header extends Module{    
    function __construct(){
        $this->load->model('gk_model');
    }

    function script(){        
        $js = array(
            'header' => array(
                'frontend/jquery.min.js',
            ),
            'footer' => array(                
                'frontend/bootstrap.min.js',
                'frontend/main.js',
            )   
        );
        $css = array(
            'tomodachi/css/font-awesome.min.css',
            'tomodachi/css/bootstrap.min.css',
            'tomodachi/css/style.css'
        );        
        return array('js'=>$js,'css'=>$css);
    }
    
    function submit(){
        
    }
    
    function draw($params = array()){        
        //danh muc tin tuc
        $assign = array(
            'local' => $params['local'],
            'skin_front' => SKIN_FRONTEND          
        );
        $this->smarty->assign($assign);
        $this->load->skins('frontend');
        return $this->smarty->display_module('header/header.html');
    }
}
?>