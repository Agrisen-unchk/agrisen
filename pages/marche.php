<?php
session_start();
require_once '../includes/connexion.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

// Récupérer les prix depuis la base de données
$sql = "SELECT p.*, c.nom as culture_nom
FROM prix_marche p
JOIN cultures c ON p.culture_id = c.id
ORDER BY p.date_mise_a_jour DESC";
$result = mysqli_query($connexion, $sql);
$prix = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Icônes par culture
$icones = [
'Mil' => '🌾',
'Arachide' => '🥜',
'Maïs' => '🌽',
'Riz' => '🍚',
'Niébé' => '🫘',
'Sorgho' => '🌿',
];
?>

<section class="py-5">
<div class="container">
<div class="section-title">
<h2><i class="fas fa-chart-line me-2"></i>Prix du Marché</h2>
<div class="underline"></div>
<p>Prix actuels des cultures sur les marchés sénégalais</p>
</div>

<div class="row g-4">
<?php foreach($prix as $item):
$icone = $icones[$item['culture_nom']] ?? '🌱';
$prix_val = $item['prix_kg'];
?>
<div class="col-md-6 col-lg-4">
<div class="card p-4">
<div class="d-flex align-items-center mb-3">
<span style="font-size: 2rem;"><?php echo $icone; ?></span>
<div class="ms-3">
<h5 class="fw-bold mb-0"><?php echo $item['culture_nom']; ?></h5>
<small class="text-muted">
<i class="fas fa-map-marker-alt me-1"></i>
<?php echo $item['marche']; ?> — <?php echo $item['region']; ?>
</small>
</div>
</div>
<div class="d-flex justify-content-between align-items-center">
<div>
<h3 class="fw-bold mb-0" style="color: var(--vert-principal);">
<?php echo number_format($prix_val, 0, ',', ' '); ?> FCFA
</h3>
<small class="text-muted">par kilogramme</small>
</div>
<div>
<span class="badge bg-warning text-dark">
<i class="fas fa-minus me-1"></i>Stable
</span>
</div>
</div>
<small class="text-muted mt-2 d-block">
<i class="fas fa-clock me-1"></i>
Mis à jour le <?php echo date('d/m/Y', strtotime($item['date_mise_a_jour'])); ?>
</small>
</div>
</div>
<?php endforeach; ?>
</div>

<div class="alert alert-info mt-4">
<i class="fas fa-info-circle me-2"></i>
Les prix sont mis à jour quotidiennement. Dernière mise à jour : <?php echo date('d/m/Y'); ?>
</div>
</div>
</section>

<?php require_once '../includes/footer.php'; ?>