<?php
require_once 'Database.php';

class Utilisateur extends Database {

    private $id;
    private $nom;
    private $email;
    private $role;
    private $motPasseHash;
  

    public function __construct($nom, $email, $role, $motPasse) {
        parent::__construct(); 

        $this->nom = $nom;
        $this->email = $email;
        $this->role = $role;
        $this->motPasseHash = password_hash($motPasse, PASSWORD_DEFAULT);
        
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
        $sql = "INSERT INTO utilisateurs
                (nom, email, role, motpasse_hash)
                VALUES (:nom, :email, :role, :motpasse_hash, :etat, :approuve)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nom' => $this->nom,
            ':email' => $this->email,
            ':role' => $this->role,
            ':motpasse_hash' => $this->motPasseHash,
            
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
    $data['motpasse_hash'], 
   
);

}

       

    
    public function verifierMotDePasse(string $motDePasseSaisi): bool
{
    return password_verify($motDePasseSaisi, $this->motPasseHash);
}

}
?>