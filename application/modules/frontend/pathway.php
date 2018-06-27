<?php
class pathway extends Module{
    function __construct(){
    }
    /**
     * @param $config:    array[] => array('title' => '','url' => '')
     */        
    function draw($config=array()){
        if(empty($config)){
            return '<li><a href="'.$this->config->item('base_url').'">Trang chủ</a></li>';
        }
        $PathWay = '';
        $lengPathWay = sizeof($config);
        $i = 1;
        foreach($config AS $item){
            if($i == 1){
                $PathWay .= '<li><a href="'.$item['url'].'">'.$item['title'].'</a></li>';
            }elseif($i < $lengPathWay){
                $PathWay .= '&nbsp;<li><a href="'.$item['url'].'">'.$item['title'].'</a></li>';
            }else{
                $PathWay .= '&nbsp;<li class="current">'.$item['title'].'</li>';
            }
            ++$i;
        }
        return $PathWay;
    }
}

?>