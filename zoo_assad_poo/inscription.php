<?php
require_once 'classes/Utilisateur.php';

$erreurs = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $role = $_POST['role'] ?? '';

    // Validations [cite: 59, 60, 61, 62]
    if (empty($nom)) $erreurs['nom'] = "Le nom est requis.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $erreurs['email'] = "Email invalide.";
    
    $password_regex = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
    if (!preg_match($password_regex, $password)) {
        $erreurs['password'] = "Minimum 8 caractères, une lettre et un chiffre.";
    }
    if ($password !== $confirm_password) $erreurs['confirm_password'] = "Les mots de passe diffèrent.";
    if (empty($role)) $erreurs['role'] = "Sélectionnez un rôle.";

    if (empty($erreurs)) {
        $hash = password_hash($password, PASSWORD_BCRYPT); // [cite: 63]
        $approuve = ($role === 'guide') ? 'non approuvé' : 'approuvé'; // [cite: 64]

        $user = new Utilisateur($nom, $email, $role, $hash, 'actif', $approuve);
        if ($user->creer()) { // [cite: 68]
            $success = "Compte créé avec succès !";
        } else {
            $erreurs['general'] = "Erreur lors de l'enregistrement.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Zoo ASSAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-green-700 mb-6">Rejoindre le Zoo ASSAD</h1>

        <?php if ($success): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nom complet</label>
                <input type="text" name="nom" value="<?= htmlspecialchars($nom ?? '') ?>" 
                       class="mt-1 block w-full px-3 py-2 border <?= isset($erreurs['nom']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                <?php if (isset($erreurs['nom'])): ?>
                    <p class="text-red-500 text-xs mt-1"><?= $erreurs['nom'] ?></p> <?php endif; ?>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" 
                       class="mt-1 block w-full px-3 py-2 border <?= isset($erreurs['email']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                <?php if (isset($erreurs['email'])): ?>
                    <p class="text-red-500 text-xs mt-1"><?= $erreurs['email'] ?></p> <?php endif; ?>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="password" 
                           class="mt-1 block w-full px-3 py-2 border <?= isset($erreurs['password']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Confirmation</label>
                    <input type="password" name="confirm_password" 
                           class="mt-1 block w-full px-3 py-2 border <?= isset($erreurs['confirm_password']) ? 'border-red-500' : 'border-gray-300' ?> rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
            <?php if (isset($erreurs['password'])): ?>
                <p class="text-red-500 text-xs mt-1"><?= $erreurs['password'] ?></p>
            <?php endif; ?>

            <div>
                <label class="block text-sm font-medium text-gray-700">Vous êtes ?</label>
                <select name="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    <option value="">Sélectionnez un rôle</option>
                    <option value="visiteur">Visiteur</option>
                    <option value="guide">Guide</option>
                </select>
                <?php if (isset($erreurs['role'])): ?>
                    <p class="text-red-500 text-xs mt-1"><?= $erreurs['role'] ?></p>
                <?php endif; ?>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition duration-200 font-semibold shadow-md">
                Créer mon compte
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Déjà inscrit ? <a href="connexion.php" class="text-green-600 hover:underline">Se connecter</a>
        </p>
    </div>

</body>
</html>