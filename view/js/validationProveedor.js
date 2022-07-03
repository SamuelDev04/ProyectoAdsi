function validateProveedor(e) {
    e.preventDefault();
    formulario = document.getElementById('formularioProveedor');
    nombre = document.getElementById('nombrePro');
    numeroTelefono = document.getElementById('numTel');
    direccion = document.getElementById('dirPro');

    lVali = true;

    if (nombre.value == "") {
        nombre.style.borderColor = "red";
        ohSnap('Ingrese el nombre del proveedor...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (numeroTelefono.value == "") {
        numeroTelefono.style.borderColor = "red";
        ohSnap('Ingrese el numero de telefono...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (direccion.value == "") {
        direccion.style.borderColor = "red";
        ohSnap('Ingrese la direccion...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }

    if (lVali == true) {
        formulario.submit();
    }

}

function validateProveedorMod(e) {
    e.preventDefault();
    formulario = document.getElementById('formularioProveedorm');
    nombre = document.getElementById('nombreProm');
    numeroTelefono = document.getElementById('numTelm');
    direccion = document.getElementById('dirProm');
    
    lVali = true;
    
    if (nombre.value == "") {
        nombre.style.borderColor = "red";
        ohSnap('Ingrese el nombre...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (numeroTelefono.value == "") {
        numeroTelefono.style.borderColor = "red";
        ohSnap('Ingrese el numero de telefono...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (direccion.value == "") {
        direccion.style.borderColor = "red";
        ohSnap('Ingrese la direccion...', { color: 'red' }); // alert will have class 'alert-color'
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
