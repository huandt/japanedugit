<?php /* Smarty version Smarty-3.0.7, created on 2018-03-09 22:31:04
         compiled from "E:\xampp\htdocs\school\application/webskins/templates/frontend/header/header.html" */ ?>
<?php /*%%SmartyHeaderCode:122155aa2a8b81712c7-12561951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c446faac55a87f31868465ff10fb985de164e07' => 
    array (
      0 => 'E:\\xampp\\htdocs\\school\\application/webskins/templates/frontend/header/header.html',
      1 => 1399302628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122155aa2a8b81712c7-12561951',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="wrapper">
  <div id="header" class="clear">
    <div class="fl_left">
      <img src="<?php echo site_url();?>
webskins/skins/school/images/logo_left.png">      
    </div>
    <div class="logo-right">    
    <img src="<?php echo site_url();?>
webskins/skins/school/images/logo_right.png">      
   
    </div>
    <div class="fl_right">
        <ul>
            <li><a href="<?php echo base_url();?>
">Trang chủ</a></li>
            <li><a href="<?php echo contact_url();?>
">Liên hệ</a></li>
            <li class="last"><a href="<?php echo about_url();?>
">Giới thiệu</a></li>
            <!--li><a href="#">Student Login</a></li>
            <li class="last"><a href="#">Staff Login</a></li-->
        </ul>
      <form action="#" method="post" id="sitesearch">
        <fieldset>
          <!--<strong>Tìm kiếm:</strong>-->
          <input type="text" value="Tìm kiếm trong website&hellip;" onfocus="this.value=(this.value=='Tìm kiếm trong website&hellip;')? '' : this.value ;" />
          <a href="javascript:;" class="search"><img src="<?php echo $_smarty_tpl->getVariable('skin_front')->value;?>
/images/search.png" id="search" alt="Search" /></a>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
<div id="menu">

<ul>

    <li ><a class="<?php if ($_smarty_tpl->getVariable('local')->value=='home'){?>active<?php }else{ ?> <?php }?>"  href="<?php echo site_url();?>
">Trang chủ</a></li>
    <li ><a class="<?php if ($_smarty_tpl->getVariable('local')->value=='news'){?>active<?php }else{ ?> <?php }?>"  href="<?php echo site_url('tin-tuc');?>
">Tin tức</a></li>
    <li  ><a class="<?php if ($_smarty_tpl->getVariable('local')->value=='gallery'){?>active<?php }else{ ?> <?php }?>" href="<?php echo site_url('hinh-anh-hoat-dong');?>
">Hình ảnh</a></li>
    <li ><a class="<?php if ($_smarty_tpl->getVariable('local')->value=='ebook'){?>active<?php }else{ ?> <?php }?>" href="<?php echo site_url('tai-lieu');?>
">Tài liệu</a></li>
    <li ><a class="<?php if ($_smarty_tpl->getVariable('local')->value=='about'){?>active<?php }else{ ?> <?php }?>" href="<?php echo about_url();?>
">Giới thiệu</a></li>
    <li ><a class="<?php if ($_smarty_tpl->getVariable('local')->value=='contact'){?>active<?php }else{ ?> <?php }?>" href="<?php echo contact_url();?>
">Liên hệ</a></li>
</ul>


</div>
  <div class="rnd parent-topnav">
    
    <!-- ###### -->
    <div id="topnav" style="display:none;">
      <ul>
        <li class="<?php if ($_smarty_tpl->getVariable('local')->value=='home'){?>active<?php }else{ ?> <?php }?>"><a  href="<?php echo site_url();?>
">Trang chủ</a></li>
        <li class="<?php if ($_smarty_tpl->getVariable('local')->value=='news'){?>active<?php }else{ ?> <?php }?>"><a  href="<?php echo site_url('tin-tuc');?>
">Tin tức</a></li>
        <li  class="<?php if ($_smarty_tpl->getVariable('local')->value=='gallery'){?>active<?php }else{ ?> <?php }?>"><a href="<?php echo site_url('hinh-anh-hoat-dong');?>
">Hình ảnh</a></li>
        <li class="<?php if ($_smarty_tpl->getVariable('local')->value=='ebook'){?>active<?php }else{ ?> <?php }?>"><a href="<?php echo site_url('tai-lieu');?>
">Tài liệu</a></li>
        <li class="<?php if ($_smarty_tpl->getVariable('local')->value=='about'){?>active<?php }else{ ?> <?php }?>"><a href="<?php echo about_url();?>
">Giới thiệu</a></li>
        <li class="<?php if ($_smarty_tpl->getVariable('local')->value=='contact'){?>active<?php }else{ ?> <?php }?>"><a href="<?php echo contact_url();?>
">Liên hệ</a></li>
      </ul>
    </div>
    <!-- ###### -->
  </div>
</div>