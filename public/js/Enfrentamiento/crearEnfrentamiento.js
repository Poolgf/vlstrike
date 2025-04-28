$(document).ready(function() {
    $('.team-select').select2({
        placeholder: "Selecciona un equipo",
        templateResult: formatTeam,
        templateSelection: formatTeamSelection
    });

    // Función para formatear los resultados en el dropdown
    function formatTeam(team) {
        if (!team.id) { return team.text; }
        var $team = $(
            '<span><img src="Img/LOL/EquiposLOL/' + $(team.element).data('imagen') + '" style="width: 30px; height: 30px; border-radius: 50%; margin-right: 10px;" /> ' + team.text + '</span>'
        );
        return $team;
    }

    // Función para formatear la selección
    function formatTeamSelection(team) {
        return team.text;
    }

    // Mostrar preview cuando se selecciona un equipo
    $('#equipo1').on('select2:select', function(e) {
        var imagen = e.params.data.element.dataset.imagen;
        var nombre = e.params.data.text;
        $('#preview1 .team-logo').attr('src', 'Img/LOL/EquiposLOL/' + imagen);
        $('#preview1 .team-name').text(nombre);
        $('#preview1').slideDown();
    });

    $('#equipo2').on('select2:select', function(e) {
        var imagen = e.params.data.element.dataset.imagen;
        var nombre = e.params.data.text;
        $('#preview2 .team-logo').attr('src', 'Img/LOL/EquiposLOL/' + imagen);
        $('#preview2 .team-name').text(nombre);
        $('#preview2').slideDown();
    });

    // Inicializar Flatpickr para el calendario
    flatpickr("#fecha", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        locale: "es",
        time_24hr: true
    });

    // Validación para evitar seleccionar el mismo equipo
    $('form').submit(function(e) {
        if ($('#equipo1').val() === $('#equipo2').val() && $('#equipo1').val() !== '') {
            e.preventDefault();
            alert('No puedes seleccionar el mismo equipo para ambos lados');
        }
    });
});
