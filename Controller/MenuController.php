<?php 

require_once 'Model/MenuModel.php';

function displayAddMenuAction(){
    require 'View/menu-add.php';
}

function displayListMenuAction(){
    require 'View/menu-list.php';
}

function displayGridMenuAction(){
    require 'View/menu-grid.php';
}


function displayEditMenuAction(){
    $idFood = $_GET['idFood']; 
    
    $MenuModel = new FoodManager();
    
    $foode = $MenuModel->retrieveFood($idFood);
   $foode->discount=$MenuModel->retrievePromo($foode->idFood);
   require 'View/menu-edit.php';
}


function editMenu(){
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $foodModel = new FoodManager();
        $image=null;
        if (isset($_FILES["image"])) {
            if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
              // Read the uploaded file
              $image = file_get_contents($_FILES["image"]["tmp_name"]);
            }
          }
    if($foodModel->editFood($_POST['idFood'], $_POST['foodName'], $_POST['price'], $_POST['food_description'],boolToInt($_POST['isInPromotion']),boolToInt($_POST['isAvailable']), $_POST['categorie_name'], $_POST['mealtime_name'], $_POST['subCategorie_name'], $image)){
        if($_POST['isInPromotion']=="true"){
            $foodModel->addPromo($_POST['idFood'],$_POST['discount']);
            echo 'good';
        }
        else{
        echo 'good';
        }
    }
    else{
        echo 'bad';
    }

}
    
}

function boolToInt($boolValue) {
    if($boolValue=="true"){
        return 1;
    }
    else{
        return 0;
    }
 }



function getMoreListFood(){
    $offset = $_GET['pageN'];
    $foodModel = new FoodManager();
    $search = $_GET['search'];
    $foods = $foodModel->listFoods($offset,$search);
    echo generateListHtmlCode($foods);
}

function getMoreGridFood(){
    $offset = $_GET['pageN'];
    $search = $_GET['search'];
    $foodModel = new FoodManager();
    $foods = $foodModel->gridFoods($offset,$search);
    echo generatGridFoodHtml($foods);
}


function addMenu(){
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $foodModel = new FoodManager();
        $image=null;
        if (isset($_FILES["image"])) {
            if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
              // Read the uploaded file
              $image = file_get_contents($_FILES["image"]["tmp_name"]);
            }
          }
    if($foodModel->createFood($_POST['foodName'], $_POST['price'], $_POST['food_description'], $_POST['id_categorie'], $_POST['id_mealTime'], $_POST['id_Subcategorie'], $image)){
        echo 'good';
    }
    else{
        echo 'bad';
    }
    
    }
}

function generatGridFoodHtml($foods){
    $html = '';
    foreach ($foods as $food) {
        $html .= '<div class="col-lg-3 col-md-6 col-sm-12 mb-30">';
        $html .= '<div class="card card-box">';
        $html .= '<img class="card-img-top" src="data:image;base64,' . base64_encode($food->image) . '" alt="Card image cap">';
        $html .= '<div class="card-body">';
        $html .= '<h5 class="card-title weight-500">' . $food->foodName . '</h5>';
        $html .= '<h4 class="card-title weight-300">' . $food->price . '$</h4>';
        $html .= '<p class="card-text">' . $food->food_description . '</p>';
        $html .= '<a href="index.php?action=edit-menu&idFood=' . $food->idFood . '" class="btn btn-primary" style="color: #fff;">Edit</a>';
        $html .= '</div></div></div>';
    }
return $html;    
}



function generateListHtmlCode($foods){
    $html = '';
foreach ($foods as $food) {
    $html .= '<tr>';
    $html .= '<td>' . $food->idFood . '</td>';
    $html .= '<td><div class="oredrImageContainer"><img src="data:image;base64,' . base64_encode($food->Image) . '"></div></td>';
    $html .= '<td>' . $food->foodName . '</td>';
    $html .= '<td>' . $food->price . '</td>';
    $html .= '<td>' . (boolval($food->isInPromo) ? 'Yes' : 'No') . '</td>';
    $html .= '<td>' . (boolval($food->isAvailable) ? 'Yes' : 'No') . '</td>';
    $html .= '<td>' . $food->action_Date . '</td>';
    $html .= '<td>' . $food->categorie_name . '</td>';
    $html .= '<td>' . $food->mealtime_name . '</td>';
    $html .= '<td>' . $food->subcategorie_name . '</td>';
    $html .= '</tr>';    
}
return $html;
}


?>

