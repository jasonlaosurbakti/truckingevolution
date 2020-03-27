<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>

<?php
include_once "library/inc.seslogin.php";

if($_GET) {
	# HAPUS DAFTAR barang DI TMP
	if(isset($_GET['Act'])){
		if(trim($_GET['Act'])=="Delete"){
			# Hapus Tmp jika datanya sudah dipindah
			$mySql = "DELETE FROM tmp_pembelian WHERE id='".$_GET['id']."' AND kd_user='".$_SESSION['SES_LOGIN']."'";
			mysql_query($mySql, $koneksidb) or die ("Gagal kosongkan tmp".mysql_error());
		}
		if(trim($_GET['Act'])=="Sucsses"){
			echo "<b>DATA BERHASIL DISIMPAN</b> <br><br>";
		}
	}
	
	
	
	// =========================================================================
	
	# TOMBOL PILIH DIKLIK
	if(isset($_POST['btnPilih'])){
		$pesanError = array();
		if (trim($_POST['txtItemBarang'])=="") {
			$pesanError[] = "Data <b>Nama Item Barang</b> belum diisi, harus Anda isi !";		
		}
		if (trim($_POST['cmbSatuan'])=="BLANK") {
			$pesanError[] = "Data <b>Satuan Barang</b> belum dipilih, silahkan pilih !";		
		}
		if (trim($_POST['txtHarga'])=="" OR ! is_numeric(trim($_POST['txtHarga']))) {
			$pesanError[] = "Data <b>Harga Item Barang</b> belum diisi, harus Anda isi dengan angka !";		
		}
		if (trim($_POST['txtJumlah'])=="" OR ! is_numeric(trim($_POST['txtJumlah']))) {
			$pesanError[] = "Data <b>Jumlah Satuan (Qty) belum diisi</b>, silahkan <b>isi dengan angka</b> !";		
		}
		
		# Baca variabel
		$txtItemBarang	= $_POST['txtItemBarang'];
		$txtHarga	= $_POST['txtHarga'];
		$cmbSatuan	= $_POST['cmbSatuan'];
		$txtJumlah	= $_POST['txtJumlah'];
				
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
			$tmpSql = "INSERT INTO tmp_pembelian SET 
									item_barang='$txtItemBarang', 
									harga='$txtHarga', 
									jumlah='$txtJumlah',
									satuan='$cmbSatuan',
									kd_user='".$_SESSION['SES_LOGIN']."'";
			mysql_query($tmpSql, $koneksidb) or die ("Gagal Query detail barang : ".mysql_error());
			
			// Refresh form
			echo "<meta http-equiv='refresh' content='0; url=?page=Transaksi-P2H'>";
		}

	}

	// ============================================================================
	
	# JIKA TOMBOL SIMPAN DIKLIK
	if(isset($_POST['btnSave'])){
		$pesanError = array();
		if (trim($_POST['cmbSupplier'])=="BLANK") {
			$pesanError[] = "Data <b> Nama Supplier</b> belum diisi, pilih pada combo !";		
		}
		if (trim($_POST['cmbTanggal'])=="") {
			$pesanError[] = "Data <b>Tanggal Transaksi</b> belum diisi, pilih pada combo !";		
		}
		
		// Validasi jika belum ada satupun data item yang dimasukkan
		$tmpSql ="SELECT COUNT(*) As qty FROM tmp_pembelian WHERE kd_user='".$_SESSION['SES_LOGIN']."'";
		$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
		
		
		# Baca variabel
		$cmbSupplier	= $_POST['cmbSupplier'];
		$txtKeterangan2	= $_POST['txtKeterangan2'];
		$txtKeterangan3	= $_POST['txtKeterangan3'];
		$txtKondisi1	= $_POST['txtKondisi1'];
		$txtKondisi2	= $_POST['txtKondisi2'];
		$txtKondisi3	= $_POST['txtKondisi3'];
		$txtKondisi4	= $_POST['txtKondisi4'];
		$txtKondisi5	= $_POST['txtKondisi5'];
		$txtKondisi6	= $_POST['txtKondisi6'];
		$txtKondisi7	= $_POST['txtKondisi7'];
		$txtKondisi8	= $_POST['txtKondisi8'];
		$txtKondisi9	= $_POST['txtKondisi9'];
		$txtKondisi10	= $_POST['txtKondisi10'];
		$txtKondisi11	= $_POST['txtKondisi11'];
		$txtKondisi12	= $_POST['txtKondisi12'];
		$txtKondisi13	= $_POST['txtKondisi13'];
		$txtKondisi14	= $_POST['txtKondisi14'];
		$txtKondisi15	= $_POST['txtKondisi15'];
		$txtKondisi16	= $_POST['txtKondisi16'];
		$txtKondisi17	= $_POST['txtKondisi17'];
		$txtKondisi18	= $_POST['txtKondisi18'];
		$txtKondisi19	= $_POST['txtKondisi19'];
		$txtKondisi20	= $_POST['txtKondisi20'];
		$txtKondisi21	= $_POST['txtKondisi21'];
		$txtKondisi22	= $_POST['txtKondisi22'];
		$txtKondisi23	= $_POST['txtKondisi23'];
		$txtKondisi24	= $_POST['txtKondisi24'];
		$txtKondisi25	= $_POST['txtKondisi25'];
		$txtKondisi26	= $_POST['txtKondisi26'];
		$txtKondisi27	= $_POST['txtKondisi27'];
		$txtKondisi28	= $_POST['txtKondisi28'];
		$txtKondisi29	= $_POST['txtKondisi29'];
		$txtKondisi30	= $_POST['txtKondisi30'];
		$txtKondisi31	= $_POST['txtKondisi31'];
		$txtKondisi32	= $_POST['txtKondisi32'];
		$txtKondisi33	= $_POST['txtKondisi33'];
		$txtKondisi34	= $_POST['txtKondisi34'];
		$txtKondisi35	= $_POST['txtKondisi35'];
		$txtKondisi36	= $_POST['txtKondisi36'];
		$txtKondisi37	= $_POST['txtKondisi37'];
		$txtKondisi38	= $_POST['txtKondisi38'];
		$txtKondisi39	= $_POST['txtKondisi39'];
		$txtKet1	=$_POST['txtKet1'];
		$txtKet2	=$_POST['txtKet2'];
		$txtKet3	=$_POST['txtKet3'];
		$txtKet4	=$_POST['txtKet4'];
		$txtKet5	=$_POST['txtKet5'];
		$txtKet6	=$_POST['txtKet6'];
		$txtKet7	=$_POST['txtKet7'];
		$txtKet8	=$_POST['txtKet8'];
		$txtKet9	=$_POST['txtKet9'];
		$txtKet10	=$_POST['txtKet10'];
		$txtKet11	=$_POST['txtKet11'];
		$txtKet12	=$_POST['txtKet12'];
		$txtKet13	=$_POST['txtKet13'];
		$txtKet14	=$_POST['txtKet14'];
		$txtKet15	=$_POST['txtKet15'];
		$txtKet16	=$_POST['txtKet16'];
		$txtKet17	=$_POST['txtKet17'];
		$txtKet18	=$_POST['txtKet18'];
		$txtKet19	=$_POST['txtKet19'];
		$txtKet20	=$_POST['txtKet20'];
		$txtKet21	=$_POST['txtKet21'];
		$txtKet22	=$_POST['txtKet22'];
		$txtKet23	=$_POST['txtKet23'];
		$txtKet24	=$_POST['txtKet24'];
		$txtKet25	=$_POST['txtKet25'];
		$txtKet26	=$_POST['txtKet26'];
		$txtKet27	=$_POST['txtKet27'];
		$txtKet28	=$_POST['txtKet28'];
		$txtKet29	=$_POST['txtKet29'];
		$txtKet30	=$_POST['txtKet30'];
		$txtKet31	=$_POST['txtKet31'];
		$txtKet32	=$_POST['txtKet32'];
		$txtKet33	=$_POST['txtKet33'];
		$txtKet34	=$_POST['txtKet34'];
		$txtKet35	=$_POST['txtKet35'];
		$txtKet36	=$_POST['txtKet36'];
		$txtKet37	=$_POST['txtKet37'];
		$txtKet38	=$_POST['txtKet38'];
		$txtKet39	=$_POST['txtKet39'];
		$cmbTanggal	= $_POST['cmbTanggal'];
		
				
				
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
			# Jika jumlah error pesanError tidak ada
			$noTransaksi = buatKode("pembelian", "ORP");
			$noTransaksi = buatKode("pembelian", "TRP");
			$noTransaksi = buatKode("pembelian", "CCP");
			$noTransaksi = buatKode("pembelian", "WIP");
			$noTransaksi = buatKode("pembelian", "WOP");
			$mySql	= "INSERT INTO pembelian SET 
							no_pembelian='$noTransaksi', 
							tgl_pembelian='".InggrisTgl($_POST['cmbTanggal'])."', 
							kd_supplier='$cmbSupplier', 
							keterangan='$txtKeterangan',
							keterangan2='$txtKeterangan2',
							keterangan3='$txtKeterangan3',
							kondisi1='$txtKondisi1',
							kondisi2='$txtKondisi2',
							kondisi3='$txtKondisi3',
							kondisi4='$txtKondisi4',
							kondisi5='$txtKondisi5',
							kondisi6='$txtKondisi6',
							kondisi7='$txtKondisi7',
							kondisi8='$txtKondisi8',
							kondisi9='$txtKondisi9',
							kondisi10='$txtKondisi10',
							kondisi11='$txtKondisi11',
							kondisi12='$txtKondisi12',
							kondisi13='$txtKondisi13',
							kondisi14='$txtKondisi14',
							kondisi15='$txtKondisi15',
							kondisi16='$txtKondisi16',
							kondisi17='$txtKondisi17',
							kondisi18='$txtKondisi18',
							kondisi19='$txtKondisi19',
							kondisi20='$txtKondisi20',
							kondisi21='$txtKondisi21',
							kondisi22='$txtKondisi22',
							kondisi23='$txtKondisi23',
							kondisi24='$txtKondisi24',
							kondisi25='$txtKondisi25',
							kondisi26='$txtKondisi26',
							kondisi27='$txtKondisi27',
							kondisi28='$txtKondisi28',
							kondisi29='$txtKondisi29',
							kondisi30='$txtKondisi30',
							kondisi31='$txtKondisi31',
							kondisi32='$txtKondisi32',
							kondisi33='$txtKondisi33',
							kondisi34='$txtKondisi34',
							kondisi35='$txtKondisi35',
							kondisi36='$txtKondisi36',
							kondisi37='$txtKondisi37',
							kondisi38='$txtKondisi38',
							kondisi39='$txtKondisi39',
							ket1='$txtKet1',
							ket2='$txtKet2',
							ket3='$txtKet3',
							ket4='$txtKet4',
							ket5='$txtKet5',
							ket6='$txtKet6',
							ket7='$txtKet7',
							ket8='$txtKet8',
							ket9='$txtKet9',
							ket10='$txtKet10',
							ket11='$txtKet11',
							ket12='$txtKet12',
							ket13='$txtKet13',
							ket14='$txtKet15',
							ket15='$txtKet15',
							ket16='$txtKet16',
							ket17='$txtKet17',
							ket18='$txtKet18',
							ket19='$txtKet19',
							ket20='$txtKet20',
							ket21='$txtKet21',
							ket22='$txtKet22',
							ket23='$txtKet23',
							ket24='$txtKet24',
							ket25='$txtKet25',
							ket26='$txtKet26',
							ket27='$txtKet27',
							ket28='$txtKet28',
							ket29='$txtKet29',
							ket30='$txtKet30',
							ket31='$txtKet31',
							ket32='$txtKet32',
							ket33='$txtKet33',
							ket34='$txtKet34',
							ket35='$txtKet35',
							ket36='$txtKet36',
							ket37='$txtKet37',
							ket38='$txtKet38',
							ket39='$lokasi_file',
							kd_user='".$_SESSION['SES_LOGIN']."'";
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			if($myQry){
				# Ambil semua data barang yang dipilih, berdasarkan kasir yg login
				$tmpSql ="SELECT * FROM tmp_pembelian WHERE kd_user='".$_SESSION['SES_LOGIN']."'";
				$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
				while ($tmpRow = mysql_fetch_array($tmpQry)) {
					$dataKode =	$tmpRow['item_barang'];
					$dataHarga=	$tmpRow['harga'];
					$dataJumlah=$tmpRow['jumlah'];
					$dataSatuan=$tmpRow['satuan'];
					
					// Masukkan semua barang yang udah diisi ke tabel pembelian detail
					$itemSql = "INSERT INTO pembelian_item SET 
											no_pembelian='$noTransaksi', 
											item_barang='$dataKode', 
											harga='$dataHarga', 
											jumlah='$dataJumlah',
											satuan='$dataSatuan'";
		  			mysql_query($itemSql, $koneksidb) or die ("Gagal Query ".mysql_error());
				}
				
				# Kosongkan Tmp jika datanya sudah dipindah
				$hapusSql = "DELETE FROM tmp_pembelian WHERE kd_user='".$_SESSION['SES_LOGIN']."'";
				mysql_query($hapusSql, $koneksidb) or die ("Gagal kosongkan tmp".mysql_error());
				
				// Refresh form
				echo "<meta http-equiv='refresh' content='0; url=transaksi_pembelian_view.php?noNota=$noTransaksi'>";
			}
			else{
				$pesanError[] = "Gagal penyimpanan ke database";
			}
		}	
	}
	
	// ============================================================================
} // Penutup GET

