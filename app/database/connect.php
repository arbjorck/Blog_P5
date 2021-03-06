<?php

class DbConnect
{
  private $PDO;

  function __construct()
  {    
    try {
      $this->PDO = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      //echo 'Successfully connected to the database!';
      
    } catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  function dbConnect()
  {
    return $this->PDO;
  }

  function dbDisconnect()
  {
    $this->PDO = null;
    //echo 'Successfully disconnected from the database!';
  }
}