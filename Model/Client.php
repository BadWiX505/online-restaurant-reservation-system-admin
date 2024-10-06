<?php 

require_once 'Person.php';

class Client extends Person{
    private $idClient;
    public function __construct($id,$firstName, $lastName, $email, $password, $image, $actionDate) {
       parent::__construct($firstName, $lastName, $email, $password, $image, $actionDate);
       $this->idClient = $id;
    }
    
   

    public function setId($id){
        $this->idClient= $id;
    }

    public function getId(){
        return $this->idClient;
    }
    
    

}



?>