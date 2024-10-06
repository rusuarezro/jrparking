import { Ajax } from "./tools.js";

export function registrarUsuario (method) {

 alert("Ok vamos a enviar los datos del formulario a traves del método"+method);
let $form = document.getElementById("form-newaccount")
let params = {
    nombres: $form.nombres.value,
    idNumber: $form.idNumber.value,
    apellidos: $form.apellidos.value,
    email: $form.email.value,
    profile: $form.profile.value,
    celular: $form.celular.value,
    password: $form.password.value,

}
console.log(params);
Ajax({
    url: "../controller/usuario.php",
    method, 
    params, 
    fSuccess: (resp)=>{
         console.log(resp)
    }
})

}
