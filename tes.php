
  <?php 
  $connection = mysql_connect ("localhost","root","")or die(mysql_error());
  mysql_select_db("sigap",$connection) or die(mysql_error());
  $sql = mysql_query ('select * FROM menu ORDER BY nm_menu ASC;');
  ?> 
  <div id="container">
<form action=""method="">
  <select name="barang">
  <option>-- Pilih barang -- </option>
  <?php if(mysql_num_rows ($sql) > 0) {?>
  <?php while ($row = mysql_fetch_array ($sql)){?>
  <option> <?php echo $row ['nm_menu']?> </option>
  <?php }?>
  <?php }?>
  </select></form></div>
  