# TAMPILKAN DATA KE FORM
$noTransaksi	= buatKode("pembelian", "ORP");
$noTransaksi2	= buatKode("pembelian", "TRP");
$noTransaksi3	= buatKode("pembelian", "CCP");
$noTransaksi4	= buatKode("pembelian", "WIP");
$noTransaksi5	= buatKode("pembelian", "WOP");
$tglTransaksi 	= isset($_POST['cmbTanggal']) ? $_POST['cmbTanggal'] : date('d-m-Y');
$dataSupplier	= isset($_POST['cmbSupplier']) ? $_POST['cmbSupplier'] : '';
$dataKeterangan	= isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : '';
$dataKeterangan2= isset($_POST['txtKeterangan2']) ? $_POST['txtKeterangan2'] : '';
$dataKeterangan3= isset($_POST['txtKeterangan3']) ? $_POST['txtKeterangan3'] : '';
$dataKet1= isset($_POST['txtKet1']) ? $_POST['txtKet1'] : '';
$dataKet2= isset($_POST['txtKet2']) ? $_POST['txtKet2'] : '';
$dataKet3= isset($_POST['txtKet3']) ? $_POST['txtKet3'] : '';
$dataKet4= isset($_POST['txtKet4']) ? $_POST['txtKet4'] : '';
$dataKet5= isset($_POST['txtKet5']) ? $_POST['txtKet5'] : '';
$dataKet6= isset($_POST['txtKet6']) ? $_POST['txtKet6'] : '';
$dataKet7= isset($_POST['txtKet7']) ? $_POST['txtKet7'] : '';
$dataKet8= isset($_POST['txtKet8']) ? $_POST['txtKet8'] : '';
$dataKet9= isset($_POST['txtKet9']) ? $_POST['txtKet9'] : '';
$dataKet10= isset($_POST['txtKet10']) ? $_POST['txtKet10'] : '';
$dataKet11= isset($_POST['txtKet11']) ? $_POST['txtKet11'] : '';
$dataKet12= isset($_POST['txtKet12']) ? $_POST['txtKet12'] : '';
$dataKet13= isset($_POST['txtKet13']) ? $_POST['txtKet13'] : '';
$dataKet14= isset($_POST['txtKet14']) ? $_POST['txtKet14'] : '';
$dataKet15= isset($_POST['txtKet15']) ? $_POST['txtKet15'] : '';
$dataKet16= isset($_POST['txtKet16']) ? $_POST['txtKet16'] : '';
$dataKet17= isset($_POST['txtKet17']) ? $_POST['txtKet17'] : '';
$dataKet18= isset($_POST['txtKet18']) ? $_POST['txtKet18'] : '';
$dataKet19= isset($_POST['txtKet19']) ? $_POST['txtKet19'] : '';
$dataKet20= isset($_POST['txtKet20']) ? $_POST['txtKet20'] : '';
$dataKet21= isset($_POST['txtKet21']) ? $_POST['txtKet21'] : '';
$dataKet22= isset($_POST['txtKet22']) ? $_POST['txtKet22'] : '';
$dataKet23= isset($_POST['txtKet23']) ? $_POST['txtKet23'] : '';
$dataKet24= isset($_POST['txtKet24']) ? $_POST['txtKet24'] : '';
$dataKet25= isset($_POST['txtKet25']) ? $_POST['txtKet25'] : '';
$dataKet26= isset($_POST['txtKet26']) ? $_POST['txtKet26'] : '';
$dataKet27= isset($_POST['txtKet27']) ? $_POST['txtKet27'] : '';
$dataKet28= isset($_POST['txtKet28']) ? $_POST['txtKet28'] : '';
$dataKet29= isset($_POST['txtKet29']) ? $_POST['txtKet29'] : '';
$dataKet30= isset($_POST['txtKet30']) ? $_POST['txtKet30'] : '';
$dataKet31= isset($_POST['txtKet31']) ? $_POST['txtKet31'] : '';
$dataKet32= isset($_POST['txtKet32']) ? $_POST['txtKet32'] : '';
$dataKet33= isset($_POST['txtKet33']) ? $_POST['txtKet33'] : '';
$dataKet34= isset($_POST['txtKet34']) ? $_POST['txtKet34'] : '';
$dataKet35= isset($_POST['txtKet35']) ? $_POST['txtKet35'] : '';
$dataKet36= isset($_POST['txtKet36']) ? $_POST['txtKet36'] : '';
$dataKet37= isset($_POST['txtKet37']) ? $_POST['txtKet37'] : '';
$dataKet38= isset($_POST['txtKet38']) ? $_POST['txtKet38'] : '';
$dataKet39= isset($_POST['txtKet39']) ? $_POST['txtKet39'] : '';
$dataKondisi1= isset($_POST['txtKondisi1']) ? $_POST['txtKondisi1'] : '';
$dataKondisi2= isset($_POST['txtKondisi2']) ? $_POST['txtKondisi2'] : '';
$dataKondisi3= isset($_POST['txtKondisi3']) ? $_POST['txtKondisi3'] : '';
$dataKondisi4= isset($_POST['txtKondisi4']) ? $_POST['txtKondisi4'] : '';
$dataKondisi5= isset($_POST['txtKondisi5']) ? $_POST['txtKondisi5'] : '';
$dataKondisi6= isset($_POST['txtKondisi6']) ? $_POST['txtKondisi6'] : '';
$dataKondisi7= isset($_POST['txtKondisi7']) ? $_POST['txtKondisi7'] : '';
$dataKondisi8= isset($_POST['txtKondisi8']) ? $_POST['txtKondisi8'] : '';
$dataKondisi9= isset($_POST['txtKondisi9']) ? $_POST['txtKondisi9'] : '';
$dataKondisi10= isset($_POST['txtKondisi10']) ? $_POST['txtKondisi10'] : '';
$dataKondisi11= isset($_POST['txtKondisi11']) ? $_POST['txtKondisi11'] : '';
$dataKondisi12= isset($_POST['txtKondisi12']) ? $_POST['txtKondisi12'] : '';
$dataKondisi13= isset($_POST['txtKondisi13']) ? $_POST['txtKondisi13'] : '';
$dataKondisi14= isset($_POST['txtKondisi14']) ? $_POST['txtKondisi14'] : '';
$dataKondisi15= isset($_POST['txtKondisi15']) ? $_POST['txtKondisi15'] : '';
$dataKondisi16= isset($_POST['txtKondisi16']) ? $_POST['txtKondisi16'] : '';
$dataKondisi17= isset($_POST['txtKondisi17']) ? $_POST['txtKondisi17'] : '';
$dataKondisi18= isset($_POST['txtKondisi18']) ? $_POST['txtKondisi18'] : '';
$dataKondisi19= isset($_POST['txtKondisi19']) ? $_POST['txtKondisi19'] : '';
$dataKondisi20= isset($_POST['txtKondisi20']) ? $_POST['txtKondisi20'] : '';
$dataKondisi21= isset($_POST['txtKondisi21']) ? $_POST['txtKondisi21'] : '';
$dataKondisi22= isset($_POST['txtKondisi22']) ? $_POST['txtKondisi22'] : '';
$dataKondisi23= isset($_POST['txtKondisi23']) ? $_POST['txtKondisi23'] : '';
$dataKondisi24= isset($_POST['txtKondisi24']) ? $_POST['txtKondisi24'] : '';
$dataKondisi25= isset($_POST['txtKondisi25']) ? $_POST['txtKondisi25'] : '';
$dataKondisi26= isset($_POST['txtKondisi26']) ? $_POST['txtKondisi26'] : '';
$dataKondisi27= isset($_POST['txtKondisi27']) ? $_POST['txtKondisi27'] : '';
$dataKondisi28= isset($_POST['txtKondisi28']) ? $_POST['txtKondisi28'] : '';
$dataKondisi29= isset($_POST['txtKondisi29']) ? $_POST['txtKondisi29'] : '';
$dataKondisi30= isset($_POST['txtKondisi30']) ? $_POST['txtKondisi30'] : '';
$dataKondisi31= isset($_POST['txtKondisi31']) ? $_POST['txtKondisi31'] : '';
$dataKondisi32= isset($_POST['txtKondisi32']) ? $_POST['txtKondisi32'] : '';
$dataKondisi33= isset($_POST['txtKondisi33']) ? $_POST['txtKondisi33'] : '';
$dataKondisi34= isset($_POST['txtKondisi34']) ? $_POST['txtKondisi34'] : '';
$dataKondisi35= isset($_POST['txtKondisi35']) ? $_POST['txtKondisi35'] : '';
$dataKondisi36= isset($_POST['txtKondisi36']) ? $_POST['txtKondisi36'] : '';
$dataKondisi37= isset($_POST['txtKondisi37']) ? $_POST['txtKondisi37'] : '';
$dataKondisi38= isset($_POST['txtKondisi38']) ? $_POST['txtKondisi38'] : '';
$dataKondisi39= isset($_POST['txtKondisi39']) ? $_POST['txtKondisi39'] : '';
$dataItemBarang	= isset($_POST['txtItemBarang']) ? $_POST['txtItemBarang'] : '';
$dataHarga		= isset($_POST['txtHarga']) ? $_POST['txtHarga'] : '';
$dataSatuan		= isset($_POST['cmbSatuan']) ? $_POST['cmbSatuan'] : '';
?>


	    <?php
