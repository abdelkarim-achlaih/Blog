<?php
session_start();

$option ="";
if(isset($_GET['option'])) {
  $option = htmlspecialchars($_GET['option']);
}

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
          $email = $_POST['email'];
          $message = 'You are signed in seccessfully, log in now with you email';
          header("location: log.php?email=$email&message=$message");
        }
        else {
          $error = "Username or/and email already exist(s)";
          header("location: sign.php?error=$error");
        }
      }
      else {
        $error = "Password too short";
        header("location: sign.php?error=$error");
      }
    }
    else {
      $error = 'Passwords are not the same';
      header("location: sign.php?error=$error");
    }
  }
  else {
    $error = "You are not permited to see this page this way: informations are not sent properly";
    header("location: sign.php?error=$error");
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
        $message = "Welcome ".$user['first_name'];
        header("location: index.php?message=$message&option=$option");
      }
      else {
        $error = "Wrong password";
        header("location: log.php?error=$error");
      }
    }
    else {
      $error = "You are not a user, sign up instead";
      header("location: sign.php?error=$error");
    }
  }
}
elseif($option == 'logout') {
  session_destroy();
  $message = "See you soon";
  header("location: index.php?message=$message&option=$option");
}


elseif($option == 'subscribe') {
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('functions.php');
    $_POST = remove_script($_POST);
    $user = array(
    'email' => $_POST['email'],
    );
    $email = $_POST['email'];
    require_once('users.php');
    if(user_exists_for_sign($user)) {
      $error = "Email already exists, log in instead";
      header("location: log.php?error=$error&email=$email");
    }
    else {
      $message = "Complete your sign up";
      header("location: sign.php?email=$email&message=$message");
    }
  }
}
else {
  $error = "You are not permited to see this page this way: url error";
  header("location: sign.php?error=$error");
}