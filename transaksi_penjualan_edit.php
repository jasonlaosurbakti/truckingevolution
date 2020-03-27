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

<html>
<head>
<title>StatusTrip</title>
<link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="952" height="340" border="0" cellpadding="4" cellspacing="1" class="table-print">
  <tr>
    <td width="291" rowspan="3" align="center"><h3><strong>REPORT TRUCKING</strong></h3></td>
    <td colspan="2" align="center"><h3><b>PT PUNINAR INFINITE RAYA    </b></h3>
    </td><td>&nbsp;</td>
  </tr>
  <tr>
    <td height="42" colspan="2" align="center"><div align="center">
      <h3>&nbsp;</h3>
    </div></td><td colspan="1" align="right"><a href="javascript:window.close()">Tutup</a></td>
  </tr>

  <form action="update_1.php?act=up&np=<?php echo $kodeTransaksi?>" method="POST">
  <tr><td align="center" COLSPAN=2></td></TR>
    <td align="left"><strong>No Form Ref. Order</strong> </td>
    <td width="315"><strong></strong><input type=text name="nonota"value="<?php echo $kolomData['no_penjualan']; ?>"disabled></td>
    <td width="left" valign="top"><strong>Alocation Project</strong></td><td width="141"><input type=text name="cost"value="<?php echo $kolomData['cost']; ?>"></td>
 <tr> </tr>
  <tr>

    <td align="left"><strong>PIR Area</strong></td>
    <td width="177"><input type=text name="wr"value="<?php echo $kolomData['workrequest']; ?>"></td>
    <td width="202" valign="top"><strong>Request Date</strong></td><td width="225"><input type=date name="od"value="<?php echo $kolomData['tgl_order']; ?>"></td>
  </tr>
  <tr>
    <td height="33" align="left"><strong>Location Project Loading /Unloading</strong></td>
    <td><input type=text name="lc"value="<?php echo $kolomData ['nomor_meja']; ?>"></td>
    <td valign="top"><strong>Completion Date</strong></td><td><input type=date name="cd"value="<?php echo $kolomData['tgl_penjualan']; ?>"></td>
  </tr>
  <tr>
    <td align="left"><strong>Type Good</strong></td>
    <td><input type=text name="des"value="<?php echo $kolomData ['keterangan']; ?>"></td>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td align="left"><b>Detail Note</b></td>
      <td colspan="3" rowspan="2"><textarea name="awd" cols="70" rows="2"><?php echo $kolomData ['done']; ?></textarea></td><td width="11"></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
    <tr>
      <td><strong>Tanggal PO </strong></td><td><input type=date name="pri"value="<?php echo $kolomData['tgl_pri']; ?>"></td>
      <td><strong>Tanggal Invoice</strong></td><td><input type=date name="ony"value="<?php echo $kolomData['tgl_ony']; ?>"></td>
	 </tr>
  <tr>
    <td align="left"><strong>No. Invoice</strong></td> 
    <td align="left"><input type=text name="lc2"value="<?php echo $kolomData ['quality']; ?>"></td>
    <td align="left"> <strong>Tgl. Closing </strong></td>
    <td align="left"><input type=date name="sgh"value="<?php echo $kolomData['tgl_singgih']; ?>"></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td colspan="3" align="left"><input name="btnSave2" type="submit" style="cursor:pointer;" value=" SIMPAN PERUBAHAN " /></td>
  </tr>
  </form>