//  tabel menu 
$tmpSql ="SELECT * FROM tmp_pembelian WHERE  kd_user='".$_SESSION['SES_LOGIN']."'
			ORDER BY id";
$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
$total = 0; $qtyItem = 0; $nomor=0;
while($tmpRow = mysql_fetch_array($tmpQry)) {
	$id		= $tmpRow['id'];
	$subSotal = $tmpRow['jumlah'] * $tmpRow['harga'];
	$total	= $total + $subSotal;
	$qtyItem= $qtyItem + $tmpRow['jumlah'];
	$nomor++;
?>
	    <?php 
}?>




     <form action="?page=Transaksi-P2H" method="post"  name="frmadd">
<table width="1057" cellspacing="1" class="table-common" style="margin-top:0px; font-size: 10;">
	<tr><style type="text/css">
.table-list tr td {
	text-align: left;
}
</style>
	  <td colspan="7"><table class="table-list" width="1047" border="0" cellspacing="1" cellpadding="2">
	    <tr>
	    
	<tr style="text-align: center; font-size: larger;">
	  <td colspan="6" ><h2>ORDER MANAGEMENT</h2></td>
    </tr>
   
	<tr>
	  <td width="182">Input date </b></td>
	  <td width="822">
	    <input name="$tglTransaksi" value="<?php echo ($tglTransaksi); ?>" size="20" maxlength="100" disabled="disabled" />
	    </b></td>
	  
    </tr>
	<tr>
	  <td>Order Date</td>
	  <td><?php echo form_tanggal("cmbTanggal",$tglTransaksi); ?></td>
    </tr>
    <tr>
	  <td>Order Origin</td>
	  <td><b>
	    <select name="txtKondisi22">
	      <option value="BLANK">Order Origin</option>
	      <option value="Balikpapan">Balikpapan</option>
	      <option value="Banjarmasin">Banjarmasin</option>
	      <option value="Medan">Medan</option>
	      <option value="Jakarta">Jakarta</option>
        </select>
	  </b></td>
	  <td width="1" colspan="4" rowspan="10">&nbsp;</td>
    </tr>
	<tr>
	  <td>Customer Name</td>
	  <td><b>
	    <select name="cmbSupplier">
	      <option value="BLANK">....</option>
	      <?php
	  $mySql = "SELECT * FROM supplier ORDER BY kd_supplier";
	  $myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query".mysql_error());
	  while ($kolomData = mysql_fetch_array($myQry)) {
	  	if ($dataSupplier == $kolomData['kd_supplier']) {
			$cek = " selected";
		} else { $cek=""; }
	  	echo "<option value='$kolomData[kd_supplier]' $cek>[ $kolomData[kd_supplier] ] $kolomData[nm_supplier]</option>";
	  }
	  $mySql ="";
	  ?>
        </select>
	  </b></td>
    </tr>
	<tr>
	  <td>Customer Order No</td>
	  <td><b>
	    <input name="txtKet11" value="<?php echo $dataKet39; ?>" size="40" maxlength="100" />
	  </b></td>
    </tr>
	
	<tr>
	  <td>Customer Email</td>
	  <td><b>
	    <input name="txtKet22" value="<?php echo $dataKet36; ?>" size="40" maxlength="100" />
	  </b></td>
    </tr>
	<tr>
	  <td>Customer HP</td>
	  <td>
	    <input name="txtKeterangan2" value="<?php echo $dataKeterangan2; ?>" size="20" maxlength="100" />
	  </strong></td>
    </tr>
	<tr>
	  <td>Order Number</td>
	  <td><b>
	    <input name="txtNomor" value="<?php echo $noTransaksi; ?>" size="22" maxlength="22" readonly="readonly"/>
	  </b></td>
    </tr>
	<tr>
	  <td>Created by</td>
	  <td><strong>
	    <input name="txtKeterangan3" value="<?php echo $dataKeterangan3; ?>" size="20" maxlength="100" />
	  </strong></td>
    </tr>
	<tr>
	  <td>Remarks</td>
	  <td><strong>
	    <textarea name="comment" rows="5" cols="40" value="<?php echo $dataKet35; ?>"></textarea></strong></td>
    </tr>
    </table>
    </form>
    
    
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'London')">Trucking</button>
	<button class="tablinks" onclick="openCity(event, 'Paris')">Custom Clearance</button>
	<button class="tablinks" onclick="openCity(event, 'Berlin')">Warehouse In</button>
	<button class="tablinks" onclick="openCity(event, 'India')">Warehouse Out</button>
