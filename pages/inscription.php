
<?php
session_start();
require_once '../includes/connexion.php';

$erreur = '';
$succes = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nom = trim($_POST['nom']);
$prenom = trim($_POST['prenom']);
$email = trim($_POST['email']);
$telephone = trim($_POST['telephone']);
$region = trim($_POST['region']);
$mot_de_passe = $_POST['mot_de_passe'];
$confirmation = $_POST['confirmation'];

if (empty($nom) || empty($prenom) || empty($email) || empty($region) || empty($mot_de_passe)) {
$erreur = "Veuillez remplir tous les champs obligatoires.";
} elseif ($mot_de_passe !== $confirmation) {
$erreur = "Les mots de passe ne correspondent pas.";
} elseif (strlen($mot_de_passe) < 6) {
$erreur = "Le mot de passe doit contenir au moins 6 caractères.";
} else {
$check = mysqli_query($connexion, "SELECT id FROM utilisateurs WHERE email = '$email'");
if (mysqli_num_rows($check) > 0) {
$erreur = "Cet email est déjà utilisé.";
} else {
$hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
$sql = "INSERT INTO utilisateurs (nom, prenom, email, telephone, region, mot_de_passe)
VALUES ('$nom', '$prenom', '$email', '$telephone', '$region', '$hash')";
if (mysqli_query($connexion, $sql)) {
$succes = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
} else {
$erreur = "Une erreur est survenue. Veuillez réessayer.";
}
}
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
<i class="fas fa-seedling fa-3x" style="color: var(--vert-principal);"></i>
<h3 class="fw-bold mt-2" style="color: var(--vert-principal);">Créer un compte</h3>
<p class="text-muted">Rejoignez la communauté AgriSen</p>
</div>
<?php if($erreur): ?>
<div class="alert alert-danger">
<i class="fas fa-exclamation-circle me-2"></i><?php echo $erreur; ?>
</div>
<?php endif; ?>
<?php if($succes): ?>
<div class="alert alert-success">
<i class="fas fa-check-circle me-2"></i><?php echo $succes; ?>
<br><a href="/pages/connexion.php" class="fw-bold">Se connecter maintenant</a>
</div>
<?php endif; ?>
<form method="POST">
<div class="row g-3">
<div class="col-md-6">
<label class="form-label">Nom *</label>
<input type="text" name="nom" class="form-control" placeholder="Votre nom" required>
</div>
<div class="col-md-6">
<label class="form-label">Prénom *</label>
<input type="text" name="prenom" class="form-control" placeholder="Votre prénom" required>
</div>
<div class="col-12">
<label class="form-label">Email *</label>
<input type="email" name="email" class="form-control" placeholder="votre@email.com" required>
</div>
<div class="col-md-6">
<label class="form-label">Téléphone</label>
<input type="tel" name="telephone" class="form-control" placeholder="+221 XX XXX XX XX">
</div>
<div class="col-md-6">
<label class="form-label">Région *</label>
<select name="region" class="form-control" required>
<option value="">-- Choisir --</option>
<option>Dakar</option>
<option>Thiès</option>
<option>Diourbel</option>
<option>Fatick</option>
<option>Kaolack</option>
<option>Kaffrine</option>
<option>Saint-Louis</option>
<option>Louga</option>
<option>Matam</option>
<option>Tambacounda</option>
<option>Kédougou</option>
<option>Kolda</option>
<option>Ziguinchor</option>
<option>Sédhiou</option>
</select>
</div>
<div class="col-12">
<label class="form-label">Mot de passe *</label>
<input type="password" name="mot_de_passe" class="form-control" placeholder="Minimum 6 caractères" required>
</div>
<div class="col-12">
<label class="form-label">Confirmer le mot de passe *</label>
<input type="password" name="confirmation" class="form-control" placeholder="Répétez votre mot de passe" required>
</div>
<div class="col-12 mt-2">
<button type="submit" class="btn btn-agrisen w-100 py-3">
<i class="fas fa-user-plus me-2"></i>Créer mon compte
</button>
</div>
</div>
</form>
<p class="text-center mt-3 text-muted">
Déjà inscrit ?
<a href="/pages/connexion.php" style="color: var(--vert-principal); font-weight: 600;">
Se connecter
</a>
</p>
</div>
</div>
</div>
</div>
</section>

<?php require_once '../includes/footer.php'; ?>
