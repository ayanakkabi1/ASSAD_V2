<?php
require_once 'Database.php';
require_once 'Animal.php';
require_once 'Utilisateur.php';

$repo = new Animal($pdo);

$habitat = $_POST['habitat'] ?? null;
function supprimer($id){
    $db = new Database();
    $stmt = $db->getConnection()->prepare("DELETE FROM animaux WHERE id=?");
    $stmt->execute([$id]);
}
if ($habitat) {
    $animaux = $repo->listerParHabitat((int)$habitat);
} else {
    $animaux = $repo->listerTous();
}


?>

<h2>Liste des animaux</h2>

<form method="POST">
    <select name="habitat">
        <option value="">Tous</option>
        <option value="1">Savane</option>
        <option value="2">Forêt</option>
        <option value="3">Aquatique</option>
    </select>
    <button type="submit">Filtrer</button>
</form>

<ul>
<?php foreach ($animaux as $animal): ?>
    <li>
        <?= htmlspecialchars($animal->getNom()) ?>
        (habitat <?= $animal->getHabitat() ?>)
    </li>
<?php endforeach; ?>
</ul>


