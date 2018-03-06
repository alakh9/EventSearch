<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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


$uname = $_POST['uname'];
$password = $_POST['password'];

$stmt = $dbh->prepare("SELECT * FROM registration WHERE username = :uname AND password = :pass;");
$stmt->bindParam(':uname', $uname); 
$stmt->bindParam(':pass', $password); 
$stmt->execute();
if($stmt->fetchAll())
{
    $_SESSION['un'] = $uname;
    $_SESSION['pass'] = $password;
    header("Location: home.php"); 
}
 else {
    echo 'Please enter valid username and password';
        echo '<a href="login.php"> Go Back </a>';
}


