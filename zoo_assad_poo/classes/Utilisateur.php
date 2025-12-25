<?php
require_once 'Database.php';

class Utilisateur extends Database {

    private $id;
    private $nom;
    private $email;
    private $role;
    private $motPasseHash;
    private $etat;
    private $approuve;

    public function __construct($nom, $email, $role, $motPasse, $etat, $approuve) {
        parent::__construct(); 

        $this->nom = $nom;
        $this->email = $email;
        $this->role = $role;
        $this->motPasseHash = password_hash($motPasse, PASSWORD_DEFAULT);
        $this->etat = $etat;
        $this->approuve = $approuve;
    }

    /* ===== GETTERS ===== */
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    public function getMotPasseHash() {
        return $this->motPasseHash;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function getApprouve() {
        return $this->approuve;
    }

    /* ===== SETTERS ===== */
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setMotPasse($motPasse) {
        $this->motPasseHash = password_hash($motPasse, PASSWORD_DEFAULT);
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function setApprouve($approuve) {
        $this->approuve = $approuve;
    }

    
    public function creer() {
        $sql = "INSERT INTO utilisateurs
                (nom, email, role, motpasse_hash, etat, approuve)
                VALUES (:nom, :email, :role, :mot_de_passe, :etat, :approuve)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nom' => $this->nom,
            ':email' => $this->email,
            ':role' => $this->role,
            ':mot_de_passe' => $this->motPasseHash,
            ':etat' => $this->etat,
            ':approuve' => $this->approuve
        ]);
    }

    public function trouverParEmail($email) {
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        return null;
    }

    return new Utilisateur(
        $data['nom'],
        $data['email'],
        $data['role'],
        null, 
        $data['etat'],
        $data['approuve']
    );
}

       

    public function verifierMotDePasse($motDePasseSaisi, $hashStocke) {
        return password_verify($motDePasseSaisi, $hashStocke);
    }
}
?>