</div>





<form action="?page=Transaksi-P2H" method="post"  name="frmadd">
  <table width="1057" cellspacing="1" class="table-common" style="margin-top:0px; font-size: 10;">
	  <td colspan="7" bgcolor="#CCCCCC"><table class="table-list" width="1047" border="0" cellspacing="1" cellpadding="2">
      <td align="right">SPK NO</td>
      <td align="left"><b>
        <input name="txtNomor2" value="<?php echo $noTransaksi2; ?>" size="22" maxlength="22" readonly="readonly"/>
      </b></td>
     
    </tr>
    <tr >
      <td align="right"><strong>Execution Date </strong></td>
      <td align="left"><b><?php echo form_tanggal("cmbTanggal",$tglTransaksi); ?></b></td>
      
    </tr>
    <tr class="table-list">
      <td align="left"><strong>Multi Pick</strong></td>
      <td align="left"><b>
        <select name="txtKondisi24">
          <option value="BLANK">Multi Pick</option>
          <option value="yes">yes</option>
          <option value="no">no</option>
        </select>
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td align="right"><strong>Pickup Location</strong></td>
      <td align="left"><b>
        <input name="txtKet24" value="<?php echo $dataKet22; ?>" size="40" maxlength="100" />
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td align="right"><strong></strong><strong>PIC Cust at Pickup</strong></td>
      <td align="left"><b>
        <input name="txtKet25" value="<?php echo $dataKet23; ?>" size="40" maxlength="100" />
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td align="right"><strong>Multi Drop</strong></td>
      <td align="left"><b>
        <select name="txtKondisi25">
          <option value="BLANK">Multi Drop</option>
	       <option value="Yes">Yes</option>
	       <option value="No">No</option>
        </select>
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td align="left"><strong>Destination Location</strong></td>
      <td align="left"><b>
        <input name="txtKet26" value="<?php echo $dataKet24; ?>" size="40" maxlength="100" />
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td align="left"><strong>PIC Cust at Destination</strong></td>
      <td align="left"><b>
        <input name="txtKet27" value="<?php echo $dataKet25; ?>" size="40" maxlength="100" />
      </b></td>
    
    </tr>
    <tr class="table-list">
      <td align="left"><strong>Truck Type</strong></td>
      <td align="left"><b>
        <select name="txtKondisi26">
           <option value="BLANK">Truck Type</option>
               <option value="Trailer">Trailer</option>
               <option value="WB">WB</option>
               <option value="CDD">CDD</option>
        </select>
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td align="right"><strong></strong><strong>Cargo</strong></td>
      <td align="left"><b>
        <input name="txtKet34" value="<?php echo $dataKet31; ?>" size="60" maxlength="100" />
      </b></td>
    <td>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>File Upload</label>
		<input type="file" name="fileupload" id="fileupload" class="form-control" />
	</div>
	<div class="form-group">
		<input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info mt-3" />
	</div>
