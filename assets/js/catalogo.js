window.addEventListener('load', function () {
    console.log("Catalogo.js cargado y listo");

    const bookModal = document.getElementById('bookModal');
    if (!bookModal) return;

    // Llenar datos del modal
    bookModal.addEventListener('show.bs.modal', function(event) {
        const card = event.relatedTarget;
        document.getElementById('m-titulo').textContent = card.getAttribute('data-titulo');
        document.getElementById('m-tipo').textContent = card.getAttribute('data-tipo');
        document.getElementById('m-notas').textContent = card.getAttribute('data-notas') || "Sin descripción.";
        document.getElementById('m-precio').textContent = 'US$ ' + card.getAttribute('data-precio');
    });

    
    document.getElementById('btn-carrito').addEventListener('click', function () {
        iziToast.info({
    title: 'Aviso',
    message: 'Funcionalidad en desarrollo',
    position: 'topCenter',
    zindex: 9999,         
    backgroundColor: '#002147',
    titleColor: '#fff',
    messageColor: '#fff',
    iconColor: '#fff',
    progressBarColor: '#D32F2F'

    
});

    });
});