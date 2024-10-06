<?php



class ReviewManager
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



 public function commentsList($offset){
    $stm= $this->pdo->prepare('SELECT client.client_F_Name as CF,client.client_L_Name as CL,text_review.description as comm,client.Image as image,text_review.id_text_Review as idCom
    FROM text_review
    JOIN client on client.id_Client = text_review.id_client
    WHERE text_review.id_Status=2
    LIMIT 6
    OFFSET :offset');
    $stm->bindValue(':offset',$offset,PDO::PARAM_INT);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_OBJ);
 }

public function ConfirmedCommentList($offset){
  
    $stm= $this->pdo->prepare('SELECT client.client_F_Name as CF,client.client_L_Name as CL,text_review.description as comm,client.Image as image,text_review.id_text_Review as idCom
    FROM text_review
    JOIN client on client.id_Client = text_review.id_client
    WHERE text_review.id_Status=1
    LIMIT 6
    OFFSET :offset;');
    $stm->bindValue(':offset',$offset,PDO::PARAM_INT);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_OBJ);

}


 public function removeComment($idC){
    $stm= $this->pdo->prepare('DELETE FROM text_review WHERE text_review.id_text_Review=:idC');
    $stm->bindValue(':idC',$idC,PDO::PARAM_INT);
    return $stm->execute();
 }


 public function AcceptComment($idC){
    $stm= $this->pdo->prepare('UPDATE text_review set id_status=1 WHERE id_text_Review=:idC;
    ');
    $stm->bindValue(':idC',$idC,PDO::PARAM_INT);
    if($stm->execute()){
        return true;
    }
    else{
        return false;
    }
 }


 public function reviewsList($offset,$search){
    $subQuery = '';
        
    // Prepare the search condition if the search term is provided
    if ($search !== '' && $search !== null) {
        $subQuery = "WHERE LOWER(client.client_F_Name) LIKE LOWER(:value)
          OR LOWER(client.client_L_Name) LIKE LOWER(:value)
          OR LOWER(food.foodName) LIKE LOWER(:value)
          OR LOWER(review.stars_Number) LIKE LOWER(:value)"
          ;
    }

    $stm= $this->pdo->prepare("
    select client.client_F_Name,client.client_L_Name,client.Image as clientImage,food.foodName,food.Image as foodImage,review.stars_Number
    FROM review
    JOIN client on client.id_Client=review.id_Client
    JOIN food on food.idFood=review.id_Food
    $subQuery
    LIMIT 6 
    OFFSET :offset;");
    $stm->bindValue(':offset',$offset,PDO::PARAM_INT);

    if ($search !== '' && $search !== null) {
        $search = '%' . strtolower($search) . '%';
        $stm->bindValue(':value', $search);
    }

    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_OBJ);
 }

}
?>