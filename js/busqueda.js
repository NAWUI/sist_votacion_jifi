$(document).ready(function () {
    $('#presidente, #sec_administracion, #sec_documentacion, #tesorero, #eventos_representante, #eventos_vocal1, #eventos_vocal2, #vocal_programacion, #vocal_construccion, #vocal_turismo, #vocal_cicloBasico1, #vocal_cicloBasico2, #olimp_representante, #olimp_vocal1, #olimp_vocal2, #prensa_representante, #prensa_vocal1, #prensa_vocal2, #gyd_representante, #gyd_vocal1, #gyd_vocal2').select2({
        ajax: {
            theme: "bootstrap-5",
            url: 'busqueda.php',
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


