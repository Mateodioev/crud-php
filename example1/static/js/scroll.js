const form = document.getElementById("search-form");
const query = document.getElementById("search-input");


let pagina      = 1;
let juegos      = '';
let ultimoJuego = null;
let isLastPage  = false;
let searchTerm  = '';

let observador = new IntersectionObserver((entradas, observador) => {
    if (isLastPage) {
        return;
    }

    entradas.forEach(entrada => {
        if (entrada.isIntersecting) {
            pagina++;
            try {
                cargarPeliculas();
            } catch (error) {
                console.error(error);
            }
        }
    });
}, {
    rootMargin: '0px 0px 200px 0px',
    threshold: 1.0
});

const cargarPeliculas = async () => {
    fetchGames(searchTerm).then(games => {
        if (games.total < 10) {
            isLastPage = true;
            if (games.total === 0) {
                if (pagina === 1) {
                    document.getElementById('result').innerHTML = 'No se encontraron juegos';
                }
                return;
            }
        }
        games.games.forEach(juego => {
            // recortar el nombre a 16 caracteres
            const nombre = juego.nombre;
            const nombreRecortado = nombre.length > 16 ? nombre.substring(0, 16) + '...' : nombre;

            const ratingColor = juego.calificacion < 3 ? 'red' : juego.calificacion < 5 ? 'orange' : 'green';
            juegos += `
            <div class="column">
            <div class="card">
                <a href="${juego.imagen}" class="card-media" width="100%">
                    <img src="${juego.imagen}" alt="${nombre}" width="100%">
                </a>
                <div class="card-content">
                    <div class="card-header">
                        <div class="left-content">
                            <h3>${nombreRecortado}</h3>
                            <span style="color: ${ratingColor};">${juego.calificacion} rating</span>
                        </div>
                        <div class="right-content">
                            <a href="/buy?id=${juego.id}" class="card-btn">Comprar \$${juego.precio}</a>
                        </div>
                    </div>
                    <div class="info">${juego.descripcion}</div>
                </div>
            </div>
        </div>
            `;
        });

        document.getElementById('result').innerHTML = juegos;

        if (pagina < 100) {
            if (ultimoJuego) {
                observador.observe(ultimoJuego);
            }

            const juegosEnPantalla = document.querySelectorAll('#result .column');
            ultimoJuego = juegosEnPantalla[juegosEnPantalla.length - 1];
            observador.observe(ultimoJuego);
        }
    }).catch(error => {
        console.error(error);
    });
};

async function fetchGames(queryStr) {
    queryStr = queryStr.trim();
    const response = await fetch(`api/games/search/${queryStr}?page=${pagina}`);
    if (response.status !== 200) {
        throw new Error('No se pudo obtener la información');
    }
    const data = await response.json();
    if (data.error) {
        throw new Error(data.error);
    }
    return data;
}

async function handleSearch(e) {
    e.preventDefault();
    searchTerm = query.value.trim();
    if (searchTerm) {
        document.getElementById('result').innerHTML = 'Cargando...';
        juegos = '';
        pagina = 1;
        cargarPeliculas();
    } else {
        juegos = '';
        pagina = 1;
        cargarPeliculas();
    }
}
form.addEventListener('submit', handleSearch);
cargarPeliculas();