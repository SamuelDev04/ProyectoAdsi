function eraseEntrada(obj) {
    let codigoEntrada = obj.children[0].innerHTML;

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
            window.location = "index.php?ruta=eraseEntrada&codigo=" + codigoEntrada;

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

function getDataEntrada(obj) {
    let idDetEntrada = obj.children[0].innerHTML;
    let fechaEntrada = obj.children[1].innerHTML;
    let cantProEntrada = obj.children[2].innerHTML;
    let precioEntrada = obj.children[3].innerHTML;
    let idProveedor = obj.children[4].innerHTML;
    let idProducto = obj.children[5].innerHTML;


    document.getElementById('idEntradam').value = idDetEntrada;
    document.getElementById('fechaEntradam').value = fechaEntrada;
    document.getElementById('cantProEntradam').value = cantProEntrada;
    document.getElementById('precioEntm').value = precioEntrada;
    document.getElementById('idProveedorm').value = idProveedor;
    document.getElementById('idProductom').value = idProducto;

}

function getGenerarReporteEntrada(e) {
    e.preventDefault();
    window.open('view/module/allEntrada.php', '_blank');
}