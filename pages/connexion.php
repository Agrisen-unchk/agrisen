<?php
session_start();
require_once '../includes/connexion.php';

if (isset($_SESSION['utilisateur'])) {
    header('Location: /pages/dashboard.php');
    exit();
}

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];

    if (empty($email) || empty($mot_de_passe)) {
        $erreur = "Veuillez remplir tous les champs.";
    } else {
        $sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
        $result = mysqli_query($connexion, $sql);
        if (mysqli_num_rows($result) === 1) {
            $utilisateur = mysqli_fetch_assoc($result);
            if (password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
                $_SESSION['utilisateur'] = [
                    'id'     => $utilisateur['id'],
                    'nom'    => $utilisateur['nom'],
                    'prenom' => $utilisateur['prenom'],
                    'email'  => $utilisateur['email'],
                    'region' => $utilisateur['region'],
                ];
                header('Location: /pages/dashboard.php');
                exit();
            } else {
                $erreur = "Mot de passe incorrect.";
            }
        } else {
            $erreur = "Aucun compte trouvé avec cet email.";
        }
    }
}

require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-seedling fa-3x" style="color: var(--vert-principal);"></i>
                        <h3 class="fw-bold mt-2" style="color: var(--vert-principal);">Connexion</h3>
                        <p class="text-muted">Accédez à votre espace AgriSen</p>
                    </div>
                    <?php if($erreur): ?>
                        <div class="alert alert-danger"><i class="fas fa-exclamation-circle me-2"></i><?php echo $erreur; ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email *</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background: var(--vert-tres-clair);">
                                    <i class="fas fa-envelope" style="color: var(--vert-principal);"></i>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="votre@email.com" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Mot de passe *</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background: var(--vert-tres-clair);">
                                    <i class="fas fa-lock" style="color: var(--vert-principal);"></i>
                                </span>
                                <input type="password" name="mot_de_passe" id="motDePasse" class="form-control" placeholder="Votre mot de passe" required>
                                <span class="input-group-text" style="cursor:pointer;" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-agrisen w-100 py-3">
                            <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                        </button>
                    </form>
                    <p class="text-center mt-3 text-muted">
                        Pas encore de compte ?
                        <a href="/pages/inscription.php" style="color: var(--vert-principal); font-weight: 600;">S'inscrire gratuitement</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function togglePassword() {
    const input = document.getElementById('motDePasse');
    const icon = document.getElementById('eyeIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>

<?php require_once '../includes/footer.php'; ?>
