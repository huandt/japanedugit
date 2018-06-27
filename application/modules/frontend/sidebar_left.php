<?php
class sidebar_left extends Module{
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
        $list_category_parent = $this->gk_model->select(MK_CATEGORY,'id,name,name_ascii,image',array('parent_id' => 0),array(),'id ASC');
        $arrayParent = array();
        $list_category_child = $this->gk_model->select(MK_CATEGORY,'id,name,parent_id,name_ascii,image',array('parent_id !=' => 0),array(),'id ASC');
        if(!empty($list_category_parent)){
            $list_n = array();
            $i = 0;            
            foreach($list_category_parent as $parent){
                $parent['link'] = browse_url($parent['id'],$parent['name']);
                $arrayParent[$parent['id']] = $parent;
                foreach($list_category_child as $one) {
                    if ($one['parent_id'] == $parent['id']) {
                        $link = 'c/'.$one['id'].'/'.$one['name_ascii'];
                        $one['i'] = $i++;
                        $one['link_detail']    = site_url($link);
                        $one['img_url']     = $this->image->cateImage($one['image'],array('src' => true,'height' => 140,'width' => 220));
                        $list_n[$parent['id']][]           = $one;
                    }
                }
            }
        }     
        
        $assign = array(
            'list_category'  => $list_n,
            'parent' => $arrayParent,
            'store_data'    => APP_URL_EDITOR
        );      
        
        $this->smarty->assign($assign);
        return $this->smarty->display_module('main/sidebar_left.html');
    }
}
?>