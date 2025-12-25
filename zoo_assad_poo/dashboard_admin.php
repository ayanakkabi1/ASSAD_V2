<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: connexion.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-4xl mx-auto py-10">

        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">
            Tableau de bord - Administrateur
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Gestion des animaux -->
            <a href="admin_animaux.php"
               class="block bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                <h2 class="text-xl font-semibold text-orange-600 mb-2">
                    🐾 Gestion des animaux
                </h2>

                <p class="text-gray-600">
                    Ajouter, modifier ou supprimer des animaux.
                </p>
            </a>

            <!-- Gestion des habitats -->
            <a href="admin_habitats.php"
               class="block bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                <h2 class="text-xl font-semibold text-green-600 mb-2">
                    🌿 Gestion des habitats
                </h2>

                <p class="text-gray-600">
                    Ajouter, modifier ou supprimer des habitats.
                </p>
            </a>

        </div>

        <!-- Déconnexion -->
        <div class="text-center mt-10">
            <a href="logout.php"
               class="inline-block bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition">
                Se déconnecter
            </a>
        </div>

    </div>

</body>
</html>
