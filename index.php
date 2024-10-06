<?php
session_start();
if(isset($_SESSION['idA'])){
if (!isset($_GET['action'])) {

  displayAddMenu();
} else {
  $action = $_GET['action'];
  switch ($action) {
    case 'add-menu':
      displayAddMenu();
      break;
    case 'add-menu-action':
      addMenuAction();
      break;
    case 'edit-menu':
      displayEditMenu();
      break;
    case 'editMenu':
      updateMenu();
      break;

    case 'list-menu':
      displayListMenu();
      break;
    case 'grid-menu':
      displayGridMenu();
      break;
    case 'moreGridMenu':
      moreGridMenu();
      break;
    case 'moreListFood':
      moreListFood();
      break;
    case 'reservations-list':
      displayRes();
      break;
    case 'moreReservation':
      moreRes();
      break;
    case 'Orders':
      orders();
      break;
    case 'confirmRes':
      confRes();
      break;
    case 'cancelRes':
      cancRes();
      break;
    case 'clients':
      displayClients();
      break;
    case 'moreClients':
      moreClients();
      break;
    case 'gallery':
      displayGallery();
      break;
    case 'profile':
      displayProfile();
      break;
    case 'add-chef':
      displayAddChef();
      break;
    case 'edit-chef':
      displayEditChef();
      break;
    case 'grid-chef':
      displayGridChef();
      break;
    case 'comments':
      displayComments();
      break;
    case 'acceptComment':
      acceptComment();
      break;
    case 'removeComment' :
      removeComment();
      break;
    case 'moreComments':
      moreComments();
      break;
    case 'moreConfirmedComments' :
      moreConfimedComments();
      break;
    case 'rev':
      displayRev();
      break;
    case 'moreRev' :
      MoreReviews();
      break;
    case 'signup':
      displaySigPage();
      break;
    case 'insertGall':
      insertGall();
      break;

    case 'showGall':
      showGall();
      break;

    case 'delGal':
      delGal();
      break;
    case 'cloneOldNotify':
      fetchOldNotify();
      break;
    case 'cloneNewNotify':
      fetchNewNotify();
      break;
    case 'delNotify':
      delNotify();
      break;
    case 'clearNewNotify':
      clearN();
      break;
      case 'removeChef' : 
        deleteChef();
        break;
      case 'editChef'  : 
       editChef();
       break;
      case 'add-chef-action' : 
        addChefAction();
        break;
      case 'editProfile' :
        editProfile();
        break;
      case 'logout' : 
        logOut();
        break;
  }
}
}



else{
  if(!isset($_GET['action'])){
    displayLogPage();
  }
  else{
    $action=$_GET['action'];
  switch($action){
    case 'loginToAccount' :
      loginToAccount();
      break;
   
      
      default : displayLogPage(); break;
  }
  
  }
}




function displayAddMenu()
{
  require 'Controller/MenuController.php';
  displayAddMenuAction();
  //  shell_exec('Start-Process php -ArgumentList "BG_PROCESS_EMAIL_SENDING.php" -NoNewWindow');
}
function addMenuAction()
{
  require 'Controller/MenuController.php';
  addMenu();
}
function displayEditMenu()
{
  require 'Controller/MenuController.php';
  displayEditMenuAction();
}

function updateMenu()
{
  require 'Controller/MenuController.php';
  editMenu();
}
function moreGridMenu()
{
  require 'Controller/MenuController.php';
  getMoreGridFood();
}

function moreListFood()
{
  require 'Controller/MenuController.php';
  getMoreListFood();
}

function displayListMenu()
{
  require 'Controller/MenuController.php';
  displayListMenuAction();
}

function displayGridMenu()
{
  require 'Controller/MenuController.php';
  displayGridMenuAction();
}

function displayRes()
{
  require 'Controller/ReservationsController.php';
  displayReservationsPage();
}

function moreRes()
{
  require 'Controller/ReservationsController.php';
  getMoreReservations();
}

function orders()
{
  require 'Controller/ReservationsController.php';
  getOrders();
}

function confRes()
{
  require 'Controller/ReservationsController.php';
  confirmReservation();
}

function cancRes()
{
  require 'Controller/ReservationsController.php';
  cancelReservation();
}
function displayClients()
{
  require 'Controller/ClientController.php';
  displayClientsAction();
}


function moreClients()
{
  require 'Controller/ClientController.php';
  seeMoreClient();
}

function displayGallery()
{
  require 'Controller/GalleryController.php';
  displayGallleryAction();
}

function displayProfile()
{
  require 'Controller/ProfileController.php';
  displayProfileAction();
}

function displayAddChef()
{
  require 'Controller/ChefsController.php';
  displayAddchefAction();
}


function displayEditChef()
{
  require 'Controller/ChefsController.php';
  displayEditChefAction();
}


function displayGridChef()
{
  require 'Controller/ChefsController.php';
  displayGridChefAction();
}


function displayComments()
{
  require 'Controller/ReviewsController.php';

  displayCommentReviews();
}
function displayRev()
{
  require 'Controller/ReviewsController.php';

  displayStarsReviews();
}

function MoreReviews(){
  require 'Controller/ReviewsController.php';
  seeMoreReviews();
}
function moreComments()
{
  require 'Controller/ReviewsController.php';
  seemoreComments();
}

function moreConfimedComments(){
  require 'Controller/ReviewsController.php';
  seemoreConfirmedComments();
}
function acceptComment()
{
  require 'Controller/ReviewsController.php';
  acceptCommentAction();
}

function removeComment()
{
  require 'Controller/ReviewsController.php';
  deleteCommentAction();
}


function displaySigPage()
{
  require 'Controller/ProfileController.php';

  displaySignUpPage();
}


function insertGall()
{
  require 'Controller/GalleryController.php';
  insertAction();
}


function showGall()
{
  require 'Controller/GalleryController.php';
  showGalleries();
}


function delGal()
{
  require 'Controller/GalleryController.php';
  deleteGallery();
}


function fetchOldNotify()
{
  require 'Controller/backgroundProcController.php';
  fetchOldNotifications();
}

function fetchNewNotify()
{
  require 'Controller/backgroundProcController.php';
  fetchNewNotifications();
}

function delNotify()
{
  require 'Controller/backgroundProcController.php';
  deleteNots();
}
function clearN()
{
  require 'Controller/backgroundProcController.php';
  deleteNots();
}

function displayLogPage()
{
  require 'Controller/ProfileController.php';
  displayLoginPage();
}

function loginToAccount(){
  require 'Controller/ProfileController.php';
  loginAction();
}

function deleteChef(){
  require 'Controller/ChefsController.php';
  removeChef();
}

function editChef(){
  require 'Controller/ChefsController.php';
  editChefAction();
}

function addChefAction(){
  require 'Controller/ChefsController.php';
  addChef();
}


function editProfile(){
  require 'Controller/ProfileController.php';
  editProfileAction();
}


function logOut(){
 require 'Controller/ProfileController.php';
 logoutAction();
}