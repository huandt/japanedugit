/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//config.uiColor = '#9AB8F3';
	
	config.filebrowserBrowseUrl 		= 'ckeditor/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl 	= 'ckeditor/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl 	= $('#base_url').val() +'ckeditor/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl 		= $('#base_url').val() +'ckeditor/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl 	= $('#base_url').val() +'ckeditor/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl	=$('#base_url').val() + 'ckeditor/kcfinder/upload.php?type=flash';
	
	//config.filebrowserBrowseUrl 	 = 'ckeditor/ckfinder/ckfinder.html';
	//config.filebrowserImageBrowseUrl = 'ckeditor/ckfinder/ckfinder.html';
	//config.filebrowserFlashBrowseUrl = 'ckeditor/ckfinder/ckfinder.html';
	config.emailProtection = 'encode';
	config.language = 'en';
	/*
	config.toolbar = [
	   ['Source','-','Save','Cut','Copy','Paste'],
	   ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	   ['Bold','Italic','Underline'],
	   ['NumberedList','BulletedList'],
	   ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Link'],
	   ['Image','Flash','Table','HorizontalRule'],
	   ['Styles','Format','Font','FontSize'],
	   ['TextColor','BGColor'],
   ];
	*/
   config.shiftEnterMode = CKEDITOR.ENTER_BR;
   config.enterMode = CKEDITOR.ENTER_BR;
   config.entities_additional = '#1049';
   config.toolbar_Full =
	[
		{ name: 'document',    items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
		{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing',     items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		{ name: 'forms',       items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
		{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',      items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] },
		'/',
		{ name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors',      items : [ 'TextColor','BGColor' ] },
		{ name: 'tools',       items : [ 'Maximize', 'ShowBlocks'] }
	];
	
	//config.toolbarCanCollapse = true;
	//config.toolbarGroupCycling = false;
	config.ToolbarStartExpanded = true ;
};