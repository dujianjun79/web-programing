<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ERR="";
    if(empty($_POST["name"])){
        $ERR="Name is Required";
    }
    else{
        $name= test_input($_POST["name"]);
    }
    if(empty($_POST["username"])){
        $ERR="Username is Required";
    }
    else{
        $username= test_input($_POST["username"]);
    }
    if(empty($_POST["password"])){
        $ERR="Password is Required";
    }
    else{
        $password= test_input($_POST["password"]);
    }
    
    if(!empty($ERR)){
        header('Location: login.html');
        exit();
    }
    else{
        session_regenerate_id();
        $_SESSION['sess_user_id']=$name;
        $_SESSION['sess_username']=$username;
        session_write_close();
        header('Location: welcome.php');
    }
}
function test_input($data){
    $data=trim($data);
    $data= stripslashes($data);
    $data= htmlspecialchars($data);
    return $data;
}
?>
