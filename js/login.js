$(document).ready(function () {
    
    function btregistro(url){
        location.href=url;
    }
    $('#btregistro').on ("click", ()=>{
        btregistro("creacioncuenta.html");
    })
});