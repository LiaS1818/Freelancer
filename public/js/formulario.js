$(document).ready(function () {
  $("#contactForm").on("submit", function (event) {
    event.preventDefault(); // Evita el comportamiento por defecto del formulario

    // Mostrar el mensaje de "loading"
    $("#loading").show();

    $.ajax({
      url: "/", // La URL a donde envías los datos
      method: "POST",
      data: $(this).serialize(), // Serializa los datos del formulario
      success: function (response) {
        // Ocultar el "loading"
        $("#loading").hide();

        // Mostrar mensaje de éxito
        $("#response").html(
          '<p style="color: green; background-color: white;  ">Mensaje enviado correctamente.</p>'
        );

        // Limpiar los campos del formulario
        $("#contactForm")[0].reset();
      },
      error: function () {
        // Ocultar el "loading"
        $("#loading").hide();

        // Mostrar mensaje de error
        $("#response").html(
          '<p style="color: red;">Ocurrió un error al enviar el mensaje. Inténtalo nuevamente.</p>'
        );
      },
    });
  });
});
