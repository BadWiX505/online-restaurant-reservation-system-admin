<?php  

require 'Model/Database.php';
require 'Model/Client.php';
class Notification {
    private $idNotification;
    private $time;
    private $date;
    private $isItRead;
    private $client;
    private $notifyName;

    // Constructor
    public function __construct($idNotification, $time, $date, $isItRead, $client, $notifyName) {
        $this->idNotification = $idNotification;
        $this->time = $time;
        $this->date = $date;
        $this->isItRead = $isItRead;
        $this->client = $client;
        $this->notifyName = $notifyName;
    }

    // Getters
    public function getIdNotification() {
        return $this->idNotification;
    }

    public function getTime() {
        return $this->time;
    }

    public function getDate() {
        return $this->date;
    }

    public function getIsItRead() {
        return $this->isItRead;
    }

    public function getClient() {
        return $this->client;
    }

    public function getNotifyName() {
        return $this->notifyName;
    }

    // Setters
    public function setIdNotification($idNotification) {
        $this->idNotification = $idNotification;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setIsItRead($isItRead) {
        $this->isItRead = $isItRead;
    }

    public function setClient($client) {
        $this->client = $client;
    }

    public function setNotifyName($notifyName) {
        $this->notifyName = $notifyName;
    }

    public static function getSelfs(){
       $db = Database::getInstance();
       return $db->getNotifications('Old');
    }

    public static function getNewSelfs(){
        $db = Database::getInstance();
        return $db->getNotifications('New');
     }

    public static function delSelfs(){
        $db = Database::getInstance();
       return $db->delNotifications();
    }
}



?>