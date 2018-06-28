<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class home extends CDT_Controller{
    function index(){        
        $assign = array(
			'page_title'       => SITE_TITLE,
			'meta_keyword'     => '...',
			'meta_description' => '...'
        );
        $this->smarty->assign_module(
            array(
				'header'        => array('frontend/header',array('local' => 'home')),
                'slider'        => 'frontend/slider',
                'main_content'  => 'frontend/main',
                'comment'       => 'frontend/comment',
				'footer'        => 'frontend/footer'
            )
        );
        $this->smarty->assign($assign); 
        return $this->smarty->display('layout_tomodachi.html');
    }
}
?>