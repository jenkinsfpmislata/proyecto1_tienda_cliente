<?php
	$db = mysql_connect("localhost","root","") or die("Connection Error: " . mysql_error());
    mysql_select_db("tienda") or die("Error conecting to db.");
	
	$lista = "";
	$i=0;
	foreach($_POST as $nombre_campo => $valor){ 
	   if ($i==0)
	   {
		$lista=$lista.$valor;
		$i++;   
		}
		else
		{
	   $lista=$lista.','.$valor; 
		}
	}
    	
		$SQL = "SELECT * from articulos where id IN ($lista)";
		$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
	
	
	
		$i=0;
    	while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
		{
			$datos[$i]=array('cod'=>$fila["cod"],'nombre'=>$fila["nombre"],'precio'=>$fila["precio"],'id'=>$fila["id"]);
			$i++;
		}
	
	
	header('Content-type: application/json');
	echo json_encode($datos);
	
?>
