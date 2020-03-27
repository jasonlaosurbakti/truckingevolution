<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";

# Baca variabel URL
$kodeTransaksi = $_GET['noNota'];

# Perintah untuk mendapatkan data dari tabel pembelian
$mySql = "SELECT pembelian.*, supplier.nm_supplier, user.nm_user, alamat ,plat
			FROM pembelian, supplier, user 
			WHERE pembelian.kd_supplier=supplier.kd_supplier AND pembelian.kd_user=user.kd_user 
			AND no_pembelian='$kodeTransaksi'";
$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
$kolomData = mysql_fetch_array($myQry);
?>

<html>
<head>
<title>:: WRDAP</title>
<link href="styles/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
#ngoding {
	font-size: 10px;
}
</style>
</head>
<body>
<table id="ngoding" border="0" class="display" cellspacing="0" width="100%">
  <tr>
    <td width="133"><a href="javascript:window.close()"><img src="images/logo.png" width="104" height="64" /></a></td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td width="392" valign="top"><a href="javascript:window.close()"><img src="images/safety.jpg" width="70" height="64" /></a></td>
  </tr> 
  <?php
  $kondisi1 = $kolomData['kondisi1']; 
  $kondisi2 = $kolomData['kondisi2'];
  $kondisi3 = $kolomData['kondisi3'];
  $kondisi4 = $kolomData['kondisi4'];
  $kondisi5 = $kolomData['kondisi5'];
  $kondisi6 = $kolomData['kondisi6'];
  $kondisi7 = $kolomData['kondisi7'];
  $kondisi8 = $kolomData['kondisi8'];
  $kondisi9 = $kolomData['kondisi9'];
  $kondisi10 = $kolomData['kondisi10'];
  $kondisi11 = $kolomData['kondisi11']; 
  $kondisi12 = $kolomData['kondisi12'];
  $kondisi13 = $kolomData['kondisi13'];
  $kondisi14 = $kolomData['kondisi14'];
  $kondisi15 = $kolomData['kondisi15'];
  $kondisi16 = $kolomData['kondisi16'];
  $kondisi17 = $kolomData['kondisi17'];
  $kondisi18 = $kolomData['kondisi18'];
  $kondisi19 = $kolomData['kondisi19'];
  $kondisi20 = $kolomData['kondisi20'];
  $kondisi21 = $kolomData['kondisi21']; 
  $kondisi22 = $kolomData['kondisi22'];
  $kondisi23 = $kolomData['kondisi23'];
  $kondisi24 = $kolomData['kondisi24'];
  $kondisi25 = $kolomData['kondisi25'];
  $kondisi26 = $kolomData['kondisi26'];
  $kondisi27 = $kolomData['kondisi27'];
  $kondisi28 = $kolomData['kondisi28'];
  $kondisi29 = $kolomData['kondisi29'];
  $kondisi30 = $kolomData['kondisi30'];
  $kondisi31 = $kolomData['kondisi31']; 
  $kondisi32 = $kolomData['kondisi32'];
  $kondisi33 = $kolomData['kondisi33'];
  $kondisi34 = $kolomData['kondisi34'];
  $kondisi35 = $kolomData['kondisi35'];
  $kondisi36 = $kolomData['kondisi36'];
  $kondisi37 = $kolomData['kondisi37'];
  $kondisi38 = $kolomData['kondisi38'];
  $kondisi39 = $kolomData['kondisi39']; 
  
  ?>
  <tr>
    <td><b>No</b></td>
    <td width="136"><b>:<strong> <?php echo $kolomData['no_pembelian']; ?></strong></b></td>
    <td width="351" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td><b>Tanggal Pemeriksaan</b></td>
    <td><b>: <?php echo IndonesiaTgl($kolomData['tgl_pembelian']); ?></b></td>
    <td valign="top">&nbsp;</td>
    <td align="center" bgcolor="#CCCCCC" class="table-list">&nbsp;</td>
  </tr>
  <tr>
    <td><b>Driver</b></td>
    <td><b>: <?php echo $kolomData['nm_supplier']; ?></b></td>
    <td valign="top">Tipe kendaraan : <?php echo $kolomData['alamat']; ?></td>
    <td align="center" class="table-list">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Keterangan Kelayakan</strong></td>
    <td><b>: <?php
      if($kondisi1 == "normal" &&  $kondisi3 == "normal" && $kondisi4 == "normal" &&  $kondisi6 == "normal" && $kondisi7 == "normal" && $kondisi8 == "normal" && $kondisi9 == "normal" && $kondisi10 == "normal" && $kondisi12 == "normal" && $kondisi13 == "normal"  && $kondisi15 == "normal" && $kondisi16 == "normal" && $kondisi17 == "normal" && $kondisi18 == "normal" && $kondisi19 == "normal" && $kondisi20 == "normal" && $kondisi21 == "normal" && $kondisi22 == "normal" && $kondisi23 == "normal" && $kondisi24 == "normal" && $kondisi25 == "normal" && $kondisi26 == "normal" && $kondisi27 == "normal" && $kondisi28 == "normal" && $kondisi29 == "normal" && $kondisi31 == "normal" && $kondisi32 == "normal" && $kondisi33 == "normal" && $kondisi34 == "normal" && $kondisi35 == "normal" && $kondisi36 == "normal" && $kondisi37 == "normal" && $kondisi38 == "normal" && $kondisi39 == "normal" && $kondisi30 == "normal"   ){
				echo "<font color='blue'>Fit kendaraan siap pakai</font>";}
