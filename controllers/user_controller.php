<?php
require_once 'model/model_user.php';
require_once 'model/model_role.php';

class ControllerUser {
  private $modelUser;
  private $modelRole;

  public function __construct(){
    $this->modelUser = new modelUser();
    $this->modelRole = new modelRole();
  }

  public function listUsers(){
    $roles = $this->modelRole->getAllRoles();
    $users = $this->modelUser->getAllUsers();
    include 'view/user_list2.php';
    return $users;
  }
  
  public function addUser($username, $password, $role_name, $nama){
    // $obj_role = new modelRole();
    $roles = $this->modelRole->getRoleByName($role_name);
    
    // $roles = $this->modelRole->getAllRoles();
    // var_dump($role_name);
    // if ($roles === null) {
    //   throw new Exception("Role '{$role_name}' tidak ditemukan.");
    // }

    $this->modelUser->addUser($username, $password, $roles, $nama);
    header('location: index.php?modul=dataUser');
  }

  public function editUserById($idUser){
    $this->modelUser->getUserById($idUser);
    include 'view/role_list2.php';
  }

  public function updateUser($idUser, $username, $password, $role, $nama){
    $this->modelUser->updateUser($idUser, $username, $password, $role, $nama);
    header('location: index.php?modul=dataUser');
  }

  public function deleteUser($idUser){
    $detele = $this->modelUser->deleteUser($idUser);
    if ($detele == false){
      throw new Exception('Role tidak ada');
    }else {
      header('location: index.php?modul=dataUser');
    }
  }

  public function getUsers(){
    return $this->modelUser->getAllUsers();
  }

  public function getRoles(){
    return $this->modelRole->getAllRoles();
  }

  public function getUserByid($id){
    return $this->modelUser->getUserByid($id);
  }

  // public function getListUserName(){
  //   $listUserName = [];
  //   foreach($this->modelUser->getAllUsers() as $users){
  //     $listUserName[] = $users->username;
  //   }
  //   return $listUserName;
  // }

  public function getUserByName($name){
    return $this->modelUser->getUserByName($name);
  }
}
?>