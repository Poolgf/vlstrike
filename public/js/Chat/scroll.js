
    document.addEventListener('DOMContentLoaded', function () {
    const messagesContainer = document.getElementById('contenedor-comentarios');

    messagesContainer.scrollTop = messagesContainer.scrollHeight;

    setInterval(() => {
    location.reload();
}, 6000);

    window.onload = function () {
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
};
});

