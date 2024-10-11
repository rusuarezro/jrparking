<?php


require_once("config.php");

//header('Content-Type: application/json');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    try {
        $post = json_decode(file_get_contents('php://input'),true);
        
        if($post["idNumber"]!="" && $post["nombres"]!="" && $post["apellidos"]!="" && $post["celular"]!="" && $post["email"]!="" && $post["password"]!="" && $post["profile"]!=""){
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
            VALUES (null, :idNumber, :NOMBRES, :APELLIDOS, :CELULAR, :EMAIL, :pass, '1', :PERFIL_FK)";
            $stmt = $conn ->prepare($sql);
            $stmt->bindParam(":idNumber",$post["idNumber"],PDO::PARAM_STR);
            $stmt->bindParam(":NOMBRES",$post["nombres"],PDO::PARAM_STR);
            $stmt->bindParam(":APELLIDOS",$post["apellidos"],PDO::PARAM_STR);
            $stmt->bindParam(":CELULAR",$post["celular"],PDO::PARAM_STR);
            $stmt->bindParam(":EMAIL",$post["email"],PDO::PARAM_STR);
            $stmt->bindParam(":pass",$post["password"],PDO::PARAM_STR);
            $stmt->bindParam(":PERFIL_FK",$post["profile"],PDO::PARAM_INT);
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
