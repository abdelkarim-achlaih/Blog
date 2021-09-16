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
          'gender' => $_POST['gender']
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
        $_SESSION['message_error'] = "Password is too short";
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
        $_SESSION['id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['message_index'] = "Welcome ".$user['first_name'].' ✌';
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
  $_SESSION['message_index'] = "See you soon 👋";
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
elseif ($option == 'update') {
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(sha1($_POST['password']) == $_SESSION['password']) {
      $user = array(
        'password' => $_SESSION['password']
      );
      if(isset($_POST['new_password']) && isset($_POST['re_new_password'])) {
        if($_POST['new_password'] == $_POST['re_new_password']) {
          if($_POST['new_password'] <> 0) {
            if(strlen($_POST['new_password']) >= 8) {
              $_POST['new_password'] = strip_tags($_POST['new_password']);
              $user = array(
                'password' => sha1($_POST['new_password']),
              );
            }
            else {
              $_SESSION['message_error'] = "Password is too short";
              header("location: sign.php");
              exit;
            }
          }
        }
        else {
          $_SESSION['message_error'] = "The new passwords are not the same";
          header("location: settings.php");
          exit;
        }
      }
      require('functions.php');
      $_POST = remove_script($_POST);
      $user['id'] = $_SESSION['id'];
      $user['first_name'] = $_POST['first_name'];
      $user['last_name'] = $_POST['last_name'];
      $user['category'] = $_POST['category'];
      $user['gender'] = $_POST['gender'];
      require_once('users.php');
      update_user_info($user);
      $user['email'] = $_SESSION['email'];
      $user = get_user_infos($user);
      $_SESSION['id'] = $user['id'];
      $_SESSION['first_name'] = $user['first_name'];
      $_SESSION['last_name'] = $user['last_name'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['password'] = $user['password'];
      $_SESSION['gender'] = $user['gender'];
      $_SESSION['message_success'] = 'Your informations have been updated seccessfuly';
      header("location: settings.php");
    }
    else {
        $_SESSION['message_error'] = "Wrong old password";
        header("location: settings.php");
    }
  }
  else {
    $_SESSION['message_error'] = "You are not permited to see this page this way: informations are not sent properly";
    header("location: settings.php");
  }
}
elseif ($option == 'delete') {
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(sha1($_POST['password']) == $_SESSION['password']) {
      $user['id'] = $_SESSION['id'];
      require('users.php');
      delete_user($user);
      foreach($_SESSION as $key => $value) {
        if($key != 'message_index' && $key != 'message_source') {
          unset($_SESSION[$key]);
        }
      }
      $_SESSION['message_index'] = "We are sad to lose you, see you soon 😪";
      header("location: index.php");
    }
    else {
      $_SESSION['message_error'] = "Wrong password";
      header("location: settings.php");
    }
  }
  else {
    $_SESSION['message_error'] = "You are not permited to see this page this way: informations are not sent properly";
    header("location: settings.php");
  }
}
elseif ($option == 'blog-add') {
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(strlen($_POST['title']) > 10) {
      if(strlen($_POST['content']) > 50) {
        require('functions.php');
        $_POST = remove_script($_POST);
        $blog = array(
          'title' => $_POST['title'],
          'content' => $_POST['content'],
          'category' => $_POST['category'],
          'pending' => 1,
          'author' => $_SESSION['id'],
          'creation_date' => date('Y-m-d H:i:s', time())
        );
        require_once('blogs.php');
        blog_add($blog);
        $_SESSION['message_success'] = 'The blog has been seccessfuly sent to admins, wait a bit until they approve it';
        header("location: post.php");
      }
      else {
        $_SESSION['message_error'] = "The blog is too short, you must have at least 50 charcters";
        header("location: post.php");
      }
    }
    else {
      $_SESSION['message_error'] = "The title is too short, you must have at least 10 charcters";
      header("location: post.php");
    }
  }
  else {
    $_SESSION['message_error'] = "You are not permited to see this page this way: informations are not sent properly";
    header("location: post.php");
  }
}
elseif ($option == 'comment-add') {
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('functions.php');
    $_POST = remove_script($_POST);
    $comment = array(
      'author' => $_SESSION['comment_author'],
      'content' => $_POST['content'],
      'blog' => $_SESSION['comment_blog'],
      'creation_date' => date('Y-m-d H:i:s', time())
    );
    $blog_destination_id = $_SESSION['comment_blog'];
    unset($_SESSION['comment_author']);
    unset($_SESSION['comment_blog']);
    require_once('comments.php');
    comment_add($comment);
    $_SESSION['message_index'] = 'The comment has been seccessfuly added';
    header('location: blog.php?blog_id='.$blog_destination_id);
  }
  else {
    $_SESSION['message_error'] = "You are not permited to see this page this way: informations are not sent properly";
    header("location: blog.php");
  }
}
else {
  $_SESSION['message_error'] = "You are not permited to see this page this way: url error";
  header("location: index.php");
}