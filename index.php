<?php
session_start();
require_once 'includes/connexion.php';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<!-- HERO SECTION -->
<section class="hero">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-8 mx-auto">
<i class="fas fa-seedling fa-3x mb-3" style="color: #FFC107;"></i>
<h1>Bienvenue sur AgriSen</h1>
<p>La plateforme numérique au service des agriculteurs sénégalais. Accédez à la météo, aux prix du marché, au calendrier agricole et à des conseils pratiques.</p>
<?php if(!isset($_SESSION['utilisateur'])): ?>
<a href="/pages/inscription.php" class="btn btn-agrisen btn-lg me-3">
<i class="fas fa-user-plus me-2"></i>Commencer gratuitement
</a>
<a href="/pages/connexion.php" class="btn btn-outline-light btn-lg">
<i class="fas fa-sign-in-alt me-2"></i>Se connecter
</a>
<?php else: ?>
<a href="/pages/dashboard.php" class="btn btn-agrisen btn-lg">
<i class="fas fa-tachometer-alt me-2"></i>Mon tableau de bord
</a>
<?php endif; ?>
</div>
</div>
</div>
</section>

<!-- FONCTIONNALITÉS -->
<section class="py-5">
<div class="container">
<div class="section-title">
<h2>Nos Services</h2>
<div class="underline"></div>
<p>Tout ce dont vous avez besoin pour mieux gérer votre exploitation agricole</p>
</div>
<div class="row g-4">
<div class="col-md-6 col-lg-3">
<div class="card text-center p-4 h-100">
<div class="card-icon meteo">
<i class="fas fa-cloud-sun"></i>
</div>
<h5 class="fw-bold mt-2">Météo Locale</h5>
<p class="text-muted small">Prévisions météo précises par région pour planifier vos activités agricoles.</p>
<a href="/pages/meteo.php" class="btn btn-agrisen mt-auto">Voir la météo</a>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="card text-center p-4 h-100">
<div class="card-icon marche">
<i class="fas fa-chart-line"></i>
</div>
<h5 class="fw-bold mt-2">Prix du Marché</h5>
<p class="text-muted small">Consultez les prix actuels de vos cultures sur les marchés sénégalais.</p>
<a href="/pages/marche.php" class="btn btn-agrisen mt-auto">Voir les prix</a>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="card text-center p-4 h-100">
<div class="card-icon calendrier">
<i class="fas fa-calendar-alt"></i>
</div>
<h5 class="fw-bold mt-2">Calendrier Agricole</h5>
<p class="text-muted small">Suivez les périodes de semis et de récolte adaptées à vos cultures locales.</p>
<a href="/pages/calendrier.php" class="btn btn-agrisen mt-auto">Voir le calendrier</a>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="card text-center p-4 h-100">
<div class="card-icon conseils">
<i class="fas fa-lightbulb"></i>
</div>
<h5 class="fw-bold mt-2">Conseils Agricoles</h5>
<p class="text-muted small">Recevez des conseils pratiques adaptés à votre région et à vos cultures.</p>
<a href="/pages/conseils.php" class="btn btn-agrisen mt-auto">Voir les conseils</a>
</div>
</div>
</div>
</div>
</section>

<!-- STATISTIQUES -->
<section class="py-5" style="background: var(--vert-tres-clair);">
<div class="container">
<div class="row text-center g-4">
<div class="col-md-4">
<h2 class="fw-bold" style="color: var(--vert-principal);">14</h2>
<p class="text-muted">Régions couvertes</p>
</div>
<div class="col-md-4">
<h2 class="fw-bold" style="color: var(--vert-principal);">10+</h2>
<p class="text-muted">Cultures suivies</p>
</div>
<div class="col-md-4">
<h2 class="fw-bold" style="color: var(--vert-principal);">24/7</h2>
<p class="text-muted">Disponible en permanence</p>
</div>
</div>
</div>
</section>

<!-- FOOTER -->
<footer>
<div class="container">
<div class="row g-4">
<div class="col-md-4">
<h5><i class="fas fa-seedling me-2"></i>AgriSen</h5>
<p>La plateforme numérique au service des agriculteurs sénégalais pour une agriculture moderne et productive.</p>
</div>
<div class="col-md-4">
<h5>Liens rapides</h5>
<ul class="list-unstyled">
<li><a href="/pages/meteo.php"><i class="fas fa-chevron-right me-1"></i>Météo</a></li>
<li><a href="/pages/marche.php"><i class="fas fa-chevron-right me-1"></i>Prix du marché</a></li>
<li><a href="/pages/calendrier.php"><i class="fas fa-chevron-right me-1"></i>Calendrier</a></li>
<li><a href="/pages/conseils.php"><i class="fas fa-chevron-right me-1"></i>Conseils</a></li>
</ul>
</div>
<div class="col-md-4">
<h5>Contact</h5>
<p><i class="fas fa-envelope me-2"></i>contact@agrisen.sn</p>
<p><i class="fas fa-phone me-2"></i>+221 76 395 41 21</p>
<p><i class="fas fa-map-marker-alt me-2"></i>Dakar, Sénégal</p>
</div>
</div>
<div class="footer-bottom">
<p>&copy; 2026 AgriSen — Tous droits réservés | Développé par des étudiants de la P10 de l'UNCHK | <a href="/admin/login.php" style="color: rgba(255,255,255,0.4); font-size: 0.8rem;">Admin</a></p>
</div>
</div>
</footer>

<?php require_once 'includes/footer.php'; ?>
