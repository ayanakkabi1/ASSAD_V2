<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<?php
// PHP peut être utilisé ici PLUS TARD
// ex: traitement du formulaire
?>

<div class="bg-white p-8 rounded-xl max-w-md w-full shadow-lg">

    <h2 class="text-2xl font-bold text-center mb-6">Inscription</h2>

    <form method="post">

        <label>Nom</label>
        <input type="text" name="nom" class="w-full border p-3 mb-4">

        <label>Email</label>
        <input type="email" name="email" class="w-full border p-3 mb-4">

        <label>Mot de passe</label>
        <input type="password" name="password" class="w-full border p-3 mb-4">

        <label>Confirmer le mot de passe</label>
        <input type="password" name="confirm_password" class="w-full border p-3 mb-4">

        <label>Rôle</label>
        <select name="role" class="w-full border p-3 mb-6">
            <option value="visiteur">Visiteur</option>
            <option value="guide">Guide</option>
        </select>

        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg">
            S'inscrire
        </button>

    </form>
</div>

</body>
</html>
