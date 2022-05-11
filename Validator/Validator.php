<?php
//This Class is intended to validate all user inputs be it text, email, number, file, etc of a form

class Validator{
 
private $data;
private $errors = [];
private static $fields = ['username', 'email'];

public function __construct($post_data){
   $this->data = $post_data;

}
    
public function validateForm(){
   //This to enforce that the name attribute in the form is available e.g name="username"
 foreach(self::$fields as $field){
    if(!array_key_exists($field, $this->data)){
    trigger_error($field.' is not in the field');
    return;
    }
   
 }
 $this->validateUsername();
 $this->validateEmail();
return $this->errors;
}

private function validateUsername(){
$val = trim($this->data['username']);
if(empty($val)){
$this->addError('username', 'The username cannot be empty');

}else{
   if(!preg_match('/^[0-9a-zA-Z_-]{5,15}$/', $val)){
      $this->addError('username', 'The username is invalid');
   }
}
}

private function validateEmail(){
   $val = trim($this->data['email']);
   if(empty($val)){
   $this->addError('email', 'The email cannot be empty');
   
   }else{
      if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
         $this->addError('email', 'The email is invalid');
      }
   }

}


private function addError($key, $val){
$this->errors[$key] = $val;

}





}