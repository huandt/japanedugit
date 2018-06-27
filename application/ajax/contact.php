<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class contact extends CDT_Controller{
    function pagbing_cb(){
        $page = $this->input->get('page');
        $this->load->model('gk_model');
        $this->load->library('PaggingClass');
        $per_page   = 10;
        $total_data = $this->gk_model->count(FE_TEACHER,array());        
        
        $offset = $page;
        if ( ! is_numeric($offset) || $offset == 0)
        {
            $offset = 1;
        }
        $offset = ($offset - 1)*$per_page;
        //echo $offset;
        $list       = $this->gk_model->select(FE_TEACHER,'*',array(),array(),'id asc',10,$offset);
        $pagging = $this->paggingclass->pagging_ajax($total_data,10,5,'','page','active');
        $this->load->skins('frontend');              
        if(!empty($list)){
            $assign = array(                
                'pagging'   => $pagging,
                'data'      => $list,
                'count'     => $offset + 1
            );            
            $this->smarty->assign($assign);
            $html   = $this->smarty->display_module('news/ajax_contact_pagging.html');
            echo json_encode(array('code'=>1,'html'=>$html));
            
        }else{
            echo json_encode(array('code'=>0));
        }        
    }
    function pagbing_teacher(){
        $page = $this->input->get('page');
        $this->load->model('gk_model');
        $this->load->library('PaggingClass');
        $per_page   = 10;
        $total_data = $this->gk_model->count(FE_TEACHER,array('TYPE_ID'=>'GV'));
        $off_set    = ($page-1)*$per_page + 1;
        
        $offset                = $page;
        if ( ! is_numeric($offset) || $offset == 0)
        {
            $offset = 1;
        }
        $offset = ($offset - 1)*$per_page;
        //echo $offset;
        $list       = $this->gk_model->select(FE_TEACHER,'*',array('TYPE_ID'=>'GV'),array(),'id asc',10,$offset);
        $pagging = $this->paggingclass->pagging_ajax($total_data,10,5,'','page','active');
        $this->load->skins('frontend');              
        if(!empty($list)){
            $assign = array(                
                'pagging'   => $pagging,
                'data'      => $list,
                'count'     => $offset + 1
            );            
            $this->smarty->assign($assign);
            $html   = $this->smarty->display_module('news/ajax_contact_pagging_teacher.html');
            echo json_encode(array('code'=>1,'html'=>$html));
            
        }else{
            echo json_encode(array('code'=>0));
        }        
    }
}
?>