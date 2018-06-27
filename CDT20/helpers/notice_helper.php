<?php
/**
 * Chức năng hiển thị những lỗi thông báo cho người dùng khi submit form
 * @author vunn(vunn@peacesoft.net)
 */
 /**
  * hàm thông báo thực hiện thành công
  */
 if(!function_exists('success')){
    function success($msg){
        return '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$msg.'</div>';
    }
 }
 /**
  * hàm thông báo thực hiện lỗi
  */
 if(!function_exists('error')){
    function error($msg){
        return '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>'.$msg.'</div>';
    }
 }
 /**
  * hàm thông báo thực hiện chờ
  */
 if(!function_exists('warning')){
    return '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">×</button>'.$msg.'</div>';
 }
 /**
  * hàm đưa ra một thông báo với người dung
  */
 if(!function_exists('information')){
    function information($msg){
      return '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>'.$msg.'</div>';
    }
 }
?>