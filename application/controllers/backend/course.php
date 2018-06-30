<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');  
class course extends CDT_Controller{
   function index(){
        $this->smarty->assign('page_title', 'JPEDU | Quản lý khóa học');        
        $this->smarty->assign_module(
        		array(
					'header' => 'backend/header',
					'navigation' => 'backend/navigation',
					'content'   => 'backend/reg_course_mod',
                    'footer' => 'backend/footer'
                ));
        return $this->smarty->display('backend.html');
    } 
    function form($id = '')
    {   
        $this->smarty->assign_module(
            array(
                'header'       => 'backend/header',
                'navigation'   => 'backend/navigation',
                'footer'       => 'backend/footer',
                'content'      => array('backend/add_course_mod', array('id' => $id, 'mode' => 'form'))
            ));
        return $this->smarty->display('backend.html');
    }
    function add_img(){
        $this->smarty->assign_module(
            array(
                'header'       => 'backend/header',
                'navigation'   => 'backend/navigation',
                'footer'       => 'backend/footer',
                'content'      => array('backend/add_img_mod')
            ));
        return $this->smarty->display('backend.html');
    }

    function course_dtl_list() {
        $this->smarty->assign('page_title', 'JPEDU | Quản lý chi tiết danh sách khóa học');        
        $this->smarty->assign_module(
                array(
                    'header' => 'backend/header',
                    'navigation' => 'backend/navigation',
                    'content'   => 'backend/course_dtl_list_mod',
                    'footer' => 'backend/footer'
                ));
        return $this->smarty->display('backend.html');
    }
    function add_course_detail($id) {
          $this->smarty->assign_module(
            array(
                'header'       => 'backend/header',
                'navigation'   => 'backend/navigation',
                'footer'       => 'backend/footer',
                'content'      => array('backend/add_course_dtl_mod', array('id' => $id, 'mode' => 'form'))
            ));
        return $this->smarty->display('backend.html');
    }
}
?>