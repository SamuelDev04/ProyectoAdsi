function validateProducto(e) {
    e.preventDefault();
    formulario = document.getElementById('formularioProducto');
    descripcion = document.getElementById('descripPro');
    cantidadProducto = document.getElementById('cantPro');
    costoProducto = document.getElementById('costPro');
    tipoProducto = document.getElementById('tipPro');

    lVali = true;

    if (descripcion.value == "") {
        descripcion.style.borderColor = "red";
        ohSnap('Ingrese la descripcion del producto...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (cantidadProducto.value == "") {
        cantidadProducto.style.borderColor = "red";
        ohSnap('Ingrese la cantidad del producto...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (costoProducto.value == "") {
        costoProducto.style.borderColor = "red";
        ohSnap('Ingrese el costo del producto...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (tipoProducto.value == "") {
        tipoProducto.style.borderColor = "red";
        ohSnap('Ingrese el tipo del producto...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }

    if (lVali == true) {
        formulario.submit();
    }

}

function validateProductoMod(e) {
    e.preventDefault();
    formulario = document.getElementById('formularioProductom');
    descripcion = document.getElementById('descripProm');
    cantidadProducto = document.getElementById('cantProm');
    costoProducto = document.getElementById('costProm');
    tipoProducto = document.getElementById('tipProm')
    
    lVali = true;
    
    if (descripcion.value == "") {
        descripcion.style.borderColor = "red";
        ohSnap('Ingrese la descripcion...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (cantidadProducto.value == "") {
        cantidadProducto.style.borderColor = "red";
        ohSnap('Ingrese la cantidad del producto...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (costoProducto.value == "") {
        costoProducto.style.borderColor = "red";
        ohSnap('Ingrese el costo del producto...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (tipoProducto.value == "") {
        tipoProducto.style.borderColor = "red";
        ohSnap('Ingrese el tipo de producto...', { color: 'red' }); // alert will have class 'alert-color'
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
