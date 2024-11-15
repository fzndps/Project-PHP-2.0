<?php
require_once "node/node_customer.php";
class modelCustomer{
  private $namaCustomer = [];

  public function __construct(){
    if (isset($_SESSION['namaCustomer'])){
      $this->namaCustomer = unserialize($_SESSION['namaCustomer']);
    }else {
      $this->initializeDefaultCustomer();
    }
  }

  public function initializeDefaultCustomer(){
    $this->addCustomer("Amba");
    $this->addCustomer("Fuad");
    $this->addCustomer("Rusdi");
    $this->addCustomer("Ironi");
    $this->addCustomer("Dicky");
  }

  public function addCustomer($namaCustomer){
    $customer = new customer($namaCustomer);
    $this->namaCustomer[] = $customer;
    $this->saveToSession();
  }

  private function saveToSession(){
    $_SESSION['namaCustomer'] = serialize($this->namaCustomer);
  }

  public function getAllCustomer(){
    return $this->namaCustomer;
  }
}

?>