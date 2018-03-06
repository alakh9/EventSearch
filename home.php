<?php session_start();  

if(@isset($_GET['saved']))
{
?>
<script type="text/javascript">
alert('Your event has been saved');
</script>   
<?php }


?>
<html>
    <head>
        <title>events</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="row"> 
                <div class="col-md-2 col-md-offset-9"> <span class="welcome"> Welcome <?php echo $_SESSION['un']; ?> </span></div>
                <div class="col-md-1">  <div class="logout"> <a href="logout.php"> Logout </a>  </div> </div>
            </div>
            
            <div class="row"> 
                <div class="eventView row"> <p class="eventbtn"> <a href="show_events.php"> Show Saved Events </a></p>  </div>
               <div class="row" style="margin-top: -90px;">
                <div class="col-md-6 col-md-offset-4" style="margin-top:111px;">
                    <form class="events" action="#" method="post">
                        <div class="row">
                            <div class="col-md-4">  <input type="text" class="city" value="" placeholder="city" /></div>
                           <div class="col-md-3"> <input type="submit" class="button" name="get_city" value="Get City" /> </div>
                        </div>
                        
                    </form>
                </div> </div>
              </div>
           
            
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <table class="result" id="events">
                       <thead>
                        <tr>
                      
                         <th> Name </th>
                        <th> Buy Ticket </th>
                        <th> Date </th>
                         <th> Save event </th>
                        </tr>
                       <tbody class="tableresut">
                           
                       </tbody>
                    
                    </table>
                </div>
                </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/dataTables.buttons.min.js"></script>
        <script src="js/buttons.flash.min.js"></script>
        <script src="js/jquery.cookie.js"></script>
    
        <script src="server.js"></script>
    </body>
</html>
