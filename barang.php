<html>
<head>
<script type="text/javascript" src="jquery-1.4.js"></script>
<script type='text/javascript' src='jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="formbarang.css" />
<link rel="stylesheet" href="main.css" type="text/css" />
<script type="text/javascript">
$().ready(function() {	
	$("#barang").autocomplete("proses_barang.php", {
		width: 400
  });

	$("#barang").result(function(event, data, formatted) {
				$('#pilihan').html("<p>Anda memilih Barang: " + formatted + "</p>"); 
	});
	
});
</script>
</head>
<body>
<center>
<div id="formbarang">
<p>Form Pencarian Auto Complete</p>
  <div class="demo" style="width: 400px;">
  <div><p>Nama Barang : <input type="text" id="barang"></p></div>
  </div> 
  <div id="pilihan"></div>
  </div>
  </center>
</body>
</html>
