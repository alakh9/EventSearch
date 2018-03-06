<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
            <div class="row"><div class="col-md-3 col-md-offset-7 go_back" style="margin-top: 13px;"> <a href="index.html"> Go Back </a> </div> </div>
            <div class="row"> <h1 style="text-align: center;margin-top: 25px; color: grey;"> Sign Up </h1> </div>
            <div class="row"> 
                <div class="col-md-6 col-md-offset-4" style="margin-top:40px;">
                    <form class="register" action="savedata.php" method="post">
                        <div class="row">
                            <input type="text" class="fname" value="" name="fname" placeholder="Firstname" />
                        </div>
                        <div class="row">
                            <input type="text" class="lname" value="" name="lname" placeholder="LastName" />
                        </div>
                        <div class="row">
                            <input type="text" class="uname" value="" name="uname" placeholder="username" />
                        </div>
                        <div class="row">
                            <input type="password" class="password" name="password" value="" placeholder="Password" />
                        </div>
                         <div class="row">
                          <input type="submit" class="button" name="register" value="Register" /> 
                         </div>
                    
                        
                    </form>
                     </div>
                </div>
                
            </div>
            
        </div>
        <script src="js/jquery.min.js"></script>
       
        <script src="js/login.js"></script>
    </body>
</html>
