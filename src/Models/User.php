<?php
namespace App\Models;

class User extends AbstractModel{
  private $username;
  private $password;
  private $email;
  private $role;
  private $createdAt;

  public function getUsername(){
    return $this->username;
  }
  public function setUsername(string $username){
    $this->username= $username;
  }
  public function getEmail(){
    return $this->email;
  }
  public function setEmail(string $email){
    $this->email= $email;
  }
  public function getPassword(){
    return $this->password;
  }
  public function setPassword(string $password){
    $this->password= $password;
  }
  public function getRole(){
    return $this->role;
  }
  public function setRole(string $role){
    $this->role= $role;
  }
  public function getCreatedAt(){
    return $this->createdAt;
  }
  public function setCreatedAt(string $createdAt){
    $this->createdAt= $this->formatDate($createdAt);
  }
}