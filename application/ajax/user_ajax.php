<?php
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
class user_ajax extends CDT_Controller{
    function index(){}
    function login(){        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
       
        $this->load->library('session');
        
        $session = $this->session->userdata($this->config->item('session_user'));
        
        if($session && ($session['timeout_login'] + $this->config->item('time_out')) > time() && $session['login_admin']){        
            redirect(admin_url());
        }
        if($username=='' || $password==''){
              echo json_encode(array('code'=>0,'html'=>'<div class="alert alert-error"><strong>Error</strong>: Username or Password is NULl</div>'));
            die;
        }
       
        $this->load->model('gk_model', 'fe_model');
        $field = '*';        
        $data = $this->fe_model->select(FE_USER, $field,array('user_name'=>$username,'status'=>1,));

        if(!$data){
              echo json_encode(array('code'=>0,'html'=>'<div class="alert alert-error"> <strong>'.$username.'</strong> not exit.</div>'));
            die;
        }
       
        $userinfo = $data[0];
        
        if($userinfo['role'] != 1){
            echo json_encode(array('code'=>0,'html'=>'<div class="alert alert-error">&nbsp; You are not  Admin.</div>'));
            die;
        }
       
        if($this->users_lib->encodePassword($password,$this->config->item('encryption_key')) != $userinfo['password'])
        {
            echo json_encode(array('code'=>0,'html'=>'<div class="alert alert-error">&nbsp; Password not valid.</div>'));
            die;
        }       
       
        unset($userinfo['time_last_visited']);
     
        $userinfo['time_last_visited'] = $data[0]['time_last_visited'];
        $userinfo['timeout_login']   = time();
        
        $this->fe_model->update(FE_USER,array('id'=>$userinfo['id']),array('time_last_visited'=>time()));
        
        $this->session->set_userdata(array($this->config->item('session_user')=>$userinfo));        
        echo json_encode(array('code'=>1));
    }
    function add(){
        //Check quyen
        $user_info  = $this->users_lib->adminInfo();
        if($user_info['role'] != 1){
            die;
        }
        $this->load->model('gk_model');
        $user_name  = $this->input->post('user_name');
        if(preg_match('/[^a-zA-Z0-9_]/', $user_name)){
            echo json_encode(array('err' => 2, 'msg' => '<div class="alert alert-error">
                  <button type="button" class="close" data-dismiss="alert">×</button>&nbsp; &nbsp; User name not valid.
                  Not in (a-zA-Z0-9) 
                </div>'));
            die;    
        }        
        $password   = $this->input->post('password');
        $email      = $this->input->post('email');
        $first_name = $this->input->post('first_name');
        $last_name  = $this->input->post('last_name');
        $mobilephone    = $this->input->post('mobiphone');
        $role       = $this->input->post('role');
        $status     = $this->input->post('status');
        $address    = $this->input->post('address');        
        $data   = array(
            'user_name' => $user_name,
            'password' => $this->users_lib->encodePassword($password,$this->config->item('encryption_key')),
            'first_name'    => $first_name,
            'last_name' => $last_name,
            'email'     => $email,
            'phone'     => $mobilephone,
            'role'      => $role,
            'time_created'  => time(),
            'status'    => $status,
            'address'   => $address
        );
        $result_insert  = $this->gk_model->insert(FE_USER,$data);
        if($result_insert){
            echo json_encode(array('err' => 0, 'msg' => '<div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button> &nbsp;&nbsp;Success.
                </div>'));
        }else{
            echo json_encode(array('err' => 0, 'msg' => '<div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>&nbsp; &nbsp; Error
                </div>'));
        }
    }
    function load_info()
    {       
        $user_info  = $this->users_lib->adminInfo();
        if($user_info['role'] != 1){
            die;
        }
        $this->load->skins('backend');
        $this->load->model('gk_model', 'fe_model');        
        $this->load->helper('form');
        $user_id        = $this->input->get('user_id');
        $data           = $this->fe_model->select_one(FE_USER, '*', array('id' => $user_id));
        $assign         = array(
            'data'          => $data,          
            'array_status_user' => $this->input->array_to_option($this->config->item('status_user'),$data['status']),
            'array_role'    => $this->input->array_to_option($this->config->item('role'),$data['role']),
            'form'          => form_open('', '',array('enctype'=>'multipart/form-data', 'class' => 'form-horizontal', 'id' => 'info-user-form')),
            'admin_info'    => $admin_info
        );
        $this->smarty->assign($assign);
        echo $this->smarty->display_module('user/modal_info.html');
    }
    function update_info(){
        $user_info  = $this->users_lib->adminInfo();
        if($user_info['role'] != 1){
            die;
        }
        $first_name = $this->input->post('first_name');
        $last_name  = $this->input->post('last_name');
        $phone      = $this->input->post('mobiphone');
        $address    = $this->input->post('address');
        $role       = $this->input->post('role');
        $status     = $this->input->post('status');
        $data       = array(
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'phone'         => $phone,
            'role'          => $role,
            'status'        => $status,
            'address'       => $address
        );
        
        $this->load->model('gk_model','fe_model');        
        $condition['id']     = $this->input->post('u_id');
        if($this->fe_model->update(FE_USER, $condition, $data))
            echo json_encode(array('err' => 0, 'msg' => '<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>Update success.
            </div>'));
        else
            echo json_encode(array('err' => 1, 'msg' => '<div class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">×</button>Error, please try again.
            </div>'));
    }
    /**
     * Block user
     */ 
    function block_user(){    
        $user_info  = $this->users_lib->adminInfo();
        if($user_info['role'] != 1){
            die;
        }
        $this->load->model('gk_model', 'fe_model');
        $user_id = $this->input->get('user_id');
        $status  = $this->input->get('status');

        $condition['id'] = $user_id;
        $data = array();
        if($status == 1)
        {
    	    $data['status'] = 2;
    	    $mode = 'block';
        }
        else
        {
    	    $data['status'] = 1;
    	    $mode = 'unblock';
        }
        if($this->fe_model->update(FE_USER, $condition, $data))
        {
    	    echo json_encode(array('err' => 0, 'mode' => $mode, 'stat' => $data['status']));
        }
        else
        {
    	    echo json_encode(array('err' => 1));
        }
    }
    
}
?>