</form>

    </td>
      
    </tr>
    <tr class="table-list">
      <td align="left"><strong>Upload FS</strong></td>
      <td align="left"><strong><b>
        <input type="file" name="gambar" id="gambar" />
      </b></strong></td>
     
    </tr>
    <tr class="table-list">
      <td align="left"><strong>Upload Quotation</strong></td>
      <td align="left"><strong><b>
        <input type="file" name="fileToUpload11" id="fileToUpload11" />
      </b></strong></td>

    </tr>
    <tr class="table-list">
      <td align="left"><strong>Upload Customer PO</strong></td>
      <td align="left"><strong><b>
        <input type="file" name="fileToUpload12" id="fileToUpload12" />
      </b></strong></td>
     
    </tr>
    <tr class="table-list">
      <td align="left"><strong>Est Revenue</strong></td>
      <td align="left"><b>
        <input name="txtKet10" value="<?php echo $dataKet10; ?>" size="20" maxlength="100" />
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td align="left"><strong>Description</strong></td>
      <td align="left"><b>
        <input name="txtKet39" value="<?php echo $dataKet39; ?>" size="60" maxlength="100" />
      </b></td>
    </tr>


</form>
</body>
  




<form action="" method="post"  name="frmadd">
<table width="1057" cellspacing="1" class="table-common" style="margin-top:0px; font-size: 10;">
	
	  <td colspan="8" bgcolor="#CCCCCC"><table class="table-list" width="1047" border="0" cellspacing="1" cellpadding="2">
	   


    CUSTOM CLEARENCE<b>
        <input name="txtKet31" value="<?php echo $dataKet29; ?>" size="60" maxlength="100" />
      </b>
     
     
    </tr>
    <tr class="table-list">
      <td width="278"><strong>Contract No</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtNomor3" value="<?php echo $noTransaksi3; ?>" size="22" maxlength="22" readonly="readonly"/>
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Order Type</strong></td>
      <td align="right" style="text-align: left"><b><strong><b>
        <input name="txtOrderType" value=" " size="22" maxlength="22" readonly="readonly"/>
      </b></strong></b></td>
      
    </tr>
    <tr class="table-list">
      <td><b>Execution Date </b></td>
      <td align="right" style="text-align: left"><b><?php echo form_tanggal("cmbTanggal",$tglTransaksi); ?></b></td>
      
    </tr>
    <tr class="table-list">
      <td><strong>Port of Loading</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet28" value="<?php echo $dataKet26; ?>" size="40" maxlength="100" />
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td><strong>PIC Cust at Loading</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet29" value="<?php echo $dataKet27; ?>" size="40" maxlength="100" />
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td><strong>Port of Discharge</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet2" value="<?php echo $dataKet28; ?>" size="40" maxlength="100" />
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td><strong>PIC Cust at Discharge</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet16" value="<?php echo $dataKet16; ?>" size="40" maxlength="100" />
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td><strong>ETA/ETD Ship/Air Line</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet17" value="<?php echo $dataKet17; ?>" size="40" maxlength="100" />
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Ship/Air Lines Name</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet7" value="<?php echo $dataKet7; ?>" size="40" maxlength="100" />
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Cargo</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet6" value="<?php echo $dataKet6; ?>" size="40" maxlength="100" />
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Upload FS</strong></td>
      <td align="right" style="text-align: left"><strong><b>
        <input type="file" name="file" id="file" />
      </b></strong></td>
    
    </tr>
    <tr class="table-list">
      <td><strong>Upload Quotation</strong></td>
      <td align="right" style="text-align: left"><strong><b>
        <input type="file" name="fileToUpload8" id="fileToUpload8" />
      </b></strong></td>
      
    </tr>
    <tr class="table-list">
      <td><strong>Upload Customer PO</strong></td>
      <td align="right" style="text-align: left"><strong><b>
        <input type="file" name="fileToUpload9" id="fileToUpload9" />
      </b></strong></td>
    
    </tr>
    <tr class="table-list">
      <td><strong>SPK No</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet19" value="<?php echo $dataKet19; ?>" size="40" maxlength="100" />
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Description</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet13" value="<?php echo $dataKet13; ?>" size="100" maxlength="100" />
      </b></td>
      
      </table>
