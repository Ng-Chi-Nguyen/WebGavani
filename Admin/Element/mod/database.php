<?php
   class Database {
      public $connect;
      public function __construct(){
         $init = parse_ini_file("config.ini");
         $serverName = $init["serverName"];
         $dbName = $init["dbName"];
         $userName = $init["userName"];
         $userPassword = $init["userPassword"];
         $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
         $this->connect = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $userPassword, $opt);
      }
   }