if (  $kondisi1 == "BLANK" || $kondisi1 == "tidak" || $kondisi3 == "BLANK" || $kondisi3 == "tidak"|| $kondisi4 == "BLANK" || $kondisi4 == "tidak"|| $kondisi6 == "BLANK" || $kondisi6 == "tidak"|| $kondisi7 == "BLANK" || $kondisi7 == "tidak"|| $kondisi8 == "BLANK" || $kondisi8 == "tidak"|| $kondisi9 == "BLANK" || $kondisi9 == "tidak"|| $kondisi10 == "BLANK" || $kondisi10 == "tidak" || $kondisi12 == "BLANK" || $kondisi12 == "tidak" || $kondisi13 == "BLANK" || $kondisi13 == "tidak"|| $kondisi15 == "BLANK" || $kondisi15 == "tidak"|| $kondisi16 == "BLANK" || $kondisi16 == "tidak"|| $kondisi17 == "BLANK" || $kondisi17 == "tidak"|| $kondisi18 == "BLANK" || $kondisi18 == "tidak"|| $kondisi19 == "BLANK" || $kondisi19 == "tidak"|| $kondisi20 == "BLANK" || $kondisi20 == "tidak" || $kondisi22 == "BLANK" || $kondisi22 == "tidak" || $kondisi21 == "BLANK" || $kondisi21 == "tidak" || $kondisi23 == "BLANK" || $kondisi23 == "tidak"|| $kondisi24 == "BLANK" || $kondisi24 == "tidak"|| $kondisi25 == "BLANK" || $kondisi25 == "tidak"|| $kondisi26 == "BLANK" || $kondisi26 == "tidak"|| $kondisi27 == "BLANK" || $kondisi27 == "tidak"|| $kondisi28 == "BLANK" || $kondisi28 == "tidak"|| $kondisi29 == "BLANK" || $kondisi29 == "tidak"|| $kondisi30 == "BLANK" || $kondisi30 == "tidak" || $kondisi32 == "BLANK" || $kondisi32 == "tidak" || $kondisi31 == "BLANK" || $kondisi31 == "tidak" || $kondisi33 == "BLANK" || $kondisi33 == "tidak"|| $kondisi34 == "BLANK" || $kondisi34 == "tidak"|| $kondisi35 == "BLANK" || $kondisi35 == "tidak"|| $kondisi36 == "BLANK" || $kondisi36 == "tidak"|| $kondisi37 == "BLANK" || $kondisi37 == "tidak"|| $kondisi38 == "BLANK" || $kondisi38 == "tidak"|| $kondisi39 == "BLANK" || $kondisi39 == "tidak" ){
				echo " <font color='red'>kendaraan tidak siap pakai</font>";}
				
