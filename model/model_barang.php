<?php
require_once "node/node_barang.php";
class modelBarang {
  private $barang = [];
  private $nextId = 1;
  private $objBarang;

  public function __construct(){
    if(isset($_SESSION['barang'])){
        $this->barang = unserialize($_SESSION['barang']);
        $this->nextId = count($this->barang)+1;
    }else{
        $this->initializeDefaultBarang();
    }
  }

  public function addBarang($namaBarang, $hargaBarang){
    $this->objBarang = new DataBarang($this->nextId++, $namaBarang, $hargaBarang);
    $this->barang[] = $this->objBarang;
    $this->saveToSession();
  }

  private function saveToSession(){
    $_SESSION['barang'] = serialize($this->barang);
  }

  public function getAllBarang(){
    return $this->barang;
  }

  public function initializeDefaultBarang(){
    $this->addBarang("Kulkas", 1000000);
    $this->addBarang("Kursi", 50000);
    $this->addBarang("Meja", 450000);
    $this->addBarang("Kasur", 800000);
    $this->addBarang("Lemari", 550000);
  }

  public function getBarangById ($id){
    foreach($this->barang as $barangs){
      if ($barangs->idBarang == $id){
        return $barangs;
      }
    }
    return null;
  }

  public function getListBarang(){
    $listBarang = [];
    foreach($this->barang as $barangs){
      $listBarang[] = $this->$barangs->namaBarang;
    }
    return $listBarang;
  }

}
?>