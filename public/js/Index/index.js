// Crear hexágonos animados
const bg = document.querySelector('.animated-bg');

for (let i = 0; i < 30; i++) {
    const hexagon = document.createElement('div');
    hexagon.className = 'hexagon';

    hexagon.style.left = `${Math.random() * 100}%`;
    const size = Math.random() * 100 + 50;
    hexagon.style.width = `${size}px`;
    hexagon.style.height = `${size}px`;

    // Delay aleatorio
    hexagon.style.animationDelay = `${Math.random() * 15}s`;

    // Opacidad aleatoria
    hexagon.style.opacity = (Math.random() * 0.3).toFixed(2);

    bg.appendChild(hexagon);
}

// Efecto sutil en el hero
const hero = document.querySelector('.hero');

document.addEventListener('mousemove', (e) => {
    const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
    const moveY = (e.clientY - window.innerHeight / 2) * 0.01;

    hero.style.transform = `translate(${moveX}px, ${moveY}px)`;
});

// Animación del logo al hacer hover
const logo = document.querySelector('.logo');

logo.addEventListener('mouseover', () => {
    logo.style.letterSpacing = '8px';
});

logo.addEventListener('mouseout', () => {
    logo.style.letterSpacing = '5px';
});
