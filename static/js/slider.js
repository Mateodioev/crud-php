const hostname = `${location.protocol}//${location.hostname}:${location.port}`;
const isPhone = window.innerWidth < 768;

let juegos = '';

async function fetchGames(page) {
  const response = await fetch(`${hostname}/api/games/all?page=${page}`);
  if (response.status !== 200) {
      throw new Error('No se pudo obtener la información');
  }
  const data = await response.json();
  if (data.error) {
      throw new Error(data.error);
  }
  return data;
}

async function loadGames(page) {
  fetchGames(page).then(data => {
    data.games.forEach(juego => {
      const nombre      = juego.nombre;
      const ratingColor = juego.calificacion < 3 ? 'red' : juego.calificacion < 5 ? 'orange' : 'green';

      juegos += `
      <div class="blog-slider__item swiper-slide">
        <div class="blog-slider__img">
          <img
            src="${juego.imagen}"
            alt="${nombre}">
        </div>
        <div class="blog-slider__content">
          <span class="blog-slider__code" style="color: ${ratingColor};">${juego.calificacion} rating</span>
          <div class="blog-slider__title">${nombre}</div>
          <div class="blog-slider__text">${juego.descripcion}</div>
          <a href="login" class="blog-slider__button">Comprar por S/.${juego.precio}</a>
        </div>
      </div>
      `;
    });

    document.getElementById('resultados').innerHTML = juegos;
  });
}

const loadingGames = loadGames(1);

var swiper = new Swiper('.blog-slider', {
    spaceBetween: 30,
    effect: 'fade',
    loop: true,
    mousewheel: {
      invert: false,
    },
    autoHeight: true,
    pagination: {
      el: '.blog-slider__pagination',
      clickable: true,
    },
    init: false,
    observer: true,
    autoplay: true
});

async function init() {
  await loadingGames;
  swiper.init();
}

init();
