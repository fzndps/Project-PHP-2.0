<?php
require_once "model/model_role.php";
require_once "model/model_barang.php";
require_once "model/model_user.php";

session_start();
// session_destroy();

$obj_role = new modelRole();
$obj_barang = new modelBarang();
$obj_user = new modelUser();


if (isset($_GET['modul'])) {
  $model = $_GET['modul'];
} else {
  $model = "dashboard";
}

switch ($model) {
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
          header('location: index.php?modul=role');
        } else {
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $name = $_POST['role_name'];
          $desc = $_POST['role_description'];
          $status = $_POST['role_status'];
          $obj_role->updateRole($id, $name, $desc, $status);

          header('location: index.php?modul=role');
        } else {
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $nama = $_POST['namaBarang'];
          $harga = $_POST['hargaBarang'];
          $total = $_POST['totalBarang'];
          $obj_barang->addBarang($nama, $harga, $total);
          header('location: index.php?modul=dataBarang');
        } else {
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $nama = $_POST['namaBarang'];
          $harga = $_POST['hargaBarang'];
          $total = $_POST['totalBarang'];
          $obj_barang->updateBarang($id, $nama, $harga, $total);
          header('location: index.php?modul=dataBarang');
        } else {
          include 'view/barang_list.php';
        }
        break;
      default:
        $barangs = $obj_barang->getAllBarang();
        include 'view/barang_list.php';
        break;
    }
  case 'dataUser':

    $insert = isset($_GET['insert']) ? $_GET['insert'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    switch ($insert) {
      case 'addUser':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $role_name = $_POST['role_name'];
          $role = $obj_role->getRoleByName($role_name);
          $obj_user->addUser($username, $password, $role);
          header('location: index.php?modul=dataUser');
        } else {
          $roles = $obj_role->getAllRoles();
          include 'view/user_input.php';
        }
        break;

      case 'deleteUser':
        if ($id != null) {
          $obj_user->deleteUser($id);
        }
        header('Location: index.php?modul=dataUser');
        break;

      case 'updateUser':
        $roles = $obj_role->getAllRoles();
        $user = $obj_user->getUserByid($id);
        include 'view/user_edit.php';
        break;

      case 'editUser':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $role_name = $_POST['role_name'];
          $role = $obj_role->getRoleByName($role_name); 
          $obj_user->updateUser($id, $username, $password, $role); 
          header('location: index.php?modul=dataUser');
        } else {
          $roles = $obj_role->getAllRoles();
          $user = $obj_user->getUserByid($id); 
          include 'view/user_list.php';
        }
        break;

      default:
        $users = $obj_user->getAllUsers();
        include 'view/user_list.php';
        break;
    }
}
