<?php /* Smarty version Smarty-3.0.7, created on 2018-06-28 22:22:19
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/frontend/main/sidebar_right.html" */ ?>
<?php /*%%SmartyHeaderCode:3165352345b34fd2bb4f5b5-49413989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4152c6786633e02a4f28a009aa74e95b9569aee7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/frontend/main/sidebar_right.html',
      1 => 1530111159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3165352345b34fd2bb4f5b5-49413989',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/Applications/XAMPP/xamppfiles/htdocs/japanedugit/CDT20/system/plugins/modifier.truncate.php';
?><div id="right_column">
  <div class="holder">
    <span class="title-box">Video giới thiệu</span>
    <iframe width="230" height="236" src="//www.youtube.com/embed/-zVbdsktT2s" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="holder">
    <span class="title-box">Bản tin hot</span>
    <iframe width="230" height="236" src="//www.youtube.com/embed/08_wvyyp8tY" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="holder">
    <span class="title-box">Hình ảnh hoạt động</span>
    <?php  $_smarty_tpl->tpl_vars['imge'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_img')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['imge']->key => $_smarty_tpl->tpl_vars['imge']->value){
?>
    	<div class="apply">
      <?php  $_smarty_tpl->tpl_vars['arr'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['imge']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['arr']->key => $_smarty_tpl->tpl_vars['arr']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['arr']->key;
?>
      <a <?php if ($_smarty_tpl->tpl_vars['key']->value%2==0){?>class="a-activity-old"<?php }?> href="<?php echo site_url('hinh-anh-hoat-dong');?>
" ><img src="<?php echo $_smarty_tpl->tpl_vars['arr']->value['img_url'];?>
"/> </a>
      <?php }} ?>
      </div>
    <?php }} ?>
  </div>
  <div class="holder count-access">
    <span class="title-box">Thống kê truy cập</span>
    <div class="apply">   
    <p>Thành viên online: 
    <script id="_wauyc3">var _wau = _wau || [];
_wau.push(["colored", "w9qmwrqh30fw", "yc3", "ffc20e000000"]);
(function() {var s=document.createElement("script"); s.async=true;
s.src="http://widgets.amung.us/colored.js";
document.getElementsByTagName("head")[0].appendChild(s);
})();</script></p>    
    </div>
  </div>
</div>
<!--<strong><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('imge')->value['description'],20);?>
</strong>-->