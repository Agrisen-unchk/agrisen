<?php
session_start();
require_once '../includes/connexion.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

if (isset($_GET['region'])) {
    $region = $_GET['region'];
} elseif (isset($_SESSION['utilisateur'])) {
    $region = $_SESSION['utilisateur']['region'];
} else {
    $region = 'Dakar';
}

$villes = [
    'Dakar' => 'Dakar', 'Thiès' => 'Thies', 'Diourbel' => 'Diourbel',
    'Fatick' => 'Fatick', 'Kaolack' => 'Kaolack', 'Kaffrine' => 'Kaffrine',
    'Saint-Louis' => 'Saint-Louis', 'Louga' => 'Louga', 'Matam' => 'Matam',
    'Tambacounda' => 'Tambacounda', 'Kédougou' => 'Kedougou',
    'Kolda' => 'Kolda', 'Ziguinchor' => 'Ziguinchor', 'Sédhiou' => 'Sedhiou'
];

$jours_fr = [
    'Monday' => 'Lundi', 'Tuesday' => 'Mardi', 'Wednesday' => 'Mercredi',
    'Thursday' => 'Jeudi', 'Friday' => 'Vendredi', 'Saturday' => 'Samedi',
    'Sunday' => 'Dimanche'
];

$ville = $villes[$region] ?? 'Dakar';
$api_key = 'a0bf74dd00300fff934005bef205cc04';
$url = "https://api.openweathermap.org/data/2.5/forecast?q={$ville},SN&appid={$api_key}&units=metric&lang=fr&cnt=40";

$meteo = null;
$erreur_meteo = false;
$response = @file_get_contents($url);
if ($response) {
    $meteo = json_decode($response, true);
    if (!isset($meteo['list'])) $erreur_meteo = true;
} else {
    $erreur_meteo = true;
}

$previsions = [];
if ($meteo && !$erreur_meteo) {
    foreach ($meteo['list'] as $item) {
        $date = date('Y-m-d', strtotime($item['dt_txt']));
        if (!isset($previsions[$date])) $previsions[$date] = $item;
    }
    $previsions = array_values($previsions);
}
?>

<section class="py-5">
    <div class="container">
        <div class="section-title">
            <h2><i class="fas fa-cloud-sun me-2"></i>Météo Agricole</h2>
            <div class="underline"></div>
            <p>Prévisions météorologiques pour <strong><?php echo $region; ?></strong></p>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <div class="card p-3">
                    <label class="form-label fw-bold">Changer de région</label>
                    <select class="form-control" onchange="window.location.href='?region='+this.value">
                        <?php foreach($villes as $nom => $code): ?>
                            <option value="<?php echo $nom; ?>" <?php echo $region === $nom ? 'selected' : ''; ?>>
                                <?php echo $nom; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <?php if($erreur_meteo): ?>
            <div class="alert alert-warning text-center">
                <i class="fas fa-exclamation-triangle me-2"></i>Impossible de charger les données météo.
            </div>
        <?php else: ?>
            <div class="row g-4 justify-content-center">
                <?php foreach(array_slice($previsions, 0, 5) as $i => $jour):
                    $nom_jour = $i === 0 ? "Aujourd'hui" : $jours_fr[date('l', strtotime($jour['dt_txt']))];
                ?>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card text-center p-3">
                            <p class="fw-bold small mb-2"><?php echo $nom_jour; ?></p>
                            <img src="https://openweathermap.org/img/wn/<?php echo $jour['weather'][0]['icon']; ?>@2x.png" width="60" style="margin: 0 auto;">
                            <h4 class="fw-bold" style="color: var(--vert-principal);"><?php echo round($jour['main']['temp']); ?>°C</h4>
                            <p class="text-muted small"><?php echo ucfirst($jour['weather'][0]['description']); ?></p>
                            <small class="text-muted"><i class="fas fa-tint"></i> <?php echo $jour['main']['humidity']; ?>%</small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="row g-4 mt-4">
            <div class="col-12">
                <div class="card p-4" style="background: var(--vert-tres-clair);">
                    <h5 class="fw-bold" style="color: var(--vert-principal);"><i class="fas fa-lightbulb me-2"></i>Conseils du jour</h5>
                    <div class="row g-3 mt-1">
                        <div class="col-md-4"><p><i class="fas fa-check-circle me-2" style="color: var(--vert-clair);"></i>Arrosez tôt le matin pour limiter l'évaporation.</p></div>
                        <div class="col-md-4"><p><i class="fas fa-check-circle me-2" style="color: var(--vert-clair);"></i>Protégez vos cultures des fortes chaleurs.</p></div>
                        <div class="col-md-4"><p><i class="fas fa-check-circle me-2" style="color: var(--vert-clair);"></i>Vérifiez l'humidité du sol avant d'irriguer.</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>

