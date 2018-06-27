<?php
class edit_len_car_mod extends Module{
    function __construct(){
        
        $user_info  = $this->users_lib->userInfo();

        if($user_info['role'] != 1){
            redirect(site_url());
        }
        $this->load->helper('form');
        $this->load->model("gk_model");
    }
    function script(){
        $js = array(
            'header' => array(
            ),
            'footer' => array(           
                'libs/jquery.livequery.js',     
                'libs/jquery.validate.js',                
                'libs/jquery-ui-1.9.1.custom.min.js',
                'libs/jquery.datePicker.min.js',
                'libs/date.js',               
                'libs/jquery.nicescroll.js',
                'frontend/edit_course.js',
            )
        );        
        $css = array(
               'global/styles/jquery-ui-1.8.13.custom.css'     
        );
        return array('js'=>$js,'css'=>$css);        
    }
    function draw(){
        $this->load->skins('frontend');
        $config = array(
            0   => array('url'=>site_url(),'title'=>'Trang chủ'),
            1   => array('url'=>'javascript:;','title'=>'Đăng ký thuê xe')
        );
        
        $time_condition = array();
        $car_info_condition = array();
        $time_condition['value >']  = 0;
        $time_condition['value <']  = 12;
        
        
        if($type_car){
            $car_info_condition['CAR_CLASS']    = $type_car;
        }
        $list_time_map      = $this->gk_model->select(FE_TIME_MAP,'*',$time_condition,array(),'id asc');
        $list_car_info      = $this->gk_model->select(FE_CAR_INFO,'CAR_CLASS,DESCRIPTION',$car_info_condition,array(),'CAR_CLASS asc');
        $array_car_info     = array();
        if($list_car_info){
            foreach($list_car_info as $one){
                $array_car_info[$one['CAR_CLASS']]  = $one['CAR_CLASS'].' - '.$one['DESCRIPTION'];
            }
        }
        
        $field_status_car   = '';
        foreach($list_time_map as $value){
            $field_status_car .= $value['time_code'].',';
        }
        //$field_status_car   = str_
        $condition          = array();
        $list_car           = $this->gk_model->select(FE_CAR,'id,CAR_ID,CAR_INFO',$condition,array(),'id asc');
        $array_car_id       = array();
        if(!empty($list_car)){
            foreach($list_car as $item){
                $array_car_id[] = $item['CAR_ID']; 
            }
        }
        $condition_car_status   = array('SCH_DATE'=>date('Y/m/d'));
        $list_car_status        = $this->gk_model->select_in(FE_CAR_STATUS,$field_status_car.' CAR_ID',$condition_car_status,'CAR_ID',$array_car_id);
        
        
        $list_time_map_other    = $this->gk_model->select(FE_TIME_MAP,'*',array(),array(),'id asc');
        if(!empty($list_time_map_other)){
            $new_list_time      = array();
            foreach($list_time_map_other as $one){
                $new_list_time[$one['value']]  = $one['time_code_show']; 
            }
        }        
        $assign = array(
            'path_way'      => $this->load->load_module('frontend/pathway',$config),
            'form_begin'    => form_open('','',array('method'=>'POST','id'=>'form_edit_len')),
            'form_end'      => form_close(),
            'list_new'      => $list_news,
            'time_current'  => date('d/m/Y',time()),
            'time_map'  => $list_time_map,
            'list_car_status'   => $list_car_status,
            'car_option'    => $this->input->array_to_option($array_car_info,$select_car_info),
            'option_time_start' => $this->input->array_to_option($new_list_time,0),
            'option_time_end' => $this->input->array_to_option($new_list_time,0),
            'static_url'    => STATIC_URL
        );                
        $this->smarty->assign($assign);
        return $this->smarty->display_module('course/edit_len_car.html');
    }
}
?>