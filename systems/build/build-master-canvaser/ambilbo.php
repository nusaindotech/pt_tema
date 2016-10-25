<?php
include "../../../auth/autho.php";

$ho = $_GET['ho'];
$barang = mysql_query("SELECT * FROM tb_bo WHERE id_ho='$ho'");
echo "<option>-- Pilih BO --</option>";
while($k = mysql_fetch_array($barang)){
    echo "<option value=\"".$k['id_bo']."\">".$k['nama_bo']."</option>\n";
}
?>
