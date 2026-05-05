<?php
session_start();
require_once '../includes/connexion.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>

<section class="py-5">
<div class="container">
<div class="section-title">
<h2><i class="fas fa-lightbulb me-2"></i>Conseils Agricoles</h2>
<div class="underline"></div>
<p>Recommandations pratiques pour améliorer votre production</p>
</div>

<?php
$conseils = [
[
'titre' => 'Gestion de l\'eau', 'icon' => 'fa-tint', 'color' => '#2196F3',
'bg' => '#E3F2FD',
'conseils' => [
'Arrosez tôt le matin ou en soirée pour réduire l\'évaporation.',
'Utilisez le paillage pour conserver l\'humidité du sol.',
'Créez des billons pour orienter l\'eau vers les racines.',
'Récupérez l\'eau de pluie pour l\'irrigation en saison sèche.',
]
],
[
'titre' => 'Fertilisation du sol', 'icon' => 'fa-leaf', 'color' => '#4CAF50',
'bg' => '#E8F5E9',
'conseils' => [
'Utilisez le compost maison pour enrichir le sol naturellement.',
'Pratiquez la rotation des cultures pour maintenir la fertilité.',
'Incorporez des légumineuses (niébé) pour fixer l\'azote.',
'Faites analyser votre sol avant d\'appliquer des engrais.',
]
],
[
'titre' => 'Protection des cultures', 'icon' => 'fa-shield-alt', 'color' => '#FF9800',
'bg' => '#FFF8E1',
'conseils' => [
'Inspectez vos plants régulièrement pour détecter les maladies tôt.',
'Utilisez des pesticides naturels (neem, ail) en priorité.',
'Installez des épouvantails ou filets contre les oiseaux.',
'Pratiquez la culture associée pour repousser les insectes nuisibles.',
]
],
[
'titre' => 'Récolte et stockage', 'icon' => 'fa-warehouse', 'color' => '#9C27B0',
'bg' => '#F3E5F5',
'conseils' => [
'Récoltez à maturité optimale pour une meilleure qualité.',
'Séchez bien les grains avant stockage pour éviter les moisissures.',
'Utilisez des sacs hermétiques ou silos métalliques.',
'Vérifiez le taux d\'humidité des grains avant de les stocker.',
]
],
];
?>

<div class="row g-4">
<?php foreach($conseils as $categorie): ?>
<div class="col-md-6">
<div class="card p-4 h-100">
<div class="d-flex align-items-center mb-3">
<div style="width:50px; height:50px; border-radius:50%; background:<?php echo $categorie['bg']; ?>; display:flex; align-items:center; justify-content:center;">
<i class="fas <?php echo $categorie['icon']; ?>" style="color:<?php echo $categorie['color']; ?>; font-size:1.3rem;"></i>
</div>
<h5 class="fw-bold ms-3 mb-0" style="color:<?php echo $categorie['color']; ?>;">
<?php echo $categorie['titre']; ?>
</h5>
</div>
<ul class="list-unstyled mb-0">
<?php foreach($categorie['conseils'] as $conseil): ?>
<li class="mb-2">
<i class="fas fa-check-circle me-2" style="color: var(--vert-clair);"></i>
<?php echo $conseil; ?>
</li>
<?php endforeach; ?>
</ul>
</div>
</div>
<?php endforeach; ?>
</div>
</div>
</section>

<?php require_once '../includes/footer.php'; ?>