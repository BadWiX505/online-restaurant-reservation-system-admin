<?php

class ReservationManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->databaseConnection();
    }

    private function databaseConnection()
    {
        return new PDO('mysql:dbname=restaurantdb;host=localhost', 'root', '');
    }

    public function listReservations($offset,$search)
    {
        $subQuery = '';
        
        // Prepare the search condition if the search term is provided
        if ($search !== '' && $search !== null) {
            $subQuery = "WHERE LOWER(action_Time) LIKE LOWER(:value)
              OR LOWER(id_Reservation) LIKE LOWER(:value)
              OR LOWER(client.client_F_Name) LIKE LOWER(:value)
              OR LOWER(client.client_L_Name) LIKE LOWER(:value)
              OR LOWER(persons) LIKE LOWER(:value)
              OR LOWER(date) LIKE LOWER(:value)
              OR LOWER(Phone) LIKE LOWER(:value)"
              ;
        }

        $Stm = $this->pdo->prepare("SELECT id_Reservation, client.client_F_Name as clientFname,client.client_L_Name as clientLname, date, Time, persons, Phone, id_Status, action_Time
        FROM reservation
        JOIN client on client.id_Client=reservation.id_client
        $subQuery

        order BY reservation.action_Time DESC
          LIMIT 6
          OFFSET :offset;");
        $Stm->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($search !== '' && $search !== null) {
            $search = '%' . strtolower($search) . '%';
            $Stm->bindValue(':value', $search);
        }
        $Stm->execute();
        return $Stm->fetchAll(PDO::FETCH_OBJ);
    }


    public function listOrders($idReservation)
    {
        $sql = 'SELECT   `order`.id_Order as idOrder , food.Image as foodImage , food.foodName as foodName, `order`.`Qte` as Qte, `order`.`order_Total_Price` as OTP
        FROM `order`
        JOIN reservation_order ON reservation_order.id_Order = `order`.`id_Order`
        JOIN reservation ON reservation_order.id_Reservation = reservation.id_Reservation
        JOIN food ON food.idFood = `order`.`id_Food`
        WHERE reservation.id_Reservation=:idR;
        ';
        $Stm = $this->pdo->prepare($sql);

        $Stm->bindValue(':idR', $idReservation, PDO::PARAM_INT);
        $Stm->execute();

        return $Stm->fetchAll(PDO::FETCH_OBJ);
    }



    public function confirmRes($idR)
    {
        $sql = 'UPDATE reservation 
         set id_Status = 3
         WHERE id_Reservation=:idR;
        ';
        $Stm = $this->pdo->prepare($sql);

        $Stm->bindValue(':idR', $idR, PDO::PARAM_INT);
        return $Stm->execute();
    }

    

    public function cancelRes($idR)
    {
        $sql = 'UPDATE reservation 
         set id_Status = 2
         WHERE id_Reservation=:idR;
        ';
        $Stm = $this->pdo->prepare($sql);

        $Stm->bindValue(':idR', $idR, PDO::PARAM_INT);
        return $Stm->execute();
    }


    public function getReser($idR){
        $sql = 'SELECT * FROM reservation WHERE reservation.id_Reservation = :idR ';
        $Stm = $this->pdo->prepare($sql);

        $Stm->bindValue(':idR', $idR, PDO::PARAM_INT);
        $Stm->execute();

        return $Stm->fetchObject();
    }


    public function getEmailFromRes($idR){
        $sql = 'SELECT Client.Email as Email FROM reservation
        JOIN client ON client.id_Client=reservation.id_client
        WHERE reservation.id_Reservation = :idR';
        $Stm = $this->pdo->prepare($sql);

        $Stm->bindValue(':idR', $idR, PDO::PARAM_INT);
        $Stm->execute();

        $email=  $Stm->fetchObject();
        return $email->Email;

    }
}
