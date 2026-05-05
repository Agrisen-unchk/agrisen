// ===== AGRISEN - JavaScript Principal =====

// Attendre que la page soit chargée
document.addEventListener('DOMContentLoaded', function () {

// ===== NAVBAR : changer couleur au scroll =====
window.addEventListener('scroll', function () {
const navbar = document.getElementById('mainNavbar');
if (navbar) {
if (window.scrollY > 50) {
navbar.style.boxShadow = '0 4px 20px rgba(0,0,0,0.2)';
} else {
navbar.style.boxShadow = '0 4px 15px rgba(0,0,0,0.1)';
}
}
});

// ===== ANIMATION des cartes au scroll =====
const cards = document.querySelectorAll('.card');
const observer = new IntersectionObserver(function (entries) {
entries.forEach(function (entry) {
if (entry.isIntersecting) {
entry.target.style.opacity = '1';
entry.target.style.transform = 'translateY(0)';
}
});
}, { threshold: 0.1 });

cards.forEach(function (card) {
card.style.opacity = '0';
card.style.transform = 'translateY(20px)';
card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
observer.observe(card);
});

// ===== MESSAGES d'alerte : disparaître automatiquement =====
const alerts = document.querySelectorAll('.alert');
alerts.forEach(function (alert) {
setTimeout(function () {
alert.style.transition = 'opacity 0.5s ease';
alert.style.opacity = '0';
setTimeout(function () {
alert.remove();
}, 500);
}, 4000);
});

// ===== STATISTIQUES : animation compteur =====
const counters = document.querySelectorAll('h2.fw-bold');
counters.forEach(function (counter) {
const text = counter.innerText;
if (text === '14' || text === '10+' || text === '24/7') {
counter.style.transition = 'transform 0.3s ease';
counter.addEventListener('mouseenter', function () {
this.style.transform = 'scale(1.2)';
});
counter.addEventListener('mouseleave', function () {
this.style.transform = 'scale(1)';
});
}
});

// ===== BOUTON retour en haut =====
const btnTop = document.createElement('button');
btnTop.innerHTML = '<i class="fas fa-arrow-up"></i>';
btnTop.style.cssText = `
position: fixed;
bottom: 30px;
right: 30px;
width: 45px;
height: 45px;
border-radius: 50%;
border: none;
background: linear-gradient(135deg, #2E7D32, #4CAF50);
color: white;
font-size: 1rem;
cursor: pointer;
display: none;
z-index: 999;
box-shadow: 0 4px 15px rgba(0,0,0,0.2);
transition: opacity 0.3s ease;
`;
document.body.appendChild(btnTop);

window.addEventListener('scroll', function () {
if (window.scrollY > 300) {
btnTop.style.display = 'block';
} else {
btnTop.style.display = 'none';
}
});

btnTop.addEventListener('click', function () {
window.scrollTo({ top: 0, behavior: 'smooth' });
});

});