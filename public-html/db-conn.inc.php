<?php
require 'db-pswd.inc.php';
 try {

     //DOCKER
     //$connection = new PDO('mysql:host=mysql;dbname=talker_db', 'root', 'talker-root-password');

     //VAGRANT
     //$connection = new PDO('mysql:host=localhost;dbname=talker_db', 'root', 'root');

     //XAMPP
     $connection = new PDO('mysql:host=localhost;dbname=talker_db', XAMPP[0],XAMPP[1]);

     print "Success! Connected to the database!";

 } catch (PDOException $e) {
     print "Error!: " . $e->getMessage() . "<br/>";
     die();
 }
?>
