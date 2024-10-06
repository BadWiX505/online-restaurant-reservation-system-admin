<?php

use app\model\Chef;

class Database{

    private static $instance;
    private $connection;

    private function __construct() {
        try {
            $this->connection = new PDO('mysql:host=localhost;dbname=RestaurantDB', 'root', '');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
              header('location:err');
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }


    public static function InsertGallery(Gallery $gallery){
        $database = Database::getInstance();
        $pdo = $database->getConnection();
        $sql = "INSERT INTO gallery (image, description) VALUES (:img,:desca)";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':img',$gallery->getImage());
        $stm->bindValue(':desca',$gallery->getDescription());
        if($stm->execute()){
            return true;
        }
        
        return false;

    }


    
    public static function getGall($page){
        require 'Model/Gallery.php';
        $gall=null;
        $database = Database::getInstance();
        $pdo = $database->getConnection();
        $sql = "SELECT * FROM gallery LIMIT 6 OFFSET $page;";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        $gall[]=new Gallery($row['id_Image'],$row['image'],$row['description']);
        }

        return $gall;
    }


    public static function delGallery($idGal){
        $database = Database::getInstance();
        $pdo = $database->getConnection();
        $sql = "DELETE FROM gallery WHERE id_Image=:idGal";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':idGal',$idGal);
        if($stm->execute()){
            return true;
        }
        
        return false;
    }


    public function getNotifications($param){
        $notifications=null;
        $query='';
        if($param ==='Old'){
           $query="WHERE isSent = 1";
        }
        else{
            $query="WHERE isSent = 0";
        }
        $database = Database::getInstance();
        $pdo = $database->getConnection();
        $sql = "SELECT id_Notification, time, date, isItRead, id_Client, notifyname.value as noName
        FROM notification
        JOIN notifyname ON notifyname.id_notify_name=notification.id_notify_name
        $query
        ORDER BY notification.date DESC, notification.time DESC
        ";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $client = $this->getClientDetails($row['id_Client']);
        $notifications[]=new Notification($row['id_Notification'],$row['time'],$row['date'],$row['isItRead'],$client,$row['noName']);
        }

        return $notifications;
    }

    public static function UpdateTosent($idN){
        $database = Database::getInstance();
        $pdo = $database->getConnection();
        $sql = "UPDATE notification SET isSent=1 WHERE  id_Notification	=:idN;";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':idN',$idN);
        if($stm->execute()){
            return true;
        }
        
        return false;
    }

     // get clientDetails 

  public function getClientDetails($id){
    $database = Database::getInstance();
    $pdo = $database->getConnection();
    $sql='SELECT * FROM client WHERE id_Client=:id';
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':id',$id);
    $stm->execute();
    $row=$stm->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      return new Client($row['id_Client'], $row['client_F_Name'], $row['client_L_Name'], $row['Email'], $row['Passwd'], $row['Image'], $row['Action_Date']);
    } else {
        return null;
    }

  }



  public function delNotifications(){
    $database = Database::getInstance();
    $pdo = $database->getConnection();
    $sql = "DELETE FROM notification WHERE isSent=1";
    $stm = $pdo->prepare($sql);
    if($stm->execute()){
        return true;
    }
    
    return false;
  }


  public static function getFoodsFromReservation($idR){
    $database = Database::getInstance();
    $foods=null;
    $pdo = $database->getConnection();
    $sql='SELECT 
    food.idFood AS idFood, 
    food.foodName AS foodName, 
    food.Image AS foodImage 
FROM 
    reservation
    JOIN reservation_order ON reservation_order.id_Reservation = reservation.id_Reservation
    JOIN `order` ON `order`.id_Order = reservation_order.id_Order
    JOIN food ON `order`.id_Food = food.idFood
WHERE 
    reservation.id_Reservation = :idR;

    ';
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':idR',$idR);
    $stm->execute();
    while($row=$stm->fetch(PDO::FETCH_ASSOC)){
        $foods[]=new Food($row['idFood'],$row['foodName'],null,null,null,null,null,null,null,null,null,null,$row['foodImage']);
    }
    return $foods;
   
  }

  public static function getReservationsEmails(){
    $database = Database::getInstance();
    $pdo = $database->getConnection();
    $sql='SELECT client.id_Client as idC , client.Email as email , reservation.id_Reservation as idR FROM reservation JOIN client ON client.id_Client=reservation.id_client WHERE TIMESTAMP(reservation.date, reservation.time) <= DATE_SUB(NOW(), INTERVAL 2 HOUR) 
    AND reservation.id_Status=3
    AND reservation.isEmailSent=0;
    ';
    $stm = $pdo->prepare($sql);
    $twins = null;
    $stm->execute();
    while($row=$stm->fetch(PDO::FETCH_ASSOC)){
        $twins[]=new revAssest( new Client($row['idC'],null,null,$row['email'],null,null,null),$row['idR']);
      
    }
    return $twins;
   
  }



 public static function setEmailTosent($idR){
        $database = Database::getInstance();
        $pdo = $database->getConnection();
        $sql = "UPDATE reservation set reservation.isEmailSent=1 where reservation.id_Reservation=:idR";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':idR',$idR);
        if($stm->execute()){
            return true;
        }
        
        return false;
 }



