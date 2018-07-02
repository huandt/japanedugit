<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class browse extends CDT_Controller{
    function index(){
        $assign = array(
            'page_title'       => 'Khoá học - '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );
        
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => 'browse')),
                'slider'        => 'frontend/slider',
                'main_content'  => 'frontend/list_course',
                'comment'       => 'frontend/comment',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('layout_tomodachi.html');
    }
    function course_detail($category_id,$title){
        $assign = array(
            'page_title'       => 'Danh sách khoá học - '.SITE_TITLE,
            'meta_keyword'     => '',
            'meta_description' => ''
        );      
        $this->smarty->assign_module(
            array(
                'header'        => array('frontend/header',array('local' => 'browse')),
                'slider'        => 'frontend/slider',
                'main_content'  => array('frontend/detail_course',array('course_id' => $category_id)),
                'comment'       => 'frontend/comment',
                'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('layout_tomodachi.html');
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