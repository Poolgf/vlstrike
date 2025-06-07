// Crear partículas flotantes
function createParticles() {
    const container = document.querySelector('.floating-particles');
    const particleCount = 30;

    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';

        const size = Math.random() * 4 + 2;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;

        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';

        particle.style.animation = `float ${Math.random() * 10 + 15}s linear infinite`;
        particle.style.animationDelay = `-${Math.random() * 10}s`;

        container.appendChild(particle);
    }
}

// Agregar animación de flotación personalizada
const style = document.createElement('style');
style.textContent = `
            @keyframes float {
                0% { transform: translate(0, 0) rotate(0deg); opacity: 0; }
                10% { opacity: 0.5; }
                90% { opacity: 0.5; }
                100% { transform: translate(100px, -100vh) rotate(360deg); opacity: 0; }
            }
        `;
document.head.appendChild(style);

createParticles();

// Efecto de luz en el cursor
document.addEventListener('mousemove', (e) => {
    const cards = document.querySelectorAll('.rank-card');
    cards.forEach(card => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        card.style.background = `radial-gradient(circle at ${x}px ${y}px, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.03) 50%)`;
    });
});
