document.addEventListener('DOMContentLoaded', function() {
    // trae el boton de siguiente
    const siguienteBtn = document.getElementById('siguiente-btn');
    const form = document.getElementById('evento-form');

    // ve si le hicieron click a siguiente
    siguienteBtn.addEventListener('click', function(event) {
        // trae a los botoncitos
        const radios = form.querySelectorAll('input[type="radio"]');
        // verifica si alguno esta seleccionado
        const isAnyRadioChecked = Array.from(radios).some(radio => radio.checked);

        // si no se selecciono
        if (!isAnyRadioChecked) {
            event.preventDefault(); // sale la alerta
            alert('Debes seleccionar un salón antes de continuar.');
        } else {
            // si hay un salón seleccionado seguir
            form.submit();
        }
    });
});