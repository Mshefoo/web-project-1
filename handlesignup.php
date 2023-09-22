
<?php

use LDAP\Result;
use PSpell\Config;

if (!empty($_POST['email'] && !empty($_POST['password']) && !empty($_POST['name']))) {
    echo 'hello';

    $email = htmlspecialchars(trim($_POST['email']));
    $password = md5(trim($_POST['password']));
    $name = trim($_POST['name']);

    function signup($email,$password,$name){

        $user = null;
        require_once('Config.php');
        // $qry = "SELECT * FROM USERS WHERE email ='$email' AND password = '$password'";
        $qry = "INSERT INTO USERS (name,email,password) VALUES('$name','$email','$password') ";
        $cn = mysqli_connect(DB_host,DB_user_name,DB_user_password,DB_name);
        try {
           
            $result = mysqli_query($cn,$qry);
            mysqli_close($cn);
            return $result;


            header("location:index.php?msg=done");

        } catch (\Throwable $th) {

            mysqli_close($cn);
            header("location:sign_up.php?msg=email_exist");

            
        }
        // if ($data = mysqli_fetch_assoc($result)) {
        //     $user = $data;
        // }
        mysqli_close($cn);
        return $result;
 
        // var_dump($cn);
    }
   $result = signup($email,$password,$name);
//    header("location:index.php?msg=done");


}else {
    header("location:index.php?msg=empty_field");
}




?>