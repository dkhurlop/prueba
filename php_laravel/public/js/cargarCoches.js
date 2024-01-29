
function cargarCoches() {
    const propietarioId = document.getElementById('id_propietario').value;

    axios.get('/coches/por-propietario/' + propietarioId)
        .then(function(response) {
            console.log(response.data);

            let listaCochesHTML = '';
            const coches = response.data.coches;
            if (coches.length > 0) {
                coches.forEach(coche => {
                    listaCochesHTML += '<li>' + coche.marca + ' ' + coche.modelo + ' (' + coche.anio + ')</li>';
                });
                document.getElementById('listaCoches').innerHTML = listaCochesHTML;
                document.getElementById('noCochesMensaje').style.display = 'none';
            } else {
                document.getElementById('listaCoches').innerHTML = '';
                document.getElementById('noCochesMensaje').style.display = 'block';
            }
        })
        .catch(function(error) {
            console.error('Error al cargar coches:', error);
        });
}
