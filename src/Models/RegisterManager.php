<?php

namespace App\Models;

class RegisterManager extends Model{

public function sendRegister($username, $email, $password){
  $this->registerBdd($username, $email, $password); 
}



} 