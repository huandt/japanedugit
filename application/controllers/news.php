<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class news extends CDT_Controller{
    function index(){
        $assign = array(
			'page_title'       => 'Danh sách tin tức - '.SITE_TITLE,
			'meta_keyword'     => '',
			'meta_description' => ''
        );
        
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => 'news')),
                'main_content'  => array('frontend/list_new_mod'),
                'sidebar_left'       => 'frontend/sidebar_left',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend_2cols.html');
    }
    function news_cate($category_id,$title){
        $assign = array(
            'page_title'       => 'Danh sách tin tức - '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );
        
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => 'news')),
                'main_content'  => array('frontend/list_new_mod',array('cate_id' => $category_id)),
                'sidebar_left'       => 'frontend/sidebar_left',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend_2cols.html');
    }
}
?>