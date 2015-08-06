<?php /* Smarty version 3.1.27, created on 2015-08-06 16:39:39
         compiled from "app/views/layout.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:208024319155c371abb16c41_25271989%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bc2cc2ce8070c5ee1bbba13c029551978cbf181' => 
    array (
      0 => 'app/views/layout.tpl',
      1 => 1438871976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208024319155c371abb16c41_25271989',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55c371abba2721_87905811',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55c371abba2721_87905811')) {
function content_55c371abba2721_87905811 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '208024319155c371abb16c41_25271989';
?>
<!-- Include header layout -->
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


	<!-- Include base layout -->
	<?php echo $_smarty_tpl->getSubTemplate ('base.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<!-- Include footer layout -->
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>