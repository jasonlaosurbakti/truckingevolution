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
<title> :: APPROVAL PAGE</title>
<link href="styles/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
.table-print tr td b {
	color: #F00;
}
</style>
</head>
<body>
<table width="661" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td width="109" rowspan="3" align="center"><img src="images/logo.png" width="86" height="43" /></td>
    <td colspan="2" align="center">
    </td>
  </tr>
  <tr>
    <td colspan="1" align="center"><div align="center"><b>APPROVAL MATERIAL REQUEST</b></br>
    </div></td>
  </tr>

  <form action="update_val.php?act=up&np=<?php echo $kodeTransaksi?>" method="POST">
  <tr><td align="center" COLSPAN=2></td><td></td></TR>
    <td align="left"><strong>MR No </strong></td>
    <td width="315">: <input type=text name="nonota"value="<?php echo $kolomData['no_penjualan']; ?>"disabled></td>
    <td width="152" valign="top"><strong>Cost Alocation</strong></td><td width="271"><input type=text name="cost"value="<?php echo $kolomData['cost'];  ?>"disabled></td>
 <tr>

    <td align="left"> <strong>Order No.</strong></td>
    <td width="170">:
      <input type=text name="wr"value="<?php echo $kolomData['workrequest'];  ?>"disabled></td>
    <td width="104" valign="top"><strong>Order Date</strong></td><td width="225"><input type=date name="od"value="<?php echo $kolomData['tgl_order'];  ?>"disabled></td>
  </tr>
  <tr>
    <td align="left"><strong>Departement</strong></td>
    <td>:
      <input type=text name="lc"value="<?php echo $kolomData ['nomor_meja'];  ?>"disabled></td>
    <td valign="top"><strong>Completion Date</strong></td><td><input type=date name="cd"value="<?php echo $kolomData['tgl_penjualan'];  ?>"disabled></td>
  </tr>
  <tr>
    <td align="left"><strong>Description</strong></td>
    <td>: 
      <input type=text name="des"value="<?php echo $kolomData ['keterangan'];  ?>"disabled></td>
   <td align="left"><strong>Project Alocation</strong></td>
    <td>:<?php echo $kolomData ['keterangan']; ?></td>
  </tr>
  
  <tr>
    <td align="left"><strong>Keterangan Permintaan</strong></td>
      <td colspan="3">: 
        <textarea name="awd" cols="70" rows="2" disabled><?php echo $kolomData ['done']; ?></textarea></td>
  </tr>
  <tr>
    <td><strong>Tanggal PO </strong></td><td>:
      <input type=date name="pri"value="<?php echo $kolomData['tgl_pri'];  ?>"disabled></td>
    <td><strong>Tanggal Invoice</strong></td><td><input type=date name="ony"value="<?php echo $kolomData['tgl_ony'];  ?>"disabled></td>
  </tr>
  <tr>
    <td align="left"><strong>No. Invoice</strong></td> 
    <td colspan="3" align="left">:
      <input type=text name="lc2"value="<?php echo $kolomData ['quality'];  ?>"disabled>
      <strong>Tgl. Closing </strong>      <input type=date name="sgh"value="<?php echo $kolomData['tgl_singgih'];  ?>"disabled></td>
  </tr>
  <tr>
    <td align="left"><b>Executed by</b></td>
<td align="left"><b>Procurement</b>
<form method="post">
<select name="val3">
<option value="approved">Approved</option>
<option value="not approved">Not approved</option>
</select></td> <td><input type=date name="hses2"value="<?php echo $kolomData['hses2'];  ?>"disabled></td> </td>


<td> 
  </tr>
  
  
  
  <tr>
    <td align="left"><b> Note Approval</b></td>
<td colspan="3" rowspan="1"><p>
  <textarea name="mt1" cols="50" rows="1" ><?php echo $kolomData ['mt']; ?></textarea>
  <input name="btnSave2" type="submit" style="cursor:pointer;" value=" SIMPAN APPROVAL" />
</p></td><td width="7"></td>
  </tr>
  <tr> 
  
  
   <td colspan="3" align="left">&nbsp;</td> 
  <td width="225" align="left">&nbsp;</td>
  </tr>
  </form>
