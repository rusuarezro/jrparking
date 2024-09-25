import { Ajax, link } from "./tools.js";

// Funcion de Iniciar Sesión
export function iniciarSesion(method){
    let user = document.getElementById("email").value;
    let pass = document.getElementById("password").value;

    let info = {user, pass}
    //console.log (info)
    Ajax({
         url: "../controller/login.php",
         method,
         param: info,
         fSuccess: (resp) => {
            if (resp.code == 200) link("ingreso.html?idtk="+resp.idToken);
                //console.log(resp.data)
            
    }
   })

}