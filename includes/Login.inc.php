<?php
if(session_status() == PHP_SESSION_NONE){session_start();}
require_once("Checks.php");
require_once("dbh.inc.php");
global $pdo;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $psw = Cinput($_POST["password"]);
            $uName = Cinput($_POST["username"]);
            $stmt = $pdo->prepare("SELECT password_hash FROM users WHERE username = :username");
            $stmt->bindParam(":username", $uName);
            $stmt->execute();
            if()){
                $_SESSION["error"] = "Wrong username or password";
            }
            if(password_verify($psw, $stmt->fetch(PDO::FETCH_ASSOC)["password_hash"])){
                $session["Psw"] = $psw;
                $session["Username"] = $uName;
            }
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
}