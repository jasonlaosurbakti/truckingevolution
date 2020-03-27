
<?php
include_once "library/inc.seslogin.php";


# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 10000;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM penjualan";
$pageQry = mysql_query($pageSql, $koneksidb) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>

<h2>DATA MATERIAL REQUEST</h2>
<!--<b>Jumlah Data :</b> <?php echo $jml; ?><br><b>Halaman ke :</b>
      <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo "<a href='?page=Laporan-Penjualan&hal=$list[$h]'>$h</a> ";
	}
	?></br>-->
<table id='example' class="table-list" width="1148" border="0" cellspacing="1" cellpadding="2">
<thead> 
 <tr>
   
    <td width="42" align="center" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="62" bgcolor="#CCCCCC"><p><b>Tanggal MR</b></p></td>
    <td width="77" bgcolor="#CCCCCC"><b>Nomor MR</b> </td>  
    <td width="84" bgcolor="#CCCCCC"><b>User</b></td>
    <td width="94" bgcolor="#CCCCCC"><strong>Departement</strong> </td>
	<td width="399" align="center" bgcolor="#CCCCCC"><b>Description </b></td>
     <td width="94" align="center" bgcolor="#CCCCCC"><p><strong>Nomor </strong><strong>PO </strong></p></td>
	  <td width="80" align="center" bgcolor="#CCCCCC"><strong>Tgl PO</strong></td>
    <td width="79" align="right" bgcolor="#CCCCCC"><strong>Total Biaya(Rp) </strong></td>
    <td width="44" bgcolor="#CCCCCC"><strong>Status MR</strong></td>
    <td width="35" align="center" bgcolor="#CCCCCC"><strong>Approval</strong></td>
  </tr>
  </thead>
    <tbody>
<?php
	# Perintah untuk menampilkan Semua Daftar Transaksi Penjualan
	$mySql = "SELECT * FROM penjualan ORDER BY no_penjualan DESC ";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query 1 salah : ".mysql_error());
	$nomor  = 0; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		$nomor++;
		
		# Membaca Kode Penjualan/ Nomor transaksi
		$noNota = $kolomData['no_penjualan'];
		
		# Menghitung Total penjualan setiap transaksi
		$my2Sql = "SELECT SUM(harga * jumlah) as subtotal FROM penjualan_item WHERE no_penjualan='$noNota'";
		$my2Qry = mysql_query($my2Sql, $koneksidb)  or die ("Query 2 salah : ".mysql_error());
		$kolom2Data = mysql_fetch_array($my2Qry);
?>
  <tr>
    <td width="42" align="center"><?php echo $nomor; ?></td>
    <td width="62" align="center"><?php echo IndonesiaTgl($kolomData['tgl_penjualan']); ?></td>
    <td width="77"><?php echo $kolomData['no_penjualan']; ?></td>
    <td width="84"><?php echo $kolomData['pelanggan']; ?></td>
    <td width="94"><?php echo $kolomData['nomor_meja']; ?></td>
	 <td width="399"><?php echo $kolomData['keterangan']; ?></td>
    <td width="94" align="center"><?php echo $kolomData['cost']; ?></td>
	<td width="80" ><?php echo IndonesiaTgl ($kolomData['tgl_pri']); ?></td>
    <td width="79" align="right"><?php echo format_angka($kolom2Data['subtotal']); ?></td>
    <td width="44"><?php echo $kolomData['workrequest']; ?></td>
    <td width="35" align="center"><a href="transaksi_penjualan_validasi2.php?noNota=<?php echo $noNota; ?>" target="_self" alt="Edit Data"><img src="images/btn_edit.png" width="20" height="20" border="0" /></a></td> -->
  </tr>
  <?php } ?>
    </tbody>
 <!-- <tr>
    <td colspan="4"><b>Jumlah Data :</b> <?php echo $jml; ?></td>
    <td colspan="5" align="right"><b>Halaman ke :</b>
      <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?page=Laporan-Penjualan&hal=$list[$h]'>$h</a> ";
	}
	?></td>
  </tr>-->
</table>
