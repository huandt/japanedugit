<?php
class slider extends Module{
    function __construct(){
        $this->load->model('gk_model');
        $this->load->library('Image');
    }
    function script(){
        $js = array(
            'header' => array(
            ),
            'footer' => array(
                'backend/jquery.tabs.setup.js',
                'backend/jquery-ui-1.7.2.custom.min.js'
            )   
        );        
        $css = array(
           
        );        
        return array('js'=>$js,'css'=>$css);
    }
    function draw(){
        $this->load->skins('frontend');
        $list_news = $this->gk_model->select(FE_NEWS,'id,image,description,title',array('cate_id' => 1),array(),'time_create DESC',5);
        if(!empty($list_news)){
            $arr_news  = array();
            $i = 1;
            foreach($list_news as $item){
                $item['i'] = $i++;
                $item['img_url']    = $this->image->newsImage($item['image'],array('src' => true,'height' => 250,'width' => 950));
                $arr_news[] = $item;
            }
        }
        $assign = array(
            'list_news'  => $arr_news,
            'skin_front' => SKIN_GOMSU
        );      
        
        $this->smarty->assign($assign);
        return $this->smarty->display_module('main/slider.html');
    }
}
?>