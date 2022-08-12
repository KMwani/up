<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
    <script src="styles/bootstrap/js/jquery.min.js"></script>
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
              <div class="navbar-brand">
                <img src="" alt="logo">
              </div>
              <div>
                <ul class="nav navbar-nav">
                    <li><a href="#index.php">Home</a></li>
                    <li><a href="#contacts.php">Contacts</a></li>
                    <li><a href="#About.php">About Me</a></li>
                </ul>
              </div>
            <div class="navbar-right">
            <?php
        if(isset($_SESSION['id'])){
            echo ' <form action="includes/logout.inc.php">
            <button class="formbtn"type="submit">Logout</button>
        </form>';
        }
        else{
            if(isset($_GET['error'])){
                if($_GET['error']=='empty'){
                   $mail=$_GET['mail'];
                   echo '
                   <p class="error" style="display:inline;">Fill all fields</p>
                   <form action="includes/login.inc.php" method="POST">
                   <input type="text" name="inemail" placeholder="Email/Username" value="'.$mail.'">
                   <input type="password" name="inpass" id=""  placeholder="Password">
                   <button name="loginb"  class="formbtn" type="submit">Login</button>
                   <a href="signup.php">Signup</a>
                   </form>';
                }elseif
                ($_GET['error']=='wrongpwd'){
                    $mail=$_GET['mail'];
                    echo '
                    <p class="error" style="display:inline;">wrong password</p>
                    <form action="includes/login.inc.php" method="POST">
                    <input type="text" name="inemail" placeholder="Email/Username" value="'.$mail.'">
                    <input type="password" name="inpass" id=""  placeholder="Password">
                    <button name="loginb"  class="formbtn" type="submit">Login</button>
                    <a href="signup.php">Signup</a>
                    </form>';
               }elseif
               ($_GET['error']=='database'){
                   $mail=$_GET['mail'];
                   echo '
            <p class="error" style="display:inline;">Mysql error</p>
            <form action="includes/login.inc.php" method="POST">
            <input type="text" name="inemail" placeholder="Email/Username" value="'.$mail.'">
            <input type="password" name="inpass" id=""  placeholder="Password">
            <button name="loginb"  class="formbtn" type="submit">Login</button>
            <a href="signup.php">Signup</a>
            </form>';     
               }
               elseif($_GET['error']=='nonexistant'){
                echo '
                <p class="error" style="display:inline;">User does not exist</p>
                <form action="includes/login.inc.php" method="POST">
                <input type="text" name="inemail" placeholder="Email/Username">
                <input type="password" name="inpass" id=""  placeholder="Password">
                <button name="loginb"  class="formbtn" type="submit">Login</button>
                <a href="signup.php">Signup</a>
                </form>';

               }
            }else{
                echo '
            
            <form action="includes/login.inc.php" method="POST">
            <input type="text" name="inemail" placeholder="Email/Username">
            <input type="password" name="inpass" id=""  placeholder="Password">
            <button name="loginb"  class="formbtn" type="submit">Login</button>
            <a href="signup.php">Signup</a>
            </form>';
            }
           
       
        }
        ?>

                
               
                
            </div>
            </div>
        </nav>
    
</body>
</html>