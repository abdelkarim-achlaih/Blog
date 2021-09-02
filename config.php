<?php
session_start();

$option ="";
if(isset($_GET['option'])) {
  $option = htmlspecialchars($_GET['option']);
}
$_SESSION['message_source'] = basename(__FILE__);
if ($option == 'sign') {
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['password'] == $_POST['re_password']) {
      if(strlen($_POST['password']) >= 8) {
        require('functions.php');
        $_POST = remove_script($_POST);
        $user = array(
          'first_name' => $_POST['first_name'],
          'last_name' => $_POST['last_name'],
          'username' => $_POST['username'],
          'email' => $_POST['email'],
          'password' => sha1($_POST['password']),
          'category' => $_POST['category'],
          'type' => 'user',
          'sign_in_date' => date('Y-m-d H:i:s', time()),
        );
        require_once('users.php');
        if(! user_exists_for_sign($user)) {
          sign_up($user);
          $_SESSION['message_email'] = $_POST['email'];
          $_SESSION['message_success'] = 'You are signed in seccessfully, log in now with you email';
          header("location: log.php");
        }
        else {
          $_SESSION['message_error'] = "Username or/and email already exist(s)";
          header("location: sign.php");
        }
      }
      else {
        $_SESSION['message_error'] = "Password too short";
        header("location: sign.php");
      }
    }
    else {
      $_SESSION['message_error'] = 'Passwords are not the same';
      header("location: sign.php");
    }
  }
  else {
    $_SESSION['message_error'] = "You are not permited to see this page this way: informations are not sent properly";
    header("location: sign.php");
  }
}
elseif ($option == 'log') {
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('functions.php');
    $_POST = remove_script($_POST);
    $user = array(
      'email' => $_POST['email'],
      'password' => sha1($_POST['password'])
    );
    require('users.php');
    if(email_exists_for_log_in($user)){
      if(verify_password($user)) {
        $user = get_user_infos($user);
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['message_index'] = "Welcome ".$user['first_name'];
        header("location: index.php");
      }
      else {
        $_SESSION['message_email'] = $_POST['email'];
        $_SESSION['message_error'] = "Wrong password";
        header("location: log.php");
      }
    }
    else {
      $_SESSION['message_email'] = $_POST['email'];
      $_SESSION['message_error'] = "You are not a user, sign up instead";
      header("location: sign.php");
    }
  }
}
elseif($option == 'logout') {
  foreach($_SESSION as $key => $value) {
    if($key != 'message_index' && $key != 'message_source') {
      unset($_SESSION[$key]);
    }
  }
  $_SESSION['message_index'] = "See you soon";
  header("location: index.php");
}
elseif($option == 'subscribe') {
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('functions.php');
    $_POST = remove_script($_POST);
    $user = array(
    'email' => $_POST['email'],
    );
    $_SESSION['message_email'] = $_POST['email'];
    require_once('users.php');
    if(user_exists_for_sign($user)) {
      $_SESSION['message_error'] = "Email already exists, log in instead";
      header("location: log.php");
    }
    else {
      $_SESSION['message_notification'] = "Complete your sign up";
      header("location: sign.php");
    }
  }
}
else {
  $_SESSION['message_error'] = "You are not permited to see this page this way: url error";
  header("location: sign.php");
}