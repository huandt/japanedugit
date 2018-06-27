<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class detail_new extends CDT_Controller{
    function index($id){
        $assign = array(
            'page_title'       => 'Chi tiết tin tức - '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );
        
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => 'news')),
                'main_content'  => array('frontend/detail_new_mod',array('id' => $id)),
                'sidebar_left'       => 'frontend/sidebar_left',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend_2cols.html');
    }
}
?>