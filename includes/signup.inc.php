<?php
require 'dbh.inc.php';
?>
<?Php
 if(!isset($_POST['upbtn'])){
    header("location:../signup.php?clicksignup");
    exit();
 }else
 {//BUTTON WAS CLICKED!!!!!
    $upuser=$_POST['upuser'];
    $upemail=$_POST['upemail'];
    $uppass=$_POST['uppass'];
    $uprepeat=$_POST['uprepeat']; //FETCHED INPUTS

    //CHECK IF ANY INPUT IS EMPTY
    if(empty($upuser)|| empty($upemail ) ||empty($uppass) || empty($uprepeat)){
        header("location:../signup.php?error=empty&mail=".$upemail."&uid=".$upuser);
    exit();
    }elseif(!preg_match("/^[A-Za-z0-9]*$/",$upuser))
    {//IF NO INPUT IS EMPTY check that username is correct.
        header("location:../signup.php?error=username&mail=".$upemail);
        exit();
    }
    elseif(!filter_var($upemail,FILTER_VALIDATE_EMAIL))
    {
        header("location:../signup.php?error=email&uid=".$upuser);
        exit();
    }
    elseif(!($uppass==$uprepeat))
    {
        header("location:../signup.php?error=match&mail=".$upemail."&uid=".$upuser);
        exit();
    }
    else{// ALL THE ERRORS HAVE BEEN CHECKED NOW CHECK RECORD
      $sql="SELECT*FROM users WHERE emailusers=? OR uidusers=?";
      $stmt=mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../signup.php?error=database");
        exit();
       }else{
           mysqli_stmt_bind_param($stmt,'ss',$upemail,$upuser);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $result=mysqli_stmt_num_rows($stmt);
           if($result>0){
            header("location:../signup.php?error=taken");
            exit();
           }else{
               $sql="INSERT INTO users(emailusers,uidusers,pwdusers) VALUES(?,?,?);";
               $stmt=mysqli_stmt_init($conn);
               if(!mysqli_stmt_prepare($stmt,$sql)){
                header("location:../signup.php?error=database");
                exit();
               }
               else{
                   $pwd=password_hash($uppass,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,'sss',$upemail,$upuser,$pwd);
                mysqli_stmt_execute($stmt);
                header("location:../signup.php?signup=success");
                exit();
               }
           }



       }
       
    }

 }

?>