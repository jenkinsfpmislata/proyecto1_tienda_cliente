<?php

$db = mysql_connect("localhost", "root", "") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$idCategorias = "";
$precio_min = "";
$precio_max = "";
$j = 0;
foreach ($_POST as $nombre_campo => $valor) {
    if ($nombre_campo == "id") {
        if ($j == 0) {
            $idCategorias = $idCategorias . $valor;
            $j++;
        } else {
            $idCategorias = $idCategorias . ',' . $valor;
        }
    }elseif($nombre_campo == "precio_min"){
        $precio_min = $valor;
    }elseif($nombre_campo == "precio_max"){
        $precio_max = $valor;
    }
}

$SQL = "SELECT * from articulos where idCategorias IN ($idCategorias) AND precioArticulo BETWEEN $precio_min AND $precio_max ;";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());



$i = 0;
while ($fila = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $datos[$i] = array('idArticulo' => $fila["idArticulo"], 'nombreArticulo' => $fila["nombreArticulo"], 'precioArticulo' => $fila["precioArticulo"], 'idCategorias' => $fila["idCategorias"]);
    $i++;
}


header('Content-type: application/json');
echo json_encode($datos);
?>
