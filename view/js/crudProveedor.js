function eraseProveedor(obj) {
    let codigoProveedor = obj.children[0].innerHTML;

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Estas seguro?',
        text: "No podras revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "index.php?ruta=eraseProveedor&codigo=" + codigoProveedor;

            /*swalWithBootstrapButtons.fire(
                'Eliminado!',
                'El registro ha sido eliminado.',
                'success'
            )*/
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'El registro esta a salvo :)',
                'error'
            )
        }
    })
}

function getDataProveedor(obj) {
    let codigoProveedor = obj.children[0].innerHTML;
    let nombre = obj.children[1].innerHTML;
    let numeroTelefono = obj.children[2].innerHTML;
    let direccion = obj.children[3].innerHTML;


    document.getElementById('icodeProveedorm').value = codigoProveedor;
    document.getElementById('nombreProm').value = nombre;
    document.getElementById('numTelm').value = numeroTelefono;
    document.getElementById('dirProm').value = direccion;
}

function getGenerarReporteProveedor(e) {
    e.preventDefault();
    window.open('view/module/allProveedor.php', '_blank');
}