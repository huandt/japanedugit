<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class about extends CDT_Controller{
    function index(){ 
        $assign = array(
            'page_title'       => 'Giới thiệu '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => 'home')),
                'slider'        => 'frontend/slider',
                'main_content'  => 'frontend/about_mod',
                'comment'       => 'frontend/value_core_mod',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('layout_tomodachi.html');
    }
    /**
     * Liên hệ
     */
    function contact(){
        $assign = array(
            'page_title'       => 'Liên hệ '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => '')),
                'slider'        => 'frontend/slider',
                'main_content'  => 'frontend/contact_mod',
                'comment'       => 'frontend/comment',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('layout_tomodachi.html');
    }

    /**
     * hop tac
     */
    function collaborate(){
        $assign = array(
            'page_title'       => 'Hợp tác đào tạo '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => '')),
                'slider'        => 'frontend/slider',
                'main_content'  => 'frontend/collaborate_mod',
                'comment'       => 'frontend/comment',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('layout_tomodachi.html');
    }
}
?>