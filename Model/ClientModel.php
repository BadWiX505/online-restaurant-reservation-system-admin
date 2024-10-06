<?php
class ClientModel
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

    public function listeClients($offset,$search)
    {
        $subQuery = '';
        
        // Prepare the search condition if the search term is provided
        if ($search !== '' && $search !== null) {
            $subQuery = "WHERE LOWER(client_F_Name) LIKE LOWER(:value)
              OR LOWER(client_L_Name) LIKE LOWER(:value)
              OR LOWER(Email) LIKE LOWER(:value)
              OR LOWER(Action_Date) LIKE LOWER(:value)
              OR LOWER(id_Client) LIKE LOWER(:value)
              ";
        }

        $stm= $this->pdo->prepare("SELECT * FROM client $subQuery LIMIT 6 OFFSET :offset");
        $stm->bindValue(':offset',$offset,PDO::PARAM_INT);

        if ($search !== '' && $search !== null) {
            $search = '%' . strtolower($search) . '%';
            $stm->bindValue(':value', $search);
        }

        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }



    public function getReservationCount($idC)
    {
        $sql = '
    SELECT COUNT(*) as TC FROM `reservation`
    WHERE id_client=:idC
    ';
        $Stm = $this->pdo->prepare($sql);

        $Stm->bindValue(':idC', $idC, PDO::PARAM_INT);
        $Stm->execute();

        $ob = $Stm->fetchObject();
        if ($ob !== false) {
            return $ob->TC;
        } else {
            // Handle the case where no records were found for the given id_client
            return 0; // or any other default value you want to return
        }
    }





    public function getTotalRevenu($idC)
{
    $sql = '
        SELECT SUM(`order`.`order_Total_Price`) as TR FROM reservation 
        JOIN reservation_order ON reservation_order.id_Reservation = reservation.id_Reservation
        JOIN `order` ON `order`.`id_Order` = reservation_order.id_Order 
        WHERE reservation.id_client=:idC
        and reservation.id_Status=3;
    ';
    $Stm = $this->pdo->prepare($sql);

    $Stm->bindValue(':idC', $idC, PDO::PARAM_INT);
    $Stm->execute();

    $ob = $Stm->fetchObject();
    
    // Check if $ob is not false before accessing its property
    if ($ob !== false) {
        return $ob->TR;
    } else {
        // Handle the case where no records were found for the given id_client
        return 0; // or any other default value you want to return
    }
}

}
