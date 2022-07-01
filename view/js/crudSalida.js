function eraseSalida(obj) {
    let codigoSalida = obj.children[0].innerHTML;

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
            window.location = "index.php?ruta=eraseSalida&codigo=" + codigoSalida;

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

function getDataSalida(obj) {
    let codigoSalida = obj.children[0].innerHTML;
    let fechaSalida = obj.children[1].innerHTML;
    let cantidadSalida = obj.children[2].innerHTML;
    let valorTotalSal = obj.children[3].innerHTML;
    let codigoCliente = obj.children[4].innerHTML;
    let codigoProducto = obj.children[5].innerHTML;


    document.getElementById('icodeSalidam').value = codigoSalida;
    document.getElementById('fechaSalm').value = fechaSalida;
    document.getElementById('cantSalm').value = cantidadSalida;
    document.getElementById('valTotm').value = valorTotalSal;
    document.getElementById('clienSalm').value = codigoCliente;
    document.getElementById('prodSalm').value = codigoProducto;

}

function getGenerarReporteSalida(e) {
    e.preventDefault();
    window.open('view/module/allSalida.php', '_blank');
}