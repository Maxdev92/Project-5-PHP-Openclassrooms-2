<?php

namespace App\Manager;

class RegisterManager extends AbstractMAnager
{


public function register($username, $email, $password)
{
  $req = self::$_bdd->prepare("INSERT INTO user(username, email, password) values('".$username."','".$email."','".$password."')");  
  $req->execute();
  $req->closeCursor();
}


} 