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
$datamt=$kolomData['mt'];
$validasi1 = $kolomData["validasi1"];
$validasi2 = $kolomData["validasi2"];
$validasi3 = $kolomData["validasi3"];
?>

<html>
<head>
<title> :: Update Status</title>
<link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="754" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td width="127" rowspan="3" align="center"><img src="images/logo.png" width="104" height="64" /></td>
    <td colspan="2" align="center"><h3><b>PT PUNINAR INFINITE RAYA    </b></h3>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><div align="center"><b>UPDATE STATUS TRUCKING</b></br>
    </div></td>
  </tr>

  <form action="update_mr.php?act=up&np=<?php echo $kodeTransaksi?>" method="POST">
  <tr><td align="center" COLSPAN=2></td></TR>
    <td align="left">No. Order </td>
    <td width="315">:<input type=text name="nonota"value="<?php echo $kolomData['no_penjualan']; ?>"disabled></td>
    <td width="left" valign="top">Cost Center</td><td width="141"><input type=text name="cost"value="<?php echo $kolomData['cost'];  ?>"disabled></td>
 <tr> </tr>
  <tr>

    <td align="left">Work Order </td>
    <td width="153">:
      <input type=text name="wr"value="<?php echo $kolomData['workrequest'];  ?>"disabled></td>
    <td width="152" valign="top">Order Date</td><td width="271"><input type=date name="od"value="<?php echo $kolomData['tgl_order'];  ?>"disabled></td>
  </tr>
  <tr>
    <td align="left">Departement</td>
    <td>:
      <input type=text name="lc"value="<?php echo $kolomData ['nomor_meja'];  ?>"disabled></td>
    <td valign="top">Completion Date</td><td><input type=date name="cd"value="<?php echo $kolomData['tgl_penjualan'];  ?>"disabled></td>
  </tr>
  <tr>
    <td align="left">Description</td>
    <td>: 
      <input type=text name="des"value="<?php echo $kolomData ['keterangan'];  ?>"disabled></td>
    <td valign="top">Est Cost IDR</td>
    <td><b>
      <input type=text name="eci"value="<?php echo format_angka($kolomData['uang_bayar']);  ?>"disabled>
    </b></td>
  </tr>
  
  <tr>
    <td align="left"><b>Keterangan Permintaan</b></td>
      <td colspan="3" rowspan="2"><textarea name="awd" cols="80" rows="2" disabled><?php echo $kolomData ['done']; ?></textarea></td><td width="5"></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
    <tr>
      <td>Tanggal PO </td><td><input type=date name="pri"value="<?php echo $kolomData['tgl_pri'];  ?>"disabled></td>
      <td>Tanggal Invoice</td><td><input type=date name="ony"value="<?php echo $kolomData['tgl_ony'];  ?>"disabled></td>
	 </tr>
  <tr>
    <td align="left">No. Invoice</td> <td colspan="3" align="left"><input type=text name="lc2"value="<?php echo $kolomData ['quality'];  ?>"disabled>
      Tgl. Closing
        <input type=date name="sgh"value="<?php echo $kolomData['tgl_singgih'];  ?>"disabled></td>
  </tr>
  <tr>
    <td align="left"><b>Status MR</b></td>
<td align="left"><form method="post">
<select name="sts">
<option value="1">Finish</option>
<option value="2">Closed</option>
</select></td>

<td> <td><input type=date name="hses"value="<?php echo $kolomData['hses'];  ?>"disabled></td> 
  
  
  
  
  <tr>
    <td align="left">&nbsp;</td>
<td colspan="3" rowspan="2"><p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp; </p></td><td width="5"></td>
  </tr>
  <tr> 
  
  
   <td colspan="3" align="left"><input name="btnSave2" type="submit" style="cursor:pointer;" value=" SIMPAN PERUBAHAN " /></td> 
  <td align="left">&nbsp;</td>
  </tr>
  </form>
