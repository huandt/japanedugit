<?php

class add_course_dtl_mod extends Module{
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
                    APP_URL.'ckeditor/ckeditor.js',
                    'backend/create_editor.js',
                    'libs/jquery-ui-1.8.13.custom.min.js',
                    'libs/bootbox.min.js',
                    'libs/jquery.livequery.js',
                    'libs/jquery.validate.js',
                    //'backend/guide.js'
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
        $id                     = $this->input->post('id');
        $data['course_name']          = $this->input->post('course_name');
        //$data['url_fix']        = $this->input->post('url_fix');
        $data['course_id']        = $this->input->post('course_id');
        
        $data['content']        = $this->input->post('content');
        $data['status']         = $this->input->post('status');        
        $data['time_created']    = time();        
        $data['ordering'] = $this->input->post('ordering');
        
        //upload anh
        $imageName      = $_FILES['image']['name'];
        if($imageName){
            $res_file_name  = $imageName;
            $x = explode('.', $imageName);
            $imageName = time().'.'.end($x);
            
            $config['upload_path']      = STORE_DATA.'course';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '5048';
            $config['max_width']        = '5048';
            $config['max_height']       = '5048';
            $config['file_name']        = $imageName;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $res = $this->upload->do_upload('image');            
            if($imageName && $res === true){
                $data['img'] = $imageName;
            }
        }
        if(!$id)
        {
            $this->fe_model->insert(FE_COURSE_DTL, $data);
            $this->notice = 'Thêm mới thành công';
            redirect('admin/course/course_dtl_list');
        }
        else if($id > 0)
        {
            $this->fe_model->update(FE_COURSE_DTL, array('id' => $id), $data);
            $this->notice = 'Cập nhật thành công';            
            //redirect('admin/news/form/'.$id);
        }
    }
    
    function draw($params){       
        $this->load->skins('backend');        
        if($params['mode'] == '')
        {   
            $condition = $like = array();
            if($_GET['title'] != '')
            {
                $like['title'] = $this->input->get('title');
                $end_url .= 'title=' . $this->input->get('title');
                $end_url .= '&';
            }
            if($_GET['category'] != '')
            {
                $condition['guide_category_id'] = $this->input->get('category');
                $end_url .= 'category=' . $this->input->get('category');
                $end_url .= '&';
            }

            $total_data            = $this->fe_model->count(FE_COURSE_DTL, $condition, $like);
            $config['base_url']    = site_url('admin/news/index');
            $config['end_url']     = ($end_url == '' ? '' : rtrim($end_url,'&'));
            $config['per_page']    = 20;
            $config['total_rows']  = $total_data;
            $config['num_links']   = 2;
            $config['uri_segment'] = 4;
            $offset                = $params['page'];
            if ( ! is_numeric($offset) || $offset == 0)
            {
                $offset = 1;
            }
            $offset = ($offset - 1)*$config['per_page'];
            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data      = $this->fe_model->select(FE_COURSE_DTL, '*', $condition, $like, 'id DESC', $config['per_page'], $offset);
            $user_list = array();
            $cat_list  = array();
            foreach ($data as $key => $value) {
                $user_list[] = $value['user_id'];
                $cat_list[]  = $value['guide_category_id'];
            }
           

            $this->load->helper('form');
            $data_cat = $this->fe_model->select(MK_CATEGORY, '*', null, null, 'ordering ASC');

            $assign = array(
                'data'          => $data,
                'author_list'   => $author_list,
                'category_list' => $category_list,
                'total_data'    => $total_data,
                'offset'        => $offset,
                'notice'        => $this->notice,
                'paging'        => $this->pagination->create_links_page(),
                'title'         => $like['title'],
                'category'      => $condition['guide_category_id'],
                'form_cat'      => form_open('', '',array('enctype'=>'multipart/form-data', 'id' => 'form_cat')),
                'data_cat'      => $data_cat
            );
            
            $this->smarty->assign($assign);
            return $this->smarty->display_module('news/index.html');
        }
        if($params['mode'] == 'form')
        {
            $id = $params['id'];
            if($id)
            {
                $data = $this->fe_model->select_one(FE_COURSE_DTL, '*', array('id' => $id));
                $page_title = 'Sửa khóa học chi tiết - '.$data['title'].' | Quản trị';
            }
            else
            {
                $page_title = 'Thêm khóa học chi tiết | Quản trị';
            }            

            $data_cat = $this->fe_model->select(FE_COURSE, 'title, id', array('status' => 1));
            foreach ($data_cat as $key => $value) {
                $category_list[$value['id']] = $value['title'];
            }
            //$this->load->library('Cache_Lib');
            //$list_category  = $this->cache_lib->cache_list_category();
            $this->load->helper('form');
            $assign = array(
                'id'            => $id,
                'page_title'    => $page_title,
                'category_list' => $this->input->array_to_option($category_list,$data['course_id']),
                'form_edit'     => form_open('backend/add_course_dtl_mod', '',array('enctype'=>'multipart/form-data', 'id' => 'form_guide_edit')),
                'notice'        => $this->notice,
                'data'          => $data
            );            
            
            $this->smarty->assign($assign);
            return $this->smarty->display_module('course/dtl_form.html');
        }
    }
}

?>