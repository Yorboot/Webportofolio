<?php
global $pdo;
require_once "dbh.inc.php";
require_once "Checks.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    try {
        $stmt = $pdo->prepare("SELECT Image FROM PROJECTS WHERE Titel = :titel");
        $stmt->bindParam(":titel", $_POST["Titel"]);
        $stmt->execute();
        $Image = $stmt->fetch();
        unlink($Image["Image"]);

        $Titel =Cinput($_POST["Titel"]);
        $stmt = $pdo->prepare("DELETE FROM PROJECTS WHERE Titel = :Titel");
        $stmt->bindParam(":Titel",$Titel);
        $stmt->execute();
        header("Location../Projects.php");
        exit();
    }catch (Exception $e){
        echo $e->getMessage();
    }

}
