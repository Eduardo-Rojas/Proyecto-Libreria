document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formContacto');

    if (typeof statusRegistro !== 'undefined' && statusRegistro === "success") {
        iziToast.success({
            title: '¡Éxito!',
            message: 'Información almacenada correctamente',
            position: 'bottomRight'
        });
    }

    // 2. Validación
    if (form) {
        form.addEventListener('submit', function (e) {
            const reglas = [
                { id: 'nombre', msj: 'Escribe tu nombre completo' },
                { id: 'correo', msj: 'El correo es obligatorio', pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, msjP: 'Formato de correo inválido' },
                { id: 'asunto', msj: 'Indica el asunto de tu mensaje' },
                { id: 'comentario', msj: 'El comentario no puede estar vacío' }
            ];

            for (let r of reglas) {
                const campo = document.getElementById(r.id);
                const valor = campo.value.trim();

                if (valor === "") {
                    lanzarError(r.msj);
                    e.preventDefault();
                    campo.focus();
                    return;
                }

                if (r.pattern && !r.pattern.test(valor)) {
                    lanzarError(r.msjP);
                    e.preventDefault();
                    campo.focus();
                    return;
                }
            }
        });
    }
});

function lanzarError(m) {
    iziToast.warning({
        title: 'Atención',
        message: m,
        position: 'topCenter',
        backgroundColor: '#D32F2F',
        titleColor: '#fff',
        messageColor: '#fff',
        iconColor: '#fff'
    });
}