document.addEventListener('DOMContentLoaded', () => {
    const galeriaItems = document.querySelectorAll('.galeria-item');
    const overlay = document.createElement('div');
    overlay.className = 'galeria-overlay';
    document.body.appendChild(overlay);

    galeriaItems.forEach(item => {
        item.addEventListener('click', () => {
            item.classList.add('expandir');
            overlay.classList.add('visible');
            overlay.style.pointerEvents = 'auto';  // Permitir que el overlay pueda ser clickeado para cerrar

            // Después de 2 segundos, eliminar la clase 'expandir' para volver al tamaño original
            setTimeout(() => {
                item.classList.remove('expandir');
                overlay.classList.remove('visible');
                overlay.style.pointerEvents = 'none'; // Deshabilitar la interacción del overlay cuando la imagen se cierre
            }, 2000); // 2000 milisegundos = 2 segundos
        });
    });

    overlay.addEventListener('click', () => {
        galeriaItems.forEach(item => item.classList.remove('expandir'));
        overlay.classList.remove('visible');
        overlay.style.pointerEvents = 'none'; // Deshabilitar la interacción del overlay cuando la imagen se cierre
    });
});
