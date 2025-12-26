<?php
require_once 'classes/Utilisateur.php';

$erreurs = [];
$nom = $email = $role = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $role = $_POST['role'] ?? '';

   

    if (empty($nom)) {
        $erreurs['nom'] = "Le nom est obligatoire.";
    }

    if (empty($email)) {
        $erreurs['email'] = "L’email est obligatoire.";
    }

    if (empty($password)) {
        $erreurs['password'] = "Le mot de passe est obligatoire.";
    }

    if (empty($confirm_password)) {
        $erreurs['confirm_password'] = "Veuillez confirmer le mot de passe.";
    }

   
    if (!empty($email) && !preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
        $erreurs['email'] = "Format de l’email invalide.";
    }

  
    if (!empty($password) && !preg_match('/^(?=.*[A-Za-z])(?=.*\d).{8,}$/', $password)) {
        $erreurs['password'] = "Le mot de passe doit contenir au moins 8 caractères, une lettre et un chiffre.";
    }

    
    if ($password !== $confirm_password) {
        $erreurs['confirm_password'] = "Les mots de passe ne correspondent pas.";
    }

    if (empty($erreurs)) {

        
        $motPasseHash = password_hash($password, PASSWORD_DEFAULT);

      
        $approuve = ($role === 'guide') ? 'non approuvé' : 'approuvé';

        
        $utilisateur = new Utilisateur(
            $nom,
            $email,
            $role,
            $motPasseHash,
            'actif',
            $approuve
        );

        
        $utilisateur->creer();

        // Redirection
        header('Location: login.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-xl max-w-md w-full shadow-lg">

    <h2 class="text-2xl font-bold text-center mb-6">Inscription</h2>

    <form method="post">

        <!-- Nom -->
        <label>Nom</label>
        <input type="text" name="nom" class="w-full border p-3 mb-1"
               value="<?= htmlspecialchars($nom) ?>">
        <?php if (isset($erreurs['nom'])): ?>
            <p class="text-red-500 text-sm mb-3"><?= $erreurs['nom'] ?></p>
        <?php endif; ?>

        <!-- Email -->
        <label>Email</label>
        <input type="text" name="email" class="w-full border p-3 mb-1"
               value="<?= htmlspecialchars($email) ?>">
        <?php if (isset($erreurs['email'])): ?>
            <p class="text-red-500 text-sm mb-3"><?= $erreurs['email'] ?></p>
        <?php endif; ?>

        <!-- Mot de passe -->
        <label>Mot de passe</label>
        <input type="password" name="password" class="w-full border p-3 mb-1">
        <?php if (isset($erreurs['password'])): ?>
            <p class="text-red-500 text-sm mb-3"><?= $erreurs['password'] ?></p>
        <?php endif; ?>

        <!-- Confirmation -->
        <label>Confirmer le mot de passe</label>
        <input type="password" name="confirm_password" class="w-full border p-3 mb-1">
        <?php if (isset($erreurs['confirm_password'])): ?>
            <p class="text-red-500 text-sm mb-3"><?= $erreurs['confirm_password'] ?></p>
        <?php endif; ?>

        <!-- Rôle -->
        <label>Rôle</label>
        <select name="role" class="w-full border p-3 mb-6">
            <option value="visiteur" <?= $role === 'visiteur' ? 'selected' : '' ?>>Visiteur</option>
            <option value="guide" <?= $role === 'guide' ? 'selected' : '' ?>>Guide</option>
        </select>

        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg">
            S'inscrire
        </button>

    </form>
</div>

</body>
</html>
