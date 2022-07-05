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

function validateSalidaMod(e) {
    e.preventDefault();
    formulario = document.getElementById('formularioSalidam');
    fechaSal = document.getElementById('fechaSalm');
    cantSal = document.getElementById('cantSalm');
    valorTotal = document.getElementById('valTotm');
    clienteSal = document.getElementById('clienSalm');
    productoSal = document.getElementById('prodSalm');
    
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
        ohSnap('Ingrese el valor total...', { color: 'red' }); // alert will have class 'alert-color'
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
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href);
        }
    }
    
}

if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
