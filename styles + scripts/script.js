/* ----------------------------------------------------------------- */
/* HEADER.PHP */
/* Para que el menú desaparezca cuando el usuario va hacia abajo, y 
cuando hace "Scroll" hacia arriba. */
class ScrollController {
  constructor() { this.prevScrollY = window.scrollY; }
  isScrollingUp() {
      const scrollY = window.scrollY;
      const isUp = scrollY < this.prevScrollY;
      this.prevScrollY = scrollY;
      return isUp;
  }}
let scrollController = new ScrollController();
function handleScroll() {
    if (scrollController.isScrollingUp()) { gsap.to(".contenedorHeader", { y: 0, duration: 0.3, ease: "power2.out" }); }
    else { gsap.to(".contenedorHeader", { y: -100, duration: 0.3, ease: "power2.inOut" }); }}
window.addEventListener("scroll", handleScroll);

/* ----------------------------------------------------------------- */
/* DASHBOARD.PHP */
/* Para que aparezcan las secciones debajo. */
document.addEventListener("DOMContentLoaded", function () {
    var enlaces = document.querySelectorAll(".circulosDashboard a");
    enlaces.forEach(function (enlace) {
        enlace.addEventListener("click", function (event) {
            event.preventDefault();
            var paginasInternas = document.querySelectorAll(".paginaInterna");
            paginasInternas.forEach(function (pagina) { pagina.style.display = "none"; });
            var targetId = this.getAttribute("href").substring(1);
            var targetPagina = document.getElementById(targetId);
            targetPagina.style.display = "block";
        });});});

/* Para que la página te lleve automáticamente a la sección */
function scrollToSection(sectionId) {
    var targetSection = document.getElementById(sectionId);
    if (targetSection) { targetSection.scrollIntoView({ behavior: 'smooth' }); }}

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('creaEncuesta').addEventListener('click', function () { scrollToSection('paginaCreaEncuesta'); });
    document.getElementById('editaEncuesta').addEventListener('click', function () { scrollToSection('paginaEditaEncuesta'); });
    document.getElementById('verVotos').addEventListener('click', function () { scrollToSection('paginaVerVotos'); });
    document.getElementById('listarEncuestas').addEventListener('click', function () { scrollToSection('paginaListarEncuestas'); });
 });