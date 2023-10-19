$(document).ready(function () {
    $('#prof_acesor, #prof_acesorsup').select2({
        ajax: {
            theme: "bootstrap-5",
            url: 'busqueda_prof.php',
            dataType: 'json',
            delay: 250,
            minimumInputLength: 1, // Minimum characters before sending the query
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.dni + ' - ' + item.nombre + ' ' + item.apellido,
                            id: item.dni // Use dni as the ID
                        }
                    })
                };
            },
            cache: true
        }
    });
});
