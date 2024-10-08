<?php


require_once("config.php");

//header('Content-Type: application/json');
if($_SERVER["REQUEST_METHOD"]=="PATCH"){
    try {
        $post = json_decode(file_get_contents('php://input'),true);
        
        if($post["idNumber"]!="" && $post["NOMBRES"]!="" && $post["APELLIDOS"]!="" && $post["CELULAR"]!="" 
        && $post["EMAIL"]!="" && $post["pass"]!="" && $post["ESTADO_FK"]!="" && $post["profile"]!=""){
            //echo $_post["user"]; 
            $bd = new ConfigDb();
            $conn = $bd->conexion();
/*  nombres: $form.nombres.value,
    idNumber: $form.idNumber.value,
    apellidos: $form.apellidos.value,
    email: $form.email.value,
    profile: $form.profile.value,
    celular: $form.celular.value,
    password: $form.password.value,
             */
            $sql = "INSERT INTO tbusuarios(ID_USUARIO, IDENTIFICACION, NOMBRES, APELLIDOS, CELULAR, EMAIL, CONTRASENA, ESTADO_FK, PERFIL_FK) 
            VALUES (null, :idNumber, :NOMBRES, :APELLIDOS, :CELULAR, :EMAIL, :pass, :ESTADO_FK, :PERFIL_FK)";
            $stmt = $conn ->prepare($sql);
            $stmt->bindParam(":idNumber",$post["idNumber"],PDO::PARAM_STR);
            $stmt->bindParam(":NOMBRES",$post["NOMBRES"],PDO::PARAM_STR);
            $stmt->bindParam(":APELLIDOS",$post["APELLIDOS"],PDO::PARAM_STR);
            $stmt->bindParam(":CELULAR",$post["CELULAR"],PDO::PARAM_STR);
            $stmt->bindParam(":EMAIL",$post["EMAIL"],PDO::PARAM_STR);
            $stmt->bindParam(":pass",$post["pass"],PDO::PARAM_STR);
            $stmt->bindParam(":ESTADO_FK",$post[""],PDO::PARAM_STR);
            $stmt->bindParam(":profile",$post["profile"],PDO::PARAM_STR);
            if($stmt->execute()){
                    //var_dump($result);
                    header("HTTP/1.1 200 OK");
                    echo json_encode(['code'=>200,'msg' => "OK"]);
            }else{
                header("HTTP/1.1 203 OK");
                echo json_encode(['code'=>203,'msg' => "Las credenciales no son validas"]);
            }
            $stmt = null;
            $conn = null;
        }
        //exit();
    } catch (Exception $ex) {
        header("HTTP/1.1 500");
        echo json_encode(['code'=>500,'msg' => 'Error interno al procesar su petici&oacute;n', "ERROR"=>$ex->getMessage()]);
        //echo json_encode(['code'=>500,'msg' => 'Error interno al procesar su peticion'.$ex->getMessage()]);
    }

}else {
    header("HTTP/1.1 400");
    echo json_encode(['code'=>400,'msg' => 'Error, La peticion no se pudo procesar']);
}

?>
