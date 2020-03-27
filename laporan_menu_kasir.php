<?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 30;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM menu";
$pageQry = mysql_query($pageSql, $koneksidb) or die("error paging:".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<h5>DAFTAR BARANG/MATERIAL</h5>
<a href="?page=Menu-Add" target="_self"><img src="images/btn_add_data.png" height="25" border="0" /></a>
<table id='example' class="table-list" width="1031" border="0" cellspacing="1" cellpadding="1">
 <thead> 
 <tr>
    <td width="29" bgcolor="#CCCCCC"><pre><b>No</b></pre></td>
    <td width="137" bgcolor="#CCCCCC"><pre><strong>Kategori</strong></pre></td>
    <td width="62" bgcolor="#CCCCCC"><pre><strong>Kode</strong></pre></td>
    <td width="462" bgcolor="#CCCCCC"><pre><b>Nama Menu </b></pre></td>
    <td width="194" align="right" bgcolor="#CCCCCC"><pre><b>Harga (Rp) </b></pre></td>
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
    <td><pre><?php echo $nomor; ?></pre></td>
    <td><pre><?php echo $kolomData['nm_kategori']; ?></pre></td>
    <td><pre><?php echo $kolomData['kd_menu']; ?></pre></td>
    <td><pre><?php echo $kolomData['nm_menu']; ?></pre></td>
    <td align="right"><pre>Rp. <b><?php echo format_angka($kolomData['harga']); ?></b></pre></td>
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