?></b></td>
    <td valign="top"><span class="table-list">Plat kendaraan: <?php echo $kolomData['plat']; ?></span></td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>KM Berangkat</strong></td>
    <td><strong>: <?php echo $kolomData['keterangan2']; ?></strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td></table>
    <table id="ngoding" border="1" class="display" cellspacing="0" width="100%">
  <td width="4%"></tr>
  <tr>
    <td bgcolor="#CCCCCC"><strong>NO</strong></td>
    <td colspan="2" bgcolor="#CCCCCC"><strong>ITEM PEMERIKSAAN</strong></td>
    <td width="8%" valign="top" bgcolor="#CCCCCC"><strong>KONDISI</strong></td>
    <td width="37%" valign="top" bgcolor="#CCCCCC"><strong>KETERANGAN</strong></td>
  </tr>
  <tr>
    <td align="right" class="table-list">1</td>
    <td colspan="2" align="right" class="table-list">Periksa level Oli Mesin</td>
    <td valign="top"><?php echo $kolomData['kondisi1']; ?></td>
    <td valign="top"><?php echo $kolomData['ket1']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list"><strong>2</strong></td>
    <td colspan="2" align="right" class="table-list"><strong>ACCU</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" class="table-list">&nbsp;</td>
    <td colspan="2" align="right" class="table-list">2.A. Kondisi Accu</td>
    <td valign="top"><?php echo $kolomData['kondisi3']; ?></td>
    <td valign="top"><?php echo $kolomData['ket3']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">&nbsp;</td>
    <td colspan="2" align="right" class="table-list">2.B. Level Air Accu</td>
    <td valign="top"><?php echo $kolomData['kondisi4']; ?></td>
    <td valign="top"><?php echo $kolomData['ket4']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list"><strong>3</strong></td>
    <td colspan="2" align="right" class="table-list"><strong>Bahan Bakar</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" class="table-list">&nbsp;</td>
    <td colspan="2" align="right" class="table-list">A. Kondisi Tangki</td>
    <td valign="top"><?php echo $kolomData['kondisi6']; ?></td>
    <td valign="top"><?php echo $kolomData['ket6']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">&nbsp;</td>
    <td colspan="2" align="right" class="table-list">B. Level Bahan Bakar</td>
    <td valign="top"><?php echo $kolomData['kondisi7']; ?></td>
    <td valign="top"><?php echo $kolomData['ket7']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">4</td>
    <td colspan="2" align="right" class="table-list">Periksa level minyak rem</td>
    <td valign="top"><?php echo $kolomData['kondisi8']; ?></td>
    <td valign="top"><?php echo $kolomData['ket8']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">5</td>
    <td colspan="2" align="right" class="table-list">Periksa level air pendingin di reservoir tank</td>
    <td valign="top"><?php echo $kolomData['kondisi9']; ?></td>
    <td valign="top"><?php echo $kolomData['ket9']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">6</td>
    <td colspan="2" align="right" class="table-list">Periksa level minyak kopling</td>
    <td valign="top"><?php echo $kolomData['kondisi10']; ?></td>
    <td valign="top"><?php echo $kolomData['ket10']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list"><strong>7</strong></td>
    <td colspan="2" align="right" class="table-list"><strong>Wiper</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" class="table-list">&nbsp;</td>
    <td colspan="2" align="right" class="table-list">7.A. Level air wiper</td>
    <td valign="top"><?php echo $kolomData['kondisi12']; ?></td>
    <td valign="top"><?php echo $kolomData['ket12']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">&nbsp;</td>
    <td colspan="2" align="right" class="table-list">7.B. Karet wiper</td>
    <td valign="top"><?php echo $kolomData['kondisi13']; ?></td>
    <td valign="top"><?php echo $kolomData['ket13']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list"><strong>8</strong></td>
    <td colspan="2" align="right" class="table-list"><strong>Ban</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" class="table-list">&nbsp;</td>
    <td colspan="2" align="right" class="table-list">8.A. Tekanan ban</td>
    <td valign="top"><?php echo $kolomData['kondisi15']; ?></td>
    <td valign="top"><?php echo $kolomData['ket15']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">&nbsp;</td>
    <td colspan="2" align="right" class="table-list">8.B. Keretakan, kerusakan &amp; benda yang menempel pada ban</td>
    <td valign="top"><?php echo $kolomData['kondisi16']; ?></td>
    <td valign="top"><?php echo $kolomData['ket16']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">&nbsp;</td>
    <td colspan="2" align="right" class="table-list">8.C. Kedalaman alur &amp; keausan ban (ban depan 3mm &amp; ban belakang 2mm)</td>
    <td valign="top"><?php echo $kolomData['kondisi17']; ?></td>
    <td valign="top"><?php echo $kolomData['ket17']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">9</td>
    <td colspan="2" align="right" class="table-list">Periksa kekencangan baut pada roda </td>
    <td valign="top"><?php echo $kolomData['kondisi18']; ?></td>
    <td valign="top"><?php echo $kolomData['ket18']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">10</td>
    <td colspan="2" align="right" class="table-list">Periksa getaran &amp; suara mesin</td>
    <td valign="top"><?php echo $kolomData['kondisi19']; ?></td>
    <td valign="top"><?php echo $kolomData['ket19']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">11</td>
    <td colspan="2" align="right" class="table-list">Periksa sistem &amp; fungsi semua lampu</td>
    <td valign="top"><?php echo $kolomData['kondisi20']; ?></td>
    <td valign="top"><?php echo $kolomData['ket20']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">12</td>
    <td colspan="2" align="right" class="table-list">Periksa transmisi</td>
    <td valign="top"><?php echo $kolomData['kondisi21']; ?></td>
    <td valign="top"><?php echo $kolomData['ket21']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">13</td>
    <td colspan="2" align="right" class="table-list">Periksa pedal rem</td>
    <td valign="top"><?php echo $kolomData['kondisi22']; ?></td>
    <td valign="top"><?php echo $kolomData['ket22']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">14</td>
    <td colspan="2" align="right" class="table-list">Periksa tuas rem (rem tangan)</td>
    <td valign="top"><?php echo $kolomData['kondisi23']; ?></td>
    <td valign="top"><?php echo $kolomData['ket23']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">15</td>
    <td colspan="2" align="right" class="table-list">Periksa gerakan steering</td>
    <td valign="top"><?php echo $kolomData['kondisi24']; ?></td>
    <td valign="top"><?php echo $kolomData['ket24']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">16</td>
    <td colspan="2" align="right" class="table-list">Periksa klakson</td>
    <td valign="top"><?php echo $kolomData['kondisi25']; ?></td>
    <td valign="top"><?php echo $kolomData['ket25']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">17</td>
    <td colspan="2" align="right" class="table-list">Periksa keretakan &amp; kotoran pada kaca</td>
    <td valign="top"><?php echo $kolomData['kondisi26']; ?></td>
    <td valign="top"><?php echo $kolomData['ket26']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">18</td>
    <td colspan="2" align="right" class="table-list">Periksa fungsi kaca spion</td>
    <td valign="top"><?php echo $kolomData['kondisi27']; ?></td>
    <td valign="top"><?php echo $kolomData['ket27']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">19</td>
    <td colspan="2" align="right" class="table-list">Periksa keadaan &amp; fungsi sabuk pengaman</td>
    <td valign="top"><?php echo $kolomData['kondisi28']; ?></td>
    <td valign="top"><?php echo $kolomData['ket28']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">20</td>
    <td colspan="2" align="right" class="table-list">Perisa kondisi box &amp; pintu box </td>
    <td valign="top"><?php echo $kolomData['kondisi29']; ?></td>
    <td valign="top"><?php echo $kolomData['ket29']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">21</td>
    <td colspan="2" align="right" class="table-list">Periksa ketersediaan pengganjal ban</td>
    <td valign="top"><?php echo $kolomData['kondisi30']; ?></td>
    <td valign="top"><?php echo $kolomData['ket30']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">22</td>
    <td colspan="2" align="right" class="table-list">Periksa kebersihan dan aksesoris yang tidak diperlukan di dalam kabin</td>
    <td valign="top"><?php echo $kolomData['kondisi31']; ?></td>
    <td valign="top"><?php echo $kolomData['ket31']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">23</td>
    <td colspan="2" align="right" class="table-list">Periksa kondisi lampu DRL dalam keadaan baik </td>
    <td valign="top"><?php echo $kolomData['kondisi32']; ?></td>
    <td valign="top"><?php echo $kolomData['ket32']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">24</td>
    <td colspan="2" align="right" class="table-list">Periksa Safety Cone &amp; Ganjal Ban</td>
    <td valign="top"><?php echo $kolomData['kondisi33']; ?></td>
    <td valign="top"><?php echo $kolomData['ket33']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">25</td>
    <td colspan="2" align="right" class="table-list">Periksa lampu alarm truck dan lampu rotary</td>
    <td valign="top"><?php echo $kolomData['kondisi34']; ?></td>
    <td valign="top"><?php echo $kolomData['ket34']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">26</td>
    <td colspan="2" align="right" class="table-list">Periksa Tekanan dan ketersediaan APAR</td>
    <td valign="top"><?php echo $kolomData['kondisi35']; ?></td>
    <td valign="top"><?php echo $kolomData['ket35']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">27</td>
    <td colspan="2" align="right" class="table-list">Periksa kelengkapan P3K</td>
    <td valign="top"><?php echo $kolomData['kondisi36']; ?></td>
    <td valign="top"><?php echo $kolomData['ket36']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">28</td>
    <td colspan="2" align="right" class="table-list">Fanbelt dan rantai (min 2set /CDD 4set/FUSO)</td>
    <td valign="top"><?php echo $kolomData['kondisi37']; ?></td>
    <td valign="top"><?php echo $kolomData['ket37']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">29</td>
    <td colspan="2" align="right" class="table-list">Periksa terpal (untuk bak terbuka)</td>
    <td valign="top"><?php echo $kolomData['kondisi38']; ?></td>
    <td valign="top"><?php echo $kolomData['ket38']; ?></td>
  </tr>
  <tr>
    <td align="right" class="table-list">30</td>
    <td colspan="2" align="right" class="table-list">Periksa Spedo Meter</td>
    <td valign="top"><?php echo $kolomData['kondisi39']; ?></td>
    <td valign="top"><?php echo $kolomData['ket39']; ?></td>
  </tr>
</table>
<br/>
<img src="images/btn_print.png" width="40" height="44" onClick="javascript:window.print()" />
</body>
<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";

# Baca variabel URL
$kodeTransaksi = $_GET['noNota'];

# Perintah untuk mendapatkan data dari tabel penjualan
$mySql = "SELECT penjualan.*, user.nm_user FROM penjualan, user 
			WHERE penjualan.kd_user=user.kd_user AND no_penjualan='$kodeTransaksi'";
$myQry = mysql_query($mySql, $koneksidb)  or die ("Query penjualan salah : ".mysql_error());
$kolomData = mysql_fetch_array($myQry);

?>
</html>