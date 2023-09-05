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
