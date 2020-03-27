
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

<h5>DATA APPROVAL PERJALANAN</h5>
<!--<b>Jumlah Data :</b> <?php echo $jml; ?><br><b>Halaman ke :</b>
      <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo "<a href='?page=Laporan-Penjualan&hal=$list[$h]'>$h</a> ";
	}
	?></br>-->
<table id='example' class="table-list" width="1142" border="0" cellspacing="1" cellpadding="2">
<thead> 
 <tr>
   
    <td width="27" align="center" bgcolor="#CCCCCC"><pre><font face="Arial, Helvetica, sans-serif"><strong>No</strong></font></pre></td>
    <td width="87" bgcolor="#CCCCCC"><pre><font face="Arial, Helvetica, sans-serif"><strong>Tanggal 
MR</strong></font></pre></td>
        <td width="72" bgcolor="#CCCCCC"><pre><font face="Arial, Helvetica, sans-serif"><strong>Nomor 
MR </strong></font></pre></td>  
    <td width="68" bgcolor="#CCCCCC"><pre><font face="Arial, Helvetica, sans-serif"><strong>User</strong></font></pre></td>
    <td width="96" bgcolor="#CCCCCC"><pre><font face="Arial, Helvetica, sans-serif"><strong>Departement </strong></font></pre></td>
	<td width="200" align="center" bgcolor="#CCCCCC"><pre><font face="Arial, Helvetica, sans-serif"><strong>Description </strong></font></pre></td>
     <td width="91" align="center" bgcolor="#CCCCCC"><pre><font face="Arial, Helvetica, sans-serif"><strong>Alocation
 Cost</strong></font></pre></td>
	  <td width="182" align="center" bgcolor="#CCCCCC"><pre><font face="Arial, Helvetica, sans-serif"><strong>Note</strong></font></pre></td>
    <td width="128" align="right" bgcolor="#CCCCCC"><pre><font face="Arial, Helvetica, sans-serif"><strong>Total Biaya(Rp) </strong></font></pre></td>
    <td width="72" bgcolor="#CCCCCC"><pre><font face="Arial, Helvetica, sans-serif"><strong>Status 
MR</strong></font></pre></td>
    <td width="63" align="center" bgcolor="#CCCCCC"><pre><font face="Arial, Helvetica, sans-serif"><strong>Approval</strong></font></pre></td>
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
$validasi1 = $kolomData['validasi1'];
$validasi2 = $kolomData['validasi2'];
$validasi3 = $kolomData['validasi3'];		
		# Membaca Kode Penjualan/ Nomor transaksi
		$noNota = $kolomData['no_penjualan'];
		
		# Menghitung Total penjualan setiap transaksi
		$my2Sql = "SELECT SUM(harga * jumlah) as subtotal FROM penjualan_item WHERE no_penjualan='$noNota'";
		$my2Qry = mysql_query($my2Sql, $koneksidb)  or die ("Query 2 salah : ".mysql_error());
		$kolom2Data = mysql_fetch_array($my2Qry);
?>
  <tr>
    <td width="27" align="center"><p><?php echo $nomor; ?></p></td>
    <td width="87" align="center"><p><?php echo IndonesiaTgl($kolomData['tgl_penjualan']); ?></p></td>
    <td width="72"><p><?php echo $kolomData['no_penjualan']; ?></p></td>
    <td width="68"><p><?php echo $kolomData['pelanggan']; ?></p></td>
    <td width="96"><p><?php echo $kolomData['nomor_meja']; ?></p></td>
	 <td width="200"><p><?php echo $kolomData['keterangan']; ?></p></td>
    <td width="91" align="center"><p><?php echo $kolomData['cost']; ?></p></td>
	<td width="182" ><p><?php echo $kolomData['mt']; ?></p></td>
    <td width="128" align="right"><p><?php echo format_angka($kolom2Data['subtotal']); ?></p></td>
    <td width="72">  <p>
      <?php if($validasi1 == "0"){
				echo "<img width=45 height=46 src='images/rejected.Png' />";}
				else{
				echo "<img width=45 height=46 src='images/approved.Png' />
";}
    ?>
    </p></td>
    <td width="63" align="center"><p><a href="transaksi_penjualan_view.php?noNota=<?php echo $noNota; ?>" target="_blank"><img src="images/btn_view.png" width="20" height="20" border="0" /></a><a href="transaksi_penjualan_validasi.php?noNota=<?php echo $noNota; ?>" target="_blank" alt="Edit Data"><img src="images/btn_edit.png" width="20" height="20" border="0" /></a></p></td>
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
