<?php /* Smarty version Smarty-3.0.7, created on 2018-06-29 00:42:36
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/frontend/header/header.html" */ ?>
<?php /*%%SmartyHeaderCode:19365050625b351e0cd7c6b7-75467871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77edbfb3fd141761ed90f3a9411a924df236ad34' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/frontend/header/header.html',
      1 => 1530207754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19365050625b351e0cd7c6b7-75467871',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<header id="header" class="transparent-nav">
      <div class="container container-st">

        <div class="navbar-header">
          <!-- Logo -->
          <div class="navbar-brand">
            <a class="logo" href="<?php echo base_url();?>
">
              <img src="<?php echo $_smarty_tpl->getVariable('skin_front')->value;?>
/img/logo.png" alt="logo">
            </a>
          </div>
          <!-- /Logo -->

          <!-- Mobile toggle -->
          <button class="navbar-toggle">
            <span></span>
          </button>
          <!-- /Mobile toggle -->
        </div>

      </div>
      <div class="container container-nav">
        <!-- Navigation -->
        <nav id="nav">
          <ul class="main-menu nav navbar-nav navbar-right">
            <li><a href="<?php echo about_url();?>
">Giới thiệu Tomo</a></li>
            <li><a href="#">Giáo viên</a></li>
            <li><a href="#">Tài liệu</a></li>
            <li><a href="#">Khóa học</a></li>
            <li><a href="<?php echo contact_url();?>
">Liên hệ</a></li>
          </ul>
        </nav>
        <!-- /Navigation -->

      </div>
    </header>