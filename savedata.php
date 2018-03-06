<?php

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
    
   // print_r($_POST);
 
    if($_POST['fname'] == '' && $_POST['uname']== '' && $_POST['password']=='' )
    {
        echo 'Firstname Username and Password are mandatory fields';
        echo '<a href="registration.php"> Go Back </a>';
    }
 else {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $password = $_POST['password'];


        $stmt = $dbh->prepare("SELECT * FROM registration WHERE username = :uname AND password = :pass;");
        $stmt->bindParam(':uname', $uname); 
        $stmt->bindParam(':pass', $password); 
        $stmt->execute();
        if($stmt->fetchAll())
        {
            echo "This username is already exist.Please <a href='login.php'> Login </a>";
        }
        else
        {
        $statement = $dbh->prepare("INSERT INTO registration(fname,lname,username,password)
            VALUES(:fname, :lname, :username, :password)");
        $statement->execute(array(
            "fname" => $fname,
            "lname" => $lname,
            "username" => $uname,
            "password" => $password
        ));
        
        echo "Thank you for signing up. Please <a href='login.php'> Login </a>";
        }
}

   