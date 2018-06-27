<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class ebook extends CDT_Controller{
    function index(){ 
        $assign = array(
            'page_title'       => 'Trường - '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => 'ebook')),
                'main_content'  => array('frontend/ebook_mod'),
                'sidebar_left'       => 'frontend/sidebar_left',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend_2cols.html');
    }
}
?>