class ScrollController {
  constructor() { this.prevScrollY = window.scrollY; }

  isScrollingUp() {
      const scrollY = window.scrollY;
      const isUp = scrollY < this.prevScrollY;
      this.prevScrollY = scrollY;
      return isUp;
  }
}

let scrollController = new ScrollController();

function handleScroll() {
  if (scrollController.isScrollingUp()) {
      gsap.to(".contenedorHeader", { y: 0, duration: 0.3, ease: "power2.out" });
  } else {
      gsap.to(".contenedorHeader", { y: -100, duration: 0.3, ease: "power2.inOut" });
  }
}

window.addEventListener("scroll", handleScroll);




//REDIRIGIR A LA PAGINA DE REGISTER.PHP
document.getElementById('tienescuentaBotonLogin').addEventListener('click', function() {
  window.location.href = 'register.php';
});