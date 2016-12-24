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
  if ($_GET['action'] == 'GetNearbyVillasByGeolocation') {
    $latitude = $_GET['latitude'];
    $longtitude = $_GET['longtitude'];
    $radius = $_GET['radius'];

    $query = QB::query("SELECT id,name,description,price,address,( 6371 * acos( cos( radians($latitude) ) * cos( radians( latitude ) ) * cos( radians( longtitude ) - radians($longtitude) ) + sin( radians($latitude) ) * sin( radians( latitude ) ) ) ) AS distance FROM villas HAVING distance < $radius ORDER BY distance LIMIT 0 , 20;");
    $result = $query->get();
    $output = array(
            'data' => $result
        );
    header('Content-Type: application/json');
    echo json_encode($output);
  }
}
if ($_GET['page'] == 'add') {
  if ($_GET['action'] == 'add') {
    $data = array(
      'name' => $_POST['villaname'],
      'description' => $_POST['description'],
      'price' => $_POST['price'],
      'latitude' => $_POST['latitude'],
      'longtitude' => $_POST['longtitude'],
      'address' => $_POST['address'],
      'user_id' => $_POST['userid']
    );
    $insertId = QB::table('villas')->insert($data);
    showDialogBox('Data kamu telah tersimpan.','member/index.php');
  }
}
if ($_GET['page'] == 'edit') {
  if ($_GET['action'] == 'update') {
    $data = array(
      'name' => $_POST['villaname'],
      'description' => $_POST['description'],
      'price' => $_POST['price'],
      'latitude' => $_POST['latitude'],
      'longtitude' => $_POST['longtitude'],
      'address' => $_POST['address'],
      'user_id' => $_POST['userid']
    );
    QB::table('villas')->where('id', $_POST['villaid'])->update($data);
    showDialogBox('Data kamu telah tersimpan.','member/index.php');
  }
}
if ($_GET['page'] == 'villa') {
  if ($_GET['action'] == 'delete') {
    QB::table('villas')->where('id', '=', $_GET['id'])->delete();
    showDialogBox('Data kamu telah dihapus.','member/index.php');
  }
}
if ($_GET['page'] == 'logout') {
  session_start();
  if(session_destroy()) {
      showDialogBox('Logout berhasil.','index.php');
   }
}
