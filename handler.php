<?php

require 'vendor/autoload.php';
session_start();
$salt = 'RaisaAndriana';

function HashPassword($input) {
  $retVal = md5(sha1($input . $salt));
  return $retVal;
}
function showDialogBox($message, $callbackUrl){
    echo '<script language="javascript">';
    echo 'alert("' . $message . '");';
    echo 'window.location.replace(\''.$callbackUrl.'\');';
    echo '</script>';
}
$config = array(
            'driver'    => 'mysql', // Db driver
            'host'      => 'localhost',
            'database'  => 'villago',
            'username'  => 'root',
            'password'  => 'naiknaikkepuncakgunung',
            'options'   => array( // PDO constructor options, optional
                PDO::ATTR_TIMEOUT => 5,
                PDO::ATTR_EMULATE_PREPARES => false,
            ),
        );

new \Pixie\Connection('mysql', $config, 'QB');

function IsUserExistByEmail($input) {
  $query = QB::table('users')->where('email', '=', $input);
  $row = $query->first();
  if (is_null($row)){
    $retVal = false;
  }
  else {
    $retVal = true;
  }
  return $retVal;
}

function AuthenticateUser($email, $password) {
  $query = QB::table('users')->where('email', '=', $email)->where('password', '=', HashPassword($password));
  $row = $query->first();
  if (is_null($row)){
    $retVal = false;
  }
  else {
    $retVal = true;
  }
  return $retVal;
}

function GetNameByEmail($email) {
  $query = QB::table('users')->where('email', '=', $input);
  $row = $query->first();
  if (is_null($row)){
    $retVal = null;
  }
  else {
    $retVal = $row['fullname'];
  }
  return $retVal;
}

function GetUserDetailsByEmail($email) {
  $query = QB::table('users')->where('email', '=', $input);
  $row = $query->first();
  if (is_null($row)){
    $retVal = null;
  }
  else {
    $retVal = $row;
  }
  return $retVal;
}

//$row = QB::table('users')->find(1);

//first, check for page var
if ($_GET['page'] == 'main') {
  if ($_GET['action'] == 'register') {
    if (!IsUserExistByEmail($_POST['email'])) {
      $data = array(
        'fullname' => $_POST['fullname'],
        'email' => $_POST['email'],
        'password' => HashPassword($_POST['password'])
      );
      $insertId = QB::table('users')->insert($data);
      showDialogBox('Data kamu telah tersimpan. Silahkan masuk :)','index.php');
    }
    showDialogBox('Email yang Anda gunakan telah terdaftar, silahkan langsung login.','index.php');
  }

  //login
  if ($_GET['action'] == 'login') {
    if (AuthenticateUser($_POST['email'],$_POST['password'])) {
      $fullname = GetNameByEmail($_POST['email']);
      $_SESSION['useremail'] = $_POST['email'];
      $GLOBALS['userdetails'] = array();
      $GLOBALS['userdetails'] = GetUserDetailsByEmail($_POST['email']);
      showDialogBox('Halo '. $fullname . '. Silahkan masuk :)','member/index.php');
    }
    else {
      showDialogBox('Login gagal, daftar dulu yah.','index.php');
    }

  }

}
if ($_GET['page'] == 'logout') {
  session_start();
  if(session_destroy()) {
      showDialogBox('Logout berhasil.','index.php');
   }
}
