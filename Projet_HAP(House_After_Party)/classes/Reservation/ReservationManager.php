<?php 

require_once "../../config/db.php";

Class ReservationManager{

    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }


public function addReservation($date_debut_reservation,$date_fin_reservation){
    $stmt=$this->pdo->prepare("INSERT INTO Reservation(date_debut_reservation,date_fin_reservation) VALUES (:date_debut_reservation,:date_fin_reservation)");
    return $stmt->execute([
        'date_debut_reservation' => $date_debut_reservation,
        'date_fin_reservation' => $date_fin_reservation
    ]);
}

public function readAllReservation(){
    $stmt=$this->pdo->query("SELECT * FROM Reservation");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function readIdReservation($id_reservation){
        $stmt = $this->pdo->prepare("SELECT * FROM Reservation WHERE idreservation = :idreservation");
        $stmt->execute(['idreservation' => $id_reservation]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function updateReservation($id_reservation,$date_debut_reservation,$date_fin_reservation){
        $stmt = $this->pdo->prepare("UPDATE Reservation SET date_debut_reservation = :date_debut_reservation,date_fin_reservation = :date_fin_eservation WHERE id_reservation = :idreservation");
        return $stmt->execute(['date_debut_reservation' => $date_debut_reservation,'date_fin_reservation'=>$date_fin_reservation, 'idreservation' => $id_reservation]);
    }

public function deleteReservation($id_reservation){
        $stmt = $this->pdo->prepare("DELETE FROM Reservation WHERE idreservation = :idreservation");
        return $stmt->execute(['idreservation' => $id_reservation]);
    }
}

?>