<?php /* Smarty version Smarty-3.0.7, created on 2015-01-24 23:05:11
         compiled from "F:\xampp\htdocs\school\application/webskins/templates/frontend/main/slider.html" */ ?>
<?php /*%%SmartyHeaderCode:3119654c3c2b792ad68-35268578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a72bd470d83a2e598c7bb2bd8fad58d6d5028cd3' => 
    array (
      0 => 'F:\\xampp\\htdocs\\school\\application/webskins/templates/frontend/main/slider.html',
      1 => 1397519626,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3119654c3c2b792ad68-35268578',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'F:\xampp\htdocs\school\CDT20\system/plugins/modifier.truncate.php';
?><div class="wrapper" style="display:none;">
  <div id="featured_slide" class="clear">
    <!-- ###### -->
    <div class="overlay_left"></div>
    <div id="featured_content">
    <?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
?>
      <div class="featured_box" id="fc<?php echo $_smarty_tpl->tpl_vars['news']->value['i'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['news']->value['img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
" />
        <div class="floater">
          <h2><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</h2>
          <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['description'],150);?>
</p>
          <p class="readmore"><a href="<?php echo detail_news($_smarty_tpl->tpl_vars['news']->value['id'],$_smarty_tpl->tpl_vars['news']->value['title']);?>
">Chi tiết &raquo;</a></p>
        </div>
      </div>
    <?php }} ?>
    </div>
    <ul id="featured_tabs">
    <?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
?>
      <li class="<?php if ($_smarty_tpl->tpl_vars['news']->value['i']==5){?>last<?php }else{ ?> <?php }?>"><a href="#fc<?php echo $_smarty_tpl->tpl_vars['news']->value['i'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['title'],30);?>
</a></li>
    <?php }} ?>
    </ul>
    <div class="overlay_right"></div>
    <!-- ###### -->
  </div>
</div>