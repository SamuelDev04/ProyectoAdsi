function validateTipoPro(e) {
    e.preventDefault();
    formulario = document.getElementById('formuTipoPro');
    descripcion = document.getElementById('idescrip');

    lVali = true;

    if (descripcion.value == "") {
        descripcion.style.borderColor = "red";
        ohSnap('Ingrese la descripcion...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }

    if (lVali == true) {
        formulario.submit();
    }

}


function validateModTipoPro(e) {
    e.preventDefault();
    formulario = document.getElementById('modifiTipoPro');
    codigo = document.getElementById('icodeTipoProm');
    descripcion = document.getElementById('idescripm');
    
    lVali = true;
    
    if (descripcion.value == "") {
        descripcion.style.borderColor = "red";
        ohSnap('Ingrese la descripcion...', { color: 'red' }); // alert will have class 'alert-color'
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