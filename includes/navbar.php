<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNavbar">
<div class="container">
<!-- Logo -->
<a class="navbar-brand fw-bold" href="/agrisen/index.php">
<i class="fas fa-seedling me-2"></i>AgriSen
</a>

<!-- Bouton menu mobile -->
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
<span class="navbar-toggler-icon"></span>
</button>

<!-- Menu -->
<div class="collapse navbar-collapse" id="navbarMenu">
<ul class="navbar-nav ms-auto">
<li class="nav-item">
<a class="nav-link" href="/agrisen/index.php">
<i class="fas fa-home me-1"></i>Accueil
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/agrisen/pages/meteo.php">
<i class="fas fa-cloud-sun me-1"></i>Météo
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/agrisen/pages/marche.php">
<i class="fas fa-chart-line me-1"></i>Marché
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/agrisen/pages/calendrier.php">
<i class="fas fa-calendar-alt me-1"></i>Calendrier
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/agrisen/pages/conseils.php">
<i class="fas fa-lightbulb me-1"></i>Conseils
</a>
</li>

<?php if(isset($_SESSION['utilisateur'])): ?>
<li class="nav-item">
<a class="nav-link" href="/agrisen/pages/profil.php">
<i class="fas fa-user me-1"></i><?php echo $_SESSION['utilisateur']['prenom']; ?>
</a>
</li>
<li class="nav-item">
<a class="nav-link text-danger" href="/agrisen/pages/deconnexion.php">
<i class="fas fa-sign-out-alt me-1"></i>Déconnexion
</a>
</li>
<?php else: ?>
<li class="nav-item">
<a class="nav-link" href="/pages/connexion.php">
<i class="fas fa-sign-in-alt me-1"></i>Connexion
</a>
</li>
<li class="nav-item">
<a class="btn btn-success ms-2" href="/pages/inscription.php">
<i class="fas fa-user-plus me-1"></i>S'inscrire
</a>
</li>
<?php endif; ?>
</ul>
</div>
</div>
</nav>
