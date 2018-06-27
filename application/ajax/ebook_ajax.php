<?php
/**
 * Quản lý Category
 * author   Kiennt
 */
class ebook_ajax extends CDT_Controller{    
    function index(){
        
    }
    
    function get_one(){
        $user_info  = $this->users_lib->adminInfo();
        if($user_info['role'] != 1){
            echo json_encode(array('code'=>0,'msg'=>'Bạn không có quyền truy cập'));
            die;        
        }
        $id = (int)$this->input->get('id');
        $this->load->model('gk_model','mk_model');
        $menu = $this->mk_model->select(FE_EBOOK,'*',array('id'=>$id));
        if($menu)
        {            
            $return = array(
                'code'=>1,
                'name'=>$menu[0]['name'],
                'description'=>$menu[0]['description']
            );
        }
        else{
            $return = array('code'=>0);
        }
        //var_dump($return);die;
        echo json_encode($return);
    }
}
?>