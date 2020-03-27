<?php
if(isset($_SESSION['SES_ADMIN'])){
# JIKA YANG LOGIN LEVEL ADMIN, menu di bawah yang dijalankan
?>
<ul>
	<li><a href='?page' title='Halaman Utama'>Home</a></li>
	<li><a href='?page=User-Data' title='User'>User</a></li>
    <li><a href='?page=Buka-Validasi' title='Approval'>Approval</a></li>
    <li><a href='?page=Pemesanan-Add' title='Pemesanan'>Order Trip</a></li>
    <li><a href='?page=Update-MR' title='Status'>Status Trip</a></li>
  	<li><a href='?page=Kategori-Data' title='Data Kategori'>Kategori Trip</a></li>
  	<li><a href='?page=Laporan-Menu' title='Menu'>List Trip</a></li>
    <li><a href='?page=Supplier-Data' title='Supplier'>List Vendor </a></li>
	<li><a href='?page=Transaksi-MR' title='Transaksi MR' target='_blank'>Form Trucking</a></li>
    <li><a href='?page=Transaksi-P2H' title='Transaksi Pembelian' target='_blank'>Form P2H</a></li>
	<li><a href='?page=Laporan' title='Laporan'>Report</a></li>
	<li><a href='http://localhost/pirspk/?page=Laporan-Penjualan' title='SPK'>SPK</a></li>
	<li><a href='?page=Logout' title='Logout (Exit)'>Logout</a></li>
	<li><a href="javascript:window.close()">Closed</a></li>
</ul>
<?php
}
elseif(isset($_SESSION['SES_KASIR'])){
# JIKA YANG LOGIN LEVEL KASIR, menu di bawah yang dijalankan
?>
<ul>
	<li><a href='?page' title='Halaman Utama'>Home</a></li>
     <li><a href='?page=Transaksi-P2H' title='Transaksi Pembelian' target='_blank'>Form P2H</a></li>
	<li><a href='?page=Logout' title='Logout (Exit)'>Logout</a></li>
    <li><a href="javascript:window.close()">Closed</a></li>
</ul>

<?php
}

elseif(isset($_SESSION['SES_ADMIN1'])){
# JIKA YANG LOGIN LEVEL Supervisor 1 , menu di bawah yang dijalankan
?>
<ul>
	<li><a href='?page' title='Halaman Utama'>Home</a></li>
	<li><a href='?page=Buka-Validasi' title='User'>Approval</a></li>
	<li><a href='?page=Laporan' title='Laporan'>Laporan</a></li>
<li><a href='http://localhost/pirspk/?page=Laporan-Penjualan' title='SPK'>SPK</a></li>
<li><a href='?page=Transaksi-P2H' title='Transaksi Pembelian' target='_blank'>Form P2H</a></li>
	<li><a href='?page=Logout' title='Logout (Exit)'>Logout</a></li>
    <li><a href="javascript:window.close()">Closed</a></li>
</ul>

<?php
}


elseif(isset($_SESSION['SES_ADMIN2'])){
# JIKA YANG LOGIN LEVEL Supervisor 2 , menu di bawah yang dijalankan
?>
<ul>
	<li><a href='?page' title='Halaman Utama'>Home</a></li>
	<li><a href='?page=Buka-Validasi2' title='User'>Approval</a></li>
	<li><a href='?page=Laporan' title='Laporan'>Laporan</a></li>
	<li><a href='?page=Logout' title='Logout (Exit)'>Logout</a></li>
	<li><a href="javascript:window.close()">Closed</a></li>
</ul>

<?php
}


elseif(isset($_SESSION['SES_ADMIN3'])){
# JIKA YANG LOGIN LEVEL Supervisor 3 , menu di bawah yang dijalankan
?>
<ul>
	<li><a href='?page' title='Halaman Utama'>Home</a></li>
	<li><a href='?page=Buka-Validasi3' title='User'>Approval</a></li>
	<li><a href='?page=Laporan' title='Laporan'>Laporan</a></li>
	<li><a href='?page=Logout' title='Logout (Exit)'>Logout</a></li>
  	<li><a href="javascript:window.close()">Closed</a></li>
</ul>

<?php
}

elseif(isset($_SESSION['SES_Procurement'])){
# JIKA YANG LOGIN LEVEL Procurement , menu di bawah yang dijalankan 
?>
<ul>
	<li><a href='?page' title='Halaman Utama'>Home</a></li>
<li><a href='?page=Supplier-Data' title='Supplier'>Data Vendor </a></li>
    <li><a href='?page=Kategori-Data' title='Data Kategori'>Data Kategori Item</a></li>
    <li><a href='?page=Laporan-Menu' title='Menu'>List Barang/Material</a></li>
    <li><a href='?page=Supplier-Data' title='Supplier'>Data Vendor </a></li>
	<li><a href='?page=Transaksi-MR' title='Transaksi MR' target='_blank'>Input Material Request</a></li>
    <li><a href='?page=Transaksi-Pembelian' title='Transaksi Pembelian' target='_blank'>Input Pembelian</a></li>
    <li><a href='?page=Update-MR' title='Status'>Update Status MR</a></li>
	<li><a href='?page=Laporan' title='Laporan'>Laporan</a></li>
	<li><a href='?page=Logout' title='Logout (Exit)'>Logout</a></li>
    <li><a href="javascript:window.close()">Closed</a></li>
</ul>


<pre>   <?php
}
else {
# JIKA BELUM LOGIN (BELUM ADA SESION LEVEL YG DIBACA)
?></pre>
<ul>
  <li><a href='http://localhost/pirplanner/?page=Login'>Login</p></a>  </li>
</ul>
<p>&nbsp;</p>
<?php
}
?>