<?php

$db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$SQL = "SELECT * from articulos";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());
$i = 0;
while ($fila = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $datos[$i] = array('idArticulo' => $fila["idArticulo"], 'nombreArticulo' => $fila["nombreArticulo"], 'precioArticulo' => $fila["precioArticulo"],'descripcionArticulo' => $fila["descripcionArticulo"], 'idCategorias' => $fila["idCategorias"]);
    $i++;
}

header('Content-type: application/json');
echo json_encode($datos);
?>
