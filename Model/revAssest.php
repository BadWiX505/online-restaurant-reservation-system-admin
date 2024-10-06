<?php  


class revAssest {
  
    private $client;
    private $idR;

    public function __construct($client, $food) {
        $this->client = $client;
        $this->idR = $food;
    }

    public function getClient() {
        return $this->client;
    }

    public function setClient($client) {
        $this->client = $client;
    }

    public function getidR() {
        return $this->idR;
    }

    public function setidR($idR) {
        $this->idR = $idR;
    }

}



?>