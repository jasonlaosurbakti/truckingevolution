<?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 30;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM menu";
$pageQry = mysql_query($pageSql, $koneksidb) or die("error paging:".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<table>LIST ITEM TRANSACTION TRANSPORT</table>
<a href="?page=Menu-Add" target="_self"></a>
<table id='example' class="table-list" width="1031" border="0" cellspacing="1" cellpadding="1">
 <thead> 
 <tr>
    <td width="32" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="150" bgcolor="#CCCCCC"><strong>Kategori</strong></td>
    <td width="68" bgcolor="#CCCCCC"><strong>Kode</strong></td>
    <td width="507" bgcolor="#CCCCCC"><b>Description Transportation</b></td>
    <td width="228" align="right" bgcolor="#CCCCCC"><b>Harga (Rp) </b></td><td width="27" align="right" bgcolor="#CCCCCC"><strong>Edit</strong></td>
  </tr>
  </thead>
    <tbody>
  <?php
	# MENJALANKAN QUERY
	$mySql 	= "SELECT menu.*, kategori.nm_kategori FROM menu, kategori
				WHERE menu.kd_kategori=kategori.kd_kategori 
				ORDER BY menu.kd_kategori, menu.nm_menu ASC ";
	$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query  salah : ".mysql_error());
	$nomor  = $hal; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode = $kolomData['kd_menu'];
	?>
  <tr>
    <td><?php echo $nomor; ?></td>
    <td><?php echo $kolomData['nm_kategori']; ?></td>
    <td><?php echo $kolomData['kd_menu']; ?></td>
    <td><?php echo $kolomData['nm_menu']; ?></td>
    <td align="right">Rp. <b><?php echo format_angka($kolomData['harga']); ?></b></td><td align="center"><a href="?page=Menu-Edit&Kode=<?php echo $Kode; ?>" target="_self" alt="Edit Data"><img src="images/btn_edit.png" width="10" height="10" border="0" /></a></td>
  </tr>
  <?php } ?>
  </tbody>
  <!--<tr>
    <td colspan="2"><b>Jumlah Data :</b> <?php echo $jml; ?> </td>
    <td colspan="3" align="right"><b>Halaman ke :</b>
    <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?page=Laporan-Menu&hal=$list[$h]'>$h</a> ";
	}
	?></td>
  </tr>-->
</table>
<br />
<table width="100" border="0" cellspacing="2" cellpadding="4">
  <tr>
    <td align="center"><a href="cetak/cetak_menu.php?Format=XLS" target="_blank"><img src="images/xls_icon.png" width="55" height="18" border="0" title="Cetak ke Format HTML Excel"/></a></td>
    <td align="center"><a href="cetak/cetak_menu.php" target="_blank"><img src="images/html_icon.png" width="55" height="18" border="0" title="Cetak ke Format HTML"/></a></td>
  </tr>
</table>
<a href="?page=Menu-Add" target="_self"><img src="images/btn_add_data.png" width="52" height="17" border="0" /></a> 