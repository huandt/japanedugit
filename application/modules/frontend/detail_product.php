<?php
class detail_product extends Module{
    function __construct(){
        $this->load->model('gk_model');
        $this->load->library('Image');
    }
    function script(){
        $js = array(
            'header' => array(
            ),
            'footer' => array(
                'libs/jquery.easing.1.3.js',
                'libs/jquery.timers.1.2.js',
                'libs/jquery.galleryview-2.1.1.js',
                'libs/jquery.galleryview.setup.js',
            )   
        );        
        $css = array(
            //'frontend/styles/layout.css'            
        );        
        return array('js'=>$js,'css'=>$css);
    }
    function draw($param){
        $this->load->skins('frontend');

        $id = $param['id'];
        $info       = $this->gk_model->select(FE_PRODUCTS,'category_id,name,description,image,content,price,height,material,weight',array('id' => $id));
        $arr_info = array();
        foreach($info as $item){
            $item['img_url']    = $this->image->productImage($item['image'],array('src' => true,'height' => 200,'width' => 350));
            $arr_info[] = $item;
        }
        //
        $other_product = $this->gk_model->select(FE_PRODUCTS,'id,name,image,price',array('category_id' => $info[0]['category_id'],'id !=' => $id),array(),'time_created DESC',3);
        
        if($other_product){
            $i = 1;
            $arr_product = array();
            foreach ($other_product AS $one) {
                $one['i'] = $i++;
                $one['img_url']    = $this->image->productImage($one['image'],array('src' => true,'height' => 150,'width' => 200));
                $arr_product[] = $one;
            }
        }

        $assign = array(
            'info_product'  => $arr_info,
            'other_product' => $arr_product,
            'pagging'   => $pagging
        );
        
        $this->smarty->assign($assign);
        return $this->smarty->display_module('products/detail.html');
    }
}
?>