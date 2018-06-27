<?php
class list_new_mod extends Module{
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
            )   
        );        
        $css = array(
            //'frontend/styles/layout.css'            
        );        
        return array('js'=>$js,'css'=>$css);
    }
    function draw($param){
        $this->load->skins('frontend');
        $cate_id    = $param['cate_id'];      
        if($cate_id){
            $condition['cate_id']   = $cate_id;
        }
            
        $total_data = $this->gk_model->count(FE_NEWS,$condition,array());            
        $page       = $this->input->get('page');
        $per_page   = 6;
        $pagging    = $this->paggingclass->pagging($total_data,$per_page,5,'','page','current');

        $offset = $page;
        if ( ! is_numeric($offset) || $offset == 0)
        {
            $offset = 1;
        }
        $offset = ($offset - 1)*$per_page;        
        $info       = $this->gk_model->select(FE_NEWS,'id,title,description,image,time_create',$condition,array(),'time_create DESC',$per_page,$offset);  
        $arr_info = array();
        $i = 1;
        $count = count($info);
        foreach($info as $item){
            $item['i'] = $i++;
            $item['img_url']    = $this->image->newsImage($item['image'],array('src' => true,'height' => 125,'width' => 125));
            $arr_info[] = $item;
        }
        $assign = array(            
            'list_news'  => $arr_info,
            'pagging'   => $pagging,
            'count' => $count
        );
        
        $this->smarty->assign($assign);
        return $this->smarty->display_module('news/list.html');
    }
}
?>