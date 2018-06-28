<?php /* Smarty version Smarty-3.0.7, created on 2018-06-28 22:22:19
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/layout//frontend.html" */ ?>
<?php /*%%SmartyHeaderCode:6405800335b34fd2bb984a2-62473772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da4750f8f0ec653ceee211f3ecb16118d3e8efc2' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/layout//frontend.html',
      1 => 1530111159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6405800335b34fd2bb984a2-62473772',
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
<?php echo $_smarty_tpl->getVariable('slider')->value;?>

<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
        <!-- ###### -->
        <?php echo $_smarty_tpl->getVariable('sidebar_left')->value;?>

        <!-- ###### -->
        <?php echo $_smarty_tpl->getVariable('main_content')->value;?>

        <!-- ###### -->
        <?php echo $_smarty_tpl->getVariable('sidebar_right')->value;?>

        <!-- ###### -->
      </div>
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