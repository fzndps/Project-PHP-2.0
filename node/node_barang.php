<?php
class DataBarang{
  public $idBarang;
  public $namaBarang;
  public $hargaBarang;

  public function __construct($idBarang, $namaBarang, $hargaBarang){
    $this->idBarang = $idBarang;
    $this->namaBarang = $namaBarang;
    $this->hargaBarang = $hargaBarang;
  }
}
?>