<?php
class main extends Module{
    function __construct(){
        $this->load->model('gk_model');
        $this->load->library('Image');
    }
    function script(){
        $js = array(
            'header' => array(
                'libs/jquery.nivo.slider.js'
            ),
            'footer' => array(               
            )   
        );        

        $css = array('css/nivo-slider.css','css/themes/default/default.css');
                
        return array('js'=>$js,'css'=>$css);
    }
    function draw(){
        $this->load->skins('frontend');

        $list_news = $this->gk_model->select(FE_NEWS,'id,title,description,image',array('cate_id !=' => 1),array(),'time_create DESC',6);

        if(!empty($list_news)){
            $arr_news = array();
            $i = 0;
            foreach($list_news as $item){     
                $item['i'] = $i++;
                $item['img_url']        = $this->image->newsImage($item['image'],array('src' => true,'width' => 160,'height' => 125));
                $item['link_detail']    = detail_news($item['id'],$item['title']);
                $arr_news[]           = $item;
            }
        }

        $listHot = $this->gk_model->select(FE_NEWS,'id,image,description,title',array('cate_id' => 1),array(),'time_create DESC',5);
        if(!empty($listHot)){
            $arr_hots  = array();
            $i = 1;
            foreach($listHot as $item){
                $item['i'] = $i++;
                $item['img_url']    = $this->image->newsImage($item['image'],array('src' => true,'height' => 400,'width' => 600));
                $arr_hots[] = $item;
            }
        }
        
        $assign = array(
            'list'  => $arr_news,
            'list_hot' => $arr_hots
        );
        $this->smarty->assign($assign);
        return $this->smarty->display_module('main/main.html');
    }
}
?>