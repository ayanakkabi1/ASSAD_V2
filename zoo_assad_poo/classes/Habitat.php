<?php

class Habitat
{
    private ?int $id_hab;
    private string $hab_name;
    private string $typeclimat;
    private string $description;
    private string $zonezoo;
    

    private PDO $pdo;

    public function __construct(
        PDO $pdo,
        string $hab_name = '',
        string $typeclimat='',
        string $description = '',
        string $zonezoo = ''
        
    ) {
        $this->pdo = $pdo;
        $this->hab_name = $hab_name;
        $this->typeclimat=$typeclimat;
        $this->description = $description;
        $this->zonezoo = $zonezoo;
        
    }

    // ===== Getters =====

    public function getIdHab(): ?int
    {
        return $this->id_hab;
    }

    public function getHabName(): string
    {
        return $this->hab_name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getZoneZoo(): string
    {
        return $this->zonezoo;
    }

    public function creer(): bool
{
    
    $sql = "INSERT INTO habitats (nom, typeclimat, description, zonezoo) VALUES (?, ?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);
    
    $success = $stmt->execute([
        $this->hab_name, 
        $this->typeclimat, 
        $this->description, 
        $this->zonezoo
    ]);

    if ($success) {
        $this->id_hab = (int)$this->pdo->lastInsertId();
    }

    return $success;
}
public function creerhab(): bool
{
    $sql = "INSERT INTO habitats (nom, typeclimat, pdescription, zonezoo) VALUES (?, ?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);
    
    $success = $stmt->execute([
        $this->hab_name,
        $this->typeclimat, 
        $this->description, 
        $this->zonezoo
    ]);

    if ($success) {
        $this->id_hab = (int)$this->pdo->lastInsertId();
    }

    return $success;
}
    public function listerTous(): array
    {
        $sql = "
            SELECT id, nom,typeclimat, pdescription, zonezoo
            FROM habitats
            ORDER BY nom
        ";

        $stmt = $this->pdo->query($sql);

        $habitats = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $habitats[] = new Habitat(
                $this->pdo,
                (int)$row['id'],
                $row['nom'],
                $row['typeclimat'],
                $row['pdescription'],
                $row['zonezoo']
            );
        }

        return $habitats;
    }
}
