<?php
include_once "library/inc.seslogin.php";

$SqlPeriode = ""; $startTgl=""; $endTgl="";

# Set Tanggal skrg
$tglStart 	= isset($_POST['cmbTglStart']) ? $_POST['cmbTglStart'] : date('d-m-Y');
$tglEnd 	= isset($_POST['cmbTglEnd']) ? $_POST['cmbTglEnd'] : date('d-m-Y');

# Jika Nomor Page (halaman) diklik
if($_GET) {
	if (isset($_POST['btnShow'])) {
		$SqlPeriode = "( quality BETWEEN '".InggrisTgl($_POST['cmbTglStart'])."' AND '".InggrisTgl($_POST['cmbTglEnd'])."')";
	}
	else {
		$startTgl 	= isset($_GET['startTgl']) ? $_GET['startTgl'] : $tglStart;
		$endTgl 	= isset($_GET['endTgl']) ? $_GET['endTgl'] : $tglEnd; 
		$SqlPeriode = " ( quality BETWEEN '".InggrisTgl($startTgl)."' AND '".InggrisTgl($endTgl)."')";
	}
}

# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM penjualan WHERE $SqlPeriode";
$pageQry = mysql_query($pageSql, $koneksidb) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<h2>LAPORAN MATERIAL REQUEST PER PERIODE </h2>
<form action="?page=Laporan-Penjualan-Periode" method="post" name="form1" target="_self" id="form1">
  <table width="500" border="0"  class="table-list">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><strong>PERIODE TANGGAL </strong></td>
    </tr>
    <tr>
      <td width="90"><strong>Periode </strong></td>
      <td width="5"><strong>:</strong></td>
      <td width="391"><?php echo form_tanggal("cmbTglStart",$tglStart); ?> s/d <?php echo form_tanggal("cmbTglEnd",$tglEnd); ?>
      <input name="btnShow" type="submit" value=" Tampilkan " /></td>
    </tr>
  </table>
</form>

Daftar Material Request dari tanggal <b><?php echo $tglStart; ?></b> s/d <b><?php echo $tglEnd; ?></b><br /><br />
<table id='example' class="table-list" width="1248" border="0" cellspacing="1" cellpadding="2">
<thead>
  <tr>
    <td width="21" align="center" bgcolor="#CCCCCC"><b>No</b></td>
     <td width="60" bgcolor="#CCCCCC"><b>Tgl Input</b></td>
    <td width="91" bgcolor="#CCCCCC"><b>Tgl. MR</b></td>
    <td width="77" bgcolor="#CCCCCC"><b>No. MR</b> </td> 
    <td width="68" bgcolor="#CCCCCC"><b>USER</b></td> 
    <td width="75" bgcolor="#CCCCCC"><b>Tgl WR</b></td>
    <td width="69" bgcolor="#CCCCCC"><b>Tgl Pembelian</b></td>
    <td width="59" bgcolor="#CCCCCC"><strong>DEPT</strong></td>
    <td width="229" align="center" bgcolor="#CCCCCC"><b>Description </b></td>
     <td width="88" align="center" bgcolor="#CCCCCC"><p><strong>Nomor PO</strong></p></td>
      <td width="117" align="center" bgcolor="#CCCCCC"><strong>Tgl PO</strong></td>
          <td width="76" align="center" bgcolor="#CCCCCC"><strong>Total Biaya(Rp) </strong></td>
    <td width="77" align="center" bgcolor="#CCCCCC"><b>Status MR</b></td>
    <td width="33" align="center" bgcolor="#CCCCCC"><b>View</b></td>
    <td width="32" align="center" bgcolor="#CCCCCC"><b>Edit</b></td>
  </tr>
  </thead>
  <tbody>
<?php
	# Perintah untuk menampilkan Transaksi Penjualan Filter Periode
	$mySql = "SELECT * FROM penjualan WHERE $SqlPeriode ORDER BY no_penjualan ASC";
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
    <td align="center"><?php echo $nomor; ?></td>
    <td><?php echo IndonesiaTgl($kolomData['quality']); ?></td>
    <td><?php echo IndonesiaTgl($kolomData['tgl_penjualan']); ?></td>
    <td><?php echo $kolomData['no_penjualan']; ?></td>
    <td><b><?php echo $kolomData['pelanggan']; ?></b></td>
    <td><?php echo IndonesiaTgl ($kolomData['tgl_order']); ?></td>
    <td><?php echo IndonesiaTgl ($kolomData['tgl_penjualan']); ?></td>
    <td><b><?php echo $kolomData['nomor_meja']; ?></b></td>
    <td><?php echo $kolomData['keterangan']; ?></td>
    <td><?php echo $kolomData['cost']; ?></td>
    <td><?php echo IndonesiaTgl ($kolomData['tgl_pri']); ?></td>
    <td align="right"><?php echo format_angka($kolom2Data['subtotal']); ?></td>
    <td><?php echo $kolomData['workrequest']; ?></td>
    <td align="center"><a href="transaksi_penjualan_view.php?noNota=<?php echo $noNota; ?>" target="_blank"><img src="images/btn_view.png" width="20" height="20" border="0" /></a></td>
    <td align="center"><a href="transaksi_penjualan_edit.php?noNota=<?php echo $noNota; ?>" target="_blank"><img src="images/btn_edit.png" width="20" height="20" border="0" /></a></td>
  </tr>

  <?php } ?>
    </tbody>
</table>
<p>&nbsp;</p>
 <td align="Left"><a href="cetak/cetak_lmr.php?Format=XLS" target="_blank"><img src="images/xls_icon.png" width="55" height="18" border="0" title="Cetak ke Format HTML Excel"/></a></td>

