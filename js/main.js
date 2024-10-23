import {link, Ajax, salida} from "./tools.js"
import { iniciarSesion, validarToken } from "./login.js"
import { registrarUsuario } from "./usuario.js"



document.addEventListener("DOMContentLoaded", (e)=>{

    let path = location.pathname
    if (path.substring(path.lastIndexOf("/") + 1).includes("index") || path.substring(path.lastIndexOf("/") + 1).length == "0") validarToken()

})
// Funcionalidad de botones (carro, moto y bicicleta) 

document.addEventListener("click", (e)=>{
    //console.log(e.target.matches(".btn-ingresar"))
    if(e.target.matches(".btn-ingresar")) link("login.html")
    if(e.target.matches("#btn-auto")) link("datos_auto.html")
    if(e.target.matches("#btn-bici")) link("datos-bici.html")
    if(e.target.matches("#btn-moto")) link("datos-moto.html")
    if(e.target.matches("#nueva-cuenta")) link("creaciondecuenta.html")
    if(e.target.matches("#btncerrarsesion")) salida()
    
})

// El evento submit de los formularios

document.addEventListener("submit", (e)=>{
    e.preventDefault()
    if(e.target.matches("#form_login")) iniciarSesion("POST")
    if(e.target.matches("#form-newaccount")) registrarUsuario("POST")
})


