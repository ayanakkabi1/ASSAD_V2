<?php
require_once 'Utilisateur.php';

class Visitor extends Utilisateur
      
{
    private $etat;
    public function __construct(int $id, string $nom,string $role, string $email ,bool $etat)
    {
        parent::__construct($id, $nom, $role ,$email, $etat);
        $this->etat=$etat;
    }

   

    public function getEtat(): bool
    {
        return $this->etat;
    }
}


?>