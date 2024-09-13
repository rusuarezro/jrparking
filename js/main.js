/* function clicbtn(){
    window.location.assign("ingreso.html");
} */
function btregistro(url){
    location.href=url;
}

    $('#btregistro').on ("click", ()=>{
        btregistro("creacioncuenta.html");
    })