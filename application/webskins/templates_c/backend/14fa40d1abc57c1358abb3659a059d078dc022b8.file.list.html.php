<?php /* Smarty version Smarty-3.0.7, created on 2018-06-29 22:45:43
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/backend/ebooks/list.html" */ ?>
<?php /*%%SmartyHeaderCode:20405311565b3654272df713-66192352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14fa40d1abc57c1358abb3659a059d078dc022b8' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/japanedugit/application/webskins/templates/backend/ebooks/list.html',
      1 => 1530111159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20405311565b3654272df713-66192352',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h6 class="title"><i class="icon-user"></i>Quản trị tài liệu </h6>

<?php echo $_smarty_tpl->getVariable('msg')->value;?>

<div class="box-content" id="khung-edit">
    <h6 class="title"><i class="icon-wrench"></i> &nbsp;Thêm/Sửa tài liệu</h6>
    <div class="search-form" style="margin-top: 20px;">
       <?php echo $_smarty_tpl->getVariable('begin_form')->value;?>

            <input type="hidden" id="id_edit" name="id_edit" value="<?php echo $_smarty_tpl->getVariable('id_edit')->value;?>
"/>
            <div class="span12">
                 <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label" for="fullname">Tên tài liệu</label>
                        <div class="controls">
                            <input type="text" class="span6" id="name" name="name" placeholder="Tên tài liệu "/>
                        </div>
                    </div>
                </div>   
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label" for="fullname">File cần tài liệu (Ưu tiên dạng văn bản và các file nén)</label>
                        <div class="controls">
                            <input type="file" id="ebook" name="ebook" />
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label" for="fullname">Mô tả</label>
                        <div class="controls">
                            <textarea style="width: 450px;height:70px;" name="description" id="description"></textarea>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="control-group" style="margin-left: 20px;">
        <div class="controls">
        <button class="btn btn-success" id="addmenu" type="submit"><i class="icon-plus-sign icon-white"></i> &nbsp;Lưu lại</button>
        </div>
    </div>
            
        <?php echo $_smarty_tpl->getVariable('end_form')->value;?>

    </div>
</div>
<table class="table table-bordered table-striped tablesorter">
    <thead>
        <tr>
            <th style="width:50px;">Thứ tự</th>
            <th colspan="4">Tên tài liệu </th>
            <th>Mô tả</th>
            <th style="width: 85px; text-align: center"><i class="icon-wrench"></i> Thao tác</th>
        </tr>
    </thead>
    <tbody>
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('arr_ebook')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
         <tr>
            <td><strong><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</strong></td>
            <td colspan="4"><strong><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</strong></td>
            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['description'];?>
</td>
            <td>
                    <a class="btn btn-success js_edit" href="<?php echo admin_url();?>
ebook/edit/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><i class="icon-edit icon-white"></i></a>
                    <a href="<?php echo admin_url();?>
ebook/index/del/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-warning" onclick="return confirm('Bạn có chắc chắn là muốn xóa dữ liệu này?')"><i class="icon-trash icon-white"></i></a>
            </td>
        </tr>
    <?php }} ?>    
    </tbody>
</table>

<div class="fix"></div>