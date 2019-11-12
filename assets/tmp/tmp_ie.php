<?php
/*	INSERTAR INSTITUCIONES EDUCATIVAS	*/
require_once 'tmp_bd.php';

// DB Con

$bd_con = new DB();

$bd_con->connect();





//Open the file.
$fileHandle = fopen("Sedes.csv", "r");
 
//Loop through the CSV rows.
while (($row = fgetcsv($fileHandle, 0, ";")) !== FALSE) {
    //Dump out the row for the sake of clarity.

    if(is_numeric($row[0])){


    	$sql_IE = "SELECT `id_d_i`, `nit` FROM `o_datosinstitucion` WHERE nit LIKE '".$row[4]."'";
    	$query_IE = $bd_con->insert($sql_IE);

    	var_dump($query_IE);


    	$sql = "INSERT INTO `o_institucion`(`nombre`, `codigo_institucion`, `fk_id_datosInst`, `fk_id_ver`, `fk_id_mpio`, `fk_id_sector`, `fk_id_tipo`, `fk_id_jor`) VALUES (
    		'".$row[3]." - Sede: ".$row[5]."',
    		'".$row[4]."',
    		'".$query_IE[0]."',
    		'',
    		'',
    		'',
    		'".$row[2]."',
    		'".$row[8]."')";

		$query = $bd_con->insert($sql);

			var_dump($row);	

			break;

			"INSERT INTO `o_institucion`(`id_institucion`, `nombre`, `codigo_institucion`, `fk_id_datosInst`, `fk_id_ver`, `fk_id_mpio`, `fk_id_sector`, `fk_id_tipo`, `fk_id_jor`) VALUES ()";

			"array(9) { [0]=> string(5) "76036" [1]=> string(9) "ANDALUC�A" [2]=> string(12) "276036000037" [3]=> string(23) "IE AGRICOLA CAMPOALEGRE" [4]=> string(12) "276036000151" [5]=> string(18) "MARCO FIDEL SUAREZ" [6]=> string(5) "RURAL" [7]=> string(16) "CORREG ZABALETAS" [8]=> string(0) "" }";
    }
    
	
}

?>