</table>
<table width="753" height="180" border="0" cellpadding="2" cellspacing="1" class="table-list">
  <form action="update_val.php?act=up2&np=<?php echo $kodeTransaksi?>" method="POST">
 <tr><b>Vendor Used :</b></tr> 
  <tr>
    <td width="315" bgcolor="#CCCCCC"><strong>Name</strong></td>
    <td width="97" bgcolor="#CCCCCC"><strong>Date </strong></td>
    <td width="157" bgcolor="#CCCCCC"><strong>Harga</strong></td>
    <td width="56" bgcolor="#CCCCCC"><strong>Satuan</strong></td>
    <td align="right" width="93" height="22" colspan="5" bgcolor="#CCCCCC"><strong>Total Price</strong></td>
  <tr>
    <td><input type=text name="ky1"value="<?php echo $kolomData ['karyawan'];  ?>"disabled></td>
    <td><input type=date name="tgl"value="<?php echo $kolomData['tgl_penjualan'];  ?>"disabled></td>
    <td><input type=text name="tr1"value="<?php echo $kolomData['trade'];  ?>"disabled></td>
    <td><?php echo $kolomData ['hours']; ?></td>
	<td>&nbsp;</td>
  <td align="right"><input type=text name="h1"value="<?php echo $kolomData ['hours'];  ?>"disabled>.00</td>	
    <td height="22" colspan="5">&nbsp;</td>
  <tr>
    <td><input type=text name="ky2"value="<?php echo $kolomData ['karyawan2'];  ?>"disabled></td>
    <td>&nbsp;</td>
    <td><input type=text name="tr2"value="<?php echo $kolomData['trade2'];  ?>"disabled></td>
    <td><?php echo $kolomData ['hours2']; ?></td>
	<td>&nbsp;</td>
	  <td align="right"><input type=text name="h2"value="<?php echo $kolomData ['hours2'];  ?>"disabled>.00</td>
    <td height="22" colspan="5">&nbsp;</td>
  <tr>
    <td><input type=text name="ky3"value="<?php echo $kolomData ['karyawan3'];  ?>"disabled></td>
    <td>&nbsp;</td>
    <td><input type=text name="tr3"value="<?php echo $kolomData['trade3'];  ?>"disabled></td>
	 <td><?php echo $kolomData ['hours3']; ?></td>
    <td>&nbsp;</td>
	  <td align="right"><input type=text name="h3"value="<?php echo $kolomData ['hours3'];  ?>"disabled>.00</td>
    <td height="22" colspan="5">&nbsp;</td>
  <tr>
    <td><input type=text name="ky4"value="<?php echo $kolomData ['karyawan4'];  ?>"disabled></td>
    <td>&nbsp;</td>
    <td><input type=text name="tr4"value="<?php echo $kolomData['trade4'];  ?>"disabled></td>
	 <td><?php echo $kolomData ['hours4']; ?></td>
    <td>&nbsp;</td>
	  <td align="right"><input type=text name="h4"value="<?php echo $kolomData ['hours4'];  ?>"disabled>.00</td>
    <td height="22" colspan="5">&nbsp;</td>
  <tr>
    <td><input type=text name="ky5"value="<?php echo $kolomData ['karyawan5'];  ?>"disabled></td>
    <td>&nbsp;</td>
    <td><input type=text name="tr5"value="<?php echo $kolomData['trade5'];  ?>"disabled></td>
	 <td><?php echo $kolomData ['hours5']; ?></td>
    <td>&nbsp;</td>
	  <td align="right"><input type=text name="h5"value="<?php echo $kolomData ['hours5'];  ?>"disabled>.00</td>
    <td height="22" colspan="5">&nbsp;</td>
  <tr><td>&nbsp;</td>
	 <td height="25" colspan=4 align="right" bgcolor="#fff"><b>TOTAL</b></td>
   <td align="right" width=75 bgcolor="#F5F5F5"><b><input type=text name="workrequest"value="<?php echo format_angka($kolomData['totjam']); ?>.00"disabled></b></td>
  </tr>
     </tr>
</table>

   
   
    <tr><td>&nbsp;</td>
</tr>
  <tr>
    <!--<td align="left">&nbsp;</td> <td colspan="3" align="left"><input name="btnSave" type="submit" style="cursor:pointer;" value=" SIMPAN PERUBAHAN " /></td> -->
  </tr><table width="754" height="126" border="0" cellpadding="2" cellspacing="1" class="table-list">
<p>&nbsp;</p>
<p>&nbsp;</p>
  <P><BR>
</body>
</html>