<?php
require_once 'Utilisateur.php';

class Guide extends Utilisateur
      
{

    private $approuve;
    public function __construct(int $id, string $nom,string $role, string $email ,bool $approuve)
    {
        parent::__construct($id, $nom, $role ,$email, $approuve);
        $this->approuve=$approuve;
    }

   

    public function getapprouve(): bool
    {
        return $this->approuve;
    }
}
?>
