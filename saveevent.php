<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$eventname = $_GET['ename'];
$url = $_GET['url'];
$date = $_GET['date'];

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
    $uname = $_SESSION['un']; 
    $pass = $_SESSION['pass'];
    $userid = '';
    $stmt = $dbh->prepare("SELECT id FROM registration WHERE username = :uname AND password = :pass;");
    $stmt->bindParam(':uname', $uname); 
    $stmt->bindParam(':pass', $pass); 
    $stmt->execute();
    $results = $stmt->fetchAll();
    foreach($results as $result){  
      foreach($result as $key => $value){
        $userid =  $value; }
    }
    if($stmt->fetchAll())
    {


    }
    
    $statement = $dbh->prepare("INSERT INTO event(name,ticket_url,date,user_id)
            VALUES(:name, :ticket_url, :date,:user_id)");
        $statement->execute(array(
            "name" => $eventname,
            "ticket_url" => $url,
            "date" => $date,
            "user_id" => $userid
        ));
        
        header("Location: home.php?saved='yes'");
        