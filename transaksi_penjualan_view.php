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

<style type="text/css">
.table-list {
	text-align: center;
}
.table-list {
	text-align: center;
}
.table-print tr td {
	color: #F00;
}
</style>
</head>
<body>
<table width="835" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td width="207" rowspan="3" align="center"><p><a href="javascript:window.close()"><b>
      <h4>PUNINAR INFINITE RAYA</h4></b></a><br>
    </p>
      <div align="left" font size="3">Jl. Pulau Balang KM.1,5<br>
        Kel.Karang Joang Kec.Balikpapan Utara <br>
        Balikpapan 76127 </div></td>
    <td colspan="4" align="center"><h2 align="center">&nbsp;</h2>    </td>
    <td width="125" rowspan="3"><a href="javascript:window.close()"><img src="images/logo.png" width="104" height="64" /></a></td>
  </tr>
  <tr>
    <td colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="24" colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><div align="center"></div></td>
    <td colspan="3" align="center"><h2><b><u>Delivery Note</u></b></h2></td>
    <td width="107" align="left"><strong>No. Referensi</strong></td>
    <td><strong><font color='#ff0000'>:<?php echo $kolomData['no_penjualan']; ?></font></strong></td>
  </tr>
  <tr>
    <td width="207" align="center"><div align="left">No. Shipment</div></td>
    <td align="right" valign="top"><p align="left"><strong>:<font color='#ff0000'><?php echo $kolomData ['hours4']; ?></font></strong></p></td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td valign="top">Request Date</td>
    <td width="73"><strong>:<font color='#ff0000'><?php echo $kolomData['tgl_order']; ?></font></strong></td>
    <td width="114">&nbsp;</td>
    <td width="154">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Location Project</td>
    <td colspan="3"><strong>:<font color='#ff0000'><?php echo $kolomData ['nomor_meja']; ?></font></strong></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Customer</td>
    <td colspan="3" ><strong>:<font color='#ff0000'><?php echo $kolomData ['pelanggan']; ?></font></strong></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Delivery Address</td>
    <td colspan="3" ><strong>:<font color='#ff0000'><?php echo $kolomData ['karyawan2']; ?></font></strong></td>
    <td align="left"><p>Type Unit</p></td>
    <td>:<strong><font color='#ff0000'><?php echo $kolomData ['karyawan3']; ?></font></strong></td>
  </tr>
  <tr>
    <td align="left">Contact Person</td>
    <td colspan="3" rowspan="2" ><div align="left"><strong>:<font color='#ff0000'><strong><font color='#ff0000'><?php echo $kolomData ['karyawan2']; ?></font></strong></font></strong></div></td>
    <td align="left">Transportation<strong>:</strong></td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData ['hours2']; ?></font></strong></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left">Police Number</td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData['trade2']; ?></font></strong></td>
  </tr>
  <tr>
    <td align="left">Type of Goods</td>
    <td colspan="3" ><strong>:<font color='#ff0000'><u><?php echo $kolomData ['keterangan']; ?></u></font></strong></td>
    <td align="left">Type of Payment</td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData['trade3']; ?></font></strong></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td >&nbsp;</td>
    <td ></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
</table>
    
</table>
<table width="952" height="117" border="1" cellpadding="2" cellspacing="1" class="selKecil">
  
  <tr class="table-main">
  
    <td width="39" height="22" align="center" bgcolor="#CCCCCC"><div align="center"><span class="mssgBox"><b>No</b></span></div></td>
    <td width="124" align="center" bgcolor="#CCCCCC"><div align="center"><span class="mssgBox"><strong>Product Code</strong></span></div></td>
    <td width="324" align="center" bgcolor="#CCCCCC"><div align="center"><span class="mssgBox"><strong>Quantity/Coly</strong></span></div></td>
	<td width="135" align="center" bgcolor="#CCCCCC"><div align="center"><span class="mssgBox"><b>Weight</b></span></div></td>
    <td width="111" align="right" bgcolor="#CCCCCC"><div align="center"></div></td>
    <td width="188" align="center" bgcolor="#CCCCCC"><div align="center"><span class="mssgBox"><b>Remarks</b></span></div></td>
  </tr>
	<?php
// 	# Menampilkan validasi untuk Nomor Transaksi Terpilih
    
$validasi1 = $kolomData["validasi1"];
$validasi2 = $kolomData["validasi2"];
$validasi3 = $kolomData["validasi3"];
$status = $kolomData['Status'];

