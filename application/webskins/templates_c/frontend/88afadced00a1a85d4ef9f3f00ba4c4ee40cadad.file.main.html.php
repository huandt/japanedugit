<?php /* Smarty version Smarty-3.0.7, created on 2018-03-09 22:31:08
         compiled from "E:\xampp\htdocs\school\application/webskins/templates/frontend/main/main.html" */ ?>
<?php /*%%SmartyHeaderCode:184985aa2a8bc0bcf20-38446648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88afadced00a1a85d4ef9f3f00ba4c4ee40cadad' => 
    array (
      0 => 'E:\\xampp\\htdocs\\school\\application/webskins/templates/frontend/main/main.html',
      1 => 1422793985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184985aa2a8bc0bcf20-38446648',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'E:\xampp\htdocs\school\CDT20\system/plugins/modifier.truncate.php';
?><div id="latestnews">

    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <a href="javascript:;"><img src="<?php echo site_url();?>
webskins/images/anh truong 1.JPG" /></a>
        <?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_hot')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
?>            
            <a href="<?php echo detail_news($_smarty_tpl->tpl_vars['news']->value['id'],$_smarty_tpl->tpl_vars['news']->value['title']);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['news']->value['img_url'];?>
" data-thumb="<?php echo $_smarty_tpl->tpl_vars['news']->value['img_url'];?>
" alt="" title="<?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
"  /></a>
        <?php }} ?>
        </div>

        <div id="htmlcaption" class="nivo-html-caption">
            <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
        </div>
    </div>
    <h2>Tin tức sự kiện nổi bật</h2>
    <ul>
    <?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
?>
      <li class="clear <?php if ($_smarty_tpl->tpl_vars['news']->value['i']==6){?>last<?php }else{ ?> <?php }?>">
        <div class="imgl"><a href="<?php echo $_smarty_tpl->tpl_vars['news']->value['link_detail'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['news']->value['img_url'];?>
" alt="" /></a></div>
        <div class="latestnews">
          <p><a href="<?php echo $_smarty_tpl->tpl_vars['news']->value['link_detail'];?>
"><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</a></p>
          <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['description'],150);?>
</p>
        </div>
      </li>
      <?php }} ?>
    </ul>
    <p class="readmore"><a href="<?php echo site_url('tin-tuc');?>
">Xem tất cả</a></p>
</div>

<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });  
</script>
