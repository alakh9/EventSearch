<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$eventid = (int) $_GET["id"];

$hostname='localhost';
$username='root';
$password='';
$dbh = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=project",$username,$password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
  //  echo 'Connected to Database<br/>';

//    $sql = "SELECT * FROM stickercollections";
//foreach ($dbh->query($sql) as $row)
//    {
//    echo $row["collection_brand"] ." - ". $row["collection_year"] ."<br/>";
//    }
//
//
//    $dbh = null;
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
    
    $stmt = $dbh->prepare("DELETE FROM event WHERE event_id = :event_id");
    $stmt->bindParam(':event_id', $eventid);     
    
    if($stmt->execute())
    { 
        echo 'your evets has been deleted succesfully <a href="show_events.php"> Go Back to events </a>';
        
    }