// $validasi =  "SELECT validasi.*,penjualan.*, validasi.id FROM validasi,penjualan 
// WHERE
// validasi.no_penjualan=penjualan.no_penjualan = '$kodeTransaksi' 	ORDER BY validasi.no_penjualan";
// $query = mysql_query($validasi);
//  $no=1;
       
// 	   while ($data = mysql_fetch_array($query)) {
//             $id         = $data['id'];  // dr tabel
//             $no_penjualan     = $data['no_penjualan'];
//             $validasi1  = $data['validasi1'];
//             $validasi2     = $data['validasi2'];
//             $validasi3       = $data['validasi3'];
//             $no++;
 
//             echo "";
//         }
       
		# Menampilkan List Item menu yang dibeli untuk Nomor Transaksi Terpilih
		$notaSql = "SELECT menu.*, penjualan_item.*,penjualan_item.id FROM menu, penjualan_item
					WHERE menu.kd_menu=penjualan_item.kd_menu AND penjualan_item.no_penjualan='$kodeTransaksi'
					ORDER BY penjualan_item.id desc";
		$notaQry = mysql_query($notaSql, $koneksidb)  or die ("Query list menu salah : ".mysql_error());
		$nomor  = 0;  $totalBelanja = 0;
		while ($notaRow = mysql_fetch_array($notaQry)) {
		$nomor++;
		# Hitung Diskon (jika ada), dan Harga setelah diskon
		//$besarDiskon = intval($notaRow['harga']) * (intval($notaRow['diskon'])/100);
		//$hargaDiskon = intval($notaRow['harga']) - $besarDiskon;
		$foto= $notaRow['foto'];
		# Membuat Subtotal
		$subtotal  = $notaRow['harga'] * $notaRow['jumlah']; 
		
		# Menghitung Total Belanja keseluruhan
		$totalBelanja = $totalBelanja + intval($subtotal);
		
		# Hitung sisa bayar (pengembalian)
		$UangKembali = $kolomData['uang_bayar'] - $totalBelanja;
	?>
  <tr>
    <td height="25" align="center"><span class="mssgBox">1.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">2.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">3.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">4.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">5.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">6.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">7.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">8.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">9.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">10.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">11.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">13.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">14.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">15.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">16.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">17.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">18.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">19.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">20.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">21.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">22.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">23.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" align="center"><span class="mssgBox">24.</span></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <?php } ?>
  
</table>
<table width="822" height="143" border="0" cellpadding="1" cellspacing="0" class="table-print">
  <tr>

    <td width="177" height="143" align="center" valign="top"><p align="left"><b>        Sender : <u>Sulthon<br>
        </u>Name </b>
      :</p>
      <p align="left"><strong>Sign</strong></p>
      <p align="left"><strong><br>
        Date : </strong><?php echo $kolomData['tgl_penjualan']; ?></br>      
      </p></td>
    <td width="165" align="center" valign="top"><p align="left">&nbsp;</p></td>
    <td width="164" align="center" valign="top"><p align="left"><b>Driver<br>
      Name: </b><strong><font color='#ff0000'><?php echo $kolomData ['hours']; ?> <?php echo $kolomData['trade']; ?></font></strong></p>
      <p align="left"><strong><font color="#ff0000">Sign<br>
      </font></strong></p>
    <p align="left"><strong><font color="#ff0000">Date </font></strong></p></td><td width="149" align="center" valign="top">&nbsp;</td>
    <td width="157" align="center" valign="top"><p align="left"><strong>Recieve by <br>
      Name:</strong></p>
      <p align="left"><strong>Sign:</strong><strong>
        <?php
      if($status  == "0"){
				echo "<img width=60 height=66 src='images/inprogres.jpg' />";}
if ($status  == "1"){
				echo "<img width=60 height=66 src='images/finish.jpg' />";}
if($status  == "2"){
				echo "<img width=60 height=66 src='images/closed.jpg' />";}
    ?>
      </strong></p>
      <p align="left"><strong><br>
        Date <?php echo $kolomData['hses3']; ?><br>
        Stamp</strong></br>
      </p></td>
  </tr>
</table>
<img src="images/btn_print.png" width="30" height="32" onClick="javascript:window.print()" />
<a href="javascript:window.close()"><img src="images/logo.png" width="27" height="17" /></a>
</body>

</html>