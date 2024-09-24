import {link} from "./tools.js"

document.addEventListener("DOMContentLoaded", (e)=>{

})

document.addEventListener("click", (e)=>{
    //console.log(e.target.matches(".btn-ingresar"))
    if(e.target.matches(".btn-ingresar")) link("login.html")
})

document.addEventListener("click", (e)=>{
    //console.log(e.target.matches("#btn-auto"))
    if(e.target.matches("#btn-auto")) link("ingresardatos.html")
})

document.addEventListener("click", (e)=>{
    //console.log(e.target.matches("#btn-bici"))
    if(e.target.matches("#btn-bici")) link("ingredatosbici.html")
})
