<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class list_new extends CDT_Controller{
    function index(){
        $assign = array(
			'page_title'       => 'Du học Nhật Bản - '.SITE_TITLE,
			'meta_keyword'     => 'Du học Nhật Bản',
			'meta_description' => 'Du học Nhật Bản'
        );
        
        $this->smarty->assign_module(
            array(
				'header'        => array('frontend/header',array('local' => 'new')),
                //
                'main_content'       => array('frontend/list_new_mod'),                
                'sidebar'       => 'frontend/home_list_news',
				'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend.html');
    }
    function cat_new($category_id,$title){
        $assign = array(
			'page_title'       => 'Du học Nhật Bản - '.SITE_TITLE,
			'meta_keyword'     => 'Du học Nhật Bản',
			'meta_description' => 'Du học Nhật Bản'
        );        
        $this->smarty->assign_module(
            array(
				'header'        => array('frontend/header',array('local' => 'new')),
                //
                'main_content'       => array('frontend/list_new_mod',array('cat_id'=>$category_id)),                
                'sidebar'       => 'frontend/home_list_news',
				'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend.html');
    }
}
?>