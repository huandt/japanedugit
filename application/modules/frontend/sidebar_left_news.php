<?php
class sidebar_left_news extends Module{
    function __construct(){
        $this->load->model('gk_model');
        $this->load->library('Image');
    }
    function script(){
        $js = array(
            'header' => array(
            ),
            'footer' => array(
            )   
        );        
        $css = array(
            //'frontend/styles/layout.css'            
        );        
        return array('js'=>$js,'css'=>$css);
    }
    function draw(){        
        $this->load->skins('frontend');
        //
        $list_category = $this->gk_model->select(MK_CATEGORY,'id,name,name_ascii',array(),array(),'id ASC');
        if(!empty($list_category)){
            $list_n = array();
            $i = 0;
            foreach($list_category as $one){
                $link = 'c/'.$one['id'].'/'.$one['name_ascii'];
                $one['i'] = $i++;
                $one['link_detail']    = site_url($link);
                $one['img_url']     = $this->image->cateImage($one['image'],array('src' => true,'height' => 80,'width' => 220));
                $list_n[]           = $one;
            }
        }
        
        $assign = array(
            'list_category'  => $list_n,
            'skin_front'    => SKIN_SCHOOL
        );      
        
        $this->smarty->assign($assign);
        return $this->smarty->display_module('news/sidebar_left.html');
    }
}
?>