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
<div class="col-md-6