<?php

class add_car_type_mod extends Module{
    public $notice = '';
    public $type   = 0; 
    function __construct()
    {
        $user_info  = $this->users_lib->adminInfo();        
        if($user_info['role'] != 1){
            redirect(site_url());
        }
        $this->load->library('upload');
        $this->load->model('gk_model', 'fe_model');
    }
    function script(){        
        $js = array(
                'header' => array(
                ),
                'footer' => array(
                    'libs/elfinder/elrte.full.js',
                    'libs/elfinder/elfinder.full.js',
                    'libs/elfinder/elfinder.en.js',
                    'libs/jquery-ui-1.8.13.custom.min.js',
                    'libs/bootbox.min.js',
                    'libs/jquery.livequery.js',
                    'libs/jquery.validate.js'                    
                )   
        );
        
        $css = array(
            'css/elfinder.full.css',
            'css/elrte.min.css',
            'css/jquery-ui-1.8.13.custom.css',
        );
        return array('js'=>$js,'css'=>$css);
    }
    
    function submit(){       
        $id_edit                = $this->input->post('check_edit');
        $car_class              = $this->input->post('car_class');                
        $data['CAR_CLASS']      = $car_class;
        $data['DESCRIPTION']    = $this->input->post('description');               
        
        //upload anh
        $imageName      = $_FILES['image']['name'];
        if($imageName){
            $res_file_name  = $imageName;
            $x = explode('.', $imageName);
            $imageName = time().'.'.end($x);
            
            $config['upload_path']      = STORE_DATA.'car_type';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2048';
            $config['max_width']        = '2048';
            $config['max_height']       = '2048';
            $config['file_name']        = $imageName;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $res = $this->upload->do_upload('image');            
            if($imageName && $res === true){
                $data['image'] = $imageName;
            }         
        }
        
        if(!$id_edit)
        {
            
            $this->fe_model->insert(FE_CAR_INFO, $data);
            $this->notice = 'Thêm mới thành công';
            redirect('admin/car_type');
        }
        else if($id_edit)
        {
            unset($data['CAR_CLASS']);
            $this->fe_model->update(FE_CAR_INFO, array('CAR_CLASS' => $car_class), $data);
            $this->notice = 'Cập nhật thành công';            
        }
    }    
    function draw($params){       
        $this->load->skins('backend');        
        if($params['mode'] == 'form')
        {
            
            $id = $params['car_class'];
            if($id)
            {
                $data = $this->fe_model->select_one(FE_CAR_INFO, '*', array('CAR_CLASS' => $id));
                
                $page_title = 'Sửa - '.$data['CAR_CLASS'].' | Quản trị';
            }
            else
            {
                $page_title = 'Thêm loại xe | Quản trị';
            }            
            
            $this->load->helper('form');
            $assign = array(
                'id'            => $id,
                'page_title'    => $page_title,
                'category_list' => $category_list,
                'form_edit'     => form_open('backend/add_car_type_mod', '',array('enctype'=>'multipart/form-data', 'id' => 'form_guide_edit')),
                'notice'        => $this->notice,
                'data'          => $data
            );            
            
            $this->smarty->assign($assign);
            return $this->smarty->display_module('car/form.html');
        }
    }
}

?>