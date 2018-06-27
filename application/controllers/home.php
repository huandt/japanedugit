<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class home extends CDT_Controller{
    function index(){        
        $assign = array(
			'page_title'       => 'Trường ... - '.SITE_TITLE,
			'meta_keyword'     => 'Trường ...',
			'meta_description' => 'Trường ...'
        );
        $this->smarty->assign_module(
            array(
				'header'        => array('frontend/header',array('local' => 'home')),
                'slider'        => 'frontend/slider',
                'main_content'  => 'frontend/main',
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