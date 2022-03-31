<?php

namespace App\Manager;

class RegisterManager extends AbstractManager
{

  /**
   * fonction qui enregistre l'utilisateur en bdd
   * @param string $username
   * @param string $email
   * @param string password
   * @return bool
   */
  public function register(string $username,string $email,string $password): bool
  {
    $hash = PASSWORD_DEFAULT;
    $password = password_hash($password, $hash);
    $req = self::$_bdd->prepare
    ("INSERT INTO user(username, email, password, role, created_at) values(?, ?, ?, ?, ?)");  
    $result = $req->execute([$username, $email, $hash, 'user', date("Y-m-d")]);
    $req->closeCursor();
    return $result;
  }


}
