<?php
class help_mod extends Module{
    function __construct(){}
    function script(){
        $js = array(
                'header' => array(
                ),
                'footer' => array(
                    'libs/jquery.easing.1.3.js',
                    'libs/script.js'
                )   
        );
        
        $css = array(
            'frontend/styles/layout_slide_home.css',
            'frontend/styles/style_slide_about.css'
            
            
        );
        return array('js'=>$js,'css'=>$css);    
    }
    
    function draw(){
        $pathway    = array(
            0 => array('url'=>site_url(),'title'=>'Trang chủ'),
            1 => array('url'=>'javascript:;','title'=>'Hỗ trợ')            
        );       
        
        //list anh        
        $this->load->model('gk_model');
        $data   = $this->gk_model->select(FE_ABOUT,'*',array('cate_id'=>2,'active'=>1),array(),'ordering asc');
        if(!empty($data)){            
            $this->load->library('Image');
            $new_data       = array();
            foreach($data as $one){                
                $one['img_link']    = $this->image->resize_image($one['image'], 'img_about', array('width' => 684,'height' => 450,'src' => true));
                $new_data[]         = $one;
            }
        }
        $assign = array(
            'path_way'  => $this->load->load_module('frontend/pathway',$pathway),
             'list_img'  => $new_data
        );
        
        $this->smarty->assign($assign);
        $this->load->skins('frontend');
        return $this->smarty->display_module('news/help.html');
    }    
}
?>