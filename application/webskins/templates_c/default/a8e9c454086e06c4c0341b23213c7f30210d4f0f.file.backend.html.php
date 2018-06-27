<?php /* Smarty version Smarty-3.0.7, created on 2015-01-24 23:07:21
         compiled from "F:\xampp\htdocs\school\application/webskins/templates/layout//backend.html" */ ?>
<?php /*%%SmartyHeaderCode:2631454c3c339b83156-81680134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8e9c454086e06c4c0341b23213c7f30210d4f0f' => 
    array (
      0 => 'F:\\xampp\\htdocs\\school\\application/webskins/templates/layout//backend.html',
      1 => 1383451680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2631454c3c339b83156-81680134',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<title><?php echo $_smarty_tpl->getVariable('page_title')->value;?>
</title>
    <base href="<?php echo base_url();?>
"/>
      <?php echo $_smarty_tpl->getVariable('header_script')->value;?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div id="loading-body">
    
</div>
<?php if ($_smarty_tpl->getVariable('login_layout')->value==1){?>
<div class="navbar">
     <div class="navbar-inner">
        <div class="container">
            <h3 style="text-align: center;">Quản trị nội dung website</h3>
        </div>
    </div>
</div>
<div class="container" style="margin-top:30px;">
    <div class="row-fluid">
        <div class="span12">
            <?php echo $_smarty_tpl->getVariable('content')->value;?>

        </div>
    </div>
</div>
    <?php echo $_smarty_tpl->getVariable('footer_script')->value;?>

    
<?php }else{ ?>

<?php echo $_smarty_tpl->getVariable('header')->value;?>

<?php echo $_smarty_tpl->getVariable('navigation')->value;?>

<div class="container" style="margin-top:30px;">
    <div class="row-fluid">
        <div class="span12">
            <div class="main-content">
    	    <?php echo $_smarty_tpl->getVariable('content')->value;?>

            </div>
        </div>
    </div>
</div>
    <?php echo $_smarty_tpl->getVariable('footer')->value;?>

    <?php echo $_smarty_tpl->getVariable('footer_script')->value;?>

<?php }?>
</body>
</html>
