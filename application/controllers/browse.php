<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class browse extends CDT_Controller{
    function index(){
        $assign = array(
            'page_title'       => 'Danh sách tin tức - '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );
        
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => 'new')),
                'main_content'  => 'frontend/list_product_cate',
                'slide_content'    => 'frontend/slider',
                'sidebar_left'       => 'frontend/sidebar_left',
                'sidebar_right'       => 'frontend/sidebar_right',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend.html');
    }
    function cate_pro($category_id,$title){
        $assign = array(
            'page_title'       => 'Danh sách sản phẩm - '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );      
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array()),
                'main_content'  => array('frontend/list_product_cate',array('cate_id' => $category_id)),
                'slide_content'    => 'frontend/slider',
                'sidebar_left'       => 'frontend/sidebar_left',
                'sidebar_right'       => 'frontend/sidebar_right',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend.html');
    }
    function detail($id,$title){
        $assign = array(
            'page_title'       => $title.' - '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );      
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array()),
                'main_content'  => array('frontend/detail_product',array('id' => $id)),
                'sidebar_left'       => 'frontend/sidebar_left',
                'sidebar_right'       => 'frontend/sidebar_right',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend.html');
    }
}
?>