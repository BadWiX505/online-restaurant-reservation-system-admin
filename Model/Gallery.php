<?php  

class Gallery {
    private $idGallery;
    private $image;
    private $description;

    public function __construct($idGallery, $image, $description) {
        $this->idGallery = $idGallery;
        $this->image = $image;
        $this->description = $description;
    }

    // Getters
    public function getIdGallery() {
        return $this->idGallery;
    }

    public function getImage() {
        return $this->image;
    }

    public function getDescription() {
        return $this->description;
    }

    // Setters
    public function setIdGallery($idGallery) {
        $this->idGallery = $idGallery;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setDescription($description) {
        $this->description = $description;
    }


    public function InsertSelf(){
        require 'Model/Database.php';
        return Database::InsertGallery($this);
    }
}






?>