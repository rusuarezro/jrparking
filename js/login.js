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
              //console.log(resp.data)
            if (resp.code == 200) {
                localStorage.clear()
                localStorage.setItem("idtk", resp.idtoken)
                localStorage.setItem("idUser", resp.idUser)
                localStorage.setItem("Usuario", resp.Usuario)
                    link("ingreso.html?idtk="+resp.idtoken);
            }else{
                alert(resp.msg)
            }
             
            
    }
   })

}
export function validarToken() {
    if (localStorage.getItem("idtk")) link("ingreso.html?idtk=" + localStorage.getItem("idtk"))
}

  
  
