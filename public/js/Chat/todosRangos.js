// Efecto de resaltado siguiendo el cursor
document.querySelectorAll('.rangosFondo').forEach(elemento => {
    elemento.addEventListener('mousemove', (e) => {
        const highlight = elemento.querySelector('.highlight');
        const rect = elemento.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        highlight.style.left = `${x}px`;
        highlight.style.top = `${y}px`;
    });
});
