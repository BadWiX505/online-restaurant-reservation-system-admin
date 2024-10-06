<?php

use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require 'Public/vendors/PHPMailer/src/Exception.php';
 require 'Public/vendors/PHPMailer/src/SMTP.php';
 require 'Public/vendors/PHPMailer/src/PHPMailer.php';

 
sendEmails();

function sendEmails(){
    $twins = getAppClients();
    if($twins!=null){
    foreach($twins as $item){
     $res= sendMail($item->getClient()->getEmail(),generateEmail($item->getClient()->getId(),$item->getidR()));
     if($res){
      echo 'TO '.$item->getClient()->getEmail() .'EMAIL SENT ';
     Database::setEmailTosent($item->getidR());
     }
    }
  }
  else
  echo 'No New';
}

function getAppClients()
{
    require 'Model/Client.php';
    require 'Model/Food.php';
    require 'Model/revAssest.php';
    require 'Model/Database.php';
    $twins = Database::getReservationsEmails();
    return $twins;
}


function sendMail($destination,$msg){
 

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='mebadwi@gmail.com';
    $mail->Password='psnxhlhkbtckpinz';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('mebadwi@gmail.com');
    $mail->addAddress($destination);
    $mail->isHTML(true);
    $mail->Subject="FeedBack";
    $mail->Body=$msg;
  try{
    $mail->send();
    return true;
    }
    catch(Exception $ex){
     echo "email has not been sent successfully try again";
     return false;
    }
   }



   function generateEmail($idC,$rtoken){
    return '
    <style>
    .card {
  max-width: 340px;
  border-width: 1px;
  border-color: rgba(219, 234, 254, 1);
  border-radius: 1rem;
  background-color: rgba(255, 255, 255, 1);
  padding: 1rem;
}

.header {
  display: flex;
  align-items: center;
  grid-gap: 1rem;
  gap: 1rem;
}

.icon {
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 9999px;
  background-color: #fd9900;
  padding: 0.5rem;
  color: rgba(255, 255, 255, 1);
}

.icon svg {
  height: 1rem;
  width: 1rem;
}

.alert {
  font-weight: 600;
  color: rgba(107, 114, 128, 1);
}

.message {
  margin-top: 1rem;
  color: rgba(107, 114, 128, 1);
  font-size: 1.3rem;
  text-align: center;
}

.actions {
  margin-top: 1.5rem;
}

.actions a {
  text-decoration: none;
}

.mark-as-read, .read {
  display: inline-block;
  border-radius: 0.5rem;
  width: 100%;
  padding: 0.75rem 1.25rem;
  text-align: center;
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 600;
}

.read {
  background-color:  #fd9900;
  color: rgba(255, 255, 255, 1);
  font-size: 1.3rem;
}

.mark-as-read {
  margin-top: 0.5rem;
  background-color: #fd9900;
  color: rgba(107, 114, 128, 1);
  transition: all .15s ease;
}

.mark-as-read:hover {
  background-color: rgb(230, 231, 233);
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<body>
<div class="card">
    <div class="header">
      <span class="icon">
        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path clip-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" fill-rule="evenodd"></path>
        </svg>
      </span>
      <h1 class="alert">We need Your FeedBack!</h1>
    </div>
  
    <p class="message">
      Hi, i hope that you enjoyed in our restaurant and got the best service and the most tasty dishes 
      you can send a comment and rate your dishes , click button below
    </p>
  
    <div class="actions">
      <a class="read" href="http://localhost/RestaurantClient/index.php?action=FeedBack&token='.$idC.'&RToken='.$rtoken.'">
        Take a Look
      </a>
    </div>
  </div>
  </body>    
    ';
   }