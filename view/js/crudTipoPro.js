function eraseTipoProducto(obj) {
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
            window.location = "index.php?ruta=eraseTipoProducto&codigo=" + codigoProducto;

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

function getDataTipoProducto(obj) {
    let codigoTipoProducto = obj.children[0].innerHTML;
    let descripcionTipoProducto = obj.children[1].innerHTML;

    document.getElementById('icodeTipoProm').value = codigoTipoProducto;
    document.getElementById('idescripm').value = descripcionTipoProducto;

}

function getGenerarReporteTipoPro(e) {
    e.preventDefault();
    window.open('view/module/allTipoProducto.php', '_blank');
}