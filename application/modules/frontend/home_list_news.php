<?php
class home_list_news extends Module{
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
    function draw(){
        $this->load->skins('frontend');
        $list_category = $this->gk_model->select(MK_CATEGORY,'id,name',array('active'=>1,'id !='=>25, 'id != '=>26),array(),'id ASC');
        if(!empty($list_category)){
            $new_list_category  = array();
            $array_category_id  = array();
            $count_cat          = 0;
            foreach($list_category as $item){
                $item['count_cat']  = $count_cat++;
                $new_list_category[$item['id']] = $item;                
                $array_category_id[]    = $item['id'];
            }
        }        
        if(!empty($new_list_category)){                       
            $list_new   = $this->gk_model->select_in(FE_NEWS,'id,title,description,cate_id,image',array('active'=>1,'hot !='=>1),'cate_id',$array_category_id,'',4);                                                
        }
        //var_dump($new_list_category);
        //var_dump($list_new[23]);die;
        $assign = array(
            'list_news'  => $list_new,
            'store_data'    => APP_URL_EDITOR
        );      
        
        $this->smarty->assign($assign);
        return $this->smarty->display_module('news/right_list_news.html');
    }
}
?>