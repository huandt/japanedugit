<?php
class ebook_mod extends Module{
    function __construct(){
        $this->load->library('PaggingClass');
    }
    function script(){
        $js = array(
            'header' => array(
            ),
            'footer' => array(               
            )   
        );        
                
        return array('js'=>$js,'css'=>$css);
    }
    function draw($param){
        $this->load->skins('frontend');
        //
        $total_data = $this->gk_model->count(FE_EBOOK,$condition,array());            
        $page       = $this->input->get('page');
        $per_page   = 9;
        $pagging    = $this->paggingclass->pagging($total_data,$per_page,5,'','page','current');

        $offset = $page;
        if ( ! is_numeric($offset) || $offset == 0)
        {
            $offset = 1;
        }
        $offset = ($offset - 1)*$per_page;        
        $info       = $this->gk_model->select(FE_EBOOK,'*',$condition,array(),'time_upload DESC',$per_page,$offset);  
        $arr_info = array();
        $i = 1;

        $count = count($info);
        foreach($info as $item){
            $item['i'] = $i++;
            $item['source']    = APP_URL_EDITOR.'ebooks/'.$item['file'];
            $arr_info[] = $item;
        }
        $assign = array(
            'list' => $arr_info,
            'local'  => $param['local'],
            'pagging'   => $pagging
        );
        $this->smarty->assign($assign);
        return $this->smarty->display_module('ebook/list.html');
    }
}
?>