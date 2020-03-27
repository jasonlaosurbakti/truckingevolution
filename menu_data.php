<?php
include_once "library/inc.seslogin.php";

# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM menu";
$pageQry = mysql_query($pageSql, $koneksidb) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);

?>
<table width="802" border="0" cellpadding="2" cellspacing="1" class="table-border">
  <tr>
    <td colspan="2" align="left"><h3><b>LIST TRIP LOGISTIC</b></h3></td>
  </tr>
  <tr>
    <td width="356"><a href="?page=Menu-Add" target="_self"><img src="images/btn_add_data.png" height="25" border="0" /></a></td>
    <td width="380" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
	<table class="table-list" width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr>
        <th width="22"><p><b>No</b></p></th>
        <th width="120"><p><b>Kategori</b></p></th>
        <th width="285"><p><b>Description</b></p></th>
		 <th width="80"><p><b>Satuan</b></p></th>
        <th width="88" align="right"><p><b>Harga (Rp) </b></p></th>
		<th width="88" align="right"><p><b>Gambar </b></p></th>
        <td width="31" align="center" bgcolor="#CCCCCC"><p><b>Edit</b></p></td>
        <td width="32" align="center" bgcolor="#CCCCCC"><p><b>Del</b></p></td>
      </tr>
      <?php
	$mySql 	= "SELECT menu.*, kategori.nm_kategori FROM menu, kategori
				WHERE menu.kd_kategori=kategori.kd_kategori
				ORDER BY menu.kd_kategori, menu.nm_menu ASC LIMIT $hal, $row";
	$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query  salah : ".mysql_error());
	$nomor  = $hal; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode = $kolomData['kd_menu'];
$foto = $kolomData['foto'];
	?>
      <tr>
		<td><p><?php echo $nomor; ?></p></td>
		<td><p><?php echo $kolomData['nm_kategori']; ?></p></td>
		<td><p><?php echo $kolomData['nm_menu']; ?></p></td>
		<td><p><?php echo $kolomData['nm_menu2']; ?></p></td>
		<td align="right"><p><b><?php echo format_angka($kolomData['harga']); ?></b></p></td>
        <td><p><?php echo "<img width=60 height=66 src='images2/$foto '/>"?></p></td>
        <td align="center"><p><a href="?page=Menu-Edit&Kode=<?php echo $Kode; ?>" target="_self" alt="Edit Data"><img src="images/btn_edit.png" width="20" height="20" border="0" /></a></p></td>
        <td align="center"><p><a href="?page=Menu-Delete&Kode=<?php echo $Kode; ?>" target="_self" alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><img src="images/btn_delete.png" width="20" height="20"  border="0"  alt="Delete Data" /></a></p></td>
      </tr>
      <?php } ?>
    </table>    </td>
  </tr>
  <tr class="selKecil">
    <td><b>Jumlah Data :</b> <?php echo $jml; ?> </td>
    <td align="right"><b>Halaman ke :</b> 
	<?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?page=Menu-Data&hal=$list[$h]'>$h</a> ";
	}
	?></td>
  </tr>
</table>

