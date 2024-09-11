<?php
declare(strict_types=1);
if(session_status() == PHP_SESSION_NONE){session_start();}
require_once "dbh.inc.php";
global $pdo;
function Cinput(string $data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["Title"])&&isset($_POST["Description"])&&isset($_POST["image"])){
        try {
            $Title = Cinput($_POST["Title"]);
            $Description = Cinput($_POST["Description"]);
            $Link = $_POST["Link"];
            $img = $_POST["image"];
            $image = file_get_contents($_FILES[$img]['tmp_name']);
            $stmt = $pdo ->query("INSERT INTO Projects (Title, Description,Image,Link) VALUES (':Title', ':Description', ':image',':Link')");
            $stmt -> bindParam(':Title', $Title);
            $stmt -> bindParam(':Description', $Description);
            $stmt -> bindParam(':image', $image,PDO::PARAM_LOB);
            $stmt->bindParam(':Link', $link);
            $stmt -> execute();
            header("Location:../Contact.html");
            exit();
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }else{
        header("Location:../Projects.php");
    }



}