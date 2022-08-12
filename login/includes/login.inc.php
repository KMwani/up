<?php
require 'dbh.inc.php';
?>
<?php
if(!isset($_POST['loginb'])){
    header("location:../index.php?clicklogin");
    exit();
 }else
 {//BUTTON WAS CLICKED!!!!!
    $inemail=$_POST['inemail'];
    $inpass=$_POST['inpass'];
   
    //CHECK IF ANY INPUT IS EMPTY
    if(empty($inemail)|| empty($inpass )){
        header("location:../index.php?error=empty&mail=".$inemail);
    exit();
    }else{
        $sql="SELECT*FROM users WHERE emailusers=? OR uidusers=?";
        $stmt=mysqli_stmt_init($conn);
         if(!mysqli_stmt_prepare($stmt,$sql)){
          header("location:../index.php?error=database");
          exit();
         }else{
             mysqli_stmt_bind_param($stmt,'ss',$inemail,$inemail);
             mysqli_stmt_execute($stmt);
             $result=mysqli_stmt_get_result($stmt);
             if($row=mysqli_fetch_assoc($result)){
                 $pwdv=password_verify($inpass,$row['pwdusers']);
                 if($pwdv==false){
                    header("location:../index.php?error=wrongpwd&mail=".$inemail);
                    exit(); 
                 }elseif($pwdv==true)
                 {
                    session_start();
                    $_SESSION['id']=$row['idusers'];
                    $_SESSION['uname']=$row['idusers'];
                    header("location:../index.php?login=successful");
                    exit(); 
                 }else{
                    header("location:../index.php?error=wrongpwd");
                    exit();  
                 }
             
             }else{
                header("location:../index.php?error=nonexistant");
                exit(); 
             }
            }
        }
    
}
?>