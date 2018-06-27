<?php /* Smarty version Smarty-3.0.7, created on 2018-03-09 22:31:08
         compiled from "E:\xampp\htdocs\school\application/webskins/templates/frontend/main/sidebar_left.html" */ ?>
<?php /*%%SmartyHeaderCode:41795aa2a8bcdc8474-66629534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae41b86fc4091f3664cfd058758ebfcb6b11bee5' => 
    array (
      0 => 'E:\\xampp\\htdocs\\school\\application/webskins/templates/frontend/main/sidebar_left.html',
      1 => 1398102578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41795aa2a8bcdc8474-66629534',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="left_column">
<?php  $_smarty_tpl->tpl_vars['arr'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('parent')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['arr']->key => $_smarty_tpl->tpl_vars['arr']->value){
?> 
	<div class="subnav">
	<span class="title-box"><?php echo $_smarty_tpl->tpl_vars['arr']->value['name'];?>
</span>
		<?php if ($_smarty_tpl->getVariable('list_category')->value[$_smarty_tpl->tpl_vars['arr']->value['id']]){?>
		<ul class="ul-list-box">
		<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_category')->value[$_smarty_tpl->tpl_vars['arr']->value['id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
?>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['one']->value['link_detail'];?>
"><?php echo $_smarty_tpl->tpl_vars['one']->value['name'];?>
</a></li>
		<?php }} ?>
		</ul>
		<?php }?>
	</div>
<?php }} ?>
<!--
<?php  $_smarty_tpl->tpl_vars['cate'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_category')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cate']->key => $_smarty_tpl->tpl_vars['cate']->value){
?>
  <span class="title-box"><?php echo $_smarty_tpl->tpl_vars['cate']->value['name'];?>
</span>
  <div class="imgholder"><a href="<?php echo $_smarty_tpl->tpl_vars['cate']->value['link_detail'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['cate']->value['img_url'];?>
" alt="" /></a></div>

<?php }} ?>
-->
</div>