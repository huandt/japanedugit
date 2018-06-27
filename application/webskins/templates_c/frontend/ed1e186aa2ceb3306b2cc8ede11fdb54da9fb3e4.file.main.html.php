<?php /* Smarty version Smarty-3.0.7, created on 2015-01-24 23:05:15
         compiled from "F:\xampp\htdocs\school\application/webskins/templates/frontend/gallery/main.html" */ ?>
<?php /*%%SmartyHeaderCode:1405454c3c2bb2c9078-59490315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed1e186aa2ceb3306b2cc8ede11fdb54da9fb3e4' => 
    array (
      0 => 'F:\\xampp\\htdocs\\school\\application/webskins/templates/frontend/gallery/main.html',
      1 => 1383452580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1405454c3c2bb2c9078-59490315',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="gallery" class="clear">
  <h2 class="title">Hình ảnh hoạt động và sự kiện của nhà trường</h2>
  <ul>
  <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_img')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
?>
    <li class="<?php if ($_smarty_tpl->tpl_vars['image']->value['i']%5==0){?>last<?php }else{ ?> <?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['image']->value['img_zoom'];?>
" rel="prettyPhoto[gallery1]"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value['img_url'];?>
" /></a></li>
  <?php }} ?>
  </ul>
</div>
<!-- ####################################################################################################### -->
<div class="pagination">
  <?php echo $_smarty_tpl->getVariable('pagging')->value;?>

</div>