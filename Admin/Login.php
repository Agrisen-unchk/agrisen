
<?php
session_start();

if (isset($_SESSION['admin'])) {
    header('Location: /admin/index.php');
    exit();
}

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'agrisen2026') {
        $_SESSION['admin'] = true;
        header('Location: /admin/index.php');
        exit();
    } else {
        $erreur = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — AgriSen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #2E7D32, #4CAF50); min-height: 100vh; display: flex; align-items: center; }
        .card { border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-seedling fa-3x" style="color: #2E7D32;"></i>
                        <h3 class="fw-bold mt-2" style="color: #2E7D32;">Administration</h3>
                        <p class="text-muted">AgriSen — Espace Admin</p>
                    </div>
                    <?php if($erreur): ?>
                        <div class="alert alert-danger"><?php echo $erreur; ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nom d'utilisateur</label>
                            <input type="text" name="username" class="form-control" placeholder="admin" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Mot de passe</label>
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                        </div>
                        <button type="submit" class="btn w-100 py-3 text-white fw-bold" style="background: linear-gradient(135deg, #2E7D32, #4CAF50); border-radius: 25px;">
                            <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
