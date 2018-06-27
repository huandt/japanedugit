<?php
class sidebar_right extends Module{
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

        $list_image = $this->gk_model->select(FE_ABOUT,'id,image,description',array('active' => 1),array(),'id ASC',10);
        if(!empty($list_image)){
            $arr_image  = array();
            $i = $j = 0;
            foreach($list_image as $item){
                $i++;                
                $item['img_url']    = $this->image->aboutImage($item['image'],array('src' => true,'height' => 82,'width' => 110));
                $arr_image[$j][] = $item;
                if ($i %2 == 0) {
                    $j++;
                }
            }
        }
        $assign = array(
            'list_img'  => $arr_image,
        );      
        
        $this->smarty->assign($assign);
        return $this->smarty->display_module('main/sidebar_right.html');
    }
}
?>