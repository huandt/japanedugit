<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class contact extends CDT_Controller{
    function request(){
        $page = $this->input->get('page');
        $this->load->model('gk_model');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $birthday = $this->input->post('birthday');
        $phone = $this->input->post('phone');
        $work = $this->input->post('work');
        $course = $this->input->post('work');
        $content = $this->input->post('content');
        if(empty($name)){
            echo json_encode(array('code'=>2,'msg'=>'Bạn hãy nhập họ và tên'));return;
        }
        if(empty($email)){
            echo json_encode(array('code'=>3,'msg'=>'Bạn hãy nhập email'));return;
        }
        if(empty($birthday)){
            echo json_encode(array('code'=>4,'msg'=>'Bạn hãy nhập ngày tháng năm sinh'));return;
        }
        if(empty($phone)){
            echo json_encode(array('code'=>5,'msg'=>'Bạn hãy nhập số điện thoại'));return;
        }
        if(empty($work)){
            echo json_encode(array('code'=>6,'msg'=>'Bạn hãy nhập công ty / trường học'));return;
        }
        $dataRequest   = array(
            'full_name' => $name,
            'email' => $email,
            'mobile_phone' => $phone,
            'date_of_birth'    => $birthday,            
            'company_school'     => $work,
            'course_id'   => $course,
            'more_information'   => $content,
            'time_created'    => time()
        );
        if($this->gk_model->insert(FE_REQUEST,$dataRequest)){
            echo json_encode(array('code'=>1,'msg'=>'Bạn đã gửi yêu cầu thành công, chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất. Trân trọng cảm ơn!'));
        }else{
            echo json_encode(array('code'=>0,'msg'=>'Có lỗi trong quá trình thực hiện'));
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