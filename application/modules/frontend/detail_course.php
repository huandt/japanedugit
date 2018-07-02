<?php
class detail_course extends Module{
    function __construct(){
        $this->load->model('gk_model');
        $this->load->library('Image');
    }
    function script(){
        $js = array(
            'header' => array(
            ),
            'footer' => array(
                'frontend/course.js',         
            )   
        );        
                
        return array('js'=>$js,'css'=>$css);
    }
    function draw($param){
        $this->load->skins('frontend');
        $cate_id    = $param['course_id'];
        $infoCourse = $this->gk_model->select(FE_COURSE,'id,title',array('id' => (int)$cate_id),array());
        $posts = $this->gk_model->select(FE_COURSE_DTL,'id,course_name,img',array('course_id' => (int)$cate_id),array(),'time_created DESC');
        $postsDetailSelected = $this->gk_model->select_one(FE_COURSE_DTL, '*', array('id' => (int)$posts[0]['id']));
        $assign = array(
            'local'  => $param['local'],
            'skin_front' => SKIN_FRONTEND,
            'posts' => $posts,
            'info' => $infoCourse,
            'storeData' => STORE_IMAGE,
            'postSelected' => explode('$$$', $postsDetailSelected['content'])
        );
        $this->smarty->assign($assign);
        return $this->smarty->display_module('course/detail.html');
    }
}
?>