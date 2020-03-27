
<!DOCTYPE html>

<?php
session_start();
include_once "library/inc.seslogin.php";
include_once "library/inc.connection.php";
include_once "library/inc.library.php";

if($_GET) {
	if(isset($_GET['Format'])=="XLS") {
		$tanggal=date('d-m-Y');
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=Report_Menu.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	}
}
?>
<html>
<head>
	<title>DMR</title>
</head>
<body>
 <style type="text/css">
	<!--body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}--->
	</style> 
 
	

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
    <td width="62" bgcolor="#CCCCCC"><p><b>Completed Date</b></p></td>
    <td width="80" bgcolor="#CCCCCC"><strong>Nomor MR</strong></td>
    <td width="77" bgcolor="#CCCCCC"><b>Site</b></td>  
    <td width="84" bgcolor="#CCCCCC"><strong>Project</strong></td>
    <td width="94" bgcolor="#CCCCCC"><b>Customer</b></td>
	<td width="94" align="center" bgcolor="#CCCCCC"><p><strong>Nomor </strong><strong>PO </strong></p></td>
    <td width="399" align="center" bgcolor="#CCCCCC"><b>Request Note</b></td>
     
	  <td width="80" align="center" bgcolor="#CCCCCC"><strong>Tgl PO</strong></td>
    <td width="79" align="right" bgcolor="#CCCCCC"><strong>Total Biaya(Rp) </strong></td>
   
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
    <td width="44"><?php echo $kolomData['no_penjualan']; ?></td>
    <td width="77"><?php echo $kolomData['workrequest']; ?></td>
    <td width="84"><?php echo $kolomData['nomor_meja']; ?></td>
    <td width="94"><?php echo $kolomData['pelanggan']; ?></td>
	 <td width="94" align="center"><?php echo $kolomData['cost']; ?></td>
     <td width="399"><?php echo $kolomData['keterangan']; ?></td>
    <td width="80" ><?php echo IndonesiaTgl ($kolomData['tgl_pri']); ?></td>
    <td width="79" align="right"><?php echo format_angka($kolom2Data['subtotal']); ?></td>
    
  </tr>
  <?php  ?>
    </tbody>
 <tr>
      <?php
	}
?>
</tr></table><img src="images/btn_print.png" width="40" height="44" onClick="javascript:window.print()" />
</body>
</html>