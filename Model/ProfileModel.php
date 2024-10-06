
<?php
class ProfileModel
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


    public function getAdmin($login,$pass){
        $stm= $this->pdo->prepare('SELECT * FROM admin where Admin_Full_Name=:login and Passwd=:pass');
        $stm->bindValue(':login',$login);
        $stm->bindValue(':pass',$pass);
        $stm->execute();
        return $stm->fetchObject();
    }

    public function getAdminId($login,$pass){
        $stm= $this->pdo->prepare('SELECT id_Admin FROM admin where Admin_Full_Name=:login and Passwd=:pass');
        $stm->bindValue(':login',$login);
        $stm->bindValue(':pass',$pass);
        $stm->execute();
        $res= $stm->fetchObject();
        return $res->id_Admin;
    }


    public function getAdminInfos($idA){
        $stm= $this->pdo->prepare('SELECT * FROM admin where id_Admin=:idA');
        $stm->bindValue(':idA',$idA);
        $stm->execute();
        return $stm->fetchObject();
    }
}

?>