
 $(document).ready(function () {
        $('.form-select').select2({
            ajax: {
                url: 'busqueda.php',
                dataType: 'json',
                delay: 250,
                minimumInputLength: 1, // Minimum characters before sending the query
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.dni + ' - ' + item.nombre,
                                id: item.dni // Use dni as the ID
                            }
                        })
                    };
                },
                cache: true
            }
        });
    });
