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
    $stmt = $dbh->prepare("SELECT * FROM event WHERE user_id= :user_id;");
    $stmt->bindParam(':user_id', $userid); 
    $stmt->execute();
    $events = $stmt->fetchAll();
  ?>

<html>
    <head>
        <title>events</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link rel="stylesheet" href="css/bootstrap.min.css">
       
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="row"> 
                <div class="col-md-2 col-md-offset-9"> <span class="welcome"> Welcome,  <?php echo $_SESSION['un']; ?> </span></div>
                <div class="col-md-1">  <div class="logout"> <a href="logout.php"> Logout </a>  </div> </div>
            </div>
            
           
            
            <div class="row" style="margin-top: 78px;">
                <div class="col-md-12">
                    <table class="saved_events table table-striped" id="saved_events">
                       <thead>
                        <tr>
                      
                         <th> Name </th>
                        <th> Buy Ticket </th>
                        <th> Date </th>
                         <th> Delete </th>
                        </tr>
                       <tbody class="event_result">
                           <?php 
                            foreach($events as $event){ 
                             ?>    <tr> <td> <?php echo $event['name']; ?> </td>
                                 <td> <a target="_blank" href="<?php echo $event['ticket_url']; ?>"> Get Tickets </a></td>
                                 <td> <?php echo $event['date']; ?> </td>
                                 <td> <?php echo "<a href=delete_events.php?id=".$event['event_id']."> Delete </a>"; ?> </td>
                             </tr>
                               
                       <?php   }
                           
                           ?>
                       </tbody>
                    
                    </table>
                </div>
                </div>
            
            
            <div class="row"> <div class="col-md-3 col-md-offset-7 go_back" style="margin-top: 13px;"> <a href="home.php"> Go Back </a> </div> 
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <script src="js/jquery.cookie.js"></script>
    
        <script src="server.js"></script>
    </body>
</html>

    
    
    
    