</table>
<table width="938" height="180" border="0" cellpadding="2" cellspacing="1" class="table-list">
  <form action="update_1.php?act=up2&np=<?php echo $kodeTransaksi?>" method="POST">
 <tr>
    <td width="113" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="181" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="83" bgcolor="#CCCCCC">&nbsp;</td>
    <td width="174" bgcolor="#CCCCCC">&nbsp;</td>
    <td align="right" height="22" colspan="5" bgcolor="#CCCCCC">&nbsp;</td>
    <td align="right" height="22" colspan="5" bgcolor="#CCCCCC">&nbsp;</td>
  <tr>
    <td><strong>Vendor</strong></td>
    <td><input type=text name="ky1"value="<?php echo $kolomData ['karyawan']; ?>"></td>
    <td><strong>No. HP Supir</strong></td>
    <td><input type=text name="tr1"value="<?php echo $kolomData['trade']; ?>"></td>
	<td width="11" rowspan="5">&nbsp;</td>
  <td width="129" align="left"><strong>Nama Supir</strong></td>	
    <td height="22" colspan="5"><input type=text name="h1"value="<?php echo $kolomData ['hours']; ?>"></td><td width="43" align="right" bgcolor="#F5F5F5"><?php echo $kolomData ['hours']; ?></td>
  <tr>
    <td><strong>Tujuan Pengiriman</strong></td>
    <td><input type=text name="ky2"value="<?php echo $kolomData ['karyawan2']; ?>"></td>
    <td><strong>No Polisi</strong></td>
    <td><input type=text name="tr2"value="<?php echo $kolomData['trade2']; ?>"></td>
	<td align="left"><strong>Transportation
    Mode</strong></td>
    <td height="22" colspan="5"><input type=text name="h2"value="<?php echo $kolomData ['hours2']; ?>">  </td><td align="right" bgcolor="#F5F5F5">    <?php echo $kolomData ['hours2']; ?></td>
  <tr>
    <td><strong>Unit/Armada</strong></td>
    <td><input type=text name="ky3"value="<?php echo $kolomData ['karyawan3']; ?>"></td>
    <td><strong>Criteria</strong></td>
	 <td><input type=text name="tr3"value="<?php echo $kolomData['trade3']; ?>"></td>
    <td align="left"><strong>Type Trip</strong></td>
    <td height="22" colspan="5"><input type=text name="h3"value="<?php echo $kolomData ['hours3']; ?>">   </td><td align="right" bgcolor="#F5F5F5">   <?php echo $kolomData ['hours3']; ?></td>
  <tr>
    <td><strong>PR/OB Cust.</strong></td>
    <td><input type=text name="ky4"value="<?php echo $kolomData ['karyawan4']; ?>"></td>
    <td><strong>Uang Jalan</strong></td>
	 <td><input type=text name="tr4"value="<?php echo $kolomData['trade4']; ?>"></td>
    <td align="left"><strong>No Shipment</strong></td>
    <td height="22" colspan="5"><input type=text name="h4"value="<?php echo $kolomData ['hours4']; ?>">   </td> <td align="right" bgcolor="#F5F5F5">  <?php echo $kolomData ['hours4']; ?></td>
  <tr>
    <td><strong>PO/SH Customer</strong></td>
    <td><input type=text name="ky5"value="<?php echo $kolomData ['karyawan5']; ?>"></td>
    <td><strong>Remarks</strong></td>
	 <td><input type=text name="tr5"value="<?php echo $kolomData['trade5']; ?>"></td>
    <td align="left"><strong>Jenis Kendaraan Transportasi</strong></td>
    <td height="22" colspan="5"><input type=text name="h5"value="<?php echo $kolomData ['hours5']; ?>"> </td>  <td align="right" bgcolor="#F5F5F5">   <?php echo $kolomData ['hours5']; ?></td>
 
	
  </tr>
     </tr>
     <tr>
       <td>            
</table>

   
   
    <tr><td>&nbsp;</td>
</tr>
  <tr>
    <td align="left">&nbsp;</td> <td colspan="3" align="left"><input name="btnSave" type="submit" style="cursor:pointer;" value=" SIMPAN PERUBAHAN " /></td>
  </tr><table width="754" height="126" border="0" cellpadding="2" cellspacing="1" class="table-list">
<p>&nbsp;</p>
  <tr>
    <td height="23" colspan="7"><b>Transportation Description Edit</b></td>
</tr>
<form action="update_1.php?act=tambah&np=<?php echo $kodeTransaksi?>" method="POST">
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
		  </form>
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
	  <td width="82" align="right" bgcolor="#CCCCCC"><center><b>Hapus</b></td>
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
	  <td align="center" bgcolor="#FFFFCC"><a href="update_1.php?act=hapus&np=<?php echo $kodeTransaksi ?>&id=<?php echo $id; ?>" target="_self"><img src="images/hapus.gif" width="16" height="16" border="0" /></a></td>
  </tr>
  <?php } ?>
  <tr>
    <td height="25" colspan="6" align="right"><b>Total (Rp) : </b></td>
    <td align="right" bgcolor="#F5F5F5"><b><?php echo format_angka($totalBelanja); ?></b></td>
  </tr>
 

<table width="752" height="62" border="0" cellpadding="1" cellspacing="0" class="table-print">
  <tr>
    <td width="246" height="62" align="center" valign="top"><p><strong>Sign <br />
    REQUESTED</strong></p>
      <p>&nbsp;</p>
      <b><br>
      ................................ <br>
      ..................</b>
      <br>
      Date.............</br></td>
    <td width="283" align="center" valign="top"><p><b>Sign <br />
      DEPT HEAD </b><b>WORK /PRODUCTION</b></p>
      <p>&nbsp;</p>
      <p><b>...................................<br>
        ..............................</b>
        <br>
      Date...................</p></td>
    <td width="217" align="center" valign="top"><p><b>Approved by<br />
      APROVED BUDGET</b></p>
      <p>&nbsp;</p>
      <p><b>...................................<br>
        ..............................</b>
        <br>
      Date...................</p></td>
<td width="217" align="center" valign="top"><p><b>Approved GM /BOD</b> </p>
        <p>&nbsp;</p>
        
            
     <p><b>...................................<br>
        ..............................</b>
        <br>
      Date...................</p></td>
<td width="217" align="center" valign="top"><p><strong>Executed by <br>
        </strong><strong>Procurement</strong></p>
      <p>&nbsp;</p>
     <p><b>...................................<br>
        ..............................</b>
        <br>
      Date...................</p></td>
  </tr>
</table>

  <p>&nbsp;</p>
  <P><BR>
</body>
</html>