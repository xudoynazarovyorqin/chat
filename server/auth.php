<?php


class Server
{
  public $errors = [];
  public function login()
  {
      $db = mysqli_connect('localhost', 'root', 'root', 'chat');
      $email = $_POST['email'];
      $password = $_POST['password'];
      $user_check_query = "SELECT * FROM users WHERE email='$email' and password='$password'";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      if($user != null){
  	      header("location: ../view/index.php?id=".$user['unique_id']);
      }if($user == null){
        header("location: ../login.view.php?error=1");
    }
  }

  public function register()
  {
      $db = mysqli_connect('localhost', 'root', 'root', 'chat');
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      
      if ($user) { 
          if ($user['email'] === $email) {
            array_push($this->errors, "1");
          }
      }
      $random_id = rand(time(), 10000000);
      if(count($this->errors) == 0 ){
        $query = "INSERT INTO users (unique_id, name, email, password) VALUES(' $random_id ','$name', '$email', '$password')";
        mysqli_query($db, $query);
        
  	    header("location: ../view/index.php?id=".$random_id);
      }if(count($this->errors) > 0 ){
      header("location: ../register.view.php?error=1");
      }
    }
    
  }