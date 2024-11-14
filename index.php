<?php
require_once "model/model_role.php";
session_start();
$obj_role = new modelRole();

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
}