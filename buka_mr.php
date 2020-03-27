
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

<h2>DATA TRIP LOGISTIC</h2>
<!--<b>Jumlah Data :</b> <?php echo $jml; ?><br><b>Halaman ke :</b>
      <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo "<a href='?page=Laporan-Penjualan&hal=$list[$h]'>$h</a> ";
	}
	?></br>-->
<table id='example' class="table-list" width="747" border="0" cellspacing="1" cellpadding="2">
<thead> 
 <tr>
   
    <td width="18" align="center" bgcolor="#CCCCCC"><pre><b>No</b></pre></td>
    <td width="64" bgcolor="#CCCCCC"><pre><b>Tanggal </b></pre></td>
        <td width="49" bgcolor="#CCCCCC"><pre><b>Nomor </b></pre></td>  
    <td width="65" bgcolor="#CCCCCC"><pre><b>Customer</b></pre></td>
    <td width="84" bgcolor="#CCCCCC"><pre><strong>Location </strong></pre></td>
	<td width="89" align="center" bgcolor="#CCCCCC"><pre><b>Pengiriman</b></pre></td>
     <td width="69" align="center" bgcolor="#CCCCCC"><pre><strong>Comodity</strong><strong></strong></pre></td>
	  <td width="82" align="center" bgcolor="#CCCCCC"><pre><strong>Tgl Closed</strong></pre></td>
    <td width="63" align="right" bgcolor="#CCCCCC"><pre><strong>Revenue<br />(Rp) </strong></pre></td>
    <td width="56" bgcolor="#CCCCCC"><pre><strong>Status </strong></pre></td>
    <td width="177" align="center" bgcolor="#CCCCCC"><pre><strong>Update <br />Status</strong></pre></td>
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
    <td width="18" height="24" align="center"><p><?php echo $nomor; ?></p></td>
    <td width="64" align="center"><p><?php echo IndonesiaTgl($kolomData['tgl_penjualan']); ?></p></td>
    <td width="49"><p><?php echo $kolomData['no_penjualan']; ?></p></td>
    <td width="65"><p><?php echo $kolomData['pelanggan']; ?></p></td>
    <td width="84"><p><?php echo $kolomData['nomor_meja']; ?></p></td>
	 <td width="89"><p><?php echo $kolomData['keterangan']; ?></p></td>
    <td width="69" align="center"><p><?php echo $kolomData['cost']; ?></p></td>
	<td width="82" ><p><?php echo IndonesiaTgl ($kolomData['tgl_pri']); ?></p></td>
    <td width="63" align="right"><p><?php echo format_angka($kolom2Data['subtotal']); ?></p></td>
    <td width="56"><p>
      <?php
      if($status  == "0"){
				echo "<img width=60 height=66 src='images/inprogres.jpg' />";}
if ($status  == "1"){
				echo "<img width=60 height=66 src='images/finish.jpg' />";}
if($status  == "2"){
				echo "<img width=60 height=66 src='images/closed.jpg' />";}
    ?>   
    </p></td>
    <td width="177" align="center"><p><a href="transaksi_penjualan_view.php?noNota=<?php echo $noNota; ?>" target="_blank"><img src="images/btn_view.png" width="20" height="20" border="0" /></a><a href="simpan_update_mr.php?noNota=<?php echo $noNota; ?>" target="_blank" alt="Edit Data"><img src="images/btn_edit.png" width="20" height="20" border="0" /></a></p></td>
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
