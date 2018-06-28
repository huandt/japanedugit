<?php /* Smarty version Smarty-3.0.7, created on 2018-06-29 00:40:57
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/frontend/news/contact.html" */ ?>
<?php /*%%SmartyHeaderCode:20339397965b351da94c8119-50544066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e28e6837bcbe5a1f99eb135a3e6fec8237b7c8b9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/frontend/news/contact.html',
      1 => 1530207655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20339397965b351da94c8119-50544066',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Contact -->
<div id="contact" class="section">

	<!-- container -->
	<div class="container">

		<!-- row -->
		<div class="row">

			<!-- contact form -->
			<div class="col-md-6">
				<div class="contact-form">
					<h4>Gửi tin nhắn</h4>
					<form>
						<input class="input" type="text" name="name" placeholder="Họ tên">
						<input class="input" type="email" name="email" placeholder="Email">
						<input class="input" type="text" name="subject" placeholder="Tiêu đề">
						<textarea class="input" name="message" placeholder="Nhập nội dung"></textarea>
						<button class="main-button icon-button pull-right">Gửi</button>
					</form>
				</div>
			</div>
			<!-- /contact form -->

			<!-- contact information -->
			<div class="col-md-5 col-md-offset-1">
				<h4>Thông Tin Liên Hệ</h4>
				<ul class="contact-details">
					<li><i class="fa fa-envelope"></i>hello@ebe.edu.vn</li>
					<li><i class="fa fa-phone"></i>0916-362-471</li>
					<li><i class="fa fa-map-marker"></i>Tầng 4 - 172 Đường Láng</li>
				</ul>

				<!-- contact map -->
				<div id="contact-map"></div>
				<!-- /contact map -->

			</div>
			<!-- contact information -->

		</div>
		<!-- /row -->

	</div>
	<!-- /container -->

</div>
<!-- /Contact -->
<script src="https://maps.googleapis.com/maps/api/js"></script>