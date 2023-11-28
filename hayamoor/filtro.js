function miFuncion() {
  if (typeof $("#cantPer").data('options') === "undefined") {
    $("#cantPer").data('options', $('#tipo option').clone());
  }
  var id = $("#cantPer").val();
  var options = $("#cantPer").data('options').filter('[data-option="' + id + '"]');
  $('#tipo').html(options);
}

document.addEventListener("DOMContentLoaded", function () {
  // Llama a miFuncion cuando la página esté completamente cargada
  miFuncion();

  var selectElement = document.getElementById("cantPer");

  selectElement.addEventListener("change", function () {
    miFuncion();
  });
});


//crear los formularios de los acompañantes
var selectA = document.getElementById("seleccion");
var resultado = document.getElementById("resultado");

selectA.addEventListener("change", function () {
  var cantidad = parseInt(selectA.value);

  resultado.innerHTML = "";

  for (var i = 0; i < cantidad; i++) {
    let formhtml = "<h2>Datos de Acompañante " + (i + 1) + "</h2><div class='row'><div class = 'col-sm-6 col-md-3'><p><h6>Nombre Completo</h6></p><input type='text' name='ANombre" + (i + 1) + "'></div> <div class = 'col-sm-6 col-md-3'><p><h6>DNI</h6></p> <input type='text' name='ADNI" + (i + 1) + "'></div> <div class = 'col-sm-6 col-md-3'><p><h6>Genero</h6></p> <input type='text' name='AGenero" + (i + 1) + "'></div><div class = 'col-sm-6 col-md-3'><p><h6>Ocupacion</h6></p> <input type='text' name='AOcu" + (i + 1) + "'> </div></div><br>";

    resultado.innerHTML += formhtml;
  }
});
