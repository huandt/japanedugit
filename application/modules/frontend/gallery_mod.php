<?php
class gallery_mod extends Module{
    function __construct(){
        $this->load->model('gk_model');
        $this->load->library('Image');
        $this->load->library('PaggingClass');
    }
    function script(){
        $js = array(
            'header' => array(
            ),
            'footer' => array(
                'backend/jquery-prettyPhoto.js',
                'backend/gallery.js'               
            )   
        );        
        $css = array(
            'school/styles/prettyPhoto.css'
        );         
        return array('js'=>$js,'css'=>$css);
    }
    function draw($param){
        $this->load->skins('frontend');
        //
        $total_data = $this->gk_model->count(FE_ABOUT,$condition,array());            
        $page       = $this->input->get('page');
        $per_page   = 15;
        $pagging    = $this->paggingclass->pagging($total_data,$per_page,5,'','page','current');

        $offset = $page;
        if ( ! is_numeric($offset) || $offset == 0)
        {
            $offset = 1;
        }
        $offset = ($offset - 1)*$per_page;        
        $info       = $this->gk_model->select(FE_ABOUT,'id,description,image',$condition,array(),'time_create DESC',$per_page,$offset);  
        $arr_info = array();
        $i = 1;
        $count = count($info);
        foreach($info as $item){
            $item['i'] = $i++;
            $item['img_url']    = $this->image->aboutImage($item['image'],array('src' => true,'height' => 160,'width' => 160));
            $item['img_zoom']    = $this->image->aboutImage($item['image'],array('src' => true,'height' => 590,'width' => 820));
            $arr_info[] = $item;
        }
        //var_dump($arr_info);die;
        $assign = array(
            'list_img' => $arr_info,
            'local'  => $param['local'],
            'pagging'   => $pagging
        );
        $this->smarty->assign($assign);
        return $this->smarty->display_module('gallery/main.html');
    }
}
?>