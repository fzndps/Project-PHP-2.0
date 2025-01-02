<?php
require_once "controllers/role_controller.php";
require_once "controllers/barang_controller.php";
// require_once "model/model_barang.php";
require_once "controllers/user_controller.php";
require_once "controllers/transaksi_controller.php";
require_once "controllers/auth_controller.php";
session_start();
// session_destroy();

$obj_role = new ControllerRole();
$obj_user = new ControllerUser();
$obj_barang = new ControllerBarang();
// $obj_barang = new modelBarang();
$obj_transaksi = new ControllerTransaksi();

if (isset($_GET['modul'])) {
  $modul = $_GET['modul'];
} else {
  $modul = "dashboard";
}

if (!isset($_SESSION['user']) && $modul != 'auth') {
  header('Location: index.php?modul=auth&action=login');
  exit;
}

switch ($modul) {
  case "dashboard":
    include 'view/kosong.php';
    break;
  case "role":

    $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    switch ($fitur) {
      case 'add':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $name = $_POST['role_name'];
          $desc = $_POST['role_description'];
          $status = $_POST['role_status'];
          $obj_role->addRole($name, $desc, $status);
        }
        break;

      case 'delete':
        $obj_role->deleteRole($id);
        break;

      case 'update':
        $obj_role->editById($role_id);
        break;

      case 'edit':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $id = $_POST['role_id'];
          $name = $_POST['role_name'];
          $desc = $_POST['role_description'];
          $status = $_POST['role_status'];
          $obj_role->updateRole($id, $name, $desc, $status);
        }
        break;

      default:
        $obj_role->listRole();
        break;
    }
    break;
  case "dataBarang":

    $insert = isset($_GET['insert']) ? $_GET['insert'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    switch ($insert) {
      case 'addBarang':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $nama = $_POST['namaBarang'];
          $harga = $_POST['hargaBarang'];
          $total = $_POST['totalBarang'];
          $obj_barang->addBarang($nama, $harga, $total);
        }
        break;

      case 'delete':
        $obj_barang->deleteBarang($id);
        break;

      case 'updateBarang':
        $obj_barang->editById($id);
        break;

      case 'editBarang':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $id = $_POST['idBarang'];
          $nama = $_POST['namaBarang'];
          $harga = $_POST['hargaBarang'];
          $total = $_POST['totalBarang'];
          $obj_barang->updateBarang($id, $nama, $harga, $total);
        }
        break;
      default:
        $obj_barang->listBarang();
        break;
    }
    break;

  case 'dataUser':

    $insert = isset($_GET['insert']) ? $_GET['insert'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    switch ($insert) {
      case 'addUser':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $role_name = $_POST['role_name'];
          $obj_user->addUser($username, $password, $role_name, $name);
        }
        break;

      case 'deleteUser':
        $obj_user->deleteUser($id);
        break;

      case 'updateUser':
        $obj_user->getUserByid($id);
        break;

      case 'editUser':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $idUser = $_POST['idUser'];
          $username = $_POST['username'];
          $password = $_POST['password'];
          $role_name = $_POST['role_name'];
          $role = $obj_role->getRoleByName($role_name);
          $obj_user->updateUser($idUser, $username, $password, $role, $name);
        }
        break;
      default:
        $users = $obj_user->listUsers();
        break;
    }
    break;
  case 'transaksi':
    $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
    switch ($fitur) {
      case 'add':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $customer_name = $_POST['customer'];
          $Customer = $obj_user->getUserByName($customer_name);
          $Kasir = $obj_user->getUserByid(1);
          $barang = $_POST['barang'];
          $jumlah = $_POST['jumlah'];

          $obj_barangs = [];
          foreach ($barang as $key => $item) {
            $obj_barangs[] = $obj_barang->getBarangById($item);
          }
          $obj_transaksi->addTransaksi($obj_barangs, $jumlah, $Customer, $Kasir);
        } else {
          $barangs = $obj_barang->getAllBarang();
          $customers = $obj_user->getUsers();
          include 'view/transaksi_input.php';
        }
      default:
        $obj_transaksi->listTransaksi();
        break;
    }
    break;
  case "auth":
    $authController = new AuthController();
    $action = isset($_GET['action']) ? $_GET['action'] : 'login';

    switch ($action) {
      case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $authController->login($username, $password);
        } else {
          include 'view/login.php';
        }
        break;
      case 'logout':
        $authController->logout();
        break;
      default:
        include 'view/login.php';
        break;
    }
    break;
}
