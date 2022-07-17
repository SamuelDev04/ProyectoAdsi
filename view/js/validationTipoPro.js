function validateTipoPro(e) {
    e.preventDefault();
    formulario = document.getElementById('formuTipoPro');
    descripcion = document.getElementById('idescrip');

    lVali = true;

    if (descripcion.value == "") {
        descripcion.style.borderColor = "red";
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