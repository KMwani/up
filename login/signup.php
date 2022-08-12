<?php
require 'header.php';
?>
<form class="signup" action="includes/signup.inc.php" method="post">
    <div class="input">
        <style>
            .error{
                color: red;
            }
            .success{
                color: green;
            }
        </style>
        <?php
        //TO READ THE ERROR AND GIVE A MESSAGE
         if(isset($_GET['error'])){
             if($_GET['error']=='empty'){
                $uid=$_GET['uid'];
                $mail=$_GET['mail'];
                 echo '<p class="error" style="font-size:18px;">Please fill in all fields</p>
                 <input type="text" name="upuser"  placeholder="Username" value="'.$uid.'"><br>
                 <input type="text" name="upemail"  placeholder="Email" value="'.$mail.'"><br>';    
             }elseif
             ($_GET['error']=='email'){
                 $uid=$_GET['uid'];
                echo '<p class="error" style="font-size:18px;">Please use a valid email</p>
                <input type="text" name="upuser"  placeholder="Username value="'.$uid.'"><br>
                <input type="text" name="upemail"  placeholder="Email"><br>';    
            }elseif
            ($_GET['error']=='username'){
                $mail=$_GET['mail'];
                echo '<p class="error" style="font-size:18px;">Please use a valid username</p>
                <input type="text" name="upuser"  placeholder="Username"><br>
                <input type="text" name="upemail"  placeholder="Email" value="'.$mail.'"><br>';     
            }elseif
            ($_GET['error']=='database'){
                $uid=$_GET['uid'];
                $mail=$_GET['mail'];
                echo '<p class="error" style="font-size:18px;">Database error</p>
                <input type="text" name="upuser"  placeholder="Username" value="'.$uid.'"><br>
                <input type="text" name="upemail"  placeholder="Email" value="'.$mail.'"><br>';   
            }elseif
            ($_GET['error']=='match'){
                $uid=$_GET['uid'];
                $mail=$_GET['mail'];
                echo '<p class="error" style="font-size:18px;">Passwords did not match</p>
                <input type="text" name="upuser"  placeholder="Username" value="'.$uid.'"><br>
                <input type="text" name="upemail"  placeholder="Email" value="'.$mail.'"><br>';     
            }elseif
            ($_GET['error']=='taken'){
                echo '<p class="error" style="font-size:18px;">The username or email is already in use</p>
                <input type="text" name="upuser"  placeholder="Username"><br>
             <input type="text" name="upemail"  placeholder="Email"><br>';    
            }
         }elseif(isset($_GET['signup'])){
            echo '<p class="success" style="font-size:18px;">Successful signup</p>
            <input type="text" name="upuser"  placeholder="Username"><br>
            <input type="text" name="upemail"  placeholder="Email"><br>';
         }else{
             echo '<input type="text" name="upuser"  placeholder="Username"><br>
             <input type="text" name="upemail"  placeholder="Email"><br>';
         }
        ?>
                
                <input type="password" name="uppass" id=""  placeholder="Password"><br>
                <input type="password" name="uprepeat" id=""  placeholder="Repeat-Password"><br><br>
                <button name="upbtn"  type="submit">Signup</button>
     </div>
 </form>