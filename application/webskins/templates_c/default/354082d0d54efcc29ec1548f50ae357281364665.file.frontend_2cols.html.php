<?php /* Smarty version Smarty-3.0.7, created on 2015-01-24 22:56:53
         compiled from "F:\xampp\htdocs\school\application/webskins/templates/layout//frontend_2cols.html" */ ?>
<?php /*%%SmartyHeaderCode:1473254c3c0c5d43924-50278296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '354082d0d54efcc29ec1548f50ae357281364665' => 
    array (
      0 => 'F:\\xampp\\htdocs\\school\\application/webskins/templates/layout//frontend_2cols.html',
      1 => 1382975402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1473254c3c0c5d43924-50278296',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head profile="http://gmpg.org/xfn/11">
<title><?php echo $_smarty_tpl->getVariable('page_title')->value;?>
</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('meta_description')->value;?>
" />
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('meta_keyword')->value;?>
" />
<base href="<?php echo base_url();?>
"/>
<?php echo $_smarty_tpl->getVariable('header_script')->value;?>

<!-- End Homepage Specific Elements -->
</head>
<body id="top">
    <?php echo $_smarty_tpl->getVariable('header')->value;?>

<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
      <?php echo $_smarty_tpl->getVariable('sidebar_left')->value;?>

      <div id="content">
        <?php echo $_smarty_tpl->getVariable('main_content')->value;?>

      </div>
      
      <!-- ####################################################################################################### -->
      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div class="rnd">
    <?php echo $_smarty_tpl->getVariable('footer')->value;?>

  </div>
</div>
<!-- ####################################################################################################### -->
<?php echo $_smarty_tpl->getVariable('footer_script')->value;?>

</body>
</html>