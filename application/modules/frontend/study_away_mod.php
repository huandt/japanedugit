<?php
class study_away_mod extends Module{
    function __construct(){}
    function script(){}
    function draw(){
        $pathway    = array(
            0 => array('url'=>site_url(),'title'=>'Trang chủ'),
            1 => array('url'=>'javascript:;','title'=>'Cách học')            
        );
        $assign = array(
            'path_way'  => $this->load->load_module('frontend/pathway',$pathway)
        );
        $this->smarty->assign($assign);
        $this->load->skins('frontend');
        return $this->smarty->display_module('news/study_away.html');
    }
}
?>