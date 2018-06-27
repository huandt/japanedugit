<?php
class ebook_mod extends Module {
    
    private $msg            = '';
    private $type_msg       = '';
    
    function __construct(){  
        $this->load->model('gk_model','mk_model');
        $user_info  = $this->users_lib->adminInfo();
        if($user_info['role'] != 1){
            redirect(site_url());
        }                 
        
    }
                   
    function script(){
        
        $js = array(
                'header' => array(),
                'footer' => array(
                    'libs/jquery.history.js',
                    'backend/ebook.js'
                )   
        );
        
        $css = array(
        
        );
        
        return array('js'=>$js,'css'=>$css);
    }
    
    function submit(){        
        $id         = $this->input->post('id_edit');
        $name       = $this->input->post('name');
        $description      = $this->input->post('description');

        $data = array(
            'name'          => $name,
            'description'   => $description,
            'time_upload'   => time()
       );
        //upload anh
        $fileName      = $_FILES['ebook']['name'];
        if($fileName){
            $res_file_name  = $fileName;
            $x = explode('.', $fileName);
            $fileName = url_title($x[0]).'.'.end($x);
           
            $config['upload_path']      = STORE_DATA.'ebooks';
            $config['allowed_types']    = '*';
            $config['max_size']         = '5048';
            $config['file_name']        = $fileName;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $res = $this->upload->do_upload('ebook');
            if($fileName && $res === true){
                $data['file'] = $fileName;
            }                   
        }
        // Nếu là action Edit
        if($id > 0 && $data){
            $this->mk_model->update(FE_EBOOK,array('id'=>$id),$data);
            $this->msg = 'Cập nhật thành công!';
            $this->type_msg = 1;
        }
        elseif (!$id && $data) {           
            $this->mk_model->insert(FE_EBOOK,$data);
            $this->msg = 'Thêm mới thành công!';
            $this->type_msg = 1;
        }
        else{
            $this->msg = 'Bạn chưa nhập nội dung';
            $this->type_msg = 3;
        }   
    }
    
    function draw($params=array()){        
        $this->load->library('pagination');
        if($params['do']=='del'){
            $id = (int)$params['id'];                    
           
            if( $this->mk_model->delete(FE_EBOOK,array('id' => $id)))
            {
               
                redirect(admin_url().'ebook');
            }
            else {
                $this->msg = 'Xóa thất bại, xin vui lòng thử lại!';
                $this->type_msg = 3;
            }
        }        
        
        if($this->msg != ''){
            $this->load->helper('notice');
            if($this->type_msg == 3)
                $this->smarty->assign('msg',error($this->msg));
            elseif($this->type_msg == 1)
                $this->smarty->assign('msg',success($this->msg));
            elseif($this->type_msg == 2)
                $this->smarty->assign('msg',warning($this->msg));
            else
                $this->smarty->assign('msg',information($this->msg));
        }else{
            $this->smarty->assign('msg','');
        }
        
        
        $this->load->helper('form');
        $this->load->skins('backend');
        //
        $total_data            = $this->mk_model->count(FE_EBOOK, array(),array());        
        $config['base_url']    = site_url('admin/ebook/index');
        $config['end_url']     = ($end_url == '' ? '' : rtrim($end_url,'&'));
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
                
        $list_ebook  = $this->mk_model->select(FE_EBOOK, '*', array(), array(), 'time_upload DESC', $config['per_page'], $offset);
        if($list_ebook){
            $arr_ebook = $list_ebook;
        }

        $assign = array(
            'page_title'  => 'Quản trị tài liệu và bài giảng',
            'begin_form'  => form_open('backend/ebook_mod', '',array('enctype'=>'multipart/form-data'),array('class'=>'form-horizontal')),
            'paging'     => $this->pagination->create_links_page(),
            'close_form'  => form_close(),
            'base_url'    => base_url(),
            'arr_ebook'     => $arr_ebook
        );

        $this->smarty->assign($assign);
        return $this->smarty->display_module('ebooks/list.html');;
    }    
   
}
?>