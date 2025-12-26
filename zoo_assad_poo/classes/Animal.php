<?php

class Animal
{
    private ?int $id_animal;
    private string $nom_animal;
    private string $espece;
    private string $alimentation;
    private string $image;
    private string $paysorigine;
    private string $descriptioncourte;
    private int $id_habitat;

    private PDO $pdo;

    public function __construct(
        PDO $pdo,
        ?int $id_animal = null,
        string $nom_animal = '',
        string $espece = '',
        string $alimentation = '',
        string $image = '',
        string $paysorigine = '',
        string $descriptioncourte = '',
        int $id_habitat = 0
    ) {
        $this->pdo = $pdo;
        $this->id_animal = $id_animal;
        $this->nom_animal = $nom_animal;
        $this->espece = $espece;
        $this->alimentation = $alimentation;
        $this->image = $image;
        $this->paysorigine = $paysorigine;
        $this->descriptioncourte = $descriptioncourte;
        $this->id_habitat = $id_habitat;
    }

  

    public function getIdAnimal(): ?int
    {
        return $this->id_animal;
    }

    public function getNomAnimal(): string
    {
        return $this->nom_animal;
    }

    public function getEspece(): string
    {
        return $this->espece;
    }

    public function getAlimentation(): string
    {
        return $this->alimentation;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getPaysOrigine(): string
    {
        return $this->paysorigine;
    }

    public function getDescriptionCourte(): string
    {
        return $this->descriptioncourte;
    }

    public function getIdHabitat(): int
    {
        return $this->id_habitat;
    }


    public function listerTous(): array
    {
        $sql = "SELECT * FROM animal ORDER BY nom_animal";
        $stmt = $this->pdo->query($sql);

        $animaux = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $animaux[] = new Animal(
                $this->pdo,
                (int)$row['id_animal'],
                $row['nom_animal'],
                $row['espece'],
                $row['alimentation'],
                $row['image'],
                $row['paysorigine'],
                $row['descriptioncourte'],
                (int)$row['id_habitat']
            );
        }

        return $animaux;
    }

    public function listerParHabitat(int $idHabitat): array
    {
        $sql = "SELECT * FROM animal WHERE id_habitat = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $idHabitat]);

        $animaux = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $animaux[] = new Animal(
                $this->pdo,
                (int)$row['id_animal'],
                $row['nom_animal'],
                $row['espece'],
                $row['alimentation'],
                $row['image'],
                $row['paysorigine'],
                $row['descriptioncourte'],
                (int)$row['id_habitat']
            );
        }

        return $animaux;
    }
}
?>