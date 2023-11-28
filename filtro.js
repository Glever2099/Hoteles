function miFuncion() {
    if (typeof $("#cantPer").data('options') === "undefined") {
        $("#cantPer").data('options', $('#tipo option').clone());
    }
    var id = $("#cantPer").val();
    var options = $("#cantPer").data('options').filter('[data-option="' + id + '"]');
    $('#tipo').html(options);
}

document.addEventListener("DOMContentLoaded", function() {
    // Llama a miFuncion cuando la página esté completamente cargada
    miFuncion();

    var selectElement = document.getElementById("cantPer");

    selectElement.addEventListener("change", function() {
        miFuncion();
    });
});


//crear los formularios de los acompañantes
var selectA = document.getElementById("seleccion");
var resultado = document.getElementById("resultado");

selectA.addEventListener("change", function() {
  var cantidad = parseInt(selectA.value);

  resultado.innerHTML = "";

  for (var i = 0; i < cantidad; i++) {
    let formhtml = "<h2>Datos de Acompañante " + (i + 1) + "</h2><h2>Nombre Completo</h2> <input type='text' name='ANombre" + (i + 1) + "'> <br><h2>DNI</h2> <input type='text' name='ADNI" + (i + 1) + "'> <br><h2>Genero</h2> <input type='text' name='AGenero" + (i + 1) + "'> <br><h2>Ocupacion</h2> <input type='text' name='AOcu" + (i + 1) + "'> <br> <hr>";
    
    resultado.innerHTML += formhtml; 
  }
});
