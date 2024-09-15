<?php
if(session_status() == PHP_SESSION_NONE){session_start();}
require_once "dbh.inc.php";
require_once "Checks.php";
global $pdo;
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["Image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["Title"])&&isset($_POST["Description"])&&isset($_FILES["Image"]["name"])){
        try {
            $Title = Cinput($_POST["Title"]);
            $Description = Cinput($_POST["Description"]);
            $Link = $_POST["Link"];
            $Img = CheckImg($imageFileType,$target_file)??null;

            if($Img == null){throw new Exception("File is null");}

            $stmt = $pdo ->prepare("INSERT INTO Projects (Titel, Description,Image,Link) VALUES (:Titel,:Description,:Image,:Link)");
            $stmt -> bindParam(':Titel', $Title);
            $stmt -> bindParam(':Description', $Description);
            $stmt -> bindParam(':Image', $target_file);
            $stmt -> bindParam(':Link', $Link);
            $stmt -> execute();
           //header("Location:../Contact.html");
            exit();
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }else{
        //header("Location:../Projects.php");
    }



}