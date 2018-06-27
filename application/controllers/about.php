<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class about extends CDT_Controller{
    function index(){ 
        $assign = array(
            'page_title'       => 'Trường - '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => 'about')),
                'main_content'  => array('frontend/about_mod'),
                'sidebar_left'       => 'frontend/sidebar_left',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend_2cols.html');
    }
    /**
     * Liên hệ
     */
    function contact(){
        $assign = array(
            'page_title'       => 'Trường - '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => 'contact')),
                'main_content'  => array('frontend/contact_mod'),
                'sidebar_left'       => 'frontend/sidebar_left',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend_2cols.html');
    }
}
?>