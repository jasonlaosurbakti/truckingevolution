<?php
error_reporting(0);
mysql_connect("localhost","user","vsi8008011");
mysql_select_db("sigap");

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = mysql_query("select * from menu where nm_menu LIKE '%$q%' ");
while($r = mysql_fetch_array($sql)) {
	$nama_barang = $r['nm_menu'];
	$hr = $r['nm_menu2'];
	$hr2 = $r['kd_menu'];
	echo "$hr2\n";
}
?>
