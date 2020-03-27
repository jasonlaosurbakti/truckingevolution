<?php
include('config.php');
include('action_upload.php');
?>
<style type="text/css">
	.table{
		font:normal 12px Tahoma,verdana;
		border:silver 1px solid;
		width:350px;
	}
	.table tr td{
		border-bottom:silver 1px solid;
		border-right:silver 1px solid;
		padding:0 5px 0 5px;
	}
	.table tr td.title{
		font:bold 12px Tahoma,verdana;
		background-color:#999999;
		color:#000000;
	}
	input{
		font:normal 12px Tahoma,verdana;
	}
	#eror{
		width:345px;;
		border:red 1px solid;
		margin-left:auto;
		margin-right:auto;
		margin-bottom:5px;
		padding:0 0 0 5px;
	}
	#msg{
		width:345px;;
		border:green 1px solid;
		margin-left:auto;
		margin-right:auto;
		margin-bottom:5px;
		padding:0 0 0 5px;
	}
</style>
<form method="post" enctype="multipart/form-data" action="">
<table class="table" cellpadding="0" cellspacing="0" align="center">
<tr>
	<td colspan="2" height="25" class="title">Form Upload File</td>
</tr>
<tr>
	<td width="100">File</td>
	<td><input type="file" name="data_upload" /></td>
</tr>
<tr>
	<td width="100" valign="top">Keterangan</td>
	<td><textarea name="keterangan" cols="30" rows="3"></textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="btnUpload" value="Upload" /></td>
</tr>
</table>
</form>