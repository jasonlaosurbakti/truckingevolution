<?php
session_start();
ob_start();
include_once "library/inc.connection.php";
include_once "library/inc.library.php";

date_default_timezone_set("Asia/Jakarta");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Puninar Infinite Raya - Trucking Management Reporting</title>
<link href="styles/style.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="plugins/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css" media="screen" />
<script type="text/javascript" src="plugins/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js"></script> 
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<link rel="stylesheet" type="text/css" href="styles/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="styles/css/resources/dataTables.bootstrap.css">
<script type="text/javascript" src="styles/js/jquery.js"></script>
<script type="text/javascript" src="styles/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#example').DataTable();
} );
</script>

<script src="autocomplete/jquery.autocomplete.min.js"></script>
<!--<script type="text/javascript" src="auto/jquery.js"></script>
<script src="autocomplete/jquery-3.2.1.min.js"></script>
<script type='text/javascript' src='auto/jquery.autocomplete.js'></script>-->
<link rel="stylesheet" type="text/css" href="autocomplete/style.css" />
        <script type="text/javascript">
            $(document).ready(function() {

                // Selector input yang akan menampilkan autocomplete.
                $( "#buah" ).autocomplete({
                    serviceUrl: "autocomplete/source.php",   // Kode php untuk prosesing data.
                    dataType: "JSON",           // Tipe data JSON.
                    onSelect: function (suggestion) {
                        $( "#buah" ).val("" + suggestion.buah);
                    }
                });
            })
        </script>
<!--<script type="text/javascript">
$().ready(function() {
	$("#course").autocomplete("auto/cari.php", {
		width: 300,
		matchContains: true,
		mustMatch: true,
		minChars: 2,
		//multiple: true,
		highlight: false,
		//multipleSeparator: ",",
		//selectFirst: false
	});
});
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>-->

</head>
<div id="wrap">
<body>
<table width="100%" class="table-main">
  <tr>
    <td height="103" colspan="2" align="center solid #DDDDDD"><a href="?page">
    <div id="header"></div>  
    </a><a href="?page">
   <td width="9%">   <?php 
//kombinasi format tanggal dan jam
echo date('l, d-m-Y  h:i:s a');
?>   </td><td width="7%"></td>
  </a>  </tr>
  <tr valign="top">
    <td width="15%"  style="border-right:5px solid #DDDDDD;"><div style="margin:5px; padding:5px;"><?php include "menu.php"; ?></div></td>
    <td width="69%" height="550"><div style="margin:2px; padding:2px;">
	
        <p>
          <?php include "buka_file.php";?>
        </p>
    </div></td>
  </tr>
</table>
</body>
</div>
</html>
