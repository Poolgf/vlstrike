// Animación al cargar cada sección
document.addEventListener('DOMContentLoaded', function() {
    const secciones = document.querySelectorAll('.seccion-perfil');
secciones.forEach((seccion, index) => {
seccion.style.opacity = '0';
seccion.style.transform = 'translateX(-20px)';
setTimeout(() => {
seccion.style.transition = 'all 0.5s ease';
seccion.style.opacity = '1';
seccion.style.transform = 'translateX(0)';
}, 200 * index);
});

// Animación de las barras de progreso
const barras = document.querySelectorAll('.progreso-rango-barra');
barras.forEach(barra => {
    const width = barra.style.width;
barra.style.width = '0%';
setTimeout(() => {
barra.style.width = width;
}, 1000);
});

// Contador animado para estadísticas
const estadisticas = document.querySelectorAll('.estadistica-valor');
estadisticas.forEach(stat => {
    const valor = stat.textContent;
    const numero = parseFloat(valor);
    if (!isNaN(numero)) {
stat.textContent = '0';
    let contador = 0;
    const incremento = numero / 50;
    const intervalo = setInterval(() => {
    contador += incremento;
    if (contador >= numero) {
stat.textContent = valor;
clearInterval(intervalo);
} else {
      stat.textContent = Math.round(contador);
  }
}, 20);
}
});
});

// Efecto parallax en el encabezado
   document.addEventListener('mousemove', function(e) {
    const encabezado = document.querySelector('.encabezado-perfil');
    const x = e.clientX / window.innerWidth;
    const y = e.clientY / window.innerHeight;

encabezado.style.backgroundPosition = `${x * 50}% ${y * 50}%`;
});
