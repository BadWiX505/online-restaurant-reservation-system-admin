<?php

require 'Model/ReservationModel.php';

use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

function displayReservationsPage()
{
   require 'View/Reservations.php';
}




function getMoreReservations()
{
   $offset = $_GET['pageN'];
   $search = $_GET['search'];
   $resModel = new ReservationManager();
   $reservations =  $resModel->listReservations($offset,$search);
   echo generateReservationsHTML($reservations);
}

function confirmReservation(){
  $idR = $_GET['idR'];
  $resModel = new ReservationManager();
  $resModel->confirmRes($idR);

  $email= generateOrderConfirmedEmail(getReservation($idR),getOrdersForEmail($idR),'Your Reservation is Confirmed','Welcome to our restaurant see you soon');
  sendMail(getclientEmail($idR),$email);
  echo 'good';

}



function sendMail($destination,$msg){
    require 'Public/vendors/PHPMailer/src/Exception.php';
    require 'Public/vendors/PHPMailer/src/SMTP.php';
    require 'Public/vendors/PHPMailer/src/PHPMailer.php';
 
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
    $mail->Subject="Confirmation code";
    $mail->Body=$msg;
  try{
    $mail->send();
    }
    catch(Exception $ex){
     echo 'bad';
     echo "email has not been sent successfully try again";
    }
   }
 
 


function cancelReservation(){
   $idR = $_GET['idR'];
   $resModel = new ReservationManager();
   $resModel->cancelRes($idR);
   $email= generateOrderConfirmedEmail(getReservation($idR),getOrdersForEmail($idR),'Yor Reservation is Cancelled','We are sorry to say that 😔');
   sendMail(getclientEmail($idR),$email);
   echo 'good';
}


function getclientEmail($idR){
    $resModel = new ReservationManager();
    return $resModel->getEmailFromRes($idR);
}


function getReservation($idR){
   $resModel = new ReservationManager();
   $reservation = $resModel->getReser($idR);
   return $reservation;
}


function getOrdersForEmail($idR){
   $resModel = new ReservationManager();
   $orders= $resModel->listOrders($idR);
   return $orders;
}


function getOrders(){
   $idR = $_GET['idR'];
   $resModel = new ReservationManager();
   $orders= $resModel->listOrders($idR);
   echo generateOrdersHTML($orders); 
}

function generateReservationsHTML($reservations)
{
   $html = '';
   foreach ($reservations as $reservation) {
      $html .= '<tr>';
      $html .= '<td scope="row">' . $reservation->id_Reservation . '</td>';
      $html .= '<td>' . $reservation->clientFname . ' ' . $reservation->clientLname . '</td>';
      $html .= '<td>' . $reservation->date . '</td>';
      $html .= '<td>' . $reservation->Time . '</td>';
      $html .= '<td>' . $reservation->persons . '</td>';
      $html .= '<td>' . $reservation->Phone . '</td>';
      $html .= '<td>' . $reservation->action_Time . '</td>';
      $html .= '<td>' . getBadge($reservation->id_Status) . '</td>';
      $html .= '<td class="btnTD">';
      $html .= getButtons($reservation->id_Status);
      $html .= '</td>';
      $html .= '</tr>';
   }
   return $html;
}


function getBadge($status)
{
   switch ($status) {
      case 1:
         return '<span class="badge badge-primary">Pending</span>';
         break;
      case 2:
         return '<span class="badge badge-danger">Canceled</span>';
         break;
      case 3:
         return '<span class="badge badge-success">Confirmed</span>';
         break;
      case 4:
         return '<span class="badge badge-warning">Failed</span>';
         break;
   }
}



