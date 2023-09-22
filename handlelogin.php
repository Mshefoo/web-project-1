<!-- 
1. valdiation 
2. filteration 
-->

<?php

use LDAP\Result;
use PSpell\Config;

if (!empty($_POST['email'] && !empty($_POST['password']))) {
    echo 'hello';

    $email = htmlspecialchars(trim($_POST['email']));
    $password = md5(trim($_POST['password']));

    function login($email,$password){
        $user = null;
        require_once('Config.php');
        $qry = "SELECT * FROM USERS WHERE email ='$email' AND password = '$password'";
        $cn = mysqli_connect(DB_host,DB_user_name,DB_user_password,DB_name);
        $result = mysqli_query($cn,$qry);
        if ($data = mysqli_fetch_assoc($result)) {
            $user = $data;
        }
        mysqli_close($cn);
        return $user;
 
        // var_dump($cn);
    }
   $user = login($email,$password);

   if (!empty($user)) {
       
   }else {
    header("location:index.php?msg=w_e_p");
   }

}else {
    header("location:index.php?msg=empty_field");
}




?>