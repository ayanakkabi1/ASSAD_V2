<?php
session_start();
require_once 'classes/Utilisateur.php';

$erreur = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $userData = Utilisateur::trouverParEmail($email);

    if ($userData) {
     
        if (password_verify($password, $userData['motpasse_hash'])) {

            if ($userData['role'] === 'guide' && $userData['approuve'] !== 'approuvé') {
                $erreur = "Votre compte guide n'est pas encore approuvé par l'admin.";
            } 
            else {
                 
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['nom'] = $userData['nom'];
                $_SESSION['role'] = $userData['role'];

                
                if ($userData['role'] === 'admin') {
                    header("Location: dashboard_admin.php");
                } elseif ($userData['role'] === 'guide') {
                    header("Location: dashboard_guide.php");
                } else {
                    header("Location: dashboard_visiteur.php");
                }
                exit();
            }
        } else {
            $erreur = "Email ou mot de passe incorrect.";
        }
    } else {
        $erreur = "Email ou mot de passe incorrect."; 
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Zoo ASSAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center text-green-700">Connexion</h2>
        
        <?php if ($erreur): ?>
            <div class="bg-red-100 text-red-700 p-2 mb-4 text-sm rounded"><?= $erreur ?></div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2 focus:ring-green-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Mot de passe</label>
                <input type="password" name="password" class="w-full border rounded p-2 focus:ring-green-500" required>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Se connecter</button>
        </form>
    </div>
</body>
</html>