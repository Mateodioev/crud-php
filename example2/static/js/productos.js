const hostname = `${location.protocol}//${location.hostname}:${location.port}`;
let productosStr  = '';

async function fetchGames() {
    const response = await fetch(`productos`);
    if (response.status !== 200) {
        throw new Error('No se pudo obtener la información');
    }
    const data = await response.json();
    if (data.error) {
        throw new Error(data.error);
    }
    return data;
}

async function loadGames() {
    fetchGames().then(productos => {
        productos.forEach(producto => {
            // Agregar los productos al HTML dentro del div result
            productosStr += `
            <div class="column">
                <div class="card">
                    <a href="${producto.imagen}" class="card-media" width="100%">
                        <img src="${producto.imagen}" alt="${producto.nombre}" width="100%">
                    </a>
                    <div class="card-content">
                        <div class="card-header">
                            <div class="left-content">
                                <h3>${producto.nombre}</h3>
                            </div>
                            <div class="right-content">
                                <a href="/buy?id=${producto.id}" class="card-btn">Comprar S/.${producto.precio}</a>
                            </div>
                        </div>
                        <div class="info">${producto.descripcion}</div>
                    </div>
                </div>
            </div>
            `;
        });

        document.getElementById('result').innerHTML = productosStr;
    });
}

loadGames();