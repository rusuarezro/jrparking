import {link, Ajax} from "./tools.js"
import { iniciarSesion } from "./login.js"

document.addEventListener("DOMContentLoaded", (e)=>{

})
// Funcionalidad de botones (carro, moto y bicicleta) 

document.addEventListener("click", (e)=>{
    //console.log(e.target.matches(".btn-ingresar"))
    if(e.target.matches(".btn-ingresar")) link("login.html")
    if(e.target.matches("#btn-auto")) link("ingresardatos.html")
    if(e.target.matches("#btn-bici")) link("ingredatosbici.html")
})

// El evento submit de los formularios

document.addEventListener("submit", (e)=>{
    e.preventDefault()
    if(e.target.matches("#form_login")) iniciarSesion("POST");
})
