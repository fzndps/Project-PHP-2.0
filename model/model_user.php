<?php
require_once '../node/node_user.php';
require_once '../node/node_role.php';

class modelUser{
  private $users = [];
  private $nextId = 1;

  public function __construct()
    {
        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = count($this->users) + 1;
        } else {
            $this->initializeDefaultRole();
        }
    }

  public function addUser($username, $password, $role){
    $user = new user($this->nextId++, $username, $password, $role);
    $this->users[] = $user;
    $this->saveToSession();
  }

  private function saveToSession(){
    $_SESSION['users'] = serialize($this->users);
  }

  public function getUsers(){
    return $this->users;
  }

  public function initializeDefaultRole(){
    $obj_role1 = new role(1, "admin wangsaf", "adminwangsaf", 1);      
    $obj_role2 = new role(1, "admin rusdi", "adminfb", 1);      
    $this->addUser("rusdi@gmail.com", 123, $obj_role1);
    $this->addUser("amba@gmail.com", 123, $obj_role2);
  }
}

$obj_userModel = new modelUser();
$users = $obj_userModel->getUsers();
// print_r($users);

foreach ($users as $user){
  echo "username : ".$user->username, "<br>";
  echo "password : ".$user->password, "<br>";
  echo "role_name : " .$user->role->role_name, "<br>";
}
?>