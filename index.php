<?php
require_once "model/model_role.php";
require_once "model/model_barang.php";

session_start();
// session_destroy();

$obj_role = new modelRole();
$obj_barang = new modelBarang();


if (isset($_GET['modul'])){
  $model = $_GET['modul'];
}else {
  $model = "dashboard";
}

switch($model){
  case "dashboard":
    include 'view/kosong.php';
    break;
  case "role":

    $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    switch($fitur){
      case 'add':
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          $name = $_POST['role_name'];
          $desc = $_POST['role_description'];
          $status = $_POST['role_status'];
          $obj_role->addRole($name, $desc, $status);
          header('location: index.php?modul=role');
        }else {
          include 'view/role_input.php';
        }
        break;
      case 'delete':
        $obj_role->deleteRole($id);
        header('location: index.php?modul=role');
        break;
      case 'update':
        $role = $obj_role->getRoleById($id);
        include 'view/role_edit.php';
        break;
      case 'edit':
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          $name = $_POST['role_name'];
          $desc = $_POST['role_description'];
          $status = $_POST['role_status'];
          $obj_role->updateRole($id,$name, $desc, $status);
          
          header('location: index.php?modul=role');
        }else {
          include 'view/role_list.php';
        }
        break;
      default:
        $roles = $obj_role->getAllRoles();
        include 'view/role_list.php';
        break;
    }
  case "dataBarang":

    $insert = isset($_GET['insert']) ? $_GET['insert'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    switch ($insert) {
      case 'addBarang':
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          $nama = $_POST['namaBarang'];
          $harga = $_POST['hargaBarang'];
          $total = $_POST['totalBarang'];
          $obj_barang->addBarang($nama, $harga, $total);
          header('location: index.php?modul=dataBarang');
        }else {
          include 'view/barang_input.php';
        }
        break;

      case 'delete':
        $obj_barang->deleteBarang($id);
        header('location: index.php?modul=dataBarang');
        break;

      case 'updateBarang':
        $barang = $obj_barang->getBarangById($id);
        include 'view/barang_edit.php';
        break;

      case 'editBarang':
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          $nama = $_POST['namaBarang'];
          $harga = $_POST['hargaBarang'];
          $total = $_POST['totalBarang'];
          $obj_barang->updateBarang($id, $nama, $harga, $total);
          header('location: index.php?modul=dataBarang');
        }else {
          include 'view/barang_list.php';
        }
        break;
      default:
        $barangs = $obj_barang->getAllBarang();
        include 'view/barang_list.php';
        break;
    }
    break;
  
    // case 'transaksiInput':
    //   $barangs = $obj_barang->getAllBarangs();
    //   $customers = $obj_customer->getAllCustomer();
    //   include 'view/transaksi_input.php';
    //   break;
    // case 'transaksiList':
    //   include 'view/transaksi_list.php';
    //   break;
}