<?php
class Aniaml{
    private $id_animal;
    private $nom_animal;
    private $espece;
    private $alimentation;
    private $image;
    private $paysorigine;
    private $descriptioncourte;
    private $id_habitat;
    public function __construct($nom_animal,$espece,$alimentation,$image,$paysorigine,$descriptioncourte,$id_habitat)
    {
        $this->nom_animal = $nom_animal;
        $this->espece= $espece;
        $this->alimentation = $alimentation;
        $this->image = $image;
        $this->paysorigine=$paysorigine;
        $this->descriptioncourte=$descriptioncourte;
        $this->id_habitat = $id_habitat;
    }
}
?>