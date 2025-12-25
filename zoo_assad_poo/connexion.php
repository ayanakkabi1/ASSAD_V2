<?php
session_start();

require_once 'classes/Utilisateur.php';

$erreur = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $motPasse = $_POST['mot_passe'] ?? '';

    if ($email === '' || $motPasse === '') {
        $erreur = "Tous les champs sont obligatoires.";
    } else {

        $utilisateurRepo = new Utilisateur('', '', '', '', '', '');

        $utilisateur = $utilisateurRepo->trouverParEmail($email);

        if (!$utilisateur) {
            $erreur = "Email introuvable.";
        }
        elseif (!$utilisateur->verifierMotDePasse($motPasse,$hashStocke)) {
            $erreur = "Mot de passe incorrect.";
        }
        elseif ($utilisateur->getApprouve() !== 'approuvé') {
            $erreur = "Votre compte n'est pas encore approuvé.";
        }
        else {

            
            $_SESSION['user'] = [
                'email' => $utilisateur->getEmail(),
                'role'  => $utilisateur->getRole()
            ];

           
            if ($utilisateur->getRole() === 'admin') {
                header('Location: dashboard_admin.php');
            } elseif ($utilisateur->getRole() === 'guide') {
                header('Location: dashboard_guide.php');
            } else {
                header('Location: dashboard_visiteur.php');
            }

            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Connexion
        </h2>
       

        <form action="connexion.php" method="POST" class="space-y-5">

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="exemple@email.com"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                >
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="mot_passe" class="block text-sm font-medium text-gray-700 mb-1">
                    Mot de passe
                </label>
                <input
                    type="password"
                    name="mot_passe"
                    id="mot_passe"
                    
                    placeholder="Votre mot de passe"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                >
            </div>

            <!-- Bouton -->
            <button
                type="submit"
                class="w-full bg-orange-500 text-white py-2 rounded-lg font-semibold hover:bg-orange-600 transition"
            >
                Se connecter
            </button>

        </form>

    </div>

</body>
</html>