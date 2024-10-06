<?php

use app\model\Chef;

  function displayAddChefAction(){
    require 'View/add-chef.php';
  }

   function displayEditChefAction(){
    $chef = getChefDetails();
    require 'View/edit-chef.php';

   }

   function displayGridChefAction(){
    $chefs = getChefsGrid();
    require 'View/grid-chef.php';
   }


   function getChefsGrid(){
    require 'Model/Database.php';

    $chefs = Database::getchefs();

   if(!$chefs)
    return  [];
  
    return $chefs;

   }



   function   removeChef(){
    require 'Model/Database.php';

    if($_POST['idC']){
      $idChef = $_POST['idC'];
      $res = Database::deleteChefFromDb($idChef) ? 'good' : 'bad';
      echo $res;
    }
   }


   function getChefDetails(){
    require 'Model/Database.php';
    if($_GET['idC']){
      $idChef = $_GET['idC'];
      $chef = Database::getChefDetailsFromDb($idChef);
      return $chef;
   }

   return null;
  }


  function addChef(){
    require 'Model/Database.php';
    require 'Model/Chef.php';
    if($_POST['chefName']){

      $image = null;
      if (isset($_FILES["chefImage"])) {
        if ($_FILES["chefImage"]["error"] == UPLOAD_ERR_OK) {
          // Read the uploaded file
          $image = file_get_contents($_FILES["chefImage"]["tmp_name"]);
        }
      }

     $chef = new Chef(null,$_POST['chefName'],$_POST['chefLevel'],$_POST['chefFb'],$_POST['chefIn'],$_POST['chefIg'],$image);
     
     if(Database::addChefToDb($chef)){
      echo 'good';
     }
     else{
      echo "bad";
     }
    }
    else{
      echo 'bad';
    }
  }


  function editChefAction(){
    require 'Model/Chef.php';
    require 'Model/Database.php';
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $image = null;
      if (isset($_FILES["chefImage"])) {
        if ($_FILES["chefImage"]["error"] == UPLOAD_ERR_OK) {
          // Read the uploaded file
          $image = file_get_contents($_FILES["chefImage"]["tmp_name"]);
        }
      }
      $chef = new Chef($_POST['chefId'],$_POST['chefName'],$_POST['chefLevel'],$_POST['chefFb'],$_POST['chefIn'],$_POST['chefIg'],$image);
      if(Database::updateChef($chef)){
        echo 'good';
      }
      else{
        echo 'bad';
      }
      }
    }

?>