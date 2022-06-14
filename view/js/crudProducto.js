function eraseProducto(obj) {
    let codigoProducto = obj.children[0].innerHTML;

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
            window.location = "index.php?ruta=eraseProducto&codigo=" + codigoProducto;

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

function getDataProducto(obj) {
    let codigoProducto = obj.children[0].innerHTML;
    let descripcionProducto = obj.children[1].innerHTML;
    let cantidadProducto = obj.children[2].innerHTML;
    let costoProducto = obj.children[3].innerHTML;
    let codigoTipoPro = obj.children[4].innerHTML;


    document.getElementById('icodeProducm').value = codigoProducto;
    document.getElementById('descripProm').value = descripcionProducto;
    document.getElementById('cantProm').value = cantidadProducto;
    document.getElementById('costProm').value = costoProducto;
    document.getElementById('tipProm').value = codigoTipoPro;

}

function getGenerarReporteAprendiz(e) {
    e.preventDefault();
    window.open('view/module/allProducto.php', '_blank');
}