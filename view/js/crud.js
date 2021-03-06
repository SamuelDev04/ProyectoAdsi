function erase(obj) {
    let idUsuario = obj.children[0].innerHTML;

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
            window.location = "index.php?ruta=erase&codigo=" + idUsuario;

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


function getData(obj) {
    let codigo = obj.children[0].innerHTML;
    let nombre = obj.children[1].innerHTML;
    let apellido = obj.children[2].innerHTML;
    let usuario = obj.children[3].innerHTML;
    let clave = obj.children[4].innerHTML;
    let TipoUsuario =obj.children[5].innerHTML;

    document.getElementById('icodem').value = codigo;
    document.getElementById('inamem').value = nombre;
    document.getElementById('iapem').value = apellido;
    document.getElementById('iuserm').value = usuario;
    document.getElementById('icontram').value = clave;
    document.getElementById('itipousuam').value = TipoUsuario;

}

function getGenerarReporte(e) {
    e.preventDefault();
    window.open('view/module/allUser.php', '_blank');
}