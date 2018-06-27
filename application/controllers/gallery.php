<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class gallery extends CDT_Controller{
    function index(){        
        $assign = array(
			'page_title'       => 'Hình ảnh hoạt động  - '.SITE_TITLE,
			'meta_keyword'     => '',
			'meta_description' => ''
        );
        $this->smarty->assign_module(
            array(
				'header'        => array('frontend/header',array('local' => 'gallery')),
                'main_content'  => 'frontend/gallery_mod',
				'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('frontend_gallery.html');
    }
}
?>