<?php
class user_mod extends Module{
    function __construct(){
        $this->load->model('gk_model');
    }
    function script(){        
		$js = array(
                'header' => array(
                ),
                'footer' => array(
                	'libs/jquery.tablesorter.min.js',
                    'libs/jquery.livequery.js',                    
                    'libs/bootbox.min.js',
                    'libs/bootstrap-datepicker.js',
                    'libs/jquery.validate.js',
                    'backend/user.js'
                )   
        );        
        $css = array(
            'backend/user.css',
            'css/datepicker.css',
        );
        return array('js'=>$js,'css'=>$css);
    }
    function draw($params = array()){        
        $this->load->library('pagination');
        $array_status_user      = $this->config->item('status_user');        
        $status_user            = $this->input->get('status_user');
        $condition              = array();
		$like                   = array();
        $array_get              = array();
		$this->load->skins('backend');		
        $this->load->helper('form');
        $email      = $this->input->get('email');
        $first_name = $this->input->get('first_name');
        $last_name  = $this->input->get('last_name');
        $phone      = $this->input->get('mobiphone');
        $end_url    = "?cmd=search&";
        if($email){
            $like['email']  = $array_get['email'] = $email;
            $end_url .= 'email=' . $email.'&';
        }
        if($phone){
            $like['phone']  = $array_get['phone'] = $phone;
            $end_url .= 'phone=' . $phone.'&';
        }
        if($last_name){
            $like['last_name']  = $array_get['last_name'] = $last_name;
            $end_url .= 'last_name='.$last_name.'&';
        }
        if($first_name){
            $like['first_name']  = $array_get['first_name'] = $first_name;
            $end_url .= 'first_name='.$first_name.'&';
        }
        $total_data            = $this->gk_model->count(FE_USER, $condition, $like);        
		$config['base_url']    = site_url('admin/user/index');
		$config['end_url'] 	   = ($end_url == '' ? '' : rtrim($end_url,'&'));
		$config['per_page']    = 20;
		$config['total_rows']  = $total_data;
		$config['num_links']   = 2;
		$config['uri_segment'] = 4;
		$offset                = $this->uri->segment(4);
        if (!is_numeric($offset) || $offset == 0)
        {
            $offset = 1;
        }
        $offset = ($offset - 1)*$config['per_page'];
        $this->pagination->initialize($config);
                
        $list_user  = $this->gk_model->select(FE_USER, '*', $condition, $like, 'id DESC', $config['per_page'], $offset);        
        $assign = array(
            'form'       => form_open('', $current_page,array('enctype'=>'multipart/form-data', 'class' => 'form-horizontal cancel', 'id' => 'add-user-form')),
            'array_status_user' => $this->input->array_to_option($array_status_user,$tatus_user),
            'data'  => $list_user,
            'paging'     => $this->pagination->create_links_page(),
            'count' => $offset+1,
            'array_role'    => $this->config->item('role'),
            'total_data'    => $total_data,
            '_array_status_user'    => $array_status_user
        );
        $this->smarty->assign($assign);
        $this->load->skins('backend');
        return $this->smarty->display_module('user/index.html');
    }
}
?>