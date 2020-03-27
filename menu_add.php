<?php
include_once "library/inc.seslogin.php";

if($_GET) {
	if(isset($_POST['btnSave'])){
		# VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
		$pesanError = array();
		if (trim($_POST['txtMenu'])=="") {
			$pesanError[] = "Data <b>Description</b> tidak boleh kosong !";		
		}
		if (trim($_POST['txtHarga'])==""  OR ! is_numeric(trim($_POST['txtHarga']))) {
			$pesanError[] = "Data <b>Harga Menu</b> harus diisi angka !";
		}
		if (trim($_POST['cmbKategori'])=="BLANK") {
			$pesanError[] = "Data <b>Kategori</b> belum ada yang dipilih !";		
		}
				
		$lokasi_file    = $_FILES['gambar']['tmp_name'];
        $nama_file      = $_FILES['gambar']['name'];
        $acak           = rand(1,99);
        $nama_file_unik = $acak.$nama_file;
        $vdir_upload = "images2/";
        $vfile_upload = $vdir_upload . $nama_file_unik;
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $vfile_upload);
       
		# BACA DATA DALAM FORM, masukkan datake variabel
		$txtMenu	= $_POST['txtMenu'];	
		$txtMenu2	= $_POST['txtMenu2'];	
		$txtHarga	= $_POST['txtHarga'];
		$cmbKategori= $_POST['cmbKategori'];
		$cmbfoto= $_POST['cmbfoto'];
		

		
		
		
		 // ini script untuk nyimpan fotonya mas
		# VALIDASI NAMA, jika sudah ada akan ditolak
		$cekSql="SELECT * FROM menu WHERE nm_menu='$txtMenu'";
		$cekQry=mysql_query($cekSql, $koneksidb) or die ("Eror Query".mysql_error()); 
		if(mysql_num_rows($cekQry)>=1){
			$pesanError[] = "Maaf, Nama Menu <b> $txtMenu </b> sudah ada, ganti dengan yang lain";
		}

		# JIKA ADA PESAN ERROR DARI VALIDASI
		if (count($pesanError)>=1 ){
            echo "<div class='mssgBox'>";
			echo "<img src='images/attention.png'> <br><hr>";
				$noPesan=1;
				foreach ($pesanError as $indeks=>$pesan_tampil) { 
				$dataKode++;
					echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
				} 
			echo "</div> <br>"; 
		}
		else {
			# SIMPAN DATA KE DATABASE
			// Jika tidak menemukan error, simpan data ke database
			$kodeBaru	= buatKode("menu", "P");
			$mySql	= "INSERT INTO menu (kd_menu, nm_menu,nm_menu2,harga, kd_kategori,foto) 
						VALUES ('$kodeBaru', 
								'$txtMenu', 
								'$txtMenu2',
								'$txtHarga', 
								'$cmbKategori','$nama_file_unik')";
			$myQry	= mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			if($myQry){
				echo "<meta http-equiv='refresh' content='0; url=?page=Menu-Data'>";
			}
			exit;
		}	
	} // Penutup POST
	
	# MASUKKAN DATA KE VARIABEL
	// Supaya saat ada pesan error, data di dalam form tidak hilang. Jadi, tinggal meneruskan/memperbaiki yg salah
	$dataKode	= buatKode("menu", "P");
	$dataMenu	= isset($_POST['txtMenu']) ? $_POST['txtMenu'] : '';
	$dataMenu2	= isset($_POST['txtMenu2']) ? $_POST['txtMenu2'] : '';
	$dataHarga	= isset($_POST['txtHarga']) ? $_POST['txtHarga'] : '';
	$dataKategori	= isset($_POST['cmbKategori']) ? $_POST['cmbKategori'] : '';
	$nama_file	= isset($_POST['foto']) ? $_POST['foto'] : '';
} // Penutup GET
?>

<form action="?page=Menu-Add" method="post" name="form1" target="_self" enctype="multipart/form-data" > 
  <table width="700" class="table-list" border="0" cellspacing="1" cellpadding="4">
    <tr>
      <th colspan="3"><b>TAMBAH DESCRIPTION TRANSPORT</b></th>
    </tr>
    <tr>
      <td width="133"><b>Code </b></td>
      <td width="3"><b>:</b></td>
      <td width="536"> <input name="textfield" type="text" id="textfield" value="<?php echo $dataKode; ?>" size="30" maxlength="25"  readonly="readonly"/></td>
    </tr>
    <tr>
      <td><b>Description </b></td>
      <td><b>:</b></td>
      <td><input name="txtMenu" type="text" value="<?php echo $dataMenu; ?>" size="80" maxlength="100"/></td>
    </tr>
	  <tr>
      <td><b>Trip Category</b></td>
      <td><b>:</b></td>
      <td><input name="txtMenu2" type="text" value="<?php echo $dataMenu2; ?>" size="80" maxlength="100"/></td>
    </tr>
    <tr>
      <td><b>Harga (Rp) </b></td>
      <td><b>:</b></td>
      <td> <input name="txtHarga" type="text"  value="<?php echo $dataHarga; ?>" size="20" maxlength="10"/></td>
    </tr>
    <tr>
      <td><b>Site Area</b></td>
      <td><b>:</b></td>
      <td><select name="cmbKategori">
        <option value="BLANK">...</option>
        <?php
		  $mySql = "SELECT * FROM kategori ORDER BY kd_kategori";
		  $myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query".mysql_error());
		  while ($myRow = mysql_fetch_array($myQry)) {
			if ($myRow['kd_kategori']== $dataKategori) {
				$cek = " selected";
			} else { $cek=""; }
			echo "<option value='$myRow[kd_kategori]' $cek>$myRow[nm_kategori]</option>";
		  }
		  $mySql ="";
		  ?>
      </select></td>
    </tr>
   <tr>
      <td><b>Upload gambar  </b></td>
      <td><b>:</b></td>
      <td> <input name="gambar" type="file" id="gambar" size="30" maxlength="30" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <input type="submit" name="btnSave" value=" Simpan "/></td>
    </tr>
  </table>
</form>
