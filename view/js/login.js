$('#login-button').click(function(){
  $('#login-button').fadeOut("slow",function(){
    $("#container").fadeIn();
    TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
    TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
  });
});

$(".close-btn").click(function(){
  TweenMax.from("#container", .4, { scale: 1, ease:Sine.easeInOut});
  TweenMax.to("#container", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
  $("#container, #forgotten-container").fadeOut(800, function(){
    $("#login-button").fadeIn(800);
  });
});

/*function validarCampos(e) {
  e.preventDefault();
  let usuario = document.getElementById('usuario').value;
  let contrasena = document.getElementById('password').value;

  if (usuario.length == "" || contrasena.length == "") {
    Swal.fire({
      type:'warning',
      title:'Debe ingresar un usuario y/o password',
    });
    return false;
  }
};*/