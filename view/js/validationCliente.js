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
        ohSnap('Ingrese su nombre...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (telefono.value == "") {
        telefono.style.borderColor = "red";
        ohSnap('Ingrese su telefono...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (celular.value == "") {
        celular.style.borderColor = "red";
        ohSnap('Ingrese su celular...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (direccion.value == "") {
        direccion.style.borderColor = "red";
        ohSnap('Ingrese su direccion...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }

    if (lVali == true) {
        formulario.submit();
    }

}
