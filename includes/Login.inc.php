<?php
if(session_status() == PHP_SESSION_NONE ){
    session_start();
}
require_once("dbh.inc.php");
require_once("Checks.php");
global $pdo;

$_SESSION["IsAdmin"] = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if(isset($_POST["uname"]) && isset($_POST["psw"])){
            $psw = Cinput($_POST["psw"]);
            $uName = Cinput($_POST["uname"]);
            $stmt = $pdo->prepare("SELECT password_hash,is_admin FROM users WHERE uname = :uname");
            $stmt->bindParam(":uname", $uName);
            $stmt->execute();
            $results = $stmt ->fetch();
            if(!$results){
                $_SESSION["error"] = "Wrong username";
            }
            if(password_verify($psw, $results["password_hash"])){
                $_SESSION["Psw"] = $psw;
                $_SESSION["Username"] = $uName;
                if($results["is_admin"] == 1){
                    $_SESSION["IsAdmin"] = true;
                }else{
                    $_SESSION["IsAdmin"] = false;
                }
                MainHead();
                exit();
            }else{
                $_SESSION["error"] = "Wrong password";
                MainHead();
                exit();
            }

       }else{
            header("Location: ../Contact.html");
            exit();
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
}