
<?php
session_start();
require_once '../includes/connexion.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

$sql = "SELECT cal.*, c.nom as culture_nom FROM calendrier cal JOIN cultures c ON cal.culture_id = c.id ORDER BY c.nom ASC";
$result = mysqli_query($connexion, $sql);
$calendrier = mysqli_fetch_all($result, MYSQLI_ASSOC);
$icones = ['Mil' => '🌾', 'Arachide' => '🥜', 'Maïs' => '🌽', 'Riz' => '🍚', 'Niébé' => '🫘', 'Sorgho' => '🌿'];
?>

<section class="py-5">
    <div class="container">
        <div class="section-title">
            <h2><i class="fas fa-calendar-alt me-2"></i>Calendrier Agricole</h2>
            <div class="underline"></div>
            <p>Périodes de semis et de récolte des principales cultures sénégalaises</p>
        </div>
        <div class="row g-4">
            <?php foreach($calendrier as $item):
                $icone = $icones[$item['culture_nom']] ?? '🌱';
            ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <span style="font-size: 2rem;"><?php echo $icone; ?></span>
                            <div class="ms-3">
                                <h5 class="fw-bold mb-0"><?php echo $item['culture_nom']; ?></h5>
                                <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i><?php echo $item['region']; ?></small>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <div class="p-2 rounded text-center" style="background: #E8F5E9;">
                                    <small class="text-muted d-block">🌱 Semis</small>
                                    <strong style="color: var(--vert-principal); font-size: 0.85rem;"><?php echo $item['periode_semis']; ?></strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-2 rounded text-center" style="background: #FFF8E1;">
                                    <small class="text-muted d-block">🌾 Récolte</small>
                                    <strong style="color: #F57F17; font-size: 0.85rem;"><?php echo $item['periode_recolte']; ?></strong>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted small mt-2 mb-0">
                            <i class="fas fa-lightbulb me-1" style="color: var(--jaune);"></i><?php echo $item['conseils']; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
