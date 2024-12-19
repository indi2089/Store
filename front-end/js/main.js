const API_URL = "http://localhost/Store/API/";

// Mostrar prendas
function fetchPrendas() {
    fetch(`${API_URL}prendas.php`)
        .then(response => response.json())
        .then(data => {
            let prendasList = '';
            data.forEach(prenda => {
                prendasList += `
                    <tr>
                        <td>${prenda.id}</td>
                        <td>${prenda.nombre}</td>
                        <td>${prenda.marca}</td>
                        <td>${prenda.precio}</td>
                        <td>${prenda.stock}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editPrenda(${prenda.id})">Editar</button>
                            <button class="btn btn-danger btn-sm" onclick="deletePrenda(${prenda.id})">Eliminar</button>
                        </td>
                    </tr>
                `;
            });
            document.getElementById('prendas-list').innerHTML = prendasList;
        });
}

// Agregar o editar prenda
async function savePrenda() {
    const data = {
        nombre: document.getElementById("nombre").value,
        precio: document.getElementById("precio").value,
        stock: document.getElementById("stock").value
    };

    try {
        const response = await fetch("http://localhost/Store/routes/prendas.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const result = await response.json();
        console.log("Prenda guardada:", result);
        alert("Prenda guardada exitosamente");
    } catch (error) {
        console.error("Error guardando la prenda:", error);
    }
}

// Eliminar prenda
function deletePrenda(id) {
    fetch(`${API_URL}prendas.php?id=${id}`, { method: 'DELETE' })
        .then(() => fetchPrendas());
}

function showAddPrendaForm() {
    document.getElementById('prenda-form').style.display = 'block';
}

document.addEventListener('DOMContentLoaded', fetchPrendas);
// Mostrar marcas con al menos una venta
function fetchMarcasConVentas() {
    fetch(`${API_URL}marcas.php?ventas=true`)
        .then(response => response.json())
        .then(data => {
            let reportContent = '<h3>Marcas con al menos una venta:</h3><ul>';
            data.forEach(marca => {
                reportContent += `<li>${marca.nombre}</li>`;
            });
            reportContent += '</ul>';
            document.getElementById('reportes-list').innerHTML = reportContent;
        });
}

// Mostrar prendas vendidas y stock
function fetchPrendasVendidas() {
    fetch(`${API_URL}prendas.php?stock=true`)
        .then(response => response.json())
        .then(data => {
            let reportContent = '<h3>Prendas Vendidas y Stock:</h3><table class="table">';
            reportContent += `
                <thead>
                    <tr>
                        <th>Prenda</th>
                        <th>Vendidas</th>
                        <th>Stock Restante</th>
                    </tr>
                </thead><tbody>`;
            data.forEach(prenda => {
                reportContent += `
                    <tr>
                        <td>${prenda.nombre}</td>
                        <td>${prenda.vendidas}</td>
                        <td>${prenda.stock}</td>
                    </tr>`;
            });
            reportContent += '</tbody></table>';
            document.getElementById('reportes-list').innerHTML += reportContent;
        });
}

// Mostrar las 5 marcas más vendidas
function fetchTopMarcasVendidas() {
    fetch(`${API_URL}marcas.php?top=true`)
        .then(response => response.json())
        .then(data => {
            let reportContent = '<h3>Top 5 Marcas Más Vendidas:</h3><ul>';
            data.forEach(marca => {
                reportContent += `<li>${marca.nombre}: ${marca.ventas_totales} ventas</li>`;
            });
            reportContent += '</ul>';
            document.getElementById('reportes-list').innerHTML += reportContent;
        });
}

// Llamar a todas las funciones de reportes
function fetchReportes() {
    fetchMarcasConVentas();
    fetchPrendasVendidas();
    fetchTopMarcasVendidas();
}

// Llamar los reportes cuando se haga clic en la pestaña
document.querySelector('a[href="#reportes"]').addEventListener('click', fetchReportes);