</body>
    
    
  
    
    
 <table>
    <tr class="table-list">
      <td align="right" style="text-align: left"><strong>No. Services</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtNomor4" value="<?php echo $noTransaksi4; ?>" size="22" maxlength="22" readonly="readonly"/>
      </b></td>
    </tr>
    <tr class="table-list">
      <td width="278"><b>Pickup Location </b></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet32" value="<?php echo $dataKet30; ?>" size="40" maxlength="100" />
      </b></td>
    </tr>
    <tr class="table-list">
      <td><strong>ETA at Warehouse</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet33" value="<?php echo $dataKet31; ?>" size="40" maxlength="100" />
      </b></td>
    </tr>
    <tr class="table-list">
      <td><strong>Truck Nopol</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet35" value="<?php echo $dataKet32; ?>" size="40" maxlength="100" />
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td><strong>Driver Name</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet36" value="<?php echo $dataKet33; ?>" size="40" maxlength="100" />
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Truck Type</strong></td>
      <td align="right" style="text-align: left"><b>
        <select name="txtKondisi34">
         <option value="BLANK">Truck Type</option>
               <option value="Trailer">Trailer</option>
               <option value="WB">WB</option>
               <option value="CDD">CDD</option>
        </select>
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Cargo</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet38" value="<?php echo $dataKet34; ?>" size="60" maxlength="100" />
      </b></td>
    </tr>
    <tr class="table-list">
      <td><strong>Upload FS</strong></td>
      <td align="right" style="text-align: left"><strong><b>
        <input type="file" name="fileToUpload4" id="fileToUpload4" />
      </b></strong></td>
    </tr>
    <tr class="table-list">
      <td><strong>Upload Quotation</strong></td>
      <td align="right" style="text-align: left"><strong><b>
        <input type="file" name="fileToUpload5" id="fileToUpload5" />
      </b></strong></td>
    </tr>
    <tr class="table-list">
      <td><strong>Upload Customer PO</strong></td>
      <td align="right" style="text-align: left"><strong><b>
        <input type="file" name="fileToUpload6" id="fileToUpload6" />
      </b></strong></td>
    </tr>
    <tr class="table-list">
      <td><strong>Est Revenue</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet30" value="<?php echo $dataKet28; ?>" size="60" maxlength="100" />
      </b></td>
    </tr>
    <tr class="table-list">
      <td><strong>Description</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet37" value="<?php echo $dataKet37; ?>" size="60" maxlength="100" />
      </b></td>
    </tr>
