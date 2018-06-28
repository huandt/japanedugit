<?php /* Smarty version Smarty-3.0.7, created on 2018-06-28 23:07:16
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/layout//layout_tomodachi.html" */ ?>
<?php /*%%SmartyHeaderCode:9479013915b3507b49ea646-27603066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa1ad8e17420591dad6335e904b286ed0ed4afbe' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/layout//layout_tomodachi.html',
      1 => 1530201912,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9479013915b3507b49ea646-27603066',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title><?php echo $_smarty_tpl->getVariable('page_title')->value;?>
</title>
		<meta name="description" content="<?php echo $_smarty_tpl->getVariable('meta_description')->value;?>
" />
		<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('meta_keyword')->value;?>
" />
		<base href="<?php echo base_url();?>
"/>
		<?php echo $_smarty_tpl->getVariable('header_script')->value;?>

    </head>
	<body>

		<!-- Header -->
		<?php echo $_smarty_tpl->getVariable('header')->value;?>

		<!-- /Header -->

		<!-- Home -->
		<?php echo $_smarty_tpl->getVariable('slider')->value;?>

		<!-- /Home -->
		<!-- Courses -->
		<?php echo $_smarty_tpl->getVariable('main_content')->value;?>


		<!-- Contact CTA -->
		<?php echo $_smarty_tpl->getVariable('comment')->value;?>

			<!-- /container -->

		</div>
		<!-- /Contact CTA -->

		<!-- Footer -->
		<?php echo $_smarty_tpl->getVariable('footer')->value;?>

		<!-- /Footer -->

		<!-- preloader -->
		<div id='preloader'><div class='preloader'></div></div>
		<!-- /preloader -->


		<!-- jQuery Plugins -->
		<?php echo $_smarty_tpl->getVariable('footer_script')->value;?>

	</body>
</html>
