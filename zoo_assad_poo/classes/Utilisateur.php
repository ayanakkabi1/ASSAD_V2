<?php
require_once 'Database.php';

class Utilisateur {

    private $id;
    private $nom;
    private $email;
    private $role;
    private $motPasseHash;
    private $etat;
    private $approuve;
  
    private $db;
    public function __construct($nom, $email, $role, $motPasseHash, $etat = 'actif', $approuve = 'non') {
        $this->nom = $nom;
        $this->email = $email;
        $this->role = $role;
        $this->motPasseHash = $motPasseHash;
        $this->etat = $etat;
        $this->approuve = $approuve;
        
        $database = new Database();
        $this->db = $database->getConnection();
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
    public function creer() {
        $sql = "INSERT INTO utilisateurs (nom, email, role, motpasse_hash, etat, approuve) 
                VALUES (:nom, :email, :role, :pass, :etat, :approuve)";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nom' => $this->nom,
            ':email' => $this->email,
            ':role' => $this->role,
            ':pass' => $this->motPasseHash,
            ':etat' => $this->etat,
            ':approuve' => $this->approuve
        ]);
    }
    public static function trouverParEmail($email) {
        $database = new Database();
        $pdo = $database->getConnection();
        
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>