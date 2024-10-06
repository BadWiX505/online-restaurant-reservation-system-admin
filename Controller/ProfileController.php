<?php
require 'Model/ProfileModel.php';
function displayProfileAction()
{
  $infos=getProfileInfo();
  require 'View/profile.php';
}


function displayLoginPage()
{
  require 'View/ACCOUNT/Login.php';
}

function displaySignUpPage()
{
  require 'View/ACCOUNT/SignUp.php';
}


function getProfileInfo(){
  $idA=$_SESSION['idA'];
  $profileModel = new ProfileModel();
  return $profileModel->getAdminInfos($idA);
}

function checkDataValidity($login, $pass)
{
  $profileModel = new ProfileModel();
  return $profileModel->getAdmin($login, $pass);
}

function loginAction()
{
  $login = $_POST['login'];
  $pass = $_POST['pass'];
  if (checkDataValidity($login, $pass)) {
    $profileModel = new ProfileModel();
    $Admin = $profileModel->getAdmin($login, $pass);
    if (login($Admin)) {
      echo 'good';
    } else {
      echo 'bad';
    }
  } else {
    echo 'bad';
  }
}


function logoutAction(){
  unset($_SESSION['idA']);
  unset($_SESSION['adminName']);
  unset($_SESSION['adminImage']);
  header('location:index.php?action=add-menu');
}


function login($Admin)
{
  $_SESSION['idA'] = $Admin->id_Admin;
  $_SESSION['adminName'] = $Admin->Admin_Full_Name;
  $_SESSION['adminImage'] = base64_encode($Admin->Image);
  return true;
}


function updateSession($newName , $newImage){
  $_SESSION['adminName'] = $newName;
  $_SESSION['adminImage'] =  base64_encode($newImage);
}


function editProfileAction(){
  require 'Model/Database.php';
  $name = $_POST['adminName'];
  $pass = $_POST['pass'];
  $old = $_POST['oldPass'];
  $image=null;

  
  if (isset($_FILES["image"])) {
      if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        // Read the uploaded file
        $image = file_get_contents($_FILES["image"]["tmp_name"]);
      }
    }

  if($pass!='' && $pass){
  if(checkDataValidity($_SESSION['adminName'],$old)) {
         if(Database::updateProfilrInDb($name,$image,$pass,$_SESSION['idA'])){
          updateSession($name,$image);
               echo 'good';
         }
         else{
          echo 'bad';
         }
  } 
  else{
    echo 'bad';
  }
  }
  else{
    if(Database::updateProfilrInDb($name,$image,null,$_SESSION['idA'])){
      updateSession($name,$image);
      echo 'good';
     }
     else{
      echo 'bad';
     }
  }



}