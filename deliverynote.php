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
    <td width="106" align="center"><a href="javascript:window.close()"></a></td>
    <td colspan="3" rowspan="2" align="center"><h2><b>Delivery Note</b><a href="javascript:window.close()"><img src="images/logo.png" width="104" height="64" /></a></h2>    </td>
    <td align="left"><strong>No. Form </strong></td>
    <td><strong><font color='#ff0000'>:<?php echo $kolomData['no_penjualan']; ?></font></strong></td>
  </tr>
  <tr>
    <td width="106" align="center">&nbsp;</td>
    <td width="98" align="left">
      <p>Nomor DN</p></td>
    <td><strong>:<font color='#ff0000'><?php echo $kolomData ['hours4']; ?></font></strong></td>
  </tr>
  <tr>
    <td width="106" align="center">&nbsp;</td>
    <td colspan="3" align="center"><div align="center"><b>PT PUNINAR INFINITE RAYA BALIKPAPAN</b></div></td>
    <td align="left">Site Area</td>
    <td width="123"><strong>:<font color='#ff0000'><?php echo $kolomData['workrequest']; ?></font></strong></td>
  </tr>
  <tr>
    <td width="106" align="center">&nbsp;</td>
    <td align="right" valign="top"><strong>Type Trip </strong></td>
    <td align="left" valign="top"><strong><font color='#ff0000'>: <?php echo $kolomData ['hours3']; ?></font></strong></td>
    <td align="left" valign="top">Transport Moda<strong>: <font color='#ff0000'><?php echo $kolomData ['hours2']; ?></font></strong></td>
    <td align="left">Remarks</td>
    <td><strong>:<font color='#ff0000'><?php echo $kolomData['trade4']; ?></font></strong></td>
  </tr>
  
  <tr>
    <td valign="top">Request Date</td>
    <td width="152"><strong>:<font color='#ff0000'><?php echo $kolomData['tgl_order']; ?></font></strong></td>
    <td width="105">Date in of Garage</td>
    <td width="143"><strong> :<font color='#ff0000'> <?php echo $kolomData['tgl_penjualan']; ?></font></strong></td>
    <td align="left">Cost Alocation</td>
    <td><strong>:<font color='#ff0000'><?php echo $kolomData['cost']; ?></font></strong></td>
  </tr>
  <tr>
    <td valign="top">Location Project</td>
    <td><strong>:<font color='#ff0000'><?php echo $kolomData ['nomor_meja']; ?></font></strong></td>
    <td align="left">Unit/Armada</td>
    <td align="left"><strong>:<font color='#ff0000'> <?php echo $kolomData ['karyawan3']; ?> <?php echo $kolomData ['hours5']; ?></font></strong></td>
    <td align="left">Delivery Address</td>
    <td align="left"><strong>:<font color='#ff0000'><?php echo $kolomData ['karyawan2']; ?></font></strong></td>
  </tr>
  <tr>
    <td align="left">Order by</td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData ['pelanggan']; ?><strong>: <font color='#ff0000'><?php echo $kolomData ['karyawan2']; ?></font></strong></font></strong></td>
    <td >Vendor Option</td>
    <td > <strong>: <font color='#ff0000'><?php echo $kolomData ['karyawan']; ?></font></strong></td>
    <td align="left">Driver </td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData ['hours']; ?> <?php echo $kolomData['trade']; ?></font></strong></td>
  </tr>
  <tr>
    <td align="left">PR/OB Customer</td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData ['karyawan4']; ?></font></strong></td>
    <td >PO/SH Customer </td>
    <td ><strong>:<font color='#ff0000'> <?php echo $kolomData ['karyawan5']; ?></font></strong></td>
    <td align="left">No. Polisi</td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData['trade2']; ?></font></strong></td>
  </tr>
  <tr>
    <td align="left">Request Note*</td>
    <td colspan="3" ><strong>:<font color='#ff0000'><u><?php echo $kolomData ['keterangan']; ?></u></font></strong></td>
    <td align="left">Criteria</td>
    <td ><strong>:<font color='#ff0000'><?php echo $kolomData['trade3']; ?></font></strong></td>
  </tr>
  <tr>
    <td align="left">Detail Note</td>
    <td colspan="5" rowspan="3" align="left"><strong>:<font color='#ff0000'><?php echo $kolomData ['done']; ?></font></strong></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td ></td>
    <td align="left">&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
</table>
    
</table>
<table width="822" height="117" border="0" cellpadding="2" cellspacing="1" class="table-list">
  
  <tr>
  
    <td width="33" height="22" align="center" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="68" align="center" bgcolor="#CCCCCC"><strong>Code trip</strong></td>
    <td  width="263" bgcolor="#CCCCCC" align=center><strong>Description Transportation</strong></td>
    
	<td width="93" bgcolor="#CCCCCC" align=center><p><strong>Cost  (Rp)</strong></p></td>
  
    <td width="48" align="right" bgcolor="#CCCCCC"><strong>Jumlah</strong></td>
    <td width="129" align="center" bgcolor="#CCCCCC"><b>Status Cost</b></td>
    <td width="105" align="right" bgcolor="#CCCCCC"><b>Subtotal (Rp)</b><b>Vendor</b></td>
    <td width="42" align="right" bgcolor="#CCCCCC"><b>Item </b></td>
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
    <td height="25" align="center"><?php echo $nomor; ?></td>
    <td align="center"><?php echo $notaRow['kd_menu'];?></td>
    <td><?php echo $notaRow['nm_menu']; ?></td>
	 <td align="right"><?php echo format_angka($notaRow['harga']); ?></td>
    
    <td align="right"><?php echo $notaRow['jumlah']; ?></td>
    <td align="center"><?php echo $notaRow['nm_menu2']; ?></td>
    <td align="right"><?php echo format_angka($subtotal); ?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <?php } ?>
  <tr>
    <td height="25" colspan="6" align="right"><b>Sub Total (Rp) : </b></td>
    <td align="right" bgcolor="#F5F5F5"><b><?php echo format_angka($kolomData['uang_bayar']); ?></b></td><td></td>
  </tr>
  <tr>
    <td height="25" colspan="6" align="right"><strong>
    REVENUE</strong></td>
    <td align="right" bgcolor="#CCCCCC"><b><?php echo format_angka($kolomData['uang_bayar']); ?></b></td><td></td>
  </tr>
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