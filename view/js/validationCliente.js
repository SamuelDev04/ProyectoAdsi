function validateCliente(e) {
    e.preventDefault();
    formulario = document.getElementById('formuCliente');
    nombre = document.getElementById('inamec');
    telefono = document.getElementById('tele');
    celular = document.getElementById('cel');
    direccion = document.getElementById('direc');

    lVali = true;

    if (nombre.value == "") {
        nombre.style.borderColor = "red";
        lVali = false;
    }
    if (telefono.value == "") {
        telefono.style.borderColor = "red";
        lVali = false;
    }
    if (celular.value == "") {
        celular.style.borderColor = "red";
        lVali = false;
    }
    if (direccion.value == "") {
        direccion.style.borderColor = "red";
        lVali = false;
    }

    if (lVali == true) {
        formulario.submit();
    }

}
function validateModCliente(e) {
    e.preventDefault();
    formulario = document.getElementById('modifiElCliente');
    codigo = document.getElementById('icodemc');
    nombre = document.getElementById('sunombre');
    telefono = document.getElementById('sutelefono');
    celular = document.getElementById('sucelular');
    direccion = document.getElementById('sudireccion');
    
    lVali = true;
    
    if (nombre.value == "") {
        nombre.style.borderColor = "red";
        lVali = false;
    }
    if (telefono.value == "") {
        telefono.style.borderColor = "red";
        lVali = false;
    }
    if (celular.value == "") {
        celular.style.borderColor = "red";
        lVali = false;
    }
    if (direccion.value == "") {
        direccion.style.borderColor = "red";
        lVali = false;
    }
    
    if (lVali == true) {
        formulario.submit();
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href);
        }
    }
    
}
