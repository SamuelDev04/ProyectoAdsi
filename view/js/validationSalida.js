function validateSalida(e) {
    e.preventDefault();
    formulario = document.getElementById('formularioSalida');
    fechaSal = document.getElementById('fechaSal');
    cantSal = document.getElementById('cantSal');
    valorTotal = document.getElementById('valTot');
    clienteSal = document.getElementById('clienSal');
    productoSal = document.getElementById('prodSal');

    lVali = true;

    if (fechaSal.value == "") {
        fechaSal.style.borderColor = "red";
        ohSnap('Ingrese la fecha de salida...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (cantSal.value == "") {
        cantSal.style.borderColor = "red";
        ohSnap('Ingrese la cantidad del producto...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (valorTotal.value == "") {
        valorTotal.style.borderColor = "red";
        ohSnap('Ingrese el valor total del producto...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (clienteSal.value == "") {
        clienteSal.style.borderColor = "red";
        ohSnap('Ingrese el cliente...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (productoSal.value == "") {
        productoSal.style.borderColor = "red";
        ohSnap('Ingrese el producto...', { color: 'red' }); // alert will have class 'alert-color'
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
