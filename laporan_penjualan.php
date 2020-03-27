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
<style type="text/css">
#example thead tr td {
	color: #F00;
}
#example tbody tr td {
	font-family: Tahoma, Geneva, sans-serif;
}
</style>

<h4>DATA REPORT TRUCKING SYSTEM</h4>
<!--<b>Jumlah Data :</b> <?php echo $jml; ?><br><b>Halaman ke :</b>
      <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo "<a href='?page=Laporan-Penjualan&hal=$list[$h]'>$h</a> ";
	}
	?></br>-->
<table id='example' class="table-list" width="1379" border="0" cellspacing="1" cellpadding="2">
<thead> 
 <tr>
   <td width="20" align="center" bgcolor="#CCCCCC"><b>DN</b></td>
   <td width="32" align="center" bgcolor="#CCCCCC"><strong>DEL</strong></td>
   <td width="19" align="center" bgcolor="#CCCCCC"><strong>EDIT</strong></td>
   <td width="22" align="center" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="88" bgcolor="#CCCCCC"><p align="center"><b>Date Completed</b></p></td>
    <td width="29" bgcolor="#CCCCCC"><div align="center"><strong>Site</strong></div></td>
    <td width="49" bgcolor="#CCCCCC"><p align="center"><strong>Order Date</strong></td>
    <td width="61" bgcolor="#CCCCCC"><div align="center"><b>No. Form</b></div></td>  
    <td width="86" bgcolor="#CCCCCC"><div align="center"><b>Customer</b></div></td>
    <td width="87" bgcolor="#CCCCCC"><div align="center"><strong>Project</strong></div></td>
	<td width="181" align="center" bgcolor="#CCCCCC"><b>Comodity</b></td>
	<td width="116" align="center" bgcolor="#CCCCCC"><strong>No. DN</strong></td>
    <td width="107" align="center" bgcolor="#CCCCCC"><p><strong>Project Area</strong><strong></strong></p></td>
    <td width="120" align="center" bgcolor="#CCCCCC"><strong>Base Station</strong></td>
	<td width="66" align="center" bgcolor="#CCCCCC"><strong>PO</strong></td>
    <td width="71" align="right" bgcolor="#CCCCCC"><div align="center"><strong> Revenue<br />Rp </strong></div></td>
    <td width="58" align="center" bgcolor="#CCCCCC"><b>Status</b></td>
     <td width="20" align="center" bgcolor="#CCCCCC">&nbsp;</td>
     <td width="32" align="center" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="19" align="center" bgcolor="#CCCCCC">&nbsp;</td>
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

#variabel baru
$status = $kolomData['Status'];
		
		# Membaca Kode Penjualan/ Nomor transaksi
		$noNota = $kolomData['no_penjualan'];
		
		# Menghitung Total penjualan setiap transaksi
		$my2Sql = "SELECT SUM(harga * jumlah) as subtotal FROM penjualan_item WHERE no_penjualan='$noNota'";
		$my2Qry = mysql_query($my2Sql, $koneksidb)  or die ("Query 2 salah : ".mysql_error());
		$kolom2Data = mysql_fetch_array($my2Qry);

?>
  <tr>
    <td width="20" align="center"><a href="transaksi_penjualan_view.php?noNota=<?php echo $noNota; ?>" target="_blank"><img src="images/btn_view.png" width="20" height="20" border="0" /></a></td>
    <td width="32" align="center"><a href="?page=Penjualan-Delete&noNota=<?php echo $noNota; ?>" target="_self" alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"> <img src="images/btn_delete.png" width="20" height="20"  border="0"  alt="Delete Data" /></td>
    <td width="19" align="center"><a href="transaksi_penjualan_edit.php?noNota=<?php echo $noNota; ?>" target="_blank" alt="Edit Data"><img src="images/btn_edit.png" width="20" height="20" border="0" /></a></td>
    <td width="22" align="center"><?php echo $nomor; ?></td>
    <td width="88" align="center"><?php echo IndonesiaTgl($kolomData['tgl_penjualan']); ?></td>
    <td width="29"><?php echo $kolomData['workrequest']; ?></td>
    <td width="49" align="center"><?php echo IndonesiaTgl($kolomData['tgl_order']); ?></td>
    <td width="61"><?php echo $kolomData['no_penjualan']; ?></td>
    <td width="86"><?php echo $kolomData['pelanggan']; ?></td>
    <td width="87"><?php echo $kolomData['nomor_meja']; ?></td>
	 <td width="181"><?php echo $kolomData['keterangan']; ?></td>
	 <td width="116" align="center"><?php echo $kolomData['hours4']; ?></td>
    <td width="107" align="center"><?php echo $kolomData['cost']; ?></td>
    <td width="120" ><?php echo $kolomData['karyawan3']; ?></td>
	<td width="66" ><?php echo IndonesiaTgl ($kolomData['tgl_pri']); ?></td>
    <td width="71" align="right"><?php echo format_angka($kolom2Data['subtotal']); ?></td>
    <td width="58" align="right"> <?php
      if($status  == "0"){
				echo "<img width=33 height=33 src='images/inprogres.jpg' />";}
if ($status  == "1"){
				echo "<img width=33 height=33 src='images/finish.jpg' />";}
if($status  == "2"){
				echo "<img width=33 height=33 src='images/closed.jpg' />";}
    ?></td>
    <td width="20" align="center">&nbsp;</td>
    <td width="32" align="center">&nbsp;</td>
    <td width="19" align="center">&nbsp;</td>
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
    <tr>
      <td align="center"></td>
      <td align="center"></td>
      <td align="center"></td>
    <td align="center"></td>
    <td align="center"><a href="export_excel.php" target="_blank"><img src="images/html_icon.png" width="55" height="18" border="0" title="Cetak ke Format HTML"/></a></td><td align="Left"></td>
    <td><a href="export_excel.php?Format=XLS" target="_blank"><img src="images/xls_icon.png" width="55" height="18" border="0" title="Cetak ke Format HTML Excel"/></a></td>
    <td><a href="export_excel.php?Format=XLS" target="_blank"></a></td>
  </tr>
  
</table>
<p> 

       
	 </p>
<td align="Left">&nbsp;</td>
