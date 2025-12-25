<?php
require_once 'Database.php';

class VisiteGuidee {

    public static function creer($data) {
        $db = new Database();
        $sql = "INSERT INTO visitesguidees
        (guide_id,titre,date_visite,heure,duree,prix,langue,capacite,statut)
        VALUES (?,?,?,?,?,?,?,?,?)";

    function listerParGuide($id) {
        $db = new Database();
        $stmt = $db->getConnection()->prepare(
            "SELECT * FROM visitesguidees WHERE guide_id=?"
        );
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    function annuler($id) {
        $db = new Database();
        $db->getConnection()->prepare(
            "UPDATE visitesguidees SET statut='annulée' WHERE id=?"
        )->execute([$id]);
    }
    }
}
?>