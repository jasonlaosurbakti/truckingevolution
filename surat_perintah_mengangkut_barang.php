<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";

# Baca variabel URL
$kodeTransaksi = $_GET['noNota'];
# Perintah untuk mendapatkan data dari tabel penjualan
$mySql = "SELECT penjualan.*, user.nm_user FROM penjualan, user 
			WHERE penjualan.kd_user=user.kd_user AND no_penjualan='$kodeTransaksi'";
$myQry = mysql_query($mySql, $koneksidb)  or die ("Query penjualan salah : ". mysql_error());
$kolomData = mysql_fetch_array($myQry);

?>

<html>
<head>
<title>REPORT TRUCKING</title>
<link href="styles/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<table width="835" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td width="106" rowspan="4" align="center"><a href="javascript:window.close()"><img src="images/logo.png" width="104" height="64" /></a></td>
    <td colspan="3" rowspan="2" align="center"><h2><b>Surat Perintah Mengangkut Barang</b></h2>    </td>
    <td align="left">Kepada</td>
    <td><strong>:</strong></td>
  </tr>
  <tr>
    <td width="98" align="left">No Polisi</td>
    <td><strong>:</strong></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><div align="center"><b>PT PUNINAR INFINITE RAYA BALIKPAPAN</b></div></td>
    <td align="left">Nama Driver</td>
    <td width="123"><strong>:</strong></td>
  </tr>
  <tr>
    <td width="152" align="right" valign="top">&nbsp;</td>
    <td width="105" align="left" valign="top">&nbsp;</td>
    <td width="143" align="left" valign="top">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left"><strong>Hal:</strong></td>
    <td colspan="5" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Nomor Order/ DN</td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData ['hours4']; ?></font></strong></td>
    <td >&nbsp;</td>
    <td ></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Jenis Barang/Cargo</td>
    <td ><strong>:<?php echo $kolomData ['hours4']; ?></font></strong></strong></td>
    <td >&nbsp;</td>
    <td ></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Tonage/Type Cargo</td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData ['hours2']; ?></font></strong></td>
    <td >&nbsp;</td>
    <td ></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Nama Pemilik Barang</td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData ['pelanggan']; ?>: <font color='#ff0000'><?php echo $kolomData ['karyawan2']; ?></font></font></strong></td>
    <td >&nbsp;</td>
    <td ></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Gudang/Dermaga</td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData ['karyawan2']; ?></font></strong></td>
    <td >&nbsp;</td>
    <td ></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td ></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Nilai Uang Jalan </td>
    <td >(Rp)<?php echo $kolomData ['trade4']; ?></td>
    <td >&nbsp;</td>
    <td ></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Keterangan</td>
    <td ><strong>:</strong></td>
    <td >&nbsp;</td>
    <td ></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Tanggal Penyelesaian</td>
    <td ><strong><font color='#ff0000'>:<?php echo $kolomData['tgl_penjualan']; ?></font></strong></td>
    <td >&nbsp;</td>
    <td ></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
</table>
    
</table>
<table width="752" height="143" border="0" cellpadding="1" cellspacing="0" class="table-print">
  <tr>

    <td width="246" height="143" align="center" valign="top"><p><strong>Sign <br />
      REQUESTED</strong>      </p>
      <p><b><br>
        Planner : <u>Sulthon</u></b>
      <br>
      Tanggal Dibuat : <?php echo $kolomData['tgl_penjualan']; ?></p>      </br>      </td>
    <td width="283" align="center" valign="top"><p><b>Sign <br />
      DEPT HEAD TRUCKING</b><b></b>      </p>
      <p><br>
      
        <b><br>
        Name  : Stefanus Ricky</b>
        <br><a href="https://wa.me/6282164610004?text=Mohon%20Approval%20uang%20jalan%20dengan%20nomor%3A">Confirm Date...................</a>
      </p></td>
    <td width="217" align="center" valign="top"><b>Approved by<br />
      APROVED BUDGET</b><b><br>

      <?php
      if($validasi1 == "0"){
				echo "<img width=60 height=66 src='images/rejected.Png' />";}
				else{
				echo "<img width=60 height=66 src='images/approved.Png' />
";}
    ?>
      </b>      <?php echo $kolomData['mt2']; ?><br>
         
      Date <?php echo $kolomData['hses']; ?>
    </p></td><td width="217" align="center" valign="top"><b>Approved GM /BOD</b><b><br>
      <br> 
      <?php
      if($validasi2 == "0"){
				echo "<img width=60 height=66 src='images/rejected.Png' />";}
				else{
				echo "<img width=60 height=66 src='images/approved.Png' />
";}
    ?>
      </b>      <br>
      Date <?php echo $kolomData['hses2']; ?></br>
      </td><td width="217" align="center" valign="top"><strong>Executed by <br>
      Finance</strong><b><br>
      </b>      <strong>
      <?php
      if($status  == "0"){
				echo "<img width=60 height=66 src='images/inprogres.jpg' />";}
if ($status  == "1"){
				echo "<img width=60 height=66 src='images/finish.jpg' />";}
if($status  == "2"){
				echo "<img width=60 height=66 src='images/closed.jpg' />";}
    ?>
      </strong><br>
        Date <?php echo $kolomData['hses3']; ?>      </br></td>
  </tr>
</table>
<img src="images/btn_print.png" width="30" height="32" onClick="javascript:window.print()" />
<a href="javascript:window.close()"><img src="images/logo.png" width="27" height="17" /></a>
</body>

</html>