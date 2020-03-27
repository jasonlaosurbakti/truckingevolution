<?php
if(isset($_SESSION['SES_ADMIN'])) {
	echo "<style='margin:-5px 0px 5px 0px; padding:0px;'>Selamat Anda Menggunakan Aplikasi Trucking Management Report PT Puninar Infinite Raya";
	echo "<h3 style='margin:-5px 0px 5px 0px; padding:0px;'>The Best Support For Your Productivity!</h3>";
	echo "<b> Anda login sebagai Admin";
	exit;
}
else if(isset($_SESSION['SES_KASIR'])) {
	echo "<style='margin:-5px 0px 5px 0px; padding:0px;'>Selamat Anda Menggunakan Aplikasi Trucking Management Report PT Puninar Infinite Raya";
	echo "<h4 style='margin:-5px 0px 5px 0px; padding:0px;'>The Best Support For Your Productivity!</h4>";
	echo "<b> Anda login sebagai User";
	include "login_info.php";
	exit;
}
else if(isset($_SESSION['SES_ADMIN1'])) {
	echo "<style='margin:-5px 0px 5px 0px; padding:0px;'>Selamat Anda Menggunakan Aplikasi Trucking Management Report PT Puninar Infinite Raya";
	echo "<h4 style='margin:-5px 0px 5px 0px; padding:0px;'>The Best Support For Your Productivity!</h4>";
	echo "<b> Anda login sebagai APROVED BUDGET ";
	include "login_info.php";
	exit;
}
else if(isset($_SESSION['SES_ADMIN2'])) {
	echo "<style='margin:-5px 0px 5px 0px; padding:0px;'>Selamat Anda Menggunakan Aplikasi Trucking Management Report PT Puninar Infinite Raya";
	echo "<h4 style='margin:-5px 0px 5px 0px; padding:0px;'>The Best Support For Your Productivity!</h4>";
	echo "<b> Anda login sebagai Approved GM /BOD ";
	include "login_info.php";
	exit;
}
else if(isset($_SESSION['SES_ADMIN3'])) {
	echo "<style='margin:-5px 0px 5px 0px; padding:0px;'>Selamat Anda Menggunakan Aplikasi Trucking Management Report PT Puninar Infinite Raya";
	echo "<h4 style='margin:-5px 0px 5px 0px; padding:0px;'>The Best Support For Your Productivity!</h4>";
	echo "<b> Anda login sebagai Procurement ";
	include "login_info.php";
	exit;
}
else {
	echo "<h2 style='margin:-5px 0px 5px 0px; padding:0px;'>Selamat datang ........!</h2></p>";
	echo "<b>Silahkan Link<a href='http://192.168.200.21/pirp2h/?page=Login'> Login  </a> untuk mengakses Aplikasi Trucking Management Report</p> ";
}
?>