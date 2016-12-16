<?php

require 'vendor/autoload.php';

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

//session_start();



new \Pixie\Connection('mysql', $config, 'QB');

$query = QB::table('users')->where('email', '=', $_SESSION['useremail']);
$row = $query->first();
$GLOBALS['userdetails'] = $row;
if(!isset($_SESSION['useremail'])){
   header("location:index.php");
}
