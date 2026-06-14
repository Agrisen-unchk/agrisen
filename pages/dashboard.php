<?php
session_start();
require_once '../includes/connexion.php';

if (!isset($_SESSION['utilisateur'])) {
    header('Location: /pages/connexion.php');
    exit();
}

$prenom = $_SESSION['utilisateur']['prenom'];
$region = $_SESSION['utilisateur']['region'];

require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>

<section class="py-5">
    <div class="container">
        <div class="card p-4 mb-4" style="background: linear-gradient(135deg, var(--vert-principal), var(--vert-clair)); color: white; border-radius: 15px;">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="fw-bold mb-1">Bonjour, <?php echo $prenom; ?> 👋</h4>
                    <p class="mb-0 opacity-75">Région : <?php echo $region; ?> — Bonne journée !</p>
                </div>
                <div class="col-auto">
                    <i class="fas fa-seedling fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <a href="/pages/meteo.php" class="text-decoration-none">
                    <div class="card text-center p-4 h-100">
                        <div class="card-icon meteo"><i class="fas fa-cloud-sun"></i></div>
                        <h5 class="fw-bold mt-2">Météo</h5>
                        <p class="text-muted small">Prévisions pour votre région</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="/pages/marche.php" class="text-decoration-none">
                    <div class="card text-center p-4 h-100">
                        <div class="card-icon marche"><i class="fas fa-chart-line"></i></div>
                        <h5 class="fw-bold mt-2">Marché</h5>
                        <p class="text-muted small">Prix actuels des cultures</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="/pages/calendrier.php" class="text-decoration-none">
                    <div class="card text-center p-4 h-100">
                        <div class="card-icon calendrier"><i class="fas fa-calendar-alt"></i></div>
                        <h5 class="fw-bold mt-2">Calendrier</h5>
                        <p class="text-muted small">Périodes de semis et récolte</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="/pages/conseils.php" class="text-decoration-none">
                    <div class="card text-center p-4 h-100">
                        <div class="card-icon conseils"><i class="fas fa-lightbulb"></i></div>
                        <h5 class="fw-bold mt-2">Conseils</h5>
                        <p class="text-muted small">Recommandations agricoles</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
<?php
session_start();
require_once '../includes/connexion.php';

if (!isset($_SESSION['utilisateur'])) {
    header('Location: /pages/connexion.php');
    exit();
}

$prenom = $_SESSION['utilisateur']['prenom'];
$region = $_SESSION['utilisateur']['region'];

require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>

<section class="py-5">
    <div class="container">
        <div class="card p-4 mb-4" style="background: linear-gradient(135deg, var(--vert-principal), var(--vert-clair)); color: white; border-radius: 15px;">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="fw-bold mb-1">Bonjour, <?php echo $prenom; ?> 👋</h4>
                    <p class="mb-0 opacity-75">Région : <?php echo $region; ?> — Bonne journée !</p>
                </div>
                <div class="col-auto">
                    <i class="fas fa-seedling fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <a href="/pages/meteo.php" class="text-decoration-none">
                    <div class="card text-center p-4 h-100">
                        <div class="card-icon meteo"><i class="fas fa-cloud-sun"></i></div>
                        <h5 class="fw-bold mt-2">Météo</h5>
                        <p class="text-muted small">Prévisions pour votre région</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="/pages/marche.php" class="text-decoration-none">
                    <div class="card text-center p-4 h-100">
                        <div class="card-icon marche"><i class="fas fa-chart-line"></i></div>
                        <h5 class="fw-bold mt-2">Marché</h5>
                        <p class="text-muted small">Prix actuels des cultures</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="/pages/calendrier.php" class="text-decoration-none">
                    <div class="card text-center p-4 h-100">
                        <div class="card-icon calendrier"><i class="fas fa-calendar-alt"></i></div>
                        <h5 class="fw-bold mt-2">Calendrier</h5>
                        <p class="text-muted small">Périodes de semis et récolte</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="/pages/conseils.php" class="text-decoration-none">
                    <div class="card text-center p-4 h-100">
                        <div class="card-icon conseils"><i class="fas fa-lightbulb"></i></div>
                        <h5 class="fw-bold mt-2">Conseils</h5>
                        <p class="text-muted small">Recommandations agricoles</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>

