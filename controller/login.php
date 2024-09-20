<?php
echo "estas en control del Login <br/>"

require_once ("/controller/login.php");

// require_once("ConfigDb.class.php");
// $bd = new Config();
// $conn = $bd->conexion();
$sql = "INSERT INTO `tbestado`(`ID_ESTADO`, `DESCRIPCION_EST`) VALUES (null, '3','')"
$stmt = $conn -> prepare ($sql);
if ($stmt -> execute()){
     echo "SQL realizada correctamente";
} else {
    echo "SQL no aplicada";
}
?>