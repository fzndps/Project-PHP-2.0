<?php
  class user {
      public $idUser;
      public $username;
      public $password;
      public $role;
      // public $role_name;
  
      function __construct($idUser, $username, $password, $role) {
          $this->idUser = $idUser;
          $this->username = $username;
          $this->password = $password;
          $this->role = $role;
          // $this->role_name = $role_name;
      }
  }
?>