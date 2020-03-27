<?php
include_once "library/inc.seslogin.php";

$SqlPeriode = ""; $startTgl=""; $endTgl="";

# Set Tanggal skrg
$tglStart 	= isset($_POST['cmbTglStart']) ? $_POST['cmbTglStart'] : date('d-m-Y');
$tglEnd 	= isset($_POST['cmbTglEnd']) ? $_POST['cmbTglEnd'] : date('d-m-Y');

# Jika Nomor Page (halaman) diklik
if($_GET) {
	if (isset($_POST['btnShow'])) {
		$SqlPeriode = "( P.tgl_penjualan BETWEEN '".InggrisTgl($_POST['cmbTglStart'])."' AND '".InggrisTgl($_POST['cmbTglEnd'])."')";
	}
	else {
		$startTgl 	= isset($_GET['startTgl']) ? $_GET['startTgl'] : $tglStart;
		$endTgl 	= isset($_GET['endTgl']) ? $_GET['endTgl'] : $tglEnd; 
		$SqlPeriode = " ( P.tgl_penjualan BETWEEN '".InggrisTgl($startTgl)."' AND '".InggrisTgl($endTgl)."')";
	}
}
?>
<h5>LAPORAN PENGGUNAAN MATERIAL</h5>
<form action="?page=Laporan-Penjualan-Menu" method="post" name="form1" target="_self" id="form1">
  <table width="500" border="0"  class="table-list">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><pre><strong>PERIODE TANGGAL </strong></pre></td>
    </tr>
    <tr>
      <td width="90"><strong>Periode </strong></td>
      <td width="5"><strong>:</strong></td>
      <td width="391"><?php echo form_tanggal("cmbTglStart",$tglStart); ?> s/d <?php echo form_tanggal("cmbTglEnd",$tglEnd); ?>
      <input name="btnShow" type="submit" value=" Tampilkan " /></td>
    </tr>
  </table>
</form>

<pre>Daftar Code Stock dari tanggal <b><?php echo $tglStart; ?></b> s/d <b><?php echo $tglEnd; ?></b></pre>
<table id='example' class="table-list" width="1009" border="0" cellspacing="1" cellpadding="2">
  <thead> 
 <tr>
    <td width="35" align="center" bgcolor="#CCCCCC"><pre><b>No</b></pre></td>
    <td width="87" align="center" bgcolor="#CCCCCC"><pre><strong>Tanggal</strong></pre></td>
    <td width="91" align="center" bgcolor="#CCCCCC"><pre><b>Kode</b></pre></td>
    <td width="483" bgcolor="#CCCCCC"><pre><b>Description</b></pre></td>
    <td width="160" align="right" bgcolor="#CCCCCC"><pre><b>Harga  (Rp.)</b></pre></td>
    <td width="107" align="center" bgcolor="#CCCCCC"><pre><b>Qty </b></pre></td>
    <td width="271" align="right" bgcolor="#CCCCCC"><pre><strong>Subtotal (Rp.) </strong></pre></td>
  </tr>
   </thead>
  
	<?php
	# Query utama. Query ini sama dg yg dipakai Paging di atas
	$dataSql = "SELECT P.tgl_penjualan, M.*, 
        SUM(PI.jumlah) As terjual, 
        M.harga * PI.jumlah AS subtotal
		 FROM menu As M, 
			  penjualan As P, 
			   penjualan_item As PI
		 WHERE M.kd_menu = PI.kd_menu 
		 AND P.no_penjualan = PI.no_penjualan AND $SqlPeriode
		 GROUP BY M.kd_menu, P.tgl_penjualan ORDER BY P.tgl_penjualan ASC";
 
	$dataQry = mysql_query($dataSql, $koneksidb) or die ("Error Query".mysql_error());
	$nomor = 0; $subTotal = 0; 
	$grandTotal = 0;	$qtyTerjual = 0;
	while ($dataRow = mysql_fetch_array($dataQry)) {
		$nomor++;
		// Menghitung Sub total menu terjual
		$subTotal = $dataRow['harga'] * $dataRow['terjual'];
		
		// menghitung Total semua hasil penjualan menu
		$grandTotal = $grandTotal + $subTotal;
		
		// Menghitung total jumlah porsi terjual
		$qtyTerjual = $qtyTerjual + $dataRow['terjual'];
	?>
	<tbody>
  <tr>
    <td align="center"><?php echo $nomor; ?></td>
    <td align="center"><?php echo IndonesiaTgl($dataRow['tgl_penjualan']); ?></td>
    <td align="center"><?php echo $dataRow['kd_menu']; ?></td>
    <td><?php echo $dataRow['nm_menu']; ?></td>
    <td align="right"><?php echo format_angka($dataRow['harga']); ?></td>
    <td align="center"><?php echo $dataRow['terjual']; ?></td>
    <td align="right"><?php echo format_angka($subTotal); ?></td>
  </tr>
  <?php } ?>
  </tbody>
<!--  <tr>
    <td colspan="5" align="right" bgcolor="#CCCCCC"><strong>Total Penjualan</strong><b> :</b></td>
    <td align="center" bgcolor="#CCCCCC"><?php echo $qtyTerjual; ?></td>
    <td align="right" bgcolor="#CCCCCC">Rp. <?php echo format_angka($grandTotal); ?></td>
  </tr>-->
</table>
