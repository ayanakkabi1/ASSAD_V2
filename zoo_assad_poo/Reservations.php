<?php
require_once 'classes/Database.php';

class Reservation {

    public static function creer($visite,$visiteur,$nb) {
        $db = new Database();
        $stmt = $db->getConnection()->prepare(
            "INSERT INTO reservations(visite_id,visiteur_id,nb_personnes)
             VALUES (?,?,?)"
        );
        return $stmt->execute([$visite,$visiteur,$nb]);
    }

    public static function listerParVisiteur($id) {
        $db = new Database();
        $stmt = $db->getConnection()->prepare(
            "SELECT * FROM reservations WHERE visiteur_id=?"
        );
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
}
?>