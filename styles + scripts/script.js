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
/* REGISTER.PHP */
document.addEventListener('DOMContentLoaded', function() {
    var siguienteBoton = document.getElementById('siguienteBotonRegister');
    var datosUsuario = document.querySelectorAll('.datosUsuarioRegister');
    var loaderRegister = document.getElementById('loaderRegister');
    var currentIndex = 0;
    siguienteBoton.addEventListener('click', function(e) {
        e.preventDefault();
        var campoVisible = datosUsuario[currentIndex];
        var siguienteCampo = datosUsuario[currentIndex + 1];
        if (siguienteCampo) {
            campoVisible.style.opacity = 0;
            campoVisible.classList.add('hidden');
            siguienteCampo.classList.remove('hidden');
            gsap.from(siguienteCampo, { opacity: 0, duration: 0.5 });
            currentIndex++;
        } else {
            loaderRegister.style.display = 'block';
            setTimeout(function() { window.location.href = 'dashboard.php'; }, 2000); }});});

/* ----------------------------------------------------------------- */
/* DASHBOARD.PHP */
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