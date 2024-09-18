<?php

if(session_status() == PHP_SESSION_NONE ){
    session_start();
}
require_once "Checks.php";
require_once "dbh.inc.php";

global $pdo;
    try {
        if(isset($_POST["uname"])&&isset($_POST["psw"])) {
            $psw = Cinput($_POST["psw"]);
            $uname = Cinput($_POST["uname"]);
            $Admin = Cinput($_POST["is_admin"]);
            $options = array("cost" => 15);
            $psw = password_hash($psw, PASSWORD_BCRYPT, $options);
            $stmt = $pdo->prepare("SELECT * FROM users WHERE uname = :uname");
            $stmt->bindParam(':uname', $uname);
            $stmt->execute();
            $stmt->fetch();
            if ($stmt->rowCount() > 0) {
                $_SESSION["Err"] = "Uname already exists";
                MainHead();
            }
            $stmt = $pdo->prepare("INSERT INTO users (uname, password_hash,is_admin) VALUES (:uname, :psw,:admin)");
            $stmt->bindParam(":uname", $uname);
            $stmt->bindParam(":psw", $psw);
            $stmt->bindParam(":admin", $Admin);
            $stmt->execute();
            header("Location: ../index.html");
            exit();
//        }else{
//            header("Location: ../Projects.php");
//        }
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