////////////// chefs //////////////////////////

public static function getchefs(){
   require 'Model/Chef.php';

    $database = Database::getInstance();
    $pdo = $database->getConnection();
    $sql = "SELECT * FROM chef";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $chefs = null;
    while($row = $stm->fetch(PDO::FETCH_ASSOC)){
       $chefs[]= new Chef($row['id_Chef'],$row['chef_fullName'],$row['level'],null,null,null,$row['image']);
    }

    return $chefs;

}




public static function deleteChefFromDb($idC){
    $database = Database::getInstance();
    $pdo = $database->getConnection();
    $sql = "DELETE FROM chef where id_Chef=:idC";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':idC',$idC);
    if($stm->execute()){
        return true;
    }
    
    return false;
}



public static function getChefDetailsFromDb($idC){
    require 'Model/Chef.php';

    $database = Database::getInstance();
    $pdo = $database->getConnection();
    $sql = "SELECT * FROM chef where id_Chef=:idC";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':idC',$idC);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    $chef =  new Chef($row['id_Chef'] , $row['chef_fullName'],$row['level'],$row['fb'],$row['in'],$row['ig'],$row['image']);
    return $chef;
}


public static function updateChef(Chef $chef){
    $imageQuery = '';
    if($chef->getImage()!=null){
        $imageQuery = ', image = :img ';
    }
   
    $database = Database::getInstance();
    $pdo = $database->getConnection();
    $sql = "UPDATE chef
    SET 
    level = :level,
    chef_fullName = :name,
    fb = :fb,
    `in` = :in,
    ig = :ig
    $imageQuery 
    WHERE id_Chef = :id;";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':level',$chef->getLevel());
    $stm->bindValue(':name',$chef->getChefFullName());
    $stm->bindValue(":fb",$chef->getFb());
    $stm->bindValue(":in",$chef->getIn());
    $stm->bindValue(":ig",$chef->getIg());
    $stm->bindValue(":id",$chef->getIdChef(),PDO::PARAM_INT);
    if($chef->getImage()!=null)
    $stm->bindValue(":img",$chef->getImage());
  

    if($stm->execute()){
        return true;
    }
    
    return false;
}



public static function addChefToDb(Chef $chef){
    $database = Database::getInstance();
    $pdo = $database->getConnection();

    // SQL statement to insert a new chef
    $sql = "INSERT INTO chef (level, chef_fullName, fb, `in`, ig, image)
            VALUES (:level, :name, :fb, :in, :ig, :img);";

    // Prepare the statement
    $stm = $pdo->prepare($sql);

    // Bind values
    $stm->bindValue(':level', $chef->getLevel());
    $stm->bindValue(':name', $chef->getChefFullName());
    $stm->bindValue(':fb', $chef->getFb());
    $stm->bindValue(':in', $chef->getIn());
    $stm->bindValue(':ig', $chef->getIg());
    $stm->bindValue(':img', $chef->getImage());

    // Execute the statement and check for success
    if ($stm->execute()) {
        return true;
    }

    return false;
}





public static function updateProfilrInDb($name , $image , $pass , $idA){
    if(!$name || $name=='' || strlen($name)<3 ){
        return false;
    }
   $query ='';
   if($image){
    $query .= ', Image=:img';
   }
   if($pass){
    $query .= ', Passwd=:pass';
   }
    $database = Database::getInstance();
    $pdo = $database->getConnection();
    $sql = "UPDATE admin set Admin_Full_Name =:name $query where id_Admin=:idA;";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':idA',$idA,PDO::PARAM_INT);
    if($image)
    $stm->bindValue(':img',$image);

    $stm->bindValue(':name',$name);

    if($pass)
    $stm->bindValue(':pass',$pass);

    if($stm->execute()){
        return true;
    }
    
    return false;

}







}





?>