<?php
if (count($_GET)) {
	$var = decode($_SERVER['REQUEST_URI']);
	$gmodule = isset($var['module']) ? $var['module'] : '';
	$sukses = isset($var['sukses']) ? $var['sukses'] : '';
	$error = isset($var['error']) ? $var['error'] : '';
	$gact = isset($var['act']) ? $var['act'] : '';
	$aksi = isset($var['aksi']) ? $var['aksi'] : '';
	$gid = isset($var['id']) ? $var['id'] : '';
	$tambahan = isset($var['tambahan']) ? $var['tambahan'] : '';
}
?>