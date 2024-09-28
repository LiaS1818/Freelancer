import hamburgerMenu from "./menu_hamburguesa.js";
// Selecciona el documento
const d = document;
// Cuando el DOM esté cargado, ejecuta la función hamburgerMenu
d.addEventListener("DOMContentLoaded", (e) => {
  hamburgerMenu(".panel-btn", ".panel", ".menu a");
});