</table>

    



<table>
    <tr class="table-list">
      <td align="right" style="text-align: left"><strong>Service Type</strong></td>
      <td align="right" style="text-align: left"><b>
        <select name="txtKondisi30">
          <option value="BLANK">Service Type</option>
          <option value="Inbound">Inbound</option>
          <option value="Outbound">Outbound</option>
        </select>
      </b></td>
    </tr>
    <tr class="table-list">
      <td colspan="2" align="right" style="text-align: left"><input type="radio" name="decanting" <?php if (isset($nodecan) && $nodecan=="No Decanting") echo "checked";?> value="No Decanting">
        No Decanting
        <input type="radio" name="decanting" <?php if (isset($decan) && $decan=="Decanting") echo "checked";?> value="Decanting">Decanting
        <input type="radio" name="decanting" <?php if (isset($mobdecan) && $mobdecan=="Mobile Decanting") echo "checked";?> value="Mobile Decanting">Mobile Decanting  
      <span class="error"> <?php echo $decanting;?></span></td>
      
    </tr>
  
    <tr class="table-list">
      <td width="278"><strong>ETD from Warehouse</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet40" value="<?php echo $dataKet38; ?>" size="40" maxlength="100" />
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td><b>Pickup Location </b></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet15" value="<?php echo $dataKet15; ?>" size="40" maxlength="100" />
      </b></td>
    
    </tr>
    <tr class="table-list">
      <td><strong>PIC Cust at Pickup</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet18" value="<?php echo $dataKet18; ?>" size="40" maxlength="100" />
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td><strong>Destination Location</strong></td>
      <td align="right" style="text-align: left"><input name="txtKet4" value="<?php echo $dataKet4; ?>" size="40" maxlength="100" /></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>PIC Cust at Destination</strong></td>
      <td align="right" style="text-align: left"><input name="txtKet3" value="<?php echo $dataKet3; ?>" size="40" maxlength="100" /></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Truck Nopol</strong></td>
      <td align="right" style="text-align: left"><input name="txtKet1" value="<?php echo $dataKet1;?>" size="40" maxlength="100" /></td>
      
    </tr>
    <tr class="table-list">
      <td><strong>Driver Name</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet5" value="<?php echo $dataKet21; ?>" size="40" maxlength="100" />
      </b></td>
      
    </tr>
    <tr class="table-list">
      <td><strong>Cargo</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet12" value="<?php echo $dataKet12; ?>" size="40" maxlength="100" />
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Upload FS</strong></td>
      <td align="right" style="text-align: left"><strong><b>
        <input type="file" name="fileToUpload" id="fileToUpload" />
      </b></strong></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Upload Quotation</strong></td>
      <td align="right" style="text-align: left"><strong><b>
        <input type="file" name="fileToUpload2" id="fileToUpload2" />
      </b></strong></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Upload Customer PO</strong></td>
      <td align="right" style="text-align: left"><strong><b>
        <input type="file" name="fileToUpload3" id="fileToUpload3" />
      </b></strong></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Est Revenue</strong></td>
      <td align="right" style="text-align: left"><b>
        <input name="txtKet20" value="<?php echo $dataKet20; ?>" size="40" maxlength="100" />
      </b></td>
     
    </tr>
    <tr class="table-list">
      <td><strong>Description</strong></td>
      <td align="left"><b>
        <input name="txtKet9" value="<?php echo $dataKet9; ?>" size="40" maxlength="100" />
      </b></td>
    </tr>
 <tr class="table-list">
       <td colspan="6" align="center" style="text-align: left"></p></td>
  </tr> 
 </td>
</table>
   



<tr class="table-list">
      <td colspan="2" align="center" style="text-align: left"><span style="text-align: center">
        <input name="btnSave" type="submit" style="cursor:pointer;" value=" SIMPAN" />
      </span></td>
     
    </body>
</html> 
