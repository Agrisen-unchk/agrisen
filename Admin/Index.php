
<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: /admin/login.php');
    exit();
}

require_once '../includes/connexion.php';

$total_users = mysqli_fetch_assoc(mysqli_query($connexion, "SELECT COUNT(*) as total FROM utilisateurs"))['total'];
$total_regions = mysqli_fetch_assoc(mysqli_query($connexion, "SELECT COUNT(DISTINCT region) as total FROM utilisateurs"))['total'];
$dernier_inscrit = mysqli_fetch_assoc(mysqli_query($connexion, "SELECT nom, prenom, date_inscription FROM utilisateurs ORDER BY date_inscription DESC LIMIT 1"));
$utilisateurs = mysqli_fetch_all(mysqli_query($connexion, "SELECT * FROM utilisateurs ORDER BY date_inscription DESC"), MYSQLI_ASSOC);
$stats_regions = mysqli_fetch_all(mysqli_query($connexion, "SELECT region, COUNT(*) as total FROM utilisateurs GROUP BY region ORDER BY total DESC"), MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration — AgriSen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #F5F5F5; }
        .navbar-admin { background: linear-gradient(135deg, #1B5E20, #2E7D32); }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        .stat-card { border-left: 5px solid #4CAF50; }
        .table th { background: #2E7D32; color: white; }
        .badge-region { background: #E8F5E9; color: #2E7D32; font-weight: 600; padding: 5px 10px; border-radius: 20px; font-size: 0.8rem; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark navbar-admin px-4 py-3">
    <span class="navbar-brand fw-bold fs-5">
        <i class="fas fa-seedling me-2"></i>AgriSen — Administration
    </span>
    <div class="d-flex align-items-center gap-3">
        <a href="/" class="btn btn-outline-light btn-sm">
            <i class="fas fa-home me-1"></i>Voir le site
        </a>
        <a href="/admin/deconnexion.php" class="btn btn-danger btn-sm">
            <i class="fas fa-sign-out-alt me-1"></i>Déconnexion
        </a>
    </div>
</nav>

<div class="container py-5">
    <div class="mb-4">
        <h4 class="fw-bold" style="color: #2E7D32;">Tableau de bord</h4>
        <p class="text-muted">Gestion des utilisateurs inscrits sur AgriSen</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card p-4 stat-card">
                <div class="d-flex align-items-center">
                    <div style="width:55px; height:55px; border-radius:50%; background:#E8F5E9; display:flex; align-items:center; justify-content:center;">
                        <i class="fas fa-users" style="color:#2E7D32; font-size:1.4rem;"></i>
                    </div>
                    <div class="ms-3">
                        <h2 class="fw-bold mb-0" style="color:#2E7D32;"><?php echo $total_users; ?></h2>
                        <p class="text-muted mb-0 small">Utilisateurs inscrits</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 stat-card">
                <div class="d-flex align-items-center">
                    <div style="width:55px; height:55px; border-radius:50%; background:#E8F5E9; display:flex; align-items:center; justify-content:center;">
                        <i class="fas fa-map-marker-alt" style="color:#2E7D32; font-size:1.4rem;"></i>
                    </div>
                    <div class="ms-3">
                        <h2 class="fw-bold mb-0" style="color:#2E7D32;"><?php echo $total_regions; ?></h2>
                        <p class="text-muted mb-0 small">Régions représentées</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 stat-card">
                <div class="d-flex align-items-center">
                    <div style="width:55px; height:55px; border-radius:50%; background:#E8F5E9; display:flex; align-items:center; justify-content:center;">
                        <i class="fas fa-user-plus" style="color:#2E7D32; font-size:1.4rem;"></i>
                    </div>
                    <div class="ms-3">
                        <?php if($dernier_inscrit): ?>
                            <h6 class="fw-bold mb-0" style="color:#2E7D32;"><?php echo $dernier_inscrit['prenom'].' '.$dernier_inscrit['nom']; ?></h6>
                            <p class="text-muted mb-0 small">Dernier inscrit — <?php echo date('d/m/Y', strtotime($dernier_inscrit['date_inscription'])); ?></p>
                        <?php else: ?>
                            <h6 class="fw-bold mb-0">Aucun inscrit</h6>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card p-4">
                <h5 class="fw-bold mb-4" style="color:#2E7D32;">
                    <i class="fas fa-list me-2"></i>Liste des utilisateurs
                </h5>
                <?php if(count($utilisateurs) === 0): ?>
                    <div class="alert alert-info">Aucun utilisateur inscrit pour le moment.</div>
                <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom complet</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Région</th>
                                <th>Inscrit le</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($utilisateurs as $i => $user): ?>
                                <tr>
                                    <td><?php echo $i + 1; ?></td>
                                    <td class="fw-bold"><?php echo $user['prenom'].' '.$user['nom']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['telephone'] ?: '—'; ?></td>
                                    <td><span class="badge-region"><?php echo $user['region']; ?></span></td>
                                    <td><?php echo date('d/m/Y', strtotime($user['date_inscription'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card p-4">
                <h5 class="fw-bold mb-4" style="color:#2E7D32;">
                    <i class="fas fa-chart-bar me-2"></i>Par région
                </h5>
                <?php foreach($stats_regions as $stat): ?>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small fw-bold"><?php echo $stat['region']; ?></span>
                            <span class="small text-muted"><?php echo $stat['total']; ?> inscrit(s)</span>
                        </div>
                        <div class="progress" style="height: 8px; border-radius: 10px;">
                            <div class="progress-bar" style="width: <?php echo ($stat['total'] / max(1, $total_users)) * 100; ?>%; background: linear-gradient(135deg, #2E7D32, #4CAF50); border-radius: 10px;"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