</table>
<table width="696" height="299" border="0" cellpadding="2" cellspacing="1" class="table-list">
  <form action="update_val.php?act=up2&np=<?php echo $kodeTransaksi?>" method="POST">
 <tr><b>Vendor Used :</b></tr> 
  <tr>
    <td width="315" bgcolor="#CCCCCC"><strong>Name</strong></td>
    <td width="97" bgcolor="#CCCCCC"><strong>Date </strong></td>
    <td width="157" bgcolor="#CCCCCC"><strong>Harga</strong></td>
    <td width="56" bgcolor="#CCCCCC"><strong>Satuan</strong></td>
    <td align="center" width="93" height="10" colspan="5" bgcolor="#CCCCCC"><strong>Total Price</strong></td>
  <tr>
    <td><input type=text name="ky1"value="<?php echo $kolomData ['karyawan'];  ?>"disabled></td>
    <td><input type=date name="tgl"value="<?php echo $kolomData['tgl_penjualan'];  ?>"disabled></td>
    <td><input type=text name="tr1"value="<?php echo $kolomData['trade'];  ?>"disabled></td>
    <td><?php echo $kolomData ['hours']; ?></td>
	<td>&nbsp;</td>
  <td align="right"><input type=text name="h1"value="<?php echo $kolomData ['hours'];  ?>"disabled>.00</td>	
    <td height="10" colspan="5">&nbsp;</td>
  <tr>
    <td><input type=text name="ky2"value="<?php echo $kolomData ['karyawan2'];  ?>"disabled></td>
    <td>&nbsp;</td>
    <td><input type=text name="tr2"value="<?php echo $kolomData['trade2'];  ?>"disabled></td>
    <td><?php echo $kolomData ['hours2']; ?></td>
	<td>&nbsp;</td>
	  <td align="right"><input type=text name="h2"value="<?php echo $kolomData ['hours2'];  ?>"disabled>.00</td>
    <td height="10" colspan="5">&nbsp;</td>
  <tr>
    <td><input type=text name="ky3"value="<?php echo $kolomData ['karyawan3'];  ?>"disabled></td>
    <td>&nbsp;</td>
    <td><input type=text name="tr3"value="<?php echo $kolomData['trade3'];  ?>"disabled></td>
	 <td><?php echo $kolomData ['hours3']; ?></td>
    <td>&nbsp;</td>
	  <td align="right"><input type=text name="h3"value="<?php echo $kolomData ['hours3'];  ?>"disabled>.00</td>
    <td height="10" colspan="5">&nbsp;</td>
  <tr>
    <td><input type=text name="ky4"value="<?php echo $kolomData ['karyawan4'];  ?>"disabled></td>
    <td>&nbsp;</td>
    <td><input type=text name="tr4"value="<?php echo $kolomData['trade4'];  ?>"disabled></td>
	 <td><?php echo $kolomData ['hours4']; ?></td>
    <td>&nbsp;</td>
	  <td align="right"><input type=text name="h4"value="<?php echo $kolomData ['hours4'];  ?>"disabled>.00</td>
    <td height="10" colspan="5">&nbsp;</td>
  <tr>
    <td><input type=text name="ky5"value="<?php echo $kolomData ['karyawan5'];  ?>"disabled></td>
    <td>&nbsp;</td>
    <td><input type=text name="tr5"value="<?php echo $kolomData['trade5'];  ?>"disabled></td>
	 <td><?php echo $kolomData ['hours5']; ?></td>
    <td>&nbsp;</td>
	  <td align="right"><input type=text name="h5"value="<?php echo $kolomData ['hours5'];  ?>"disabled>.00</td>
    <td height="10" colspan="5">&nbsp;</td>
  <tr><td>&nbsp;</td>
	 <td height="10" colspan=4 align="right" bgcolor="#fff"><b>TOTAL</b></td>
   <td align="right" width=75 bgcolor="#F5F5F5"><b><input type=text name="workrequest"value="<?php echo format_angka($kolomData['totjam']); ?>.00"disabled></b></td>
  </tr>
     </tr>