function generateOrdersHTML($orders){
$html = '';
foreach ($orders as $order) {
    $html .= '<tr>';
    $html .= '<td>' . htmlspecialchars($order->idOrder) . '</td>';
    $html .= '<td class="oredrImageContainer"><img src="data:image;base64,' . base64_encode($order->foodImage) . '" alt="Food Image" width="50"></td>';
    $html .= '<td>' . htmlspecialchars($order->foodName) . '</td>';
    $html .= '<td>' . htmlspecialchars($order->Qte) . '</td>';
    $html .= '<td>' . htmlspecialchars($order->OTP) . '$</td>';
    $html .= '</tr>';
}
return $html;
}


function getButtons($status)
{
   $html = '';
   switch ($status) {
      case 1:
         $html .= '<button type="button" class="btn btn-success reBtnC btnbadge confBtn">Confirm</button>';
         $html .= '<button type="button" class="btn btn-danger reBtnF btnbadge cancBTN">Cancel</button>';
         break;
   }
   $html .= '<button class="btn btn-outline-dark btnbadge ordersBtn">Orders</button>';
   
  return $html;
}







function generateOrderConfirmedEmail($reservation, $orders,$title,$subtitle) {
   $reservationDetails = "
   <h3>Your Reservation details</h3>
   <table width='100%' style='border-collapse: collapse;'>
       <tr>
           <td class='column-title'>Reservation ID</td>
           <td class='column-detail'>{$reservation->id_Reservation}</td>
       </tr>
       <tr>
           <td class='column-title'>Date</td>
           <td class='column-detail'>{$reservation->date}</td>
       </tr>
       <tr>
           <td class='column-title'>Time</td>
           <td class='column-detail'>{$reservation->Time}</td>
       </tr>
       <tr>
           <td class='column-title'>Persons</td>
           <td class='column-detail'>{$reservation->persons}</td>
       </tr>
       <tr>
           <td class='column-title'>Phone</td>
           <td class='column-detail'>{$reservation->Phone}</td>
       </tr>
   </table>";

   $orderDetails = "<h3>Your Orders</h3>
   <table width='100%' style='border-collapse: collapse;border-bottom:1px solid #eee;'>
       <tr>
           <td width='20%' class='column-header'>Food name</td>
           <td width='40%' class='column-header'>Qte</td>
           <td width='30%' class='column-header'>Total Price</td>
       </tr>";

   foreach ($orders as $order) {
       $orderDetails .= "
       <tr>
           <td class='row'>{$order->foodName}</td>
           <td class='row'>{$order->Qte}</td>
           <td class='row'>{$order->OTP}</td>
       </tr>";
   }

   $totalPrice = array_reduce($orders, function($acc, $order) {
       return $acc + $order->OTP;
   }, 0);

   $orderDetails .= "<tr><td class='row'>Total </td> <td class='row' colspan='2'>{$totalPrice}$</td></tr></table>";

   return "
   <style>
       body {font-family: Helvetica, sans-serif;font-size:13px;}
       .container{max-width: 680px; margin:0 auto;}
       .logotype{background:#000;color:#fff;width:75px;height:75px;  line-height: 75px; text-align: center; font-size:11px;}
       .column-title{background:#eee;text-transform:uppercase;padding:15px 5px 15px 15px;font-size:11px}
       .column-detail{border-top:1px solid #eee;border-bottom:1px solid #eee;}
       .column-header{background:#eee;text-transform:uppercase;padding:15px;font-size:11px;border-right:1px solid #eee;}
       .row{padding:7px 14px;border-left:1px solid #eee;border-right:1px solid #eee;}
       .alert{background:#000 ;padding:20px;margin:20px 0;line-height:22px;color:#fff}
       .socialmedia{background:#eee;padding:20px; display:inline-block}
   </style>

   <div class='container'>
       <table width='100%'>
           <tr>
               <td width='75px'><div class='logotype'></div></td>
               <td width='300px' style='background: #fee977;border-left:15px solid #fff; padding-left:30px;font-size:26px;font-weight:bold;letter-spacing:-1px;'>$title</td>
               <td></td>
           </tr>
       </table>
       {$reservationDetails}
       {$orderDetails}
       <div class='alert'>$subtitle</div>
   </div><!-- container -->";
}

