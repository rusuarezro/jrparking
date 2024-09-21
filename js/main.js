/* function clicbtn(){
    window.location.assign("ingreso.html");
} */

import {link} from "./tools.js"

document.addEventListener("DOMContentLoaded", (e)=>{

})

document.addEventListener("click", (e)=>{
    //console.log(e.target.matches(".btn-ingresar"))
    if(e.target.matches(".btn-ingresar")) link("login.html")
})

/*
function btregistro(url){
    location.href=url;
}

    $('#btregistro').on ("click", ()=>{
        btregistro("creacioncuenta.html");
    })

    $("#form_login").on("submit", ()=>{
        let nom_usu=$("email").val();
        let pass_usu=$("#password").val();

        if(!nom_usu==="" && !pass_usu===""){
            alert("ok ---- inicia Ajax")
        }else{
            alert("Ingrese la información requerida")
            $("#email").focus();
        }
    })
*/
