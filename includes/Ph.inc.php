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
    if(isset($_POST["Title"])&&isset($_POST["Description"])&&isset($_POST["Keywords"])){
        try {
            $Title = Cinput($_POST["Title"]);
            $Description = Cinput($_POST["Description"]);
            $Link = $_POST["Link"];
            $image = file_get_contents($_FILES['image']['uploads']);
            $stmt = $pdo ->query("INSERT INTO Projects (Title, Description,Image,Link) VALUES ('$Title:Title', '$Description:Description', '$image:image','$Link:Link')");
            $stmt -> bindParam(':Title', $Title);
            $stmt -> bindParam(':Description', $Description);
            $stmt -> bindParam(':image', $image);
            $stmt->bindParam(':Link', $link);
            $stmt -> execute();
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            header("Location:../Contact.html");
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }else{
        header("Location:../Projects.php");
    }



}