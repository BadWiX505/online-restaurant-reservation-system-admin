<?php 

  require 'Model/ClientModel.php';

 function displayClientsAction(){
    require 'View/clients.php';
 }



 function seeMoreClient(){
   $offset= $_GET['pageN'];
   $search = $_GET['search'];
    $clientMOD = new ClientModel();
   $clients =  $clientMOD->listeClients($offset,$search);
   foreach($clients as $client){
       $client->RC=$clientMOD->getReservationCount($client->id_Client);
       $client->TR=$clientMOD->getTotalRevenu($client->id_Client);
   }
   echo generateClientHTML($clients);
 }


 function generateClientHTML($clients) {
  $html = ""; // Initialize the HTML variable

  foreach ($clients as $client) {
      // Concatenate table row HTML for each client
      $html .= "<tr>";
      $html .= "<td>" . $client->id_Client . "</td>";
      $html .= "<td>" . $client->client_F_Name . "</td>";
      $html .= "<td>" . $client->client_L_Name . "</td>";
      // Convert image bytes to base64 and include it in the HTML
      $imageData = base64_encode($client->Image);
      $html .= "<td><div class='oredrImageContainer'><img src='data:image;base64," . $imageData . "' alt='Client Image'></div></td>";
      $html .= "<td>" . $client->Email . "</td>";
      $html .= "<td>" . $client->Action_Date . "</td>";
      $html .= "<td>" . $client->RC . "</td>";
      $html .= "<td>" . $client->TR . "$</td>";
      $html .= "<td></td>"; // This is the empty <td> you left in your example
      $html .= "</tr>";
  }

  return $html;
}






   ?>