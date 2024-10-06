<?php

function displayGallleryAction()
{
  require 'View/Gallery.php';
}


function insertAction()
{
  require 'Model/Gallery.php';
  $image = null;

  if (isset($_FILES["image"])) {
    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
      // Read the uploaded file
      $image = file_get_contents($_FILES["image"]["tmp_name"]);
    }
  }
  $desc = $_POST['desc'];
  $gallery = new Gallery(null, $image, $desc);
  if ($gallery->InsertSelf()) {
    echo 'good';
  } else
    echo 'bad';
}



function showGalleries()
{
  $page = $_GET['pageN'];
  require 'Model/Database.php';
  $gals = Database::getGall($page);
  echo htmlFactory($gals);
}


function htmlFactory($gals)
{
  $html = '';
  if ($gals != null) {

    foreach ($gals as $item) {
      $html .= '<li class="col-lg-4 col-md-6 col-sm-12 ele">';
      $html .= '<div class="da-card box-shadow">';
      $html .= '<div class="da-card-photo">';
      $html .= '<img src="data:image;base64,' . base64_encode($item->getImage()) . '" alt="">';
      $html .= '<div class="da-overlay">';
      $html .= '<div class="da-social">';
      $html .= '<h5 class="mb-10 color-white pd-20">' . $item->getDescription() . '</h5>';
      $html .= '<ul class="clearfix">';
      $html .= '<li><a class="delGall" data-idg="' . $item->getIdGallery() . '"><i class="icon-copy dw dw-delete-3"></i></a></li>';
      $html .= '</ul>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</li>';
    }
  }

  return  $html;
}



function deleteGallery()
{
  require 'Model/Database.php';
  $id = $_GET['idGal'];
  if (Database::delGallery($id)) {
    echo 'good';
  } else {
    echo 'bad';
  }
}
