<?php /* Smarty version Smarty-3.0.7, created on 2018-03-10 07:01:56
         compiled from "E:\xampp\htdocs\school\application/webskins/templates/backend/news/form.html" */ ?>
<?php /*%%SmartyHeaderCode:214825aa32074487fe7-24967406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88a789e286506be9632f2c1843e700ca191dd554' => 
    array (
      0 => 'E:\\xampp\\htdocs\\school\\application/webskins/templates/backend/news/form.html',
      1 => 1520639717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214825aa32074487fe7-24967406',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h6 class="title" style=" width: 78%; float: left; ">
    <i class="icon-edit"></i> <?php if ($_smarty_tpl->getVariable('id')->value){?>Sửa nội dung<?php }else{ ?>Thêm nội dung<?php }?>
</h6>
<input type="hidden" id="base_url" value="<?php echo site_url();?>
" />
<a href="<?php echo site_url("admin/news");?>
" class="btn btn-success" style="float: right; margin-top: 12px; margin-left: 19px;"><i class="icon-th-list icon-white"></i> Danh sách</a>
<div class="row-fluid">
	<div class="span12">
		<?php if ($_smarty_tpl->getVariable('notice')->value){?>
		<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><?php echo $_smarty_tpl->getVariable('notice')->value;?>
</div>
		<?php }?>
		<?php echo $_smarty_tpl->getVariable('form_edit')->value;?>


			<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" name="id"/>
			<label>Tiêu đề</label>
		    <input type="text" id="title" value="<?php echo $_smarty_tpl->getVariable('data')->value['title'];?>
" name="title" class="span6"/>
            
		    <label>Url fix cứng</label>
		    <input type="text" id="slug" placeholder="<?php echo site_url();?>
[url]" value="<?php echo $_smarty_tpl->getVariable('data')->value['url_fix'];?>
" name="url_fix" class="span6"/>
    		
    		<div class="control-group">
                <label class="control-label" for="fullname">Danh mục</label>
                <div class="controls">
                    <select name="category">
                        <option value="" selected="selected">Chọn danh mục</option>
                        <?php echo $_smarty_tpl->getVariable('category_list')->value;?>

                    </select>                        
                </div>
            </div>
            <label>Miêu tả</label>
            <textarea name="description" style="width: 450px;height:50px;"><?php echo $_smarty_tpl->getVariable('data')->value['description'];?>
</textarea>
            
            <label>Ảnh đại diện</label>
            <input type="file" name="image" />
            <?php if ($_smarty_tpl->getVariable('data')->value['image']){?>
            <img src="<?php echo store_data_url();?>
news/<?php echo $_smarty_tpl->getVariable('data')->value['image'];?>
" width="80" height="80" />
            <?php }?>
            <label>Nội dung</label>
		    <textarea id="content" name="content" class="span9 editor"><?php echo $_smarty_tpl->getVariable('data')->value['content'];?>
</textarea>
		    <label class="checkbox">
		      	<input type="checkbox" name="status" value="1"<?php if ($_smarty_tpl->getVariable('data')->value['active']==1){?> checked="checked"<?php }?> /> Hoạt động
		    </label>
		    <div class="control-group" style="text-align: center">
    			<button class="btn btn-success guide-cat-add"><i class="icon-ok icon-white"></i> Lưu</button>
		    </div>
		</form>
	</div>
</div>
<div class="fix"></div>