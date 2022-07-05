function validateModEntrada(e) {
    e.preventDefault();
    formulario = document.getElementById('modifiEntrada');
    codigo = document.getElementById('idEntradam');
    fecha = document.getElementById('fechaEntradam');
    cantidad = document.getElementById('cantProEntradam');
    precio = document.getElementById('precioEntm');
    idProveedor = document.getElementById('idProveedorm');
    idProducto = document.getElementById('idProductom');
    
    lVali = true;
    
    if (codigo.value == "") {
        codigo.style.borderColor = "red";
        ohSnap('Ingrese su codigo...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (fecha.value == "") {
        fecha.style.borderColor = "red";
        ohSnap('Ingrese su fecha...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (cantidad.value == "") {
        cantidad.style.borderColor = "red";
        ohSnap('Ingrese su cantidad...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (precio.value == "") {
        precio.style.borderColor = "red";
        ohSnap('Ingrese su precio...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (idProveedor.value == "") {
        idProveedor.style.borderColor = "red";
        ohSnap('Ingrese su idProveedor...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    if (idProducto.value == "") {
        idProducto.style.borderColor = "red";
        ohSnap('Ingrese su idProducto...', { color: 'red' }); // alert will have class 'alert-color'
        lVali = false;
    }
    
    if (lVali == true) {
        formulario.submit();
        
    }
    
}
