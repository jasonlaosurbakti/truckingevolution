<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";
$no=$_GET['np'];
if($_GET['act']=='up'){

$cost=$_POST['cost'];
$od=$_POST['od'];
$cd=$_POST['cd'];
$wr=$_POST['wr'];
$lc=$_POST['lc'];
$des=$_POST['des'];
$eci=$_POST['eci'];
$awd=$_POST['awd'];
$pri=$_POST['pri'];
$sgh=$_POST['sgh'];
$ony=$_POST['ony'];
$validasi3=$_POST['val3'];
$mt3=$_POST['mt3'];
$hses3 = date("Y-m-d");

$up=mysql_query("update penjualan set tgl_order='$od',tgl_penjualan='$cd',tgl_pri='$pri',workrequest='$wr',nomor_meja='$lc',cost='$cost', mt3='$mt3',hses3='$hses3'
keterangan='$des',uang_bayar='$eci',validasi3='$validasi3',done='$awd' where no_penjualan='$no'");
if($up){
				echo "<script language='javascript'>alert('Data berhasil di simpan ! '); 
	                         window.location='transaksi_penjualan_validasi3.php?noNota=$no';</script>";
				}else
					
				{
				echo '<script language="javascript">alert("Gagal di simpan ! "); 
	                         window.history.back();</script>';
				}


}
if($_GET['act']=='up2'){
	
$k1=$_POST['ky1'];
$k2=$_POST['ky2'];
$k3=$_POST['ky3'];
$k4=$_POST['ky4'];
$k5=$_POST['ky5'];	
$t1=$_POST['tr1'];
$t2=$_POST['tr2'];
$t3=$_POST['tr3'];
$t4=$_POST['tr4'];
$t5=$_POST['tr5'];	
$tgl=$_POST['tgl'];
$h1=$_POST['h1'];
$h2=$_POST['h2'];
$h3=$_POST['h3'];
$h4=$_POST['h4'];
$h5=$_POST['h5'];

$uk=mysql_query("select*from penjualan where no_penjualan='$no'");
$data=mysql_fetch_array($uk);
$hd1=$data['hours'];
$hd2=$data['hours2'];
$hd3=$data['hours3'];
$hd4=$data['hours4'];
$hd5=$data['hours5'];

$totjams=$h1+$h2+$h3+$h4+$h5;

	
	$up=mysql_query("update penjualan set totjam='$totjams', karyawan='$k1',karyawan2='$k2',karyawan3='$k3',karyawan4='$k4',karyawan5='$k5',
	tgl_penjualan='$tgl',trade='$t1',trade2='$t2',trade3='$t3',trade4='$t4',trade5='$t5',
	hours='$h1',hours2='$h2',hours3='$h3',hours4='$h4',hours5='$h5' where no_penjualan='$no'");
if($up){
				echo "<script language='javascript'>alert('Data berhasil di simpan ! '); 
	                         window.location='transaksi_penjualan_validasi3.php?noNota=$no';</script>";
				}else
					
				{
				echo '<script language="javascript">alert("Gagal di simpan ! "); 
	                         window.history.back();</script>';
				}	
}
	if($_GET['act']=='hapus'){
	
$id=$_GET['id'];
$kode=$_POST['kode'];
	
	$up=mysql_query("delete from penjualan_item where id='$id' ");
if($up){
				echo "<script language='javascript'>alert('Data berhasil DI HAPUS ! '); 
	                         window.location='transaksi_penjualan_validasi3.php?noNota=$no';</script>";
				}else
					
				{
				echo '<script language="javascript">alert("Gagal di HAPUS ! "); 
	                         window.history.back();</script>';
				}	
	
	
	}
	
	$no=$_GET['np'];
if($_GET['act']=='up'){

$cost=$_POST['cost'];
$od=$_POST['od'];
$cd=$_POST['cd'];
$wr=$_POST['wr'];
$lc=$_POST['lc'];
$des=$_POST['des'];
$eci=$_POST['eci'];
$awd=$_POST['awd'];
$pri=$_POST['pri'];
$sgh=$_POST['sgh'];
$ony=$_POST['ony'];
$validasi3=$_POST['val3'];

$ab=mysql_query("UPDATE penjualan SET tgl_penjualan='$cd',validasi3='$validasi3' where no_penjualan='$no'");
if($ab){
				echo "<script language='javascript'>alert('Data berhasil di simpan ! '); 
	                         window.location='transaksi_penjualan_validasi3.php?noNota=$no';</script>";
				}else
					
				{
				echo '<script language="javascript">alert("Gagal di simpan ! "); 
	                         window.history.back();</script>';
				}


}
