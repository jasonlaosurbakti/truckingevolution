
<?php
include_once "library/inc.seslogin.php";

if($_GET) {
	# HAPUS DAFTAR barang DI TMP
	if(isset($_GET['Act'])){
		if(trim($_GET['Act'])=="Delete"){
			# Hapus Tmp jika datanya sudah dipindah
			$mySql = "DELETE FROM tmp_penjualan WHERE id='".$_GET['id']."' AND kd_user='".$_SESSION['SES_LOGIN']."'";
			mysql_query($mySql, $koneksidb) or die ("Gagal kosongkan tmp".mysql_error());
		}
		if(trim($_GET['Act'])=="Sucsses"){
			echo "<b>DATA TERSIMPAN</b> <br><br>";
		}
	}
	//
	// =========================================================================
	# TOMBOL PILIH (KODE barang) DIKLIK
	if(isset($_POST['btnPilih'])){
		$pesanError = array();
		if (trim($_POST['buah'])=="") {
			$pesanError[] = "<b>Description belum diisi</b>, pilih pada daftar menu !";		
		}
		if (trim($_POST['txtJumlah'])=="" OR ! is_numeric(trim($_POST['txtJumlah']))) {
			$pesanError[] = "Data <b>Jumlah Item (Qty) belum diisi</b>, silahkan <b>isi dengan angka</b> !";		
		}
		
	        # Baca variabel
			# Jika jumlah error pesanError tidak ada
				$qx= $_POST['buah'];
		        $txtJumlah	= $_POST ['txtJumlah'];
		        
                $rsd = mysql_query("select * from menu where nm_menu='$qx'");
                while($rs = mysql_fetch_array($rsd)){
            	$cmbMenu = $rs['kd_menu'];
                }
				
		# JIKA ADA PESAN ERROR DARI VALIDASI
		if (count($pesanError)>=1 ){
			echo "<div class='mssgBox'>";
			echo "<img src='images/attention.png'> <br><hr>";
				$noPesan=0;
				foreach ($pesanError as $indeks=>$pesan_tampil) { 
				$noPesan++;
					echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
				} 
			echo "</div> <br>"; 
		}
		else {
		    # jika tidak ada yg error.
			# Jika sudah pernah dipilih, cukup datanya di update jumlahnya			
			$cekSql ="SELECT * FROM tmp_penjualan WHERE kd_menu='$cmbMenu' AND kd_user='".$_SESSION['SES_LOGIN']."'";
			$cekQry = mysql_query($cekSql, $koneksidb) or die ("Gagal Query".mysql_error());
			if (mysql_num_rows($cekQry) >= 1) {
				// Jika tadi sudah dipilih, cukup jumlahnya diupdate
				$tmpSql = "UPDATE tmp_penjualan SET jumlah=jumlah + $txtJumlah 
							WHERE kd_menu='$cmbMenu' AND kd_user='".$_SESSION['SES_LOGIN']."'";
				$cek=mysql_query($tmpSql, $koneksidb) or die ("Gagal Query : ".mysql_error());
				if($cek){
				    
				    echo"1 data berhasil ditambahakan.";
				}else{
				    
				    echo" GAGAL ditambahakan."; 
				     }
			}
			else {
				$menuSql ="SELECT * FROM menu WHERE kd_menu='$cmbMenu'";
				$menuQry = mysql_query($menuSql, $koneksidb) or die ("Gagal Query".mysql_error());
				$menuRow = mysql_fetch_array($menuQry);
				if (mysql_num_rows($menuQry) >= 1) {
					# Hitung Diskon (Jika Ada), dan Harga setelah diskon
					//$besarDiskon = intval($menuRow['harga']) * (intval($menuRow['diskon'])/100);
					//$hargaDiskon = intval($menuRow['harga']) - $besarDiskon;
					
					$dataHarga = $menuRow['harga'];
					$tmp2Sql = "INSERT INTO tmp_penjualan SET 
											kd_menu='$cmbMenu', 
											harga='$dataHarga', 
											jumlah='$txtJumlah', 
											kd_user='".$_SESSION['SES_LOGIN']."'";
					$cek=mysql_query($tmp2Sql, $koneksidb) or die ("Gagal Query detail barang : ".mysql_error());
					if($cek){
				    
				       echo"1 data berhasil ditambahakan.";
				      }else{
				    
				       echo" GAGAL DITAMBAH."; 
				           }
				}
			}
		}

	}
	// ============================================================================
	
	# JIKA TOMBOL SIMPAN DIKLIK
	if(isset($_POST['btnSave'])){
		$pesanError = array();
		if (trim($_POST['cmbTanggal'])=="") {
			$pesanError[] = "Data <b>Tanggal transaksi</b> belum diisi, pilih pada tanggal penyelesaian !";		
		}
		$pesanError = array();
		if (trim($_POST['cmbTglOrder'])=="") {
			$pesanError[] = "Data <b>Tanggal transaksi</b> belum diisi, pilih pada tanggal Order !";
		}
		if (trim($_POST['txtNoMeja'])=="") {
			$pesanError[] = "Data <b> Location</b> belum diisi, isi dengan informasi location";		
		}
		
		
		
		$tmpSql ="SELECT COUNT(*) As qty FROM tmp_penjualan WHERE kd_user='".$_SESSION['SES_LOGIN']."'";
		$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
		$tmpRow = mysql_fetch_array($tmpQry);
		if ($tmpRow['qty'] < 1) {

			$pesanError[] = "<b>Item Menu</b> belum ada yang dimasukan, <b>minimal 1 menu</b>.";
		}
		
	
		# Baca variabel
		$txtNoMeja		= $_POST['txtNoMeja'];
		$txtx	        = $_POST['txtNomer'];
	    $idx	        = $_POST['txtid'];
		$txtDone		= $_POST['txtDone'];
		$txtCost		= $_POST['txtCost'];
		$txtWR			= $_POST['txtWR'];
		$txtHours		= $_POST['txtHours'];
		$txtHours2		= $_POST['txtHours2'];
		$txtHours3		= $_POST['txtHours3'];
		$txtHours4		= $_POST['txtHours4'];
		$txtHours5		= $_POST['txtHours5'];
		$txtTrade		= $_POST['txtTrade'];
		$txtTrade2		= $_POST['txtTrade2'];
		$txtTrade3		= $_POST['txtTrade3'];
		$txtTrade4		= $_POST['txtTrade4'];
		$txtTrade5		= $_POST['txtTrade5'];	
		$txtKaryawan	= $_POST['txtKaryawan'];
		$txtKaryawan2	= $_POST['txtKaryawan2'];
		$txtKaryawan3	= $_POST['txtKaryawan3'];
		$txtKaryawan4	= $_POST['txtKaryawan4'];
		$txtKaryawan5	= $_POST['txtKaryawan5'];
		$txtPelanggan	= $_POST['txtPelanggan'];
		$txtKeterangan	= $_POST['txtKeterangan'];
		$txtUangBayar	= $_POST['txtUangBayar'];
		$cmbTanggal 	= $_POST['cmbTanggal'];
		$cmbTglOrder	= $_POST['cmbTglOrder'];
		$txtstatus	= $_POST['txtstatus'];
		
				
				// Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['foto'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_foto'];
// Set path folder tempat menyimpan gambarnya
$path = "images/".$nama_file;
				
		# JIKA ADA PESAN ERROR DARI VALIDASI
		if (count($pesanError)>=1 ){
			echo "<div class='mssgBox'>";
			echo "<img src='images/attention.png'> <br><hr>";
				$noPesan=0;
				foreach ($pesanError as $indeks=>$pesan_tampil) { 
				$noPesan++;
					echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
				} 
			echo "</div> <br>"; 
		}
		else {
			# SIMPAN DATA KE DATABASE
			# Jika jumlah error pesanError tidak ada
			 $t=date("d");
				$tg=date("m/Y");
				$tgi=date("d/m/y");
				$tmpSql2 ="SELECT * FROM penjualan WHERE kd_user='".$_SESSION['SES_LOGIN']."' order by id desc";
				$tmpQry2 = mysql_query($tmpSql2, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
				$tmpRow2 = mysql_fetch_array($tmpQry2);
				$ids=$tmpRow2['id'];
				$nop=$tmpRow2['no_penjualan'];
				$go = rand(10,20)  ;
				if($t==1){
					 	$ih="TRPIR0$ids/$tg";
				                      if($nop=$ih){
											 $ida=$ids+$go;
				                             $dg="TRPIR0$ida/$tg";
										}else{
											$ida=$go;
				                            $dg="TRPIR0$ida/$tg";	
				
										}} else{
				$ida=$ids-rand(1,9)+$go;
				$dg="TRPIR0$ida/$tg";
				} 
				
			$noTransaksi = $dg;
			$mySql	= "INSERT INTO penjualan SET 			
							no_penjualan='$noTransaksi', 
							tgl_penjualan='".InggrisTgl($_POST['cmbTanggal'])."',  
							tgl_order='".InggrisTgl($_POST['cmbTglOrder'])."',
							nomor_meja='$txtNoMeja', 
							cost='$txtCost',
							done='$txtDone',
							quality='".InggrisTgl($tgi)."',
							id='$idx',
							workrequest='$txtWR',
							hours='$txtHours',
							hours2='$txtHours2',
							hours3='$txtHours3',
							hours4='$txtHours4',
							hours5='$txtHours5',
							trade='$txtTrade',
							trade2='$txtTrade2',
							trade3='$txtTrade3',
							trade4='$txtTrade4',
							trade5='$txtTrade5',
							totjam='$tjam',
							karyawan='$txtKaryawan',
							karyawan2='$txtKaryawan2',
							karyawan3='$txtKaryawan3',
							karyawan4='$txtKaryawan4',
							karyawan5='$txtKaryawan5',
							pelanggan='$txtPelanggan', 
							keterangan='$txtKeterangan',
							uang_bayar='$txtUangBayar',
							mt ='$txtmt',
							mt2 ='$txtmt2',
							mt3 ='$txtmt3',
							status ='$txtstatus',
							hses='".InggrisTgl($_POST['cmbhses'])."',
							hses2='".InggrisTgl($_POST['cmbhses2'])."',
							hses3='".InggrisTgl($_POST['cmbhses3'])."',
							kd_user='".$_SESSION['SES_LOGIN']."'";
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			
			if($myQry){
				# �LANJUTAN, SIMPAN DATA
				# Ambil semua data barang yang dipilih, berdasarkan kasir yg login
				$tmpSql ="SELECT * FROM tmp_penjualan WHERE kd_user='".$_SESSION['SES_LOGIN']."'";
				$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
				while ($tmpRow = mysql_fetch_array($tmpQry)) {
					$dataKode =	$tmpRow['kd_menu'];
					$dataHarga=	$tmpRow['harga'];
					$dataJumlah=$tmpRow['jumlah'];
					
					// Masukkan semua data dari tabel TMP ke tabel ITEM
					$itemSql = "INSERT INTO penjualan_item SET 
											no_penjualan='$noTransaksi', 
											kd_menu='$dataKode', 
											harga='$dataHarga', 
											jumlah='$dataJumlah'";
		  			mysql_query($itemSql, $koneksidb) or die ("Gagal Query ".mysql_error());
					
// 					 Masukkan semua data dari tabel TMP ke tabel validasi
// $valSql = "INSERT INTO validasi SET 
// 							no_penjualan='$noTransaksi', 
// 											validasi1='0', 
// 											validasi2='0', 
// 											validasi3='0'";
// 		  			mysql_query($valSql, $koneksidb) or die ("Gagal Query ".mysql_error());
					
					// Skrip Update stok
					//$stokSql = "UPDATE barang SET stok = stok - $tmpRow[jumlah] WHERE kd_barang='$tmpRow[kd_barang]'";
		  			//mysql_query($stokSql, $koneksidb) or die ("Gagal Query Edit Stok".mysql_error());
				}
				
				# Kosongkan Tmp jika datanya sudah dipindah
				$hapusSql = "DELETE FROM tmp_penjualan WHERE kd_user='".$_SESSION['SES_LOGIN']."'";
				mysql_query($hapusSql, $koneksidb) or die ("Gagal kosongkan tmp".mysql_error());
				
				// Refresh form
				echo "<meta http-equiv='refresh' content='0; url=transaksi_penjualan_view.php?noNota=$noTransaksi'>";
			}
			else{
				$pesanError[] = "GAGAL MENYIMPAN DATABASE";
			}
		}	
	}
	
	// ============================================================================
} // Penutup GET

# TAMPILKAN DATA KE FORM
$noTransaksi 	= buatKode("penjualan", "TRPIR");
$tglTransaksi 	= isset($_POST['cmbTanggal']) ? $_POST['cmbTanggal'] : date('d-m-Y');
$tglOrder 		= isset($_POST['cmbTglOrder']) ? $_POST['cmbTglOrder'] : date('d-m-Y');
$tglPri 		= isset($_POST['cmbTglPri']) ? $_POST['cmbTglPri'] : date('d-m-Y');
$tglSinggih 	= isset($_POST['cmbTglSinggih']) ? $_POST['cmbTglSinggih'] : date('d-m-Y');
$tglOny 		= isset($_POST['cmbTglOny']) ? $_POST['cmbTglOny'] : date('d-m-Y');
$hses 			= isset($_POST['cmbhses']) ? $_POST['cmbhses'] : date('d-m-Y');
$hses2 			= isset($_POST['cmbhses2']) ? $_POST['cmbhses2'] : date('d-m-Y');
$hses3 			= isset($_POST['cmbhses3']) ? $_POST['cmbhses3'] : date('d-m-Y');
$dataNoMeja		= isset($_POST['txtNoMeja']) ? $_POST['txtNoMeja'] : '';
$dataKaryawan	= isset($_POST['txtKaryawan']) ? $_POST['txtKaryawan'] : '';
$dataKaryawan2	= isset($_POST['txtKaryawan2']) ? $_POST['txtKaryawan2'] : '';
$dataKaryawan3	= isset($_POST['txtKaryawan3']) ? $_POST['txtKaryawan3'] : '';
$dataKaryawan4	= isset($_POST['txtKaryawan4']) ? $_POST['txtKaryawan4'] : '';
$dataCustomer5	= isset($_POST['txtKaryawan5']) ? $_POST['txtKaryawan5'] : '';
$dataCost		= isset($_POST['txtCost']) ? $_POST['txtCost'] : '';
$dataDone		= isset($_POST['txtDone']) ? $_POST['txtDone'] : '';
$dataWR			= isset($_POST['txtWR'])? $_POST['txtWR'] : '';
$dataHours		= isset($_POST['txtHours']) ? $_POST['txtHours'] : '';
$dataHours2		= isset($_POST['txtHours2']) ? $_POST['txtHours2'] : '';
$dataHours3		= isset($_POST['txtHours3']) ? $_POST['txtHours3'] : '';
$dataHours4		= isset($_POST['txtHours4']) ? $_POST['txtHours4'] : '';
$dataHours5		= isset($_POST['txtHours5']) ? $_POST['txtHours5'] : '';
$dataTrade		= isset($_POST['txtTrade']) ? $_POST['txtTrade'] : '';
$dataTrade2		= isset($_POST['txtTrade2']) ? $_POST['txtTrade2'] : '';
$dataTrade3		= isset($_POST['txtTrade3']) ? $_POST['txtTrade3'] : '';
$dataTrade4		= isset($_POST['txtTrade4']) ? $_POST['txtTrade4'] : '';
$dataTrade5		= isset($_POST['txtTrade5']) ? $_POST['txtTrade5'] : '';
$dataPelanggan	= isset($_POST['txtPelanggan']) ? $_POST['txtPelanggan'] : '';
$dataKeterangan	= isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : '';
$dataUangBayar	= isset($_POST['txtUangBayar']) ? $_POST['txtUangBayar'] : '';
$validasi1		= isset($_POST['validasi1']) ? $_POST['validasi1'] : '0';
$validasi2		= isset($_POST['validasi2']) ? $_POST['validasi2'] : '0';
$validasi3		= isset($_POST['validasi3']) ? $_POST['validasi3'] : '0';
$datamt			= isset($_POST['txtmt']) ? $_POST['txtmt'] : '';
$datamt2		= isset($_POST['txtmt2']) ? $_POST['txtmt2'] : '';
$datamt3		= isset($_POST['txtmt3']) ? $_POST['txtmt3'] : '';
$txtstatus 		= isset($_POST['txtstatus']) ? $_POST['txtstatus'] : '0';

?>
<style type="text/css">
.table-list tr td strong {
	color: #F00;
}
.table-list tr td strong {
	color: #F00;
}
.table-list tr td strong {
	color: #F00;
}
.table-list tr td strong {
	color: #F00;
}
.table-list tr td {
	color: #F00;
}
.table-list tr td {
	color: #000;
}
</style>
<table>
<h2>
 
    <tr>
      <th width="327" colspan="3"  align="left" scope="col">FORM ORDER TRUCKING MANAGEMENT </strong></th>
    </tr>
  </table>
<form action="?page=Transaksi-Penjualan" method="post"  name="frmadd"autocomplete="off">
  <b>Description </b>     <input type="text" name="buah"placeholder="Masukan nama desc.."id="buah"size="40" />   Jumlah   <input class="text" name="txtJumlah" size="6" maxlength="10" value="1" 
	  		 onblur="if (value == '') {value = ''}" 
      		 onfocus="if (value == '') {value =''}"/>   <input name="btnPilih" type="submit" style="  background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;" value="PILIH" />   
   
  <table class="table-list" width="1172" border="0" cellspacing="1" cellpadding="2">
    
    <tr>
    <td width="38" align="center" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="55" align="center" bgcolor="#CCCCCC"><b>Code</b></td>
    <td colspan="2" align="center" bgcolor="#CCCCCC"><b>Description Transportation</b></td>
  
    <td width="162" align="center" bgcolor="#CCCCCC"><b>Trip</b></td>
    <td width="114" align="center" bgcolor="#CCCCCC"><b>Status Cost</b></td>
    <td width="152" align="center" bgcolor="#CCCCCC"><b>Cost (Rp.)</b></td>
    <td width="191" align="right" bgcolor="#CCCCCC"><b>Subtotal <br />(Rp.) </b></td>
    <td width="58" align="center" bgcolor="#FFCC00"><b>Del</b></td>
   
    </tr>
<?php
//  tabel menu 
$tmpSql ="SELECT menu.*, tmp_penjualan.id, tmp_penjualan.jumlah 
		FROM menu, tmp_penjualan
		WHERE menu.kd_menu=tmp_penjualan.kd_menu 
		AND tmp_penjualan.kd_user='".$_SESSION['SES_LOGIN']."'
		ORDER BY tmp_penjualan.id asc ";
$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
$totalBayar = 0; $qtyItem =00.00; $nomor=0;
while($tmpRow = mysql_fetch_array($tmpQry)) {
	$nomor++;
	$id			= $tmpRow['id'];
	$subSotal 	= $tmpRow['jumlah'] * $tmpRow['harga'];
	$totalBayar	= $totalBayar + $subSotal;
	$qtyItem	= $qtyItem + $tmpRow['jumlah'];
?>
  <tr>
    <td align="center"><?php echo $nomor; ?></td>
    <td align="center"><b><?php echo $tmpRow['kd_menu']; ?></b></td>
    <td colspan="2"><?php echo $tmpRow['nm_menu']; ?></td>
    <td align="right"><?php echo $tmpRow['jumlah']; ?></td>
     <td align="left"><?php echo $tmpRow['nm_menu2']; ?></td>
    <td align="center"><?php echo format_angka($tmpRow['harga']); ?></td>
    <td align="right"><?php echo format_angka($subSotal); ?></td>
    <td align="center" bgcolor="#FFFFCC"><a href="?page=Transaksi-Penjualan&Act=Delete&id=<?php echo $id; ?>" target="_self"><img src="images/hapus.gif" width="16" height="16" border="0" /></a></td>
    </tr>
<?php 
}?>
  <tr>   <td align="right"colspan=3 bgcolor="#F5F5F5"><b><font color='#ff0000'>Tanggal Order </font></b><?php echo form_tanggal("cmbTglOrder",$tglOrder); ?></td>
    <td align="right" bgcolor="#F5F5F5"><strong>Tanggal Penyelesaian Doc. <?php echo form_tanggal("cmbTanggal",$tglTransaksi); ?></strong></td>
    <td align="right" bgcolor="#F5F5F5"><b><?php echo $qtyItem; ?></b></td>
    <td colspan="2" align="right" bgcolor="#F5F5F5"><b>Calculation(Rp.) :</b></td>
 
    <td align="right" bgcolor="#F5F5F5"><b><?php echo format_angka($totalBayar); ?></b></td>
    <td align="center" bgcolor="#F5F5F5">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#F5F5F5">Form No.    <?php
			
			$t=date("d");
			$tg=date("m/Y");
			$tgi=date("Y-m-d");
				$tmpSql2 ="SELECT * FROM penjualan WHERE kd_user='".$_SESSION['SES_LOGIN']."' order by id desc";
				$tmpQry2 = mysql_query($tmpSql2, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
				$tmpRow2 = mysql_fetch_array($tmpQry2);
				$ids=$tmpRow2['id'];
				$go = rand(10,20)  ;
				if($t==1){
					 	$ih="TRPIR0$ids/$tg";
				                      if($nop=$ih){
											 $ida=$ids+$go;
				                             $dg="TRPIR0$ida/$tg";
										}else{
											$ida=$go;
				                            $dg="TRPIR0$ida/$tg";	
				
										}} else{
				$ida=$ids-rand(1,9)+$go;
				$dg="TRPIR0$ida/$tg";
				} 
					
			?>  </td>
    <td align="left" bgcolor="#F5F5F5"><input name="txtNomor" value='<?php echo $dg ;?>' size="20" maxlength="11"/></td>
    <td align="left" bgcolor="#F5F5F5"><input name="txtid"  value='<?php echo"$ida";?>' size="11" maxlength="11"hidden="hidden" /></td>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><strong>Project*</strong>      
      	<select name="txtNoMeja">
      	<option value="BUMA 3PL">BUMA 3PL</option>
      	<option value="IDEMITSU">IDEMITSU</option>
        <option value="PARTSINDO DEDICATED">PARTSINDO DEDICATED</option>
        <option value="PBU">PBU</option>
      	<option value="VOLVO DEDICATED">VOLVO DEDICATED</option>
    	<option value="UT BACKLOAD">UT BACKLOAD</option>
     	<option value="UT BOR">UT BOR</option>
    	<option value="UT REG">UT REG</option>
        <option value="UT BOR">DEDICATE</option>
    	
      </select></td>
    <td align="right" bgcolor="#F5F5F5"><b>Revenue (Rp.) :</b></td>
    <td align="left" bgcolor="#F5F5F5"><input name="txtUangBayar" value="<?php echo $dataUangBayar; ?>" size="16" maxlength="12"/></td>
    <td align="center" bgcolor="#F5F5F5"> <input name="txtTotBayar" type="hidden" value="<?php echo $totalBayar; ?>" /></td>
    </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><strong>Site:*</strong></td>
    <td width="147" align="Left" bgcolor="#F5F5F5"><select name="txtWR">
      <option value="Balikpapan">Balikpapan</option>
      <option value="Makassar">Makassar</option>
      <option value="Jakarta">Jakarta</option>
      <option value="Banjarmasin">Banjarmasin</option>
      <option value="Medan">Medan</option>
      <option value="Surabaya">Surabaya</option>
    </select></td>
    <td width="209" align="Left" bgcolor="#F5F5F5"><strong>Alocation</strong></td>
    <td align="right" bgcolor="#F5F5F5"><strong>
      <select name="txtCost">
        <option value="UT BOR">UT BOR</option>
        <option value="UT REG">UT REG</option>
        <option value="UT VOR">UT VOR</option>
        <option value="UT CROSDOCKING">UT CROSDOCKING</option>
        <option value="UT SCANIA &amp; VOLVO">UT SCANIA &amp; VOLVO</option>
        <option value="BUMA 3PL">BUMA 3PL</option>
        <option value="BUMA PROJECT">BUMA PROJECT</option>
        <option value="SHELL BPN">SHELL BPN</option>
        <option value="SHELL CROSDOCKING">SHELL CROSDOCKING</option>
        <option value="SHELL CRANE">SHELL CRANE</option>
        <option value="IDEMITSU">IDEMITSU</option>
        <option value="VALVOLINE">VALVOLINE</option>
        <option value="CHEVRON">CHEVRON</option>
        <option value="NABEL SAKHA">NABEL SAKHA</option>
        <option value="PBU">PBU</option>
        <option value="SCANIA">SCANIA</option>
        <option value="VOLVO DEDICATED">VOLVO DEDICATED</option>
        <option value="VOLVO LTL">VOLVO LTL</option>
        <option value="VOLVO SEA FREIGHT">VOLVO SEA FREIGHT</option>
        <option value="VOLVO RETURN">VOLVO RETURN</option>
      </select>
    </strong></td>
    <td align="right" bgcolor="#F5F5F5"><strong>Kendaraan</strong></td>
    <td align="right" bgcolor="#F5F5F5"><select name="txtHours5">
      <option value="Cargo">Cargo</option>
      <option value="Container">Container</option>
      <option value="Lubricant">Lubricant</option>
      <option value="Heavy Equipment">Heavy Equipment</option>
      <option value="Koil">Koil</option>
      <option value="PrimeOver">Prime Over</option>
      <option value="Longbed">Longbed</option>
      <option value="Tronton">Tronton</option>
      <option value="Frozen">Frozen</option>
    </select></td>
    <td colspan="2" align="left" bgcolor="#F5F5F5">No Polisi
      <input name="txtTrade2" value="<?php echo $dataTrade2; ?>" size="15" maxlength="15" /></td>
    </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><strong>Customer**</strong></td>
    <td align="left" bgcolor="#F5F5F5"><b><font color='#ff0000'>
      <select name="txtPelanggan">
      <option value="PT. BUKIT MAKMUR MANDIRI UTAMA">BUMA</option>
      <option value="PT. CHEVRON OIL PRODUCTS INDONESIA">CHEVRON</option>
      <option value="SHELL">SHELL</option>
      <option value="PT. KOMATSU MARKETING & SUPPORT INDONESIA">KOMATSU</option>
      <option value="SCHLUMBERGER">SCHLUMBERGER</option>
      <option value="PT. VOLVO INDONESIA">VOLVO</option>
      <option value="PT. UNITED TRACTORS">UT</option>
      <option value="PT. YUSEN LOGISTICS SOLUTIONS INDONESIA">YUSEN</option>
      <option value="PT. 3M">3M</option>
      <option value="PT. PUNINAR SARANARAYA">PSR</option>
      <option value="PT. PETROSEA TBK">PETROSEA</option>
      <option value="PT. PRASMANINDO BOGA UTAMA">PBU</option>
      <option value="PT. TOTAL OIL INDONESIA">TOTAL OIL</option>
      <option value="SUMBER MITRA JAYA">SMJ</option>
      <option value="PT. VALVOLINE LUBRICANTS AND CHEMICALS INDONESIA">VALVOLINE</option>
    </select>
    </font></b></td>
    <td align="left" bgcolor="#F5F5F5"><b><font color='#ff0000'>Unit/Armada</font></b></td>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><input name="txtKaryawan3" value="<?php echo $dataKaryawan3; ?>" size="30" maxlength="60" /></td>
    <td colspan="3" align="left" bgcolor="#F5F5F5">Nama Pemilik Barang      <input name="txtKaryawan2" value="<?php echo $dataKaryawan2; ?>" size="30" maxlength="60" /></td>
    </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><strong>Vendor</strong></td>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><input name="txtKaryawan" value="<?php echo $dataKaryawan; ?>" size="30" maxlength="60" />       Criteria</td>
    <td align="left" bgcolor="#F5F5F5"><input name="txtTrade3" value="<?php echo $dataTrade3; ?>" size="10" maxlength="10" /></td>
    <td align="left" bgcolor="#F5F5F5">Remarks</td>
    <td align="left" bgcolor="#F5F5F5"><input name="txtTrade5" value="<?php echo $dataTrade5; ?>" size="10" maxlength="10" /></td>
    <td colspan="2" align="left" bgcolor="#F5F5F5">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><strong>Nama Supir</strong></td>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><input name="txtHours" value="<?php echo $dataHours; ?>" size="30" maxlength="30" />
      No. HP Supir</td>
    <td align="left" bgcolor="#F5F5F5"><input name="txtTrade" value="<?php echo $dataTrade; ?>" size="12" maxlength="12" /></td>
    <td align="left" bgcolor="#F5F5F5">Uang Jalan</td>
    <td align="left" bgcolor="#F5F5F5"><input name="txtTrade4" value="<?php echo $dataTrade4; ?>" size="10" maxlength="10" /></td>
    <td colspan="2" align="left" bgcolor="#F5F5F5">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><strong>Tujuan Pengiriman</strong></td>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><input name="txtKaryawan2" value="<?php echo $dataKaryawan2; ?>" size="30" maxlength="60" /></td>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><strong>Trans Moda : </strong><select name="txtHours2">
      <option value="LAND">LAND</option>
      <option value="SEAFREIGHT">SEAFREIGHT</option>
      <option value="AIRFREIGHT">AIRFREIGHT</option>
      <option value="MULTIMODA">MULTIMODA</option>
    </select></td>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><strong>Type Trip</strong><select name="txtHours3">
  <option value="Reguler">Reguler</option>
  <option value="Backload">Backload</option>
</select></td>
    <td align="center" bgcolor="#F5F5F5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#F5F5F5">PR/OB Cust.      </td>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><input name="txtKaryawan4" value="<?php echo $dataKaryawan4; ?>" size="30" maxlength="60" /></td>
    <td colspan="4" align="left" bgcolor="#F5F5F5">PO / SH Customer
    <input name="txtKaryawan5" value="<?php echo $dataCustomer5; ?>" size="30" maxlength="60" /></td>
    <td align="center" bgcolor="#F5F5F5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#F5F5F5"><strong>Req. Note</strong></td>
    <td colspan="7" align="left" bgcolor="#F5F5F5"><input name="txtKeterangan" value="<?php echo $dataKeterangan; ?>" size="45" maxlength="100" /></td>
    </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#F5F5F5">Detail Note    </td>
    <td colspan="7" align="left" bgcolor="#F5F5F5"><textarea name="txtDone" cols="100" rows="2"><?php echo $dataDone; ?></textarea></td>
    </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#F5F5F5">&nbsp;</td>
    <td align="left" bgcolor="#F5F5F5"><input name="txtNomor2" value='<?php echo"$tgi";?>' size="11" maxlength="11"hidden="hidden"/></td>
    <td align="left" bgcolor="#F5F5F5">&nbsp;</td>
    <td align="left" bgcolor="#F5F5F5">&nbsp;</td>
    <td align="left" bgcolor="#F5F5F5">&nbsp;</td>
    <td colspan="3" align="left" bgcolor="#F5F5F5"><input name="btnSave" type="submit" style="cursor:pointer;" value=" SIMPAN TRANSAKSI " /></td>
    </tr>
</table>
<table><td></td></table>
</form>
    </p>

