function validateEntrada(e) {
    e.preventDefault();
    formulario = document.getElementById('formuEntrada');
    fecha = document.getElementById('fechaEnt');
    cantidad = document.getElementById('cantidadEnt');
    precio = document.getElementById('precioEnt');
    codigoProvee = document.getElementById('proveedorEnt');
    codigoPro = document.getElementById('prodEnt');
    
    lVali = true;
    
    if (fecha.value == "") {
        fecha.style.borderColor = "red";
        lVali = false;
    }
    if (cantidad.value == "") {
        cantidad.style.borderColor = "red";
        lVali = false;
    }
    if (precio.value == "") {
        precio.style.borderColor = "red";
        lVali = false;
    }
    if (codigoProvee.value == "") {
        codigoProvee.style.borderColor = "red";
        lVali = false;
    }
    if (codigoPro.value == "") {
        codigoPro.style.borderColor = "red";
        lVali = false;
    }
    
    if (lVali == true) {
        formulario.submit();

    }
    
}

function validateModEntrada(e) {
    e.preventDefault();
    formulario = document.getElementById('modifiEntrada');
    codigo = document.getElementById('idEntradam');
    fecha = document.getElementById('fechaEntradam');
    cantidad = document.getElementById('cantidadEntm');
    precio = document.getElementById('precioEntm');
    idProveedor = document.getElementById('proveedorEntm');
    idProducto = document.getElementById('prodEntm');
    
    lVali = true;
    
    if (codigo.value == "") {
        codigo.style.borderColor = "red";
        lVali = false;
    }
    if (fecha.value == "") {
        fecha.style.borderColor = "red";
        lVali = false;
    }
    if (cantidad.value == "") {
        cantidad.style.borderColor = "red";
        lVali = false;
    }
    if (precio.value == "") {
        precio.style.borderColor = "red";
        lVali = false;
    }
    if (idProveedor.value == "") {
        idProveedor.style.borderColor = "red";
        lVali = false;
    }
    if (idProducto.value == "") {
        idProducto.style.borderColor = "red";
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