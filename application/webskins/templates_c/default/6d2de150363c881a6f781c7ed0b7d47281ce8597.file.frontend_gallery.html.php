<?php /* Smarty version Smarty-3.0.7, created on 2015-01-24 23:05:15
         compiled from "F:\xampp\htdocs\school\application/webskins/templates/layout//frontend_gallery.html" */ ?>
<?php /*%%SmartyHeaderCode:925554c3c2bb43a7e0-92898474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d2de150363c881a6f781c7ed0b7d47281ce8597' => 
    array (
      0 => 'F:\\xampp\\htdocs\\school\\application/webskins/templates/layout//frontend_gallery.html',
      1 => 1398103130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '925554c3c2bb43a7e0-92898474',
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
<link rel="shortcut icon" href="<?php echo site_url();?>
webskins/skins/school.png" />
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
      <?php echo $_smarty_tpl->getVariable('main_content')->value;?>

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