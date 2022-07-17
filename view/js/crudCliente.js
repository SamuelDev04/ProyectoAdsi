function eraseCliente(obj) {
    let idCliente = obj.children[0].innerHTML;

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
            window.location = "index.php?ruta=eraseClientes&codigo=" + idCliente;

        } else if (
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
function getDataCliente(obj) {
    let codigo = obj.children[0].innerHTML;
    let nombre = obj.children[1].innerHTML;
    let telefono = obj.children[2].innerHTML;
    let celular = obj.children[3].innerHTML;
    let direccion = obj.children[4].innerHTML;


    document.getElementById('icodemc').value = codigo;
    document.getElementById('sunombre').value = nombre;
    document.getElementById('sutelefono').value = telefono;
    document.getElementById('sucelular').value = celular;
    document.getElementById('sudireccion').value = direccion;

}
function getGenerarReporteCliente(e) {
    e.preventDefault();
    window.open('view/module/allCliente.php', '_blank');
}