</table>

   
   
    <tr><td>&nbsp;</td>
	 </tr>
  <tr>
    <!--<td align="left">&nbsp;</td> <td colspan="3" align="left"><input name="btnSave" type="submit" style="cursor:pointer;" value=" SIMPAN PERUBAHAN " /></td> -->
  </tr>
  <tr>
    <td height="10" colspan="7"><b>Material Used Edit</b></td>
</tr><!-- 
<form action="update_val.php?act=tambah&np=<?php echo $kodeTransaksi?>" method="POST">
          <tr>
            <td><b>Description</b></td>
            <td><b>:</b></td>
            <td colspan="3"><b>
            

  <div class="demo" ">
  <div><input type="text" name="kode" id="barang"style=" 
    padding: 6px 20px;
   
    font-size: 13px;
    margin: 4px 2px;
    "placeholder="Masukan kode Desc..">
    Jumlah
    <input class="angkaC" name="jumlah" size="2" maxlength="10" value="1"/>
   <input name="btnPilih" type="submit" style="  background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 12px 28px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;" value="PILIH" />
  </div>

 
    <p align=right></td>
          </tr>
		  </form> -->
 <table width="754" height="126" border="0" cellpadding="2" cellspacing="1" class="table-list">
  <tr>
    <td height="23" colspan="7">Part Used</td>
</tr>
     
  <tr>
  
    <td width="28" height="22" align="center" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="116" align="center" bgcolor="#CCCCCC"><strong>Material Code</strong></td>
    <td  width="320" bgcolor="#CCCCCC" align=center><b>Description</b></td>
	<td width="82" bgcolor="#CCCCCC" align=center><p><b>Harga</b> <b> (Rp)</b></p></td>
  
    <td width="48" align="right" bgcolor="#CCCCCC"><strong>Jumlah</strong></td>
    <td width="42" align="center" bgcolor="#CCCCCC"><b>Unit</b></td>
    <td width="82" align="right" bgcolor="#CCCCCC"><b>Subtotal (Rp)</b></td>
	  <!-- <td width="82" align="right" bgcolor="#CCCCCC"><center><b>Hapus</b></td> --->
  </tr>
	<?php
		# Menampilkan List Item menu yang dibeli untuk Nomor Transaksi Terpilih
		$notaSql = "SELECT menu.*, penjualan_item.*,penjualan_item.id FROM menu, penjualan_item
					WHERE menu.kd_menu=penjualan_item.kd_menu AND penjualan_item.no_penjualan='$kodeTransaksi'
					ORDER BY penjualan_item.id desc";
		$notaQry = mysql_query($notaSql, $koneksidb)  or die ("Query list menu salah : ".mysql_error());
		$nomor  = 0;  $totalBelanja = 0;
		while ($notaRow = mysql_fetch_array($notaQry)) {
		$nomor++;
		$id			= $notaRow['id'];
		# Hitung Diskon (jika ada), dan Harga setelah diskon
		//$besarDiskon = intval($notaRow['harga']) * (intval($notaRow['diskon'])/100);
		//$hargaDiskon = intval($notaRow['harga']) - $besarDiskon;
		
		# Membuat Subtotal
		$subtotal  = $notaRow['harga'] * intval($notaRow['jumlah']); 
		
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
	  <!--- <td align="center" bgcolor="#FFFFCC"><a href="update_val.php?act=hapus&np=<?php echo $kodeTransaksi ?>&id=<?php echo $id; ?>" target="_self"><img src="images/hapus.gif" width="16" height="16" border="0" /></a></td> --->
  </tr>
  <?php } ?>
  <tr>
    <td height="25" colspan="6" align="right"><b>Total (Rp) : </b></td>
    <td align="right" bgcolor="#F5F5F5"><b><?php echo format_angka($totalBelanja); ?></b></td>
  </tr>
 

<table width="752" height="62" border="0" cellpadding="1" cellspacing="0" class="table-print">
  <tr>
   
</table>

  <p>&nbsp;</p>
  <P><BR>
</body>
</html>