<?php
require_once 'node/node_user.php';
require_once 'node/node_role.php';

class modelUser
{
  private $users = [];
  private $nextId = 1;

  public function __construct()
  {
    if (isset($_SESSION['users'])) {
      $this->users = unserialize($_SESSION['users']);
      $this->nextId = count($this->users) + 1;
    } else {
      $this->initializeDefaultUser();
    }
  }

  private function initializeDefaultUser() {
    $obj_role2 = new role(2, "Kasir", "Kasir", 1);
    $obj_role1 = new role(1, "Admin", "Administration", 1);
    $this->addUser('rusdi@gmail.com', '666', $obj_role2);
    $this->addUser('amba@gmail.com', '666', $obj_role1);
}


public function addUser($username, $password, $role) {
  $user = new user($this->nextId++, $username, $password, $role);
  $this->users[] = $user;
  $this->saveToSession();
}

  private function saveToSession()
  {
    $_SESSION['users'] = serialize($this->users);
  }

  public function getAllUsers()
  {
    return $this->users;
  }

  public function deleteUser($user){
    if ($user != null){
      $key = array_search($user, $this->users);
      unset($this->users[$key]);
      $this->users = array_values($this->users);
      $this->saveToSession();
      return true;
    }
    return false;
  }

  public function updateUser($idUser, $username, $password, $role){
    $userLokal = $this->getUserByid($idUser);
    if($userLokal != null){
        $userLokal->username = $username;
        $userLokal->password = $password;
        $userLokal->role = $role;
        $this->saveToSession(); 
        return true;
    }
    return false;
}


  public function getUserByid($idUser) {
    foreach ($this->users as $user){
      if ($user->idUser == $idUser){
        return $user;
      }
    }
    return null;
  }

  // public function getUserByName($role_name){
  //   foreach ($this->users as $user){
  //     if ($user->role_name == $role_name){
  //       return $user;
  //         }
  //     }
  //   return null;
  // }

}

