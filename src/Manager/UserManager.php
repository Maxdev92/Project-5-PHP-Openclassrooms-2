<?php

namespace App\Manager;

use App\Models\User;

class UserManager extends AbstractManager
{

  const ALGO = PASSWORD_BCRYPT ; 
  /**
   * fonction qui enregistre l'utilisateur en bdd
   * @param string $username
   * @param string $email
   * @param string password
   * @return bool
   */
  public function register(string $username,string $email,string $password): bool
  {
    
    $passwordHashed = password_hash($password, self::ALGO);
    $req = self::$_bdd->prepare
    ("INSERT INTO user(username, email, password, role, createdAt) values(?, ?, ?, ?, ?)");  
    $result = $req->execute([$username, $email, $passwordHashed, 'user', date("Y-m-d")]);
    $req->closeCursor();
    return $result;
  }

  public function login(string $username, string $password):  bool{

    $passwordHashed= password_hash($password, self::ALGO);

    $req = self::$_bdd->prepare
    ("SELECT * FROM user where username =:username  ");
    $result = $req->execute(["username" =>$username]);

    if($req->rowCount() >0){
      $user = $req->fetch(\PDO::FETCH_ASSOC);
      if(password_verify($password, $user["password"])){
       $this->connectUser($user);
        return true;
      }
     
    }
        return false;
  }
  static public function connectUser(array $user){
    $_SESSION['username'] = $user['username'] ;
    $_SESSION['role'] = $user['role'] ;
  }
  static public function disConnectUser(){
    unset($_SESSION["username"]);
    unset($_SESSION["role"]);
  }

  static function getUser(int $id){
    return self::getOne('user', User::class, $id);
  }


}
