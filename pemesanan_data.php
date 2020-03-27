<?php
include_once "library/inc.seslogin.php";

# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM pemesanan";
$pageQry = mysql_query($pageSql, $koneksidb) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<table width="1040" border="0" cellpadding="2" cellspacing="1" class="table-border">
  <tr>
    <td colspan="2" align="right"><h1><b>DATA PERMINTAAN </b></h1></td>
  </tr>
  <tr>
    <td colspan="2"><a href="?page=Pemesanan-Add" target="_self"><img src="images/btn_add_data.png" height="25" border="0" /></a></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
	<table class="table-list" width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr>
        
        <th width="20" align="center"><b>No</b></th>
        <th width="77" align="center">Tanggal</th>
        <th width="68">DN.No</th>
        <th width="97">Kendaraan No </th>
        <th width="149"><b>Driver</b></th>
        <th colspan="5" align="center">Man Power</th>
        <th width="222"><b>Keterangan</b></th>
        <td width="27" align="center" bgcolor="#CCCCCC"><b>Edit</b></td>
        <td width="85" align="center" bgcolor="#CCCCCC"><b>Delete</b></td>
      </tr>
      <?php
	$mySql = "SELECT * FROM pemesanan ORDER BY id DESC LIMIT $hal, $row";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
	$nomor  = 0; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode = $kolomData['id'];
	?>
      <tr>
        <td align="center"><?php echo $nomor; ?></td>
        <td align="center"><?php echo IndonesiaTgl($kolomData['tanggal']); ?></td>
        <td align="center"><?php echo $kolomData['jam']; ?></td>
        <td><?php echo $kolomData['nomor_meja']; ?></td>
        <td><?php echo $kolomData['nama_pemesan']; ?></td>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
        <td width="27" align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td><?php echo $kolomData['keterangan']; ?></td>
         <td><a href="?page=Pemesanan-Edit&Kode=<?php echo $Kode; ?>" target="_self" alt="Edit Data"><img src="images/btn_edit.png" width="20" height="22" border="0" /></a></td>
          <td><a href="?page=Pemesanan-Delete&Kode=<?php echo $Kode; ?>" target="_self" alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><img src="images/btn_delete.png" width="20" height="20"  border="0"  alt="Delete Data" /></a></td>
      </tr>
      <?php } ?>
    </table></td>
  </tr>
  <tr class="selKecil">
    <td width="391"><b>Jumlah Data :</b> <?php echo $jml; ?> </td>
    <td width="466" align="right"><b>Halaman ke :</b> 
	<?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?page=Pemesanan-Data&hal=$list[$h]'>$h</a> ";
	}
	?>
	</td>
  </tr>
</table>
