<?php
session_start();
require_once '../includes/connexion.php';

if (!isset($_SESSION['utilisateur'])) {
header('Location: /agrisen/pages/connexion.php');
exit();
}

$utilisateur = $_SESSION['utilisateur'];
$succes = '';
$erreur = '';

// Mise à jour du profil
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nom = trim($_POST['nom']);
$prenom = trim($_POST['prenom']);
$telephone = trim($_POST['telephone']);
$region = trim($_POST['region']);

$sql = "UPDATE utilisateurs SET nom='$nom', prenom='$prenom', telephone='$telephone', region='$region' WHERE id={$utilisateur['id']}";

if (mysqli_query($connexion, $sql)) {
$_SESSION['utilisateur']['nom'] = $nom;
$_SESSION['utilisateur']['prenom'] = $prenom;
$_SESSION['utilisateur']['region'] = $region;
$succes = "Profil mis à jour avec succès !";
} else {
$erreur = "Une erreur est survenue.";
}
}

require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>

<section class="py-5">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 col-lg-6">
<div class="card p-4 p-md-5">

<div class="text-center mb-4">
<div style="width:80px; height:80px; border-radius:50%; background: var(--vert-tres-clair); display:flex; align-items:center; justify-content:center; margin: 0 auto 15px;">
<i class="fas fa-user fa-2x" style="color: var(--vert-principal);"></i>
</div>
<h4 class="fw-bold" style="color: var(--vert-principal);">Mon Profil</h4>
<p class="text-muted"><?php echo $utilisateur['email']; ?></p>
</div>

<?php if($succes): ?>
<div class="alert alert-success"><i class="fas fa-check-circle me-2"></i><?php echo $succes; ?></div>
<?php endif; ?>
<?php if($erreur): ?>
<div class="alert alert-danger"><i class="fas fa-exclamation-circle me-2"></i><?php echo $erreur; ?></div>
<?php endif; ?>

<form method="POST">
<div class="row g-3">
<div class="col-md-6">
<label class="form-label">Nom</label>
<input type="text" name="nom" class="form-control" value="<?php echo $utilisateur['nom']; ?>" required>
</div>
<div class="col-md-6">
<label class="form-label">Prénom</label>
<input type="text" name="prenom" class="form-control" value="<?php echo $utilisateur['prenom']; ?>" required>
</div>
<div class="col-12">
<label class="form-label">Téléphone</label>
<input type="tel" name="telephone" class="form-control" value="<?php echo $utilisateur['telephone'] ?? ''; ?>">
</div>
<div class="col-12">
<label class="form-label">Région</label>
<select name="region" class="form-control">
<?php
$regions = ['Dakar','Thiès','Diourbel','Fatick','Kaolack','Kaffrine','Saint-Louis','Louga','Matam','Tambacounda','Kédougou','Kolda','Ziguinchor','Sédhiou'];
foreach($regions as $r): ?>
<option <?php echo $utilisateur['region'] === $r ? 'selected' : ''; ?>>
<?php echo $r; ?>
</option>
<?php endforeach; ?>
</select>
</div>
<div class="col-12 mt-2">
<button type="submit" class="btn btn-agrisen w-100 py-3">
<i class="fas fa-save me-2"></i>Enregistrer les modifications
</button>
</div>
</div>
</form>

<div class="text-center mt-3">
<a href="/agrisen/pages/deconnexion.php" class="text-danger">
<i class="fas fa-sign-out-alt me-1"></i>Se déconnecter
</a>
</div>
</div>
</div>
</div>
</div>
</section>

<?php require_once '../includes/footer.php'; ?>