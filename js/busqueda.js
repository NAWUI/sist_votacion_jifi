$(document).ready(function() {
    var selectField = $('#single-select-field');
    
    selectField.select2({
        theme: 'bootstrap-5',
        placeholder: 'Choose one thing',
        ajax: {
            url: 'busqueda.php',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });

    // Evento que se dispara cuando se selecciona un elemento en el select2
    selectField.on('select2:select', function (e) {
        // Obtén el dato seleccionado
        var selectedData = e.params.data;
        
        // Verifica si el dato seleccionado es válido (puedes agregar tu lógica de validación aquí)
        var isValid = true; // Agrega tu lógica de validación
        
        // Cambia el color del borde del select basado en la validación
        if (isValid) {
            selectField.removeClass('is-invalid').addClass('is-valid');
        } else {
            selectField.removeClass('is-valid').addClass('is-invalid');
        }
    });
});

