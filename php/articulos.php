<?php

$db = mysql_connect("localhost", "root", "") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$lista = "";
$j = 0;
foreach ($_POST as $nombre_campo => $valor) {
    if ($j == 0) {
        $lista = $lista . $valor;
        $j++;
    } else {
        $lista = $lista . ',' . $valor;
    }
}

$SQL = "SELECT * from articulos where idCategorias IN ($lista)";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());



$i = 0;
while ($fila = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $datos[$i] = array('idArticulo' => $fila["idArticulo"], 'nombreArticulo' => $fila["nombreArticulo"], 'precioArticulo' => $fila["precioArticulo"], 'idCategorias' => $fila["idCategorias"]);
    $i++;
}


header('Content-type: application/json');
echo json_encode($datos);
?>
