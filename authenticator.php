<?
session_start();
require_once('database.php');

/**
 *  Authenticator Helper Class 
 * 
 * @TODO Document Authenticator Class & methods
 */

class AuthenticatorHelper{
  private $db;
  
  function AuthenticatorHelper(){
    $this->db = new DatabaseHelper();
    
    if($_POST['login']){
      $username = $_POST['login']['username'];  // Username submitted to form
      $password = $_POST['login']['password'];  // Password submitted to form
      
      if( $user = $this->login($username,$password) ){
          // $user being a user db row
          $_SESSION['user'] = $user;
      }else{
          // user/pass failed
          die('<h2>Incorrect username and/or password. Please <a href="/appsys">try again</a></h2>');
          $this->logout();
      }
    }
    
    if($_GET['logout']){
        $this->logout();
    }
  } 
  
  # @TODO Document AuthenticatorHelper->login()
  function login($username, $password){
    //Build query to find all users
    $sql = "SELECT * FROM users WHERE username = '$username'";
    
    // Run query to find specific user
    if( $result = $this->db->queryRow($sql) ){
        if( $result['password'] == $password ){
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = true;
        }else{
            $result = false;
        }
    }

    return $result;
  }
  
  # @TODO Document AuthenticatorHelper->logout()
  function logout(){
    session_destroy();
    header('Location: index.php');
  }
  
  # @TODO Document AuthenticatorHelper->logout()
  function isAuthenticated(){
    return $_SESSION['loggedIn'];
  }
  
  # @TODO Document AuthenticatorHelper->redirectUnauthenticatedUser()
  function redirectUnauthenticatedUser(){
      if( !$this->isAuthenticated() )
          $this->logout(); 
    }
}
