function validate(e) {
    e.preventDefault();
    formulario = document.getElementById('formu');
    nombre = document.getElementById('iname');
    apellido = document.getElementById('iape');
    usuario = document.getElementById('iuser');
    clave = document.getElementById('icontra');
    tipoUsua = document.getElementById('itipousua');

    lVali = true;

    if (nombre.value == "") {
        nombre.style.borderColor = "red";
        lVali = false;
    }
    if (apellido.value == "") {
        apellido.style.borderColor = "red";
        lVali = false;
    }
    if (usuario.value == "") {
        usuario.style.borderColor = "red";
        lVali = false;
    }
    if (clave.value == "") {
        clave.style.borderColor = "red";
        lVali = false;
    }
    if(tipoUsua.value == "") {
        tipoUsua.style.borderColor = "red";
        lVali = false;
    }

    if (lVali == true) {
        formulario.submit();
    }

}



function validateMod(e) {
    e.preventDefault();
    formulario = document.getElementById('modifiUsuario');
    codigo = document.getElementById('icodem');
    nombre = document.getElementById('inamem');
    apellido = document.getElementById('iapem');
    usuario = document.getElementById('iuserm');
    clave = document.getElementById('icontram');
    tipoUsua = document.getElementById('itipousuam');
    
    lVali = true;
    
    if (nombre.value == "") {
        nombre.style.borderColor = "red";
        lVali = false;
    }
    if (apellido.value == "") {
        apellido.style.borderColor = "red";
        lVali = false;
    }
    if (usuario.value == "") {
        usuario.style.borderColor = "red";
        lVali = false;
    }
    if (clave.value == "") {
        clave.style.borderColor = "red";
        lVali = false;
    }
    if(tipoUsua.value == "") {
        tipoUsua.style.borderColor = "red";
        lVali = false;
    }
    
    if (lVali == true) {
        formulario.submit();
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href);
        }
    }
    
}

if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
