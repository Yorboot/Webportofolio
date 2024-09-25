<?php
if(session_status() == PHP_SESSION_NONE){session_start();}
if(!isset($_SESSION["IsAdmin"])){$_SESSION["IsAdmin"] = false;}
require_once "includes/dbh.inc.php";
function Project(): void
{
    try {

        global $id;
        global $pdo;
        global $Image;
        $stmt = $pdo->prepare("SELECT * FROM `Projects`");
        $stmt->execute();
        $rows= $stmt->fetchall(PDO::FETCH_ASSOC);
        if ($rows === false) {
            echo "No projects found.";
            return;
        }
        foreach ($rows as $row) {
            $Image= htmlspecialchars($row['Image']);
            if($Image == null){echo "No image found";}
            $title = htmlspecialchars($row['Titel']);
            $link = htmlspecialchars($row['Link']);
            $id = $row['id'];
            $description = htmlspecialchars($row['Description']);

            echo '
                <li class="Cont">
                   <div class="Cont Row">
                    <img src="includes/' . $Image . '" alt="Project ' . $title . '">
                    <form method ="POST" action="Projects.php">
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <button type="submit" class="Remove Flex" name="remove_project" style="display: ' . (!$_SESSION["IsAdmin"] ? 'block' : 'none') . ';"></button>
                    </form>
                    
                   </div>

                    <a href="' . $link . '">
                        <p>' . $description . '</p>
                    </a>
                    
                </li>';
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST["id"])&&isset($_POST["remove_project"])){
                echo '
                <li>
                <form action="" id="Modal" class="Modal">
                    <h1 class="ModalT">Are you sure you want to delete this project</h1>
                    <div class="Inline">
                        <button class="Yes buttons" onclick="Close()">Yes</button>
                        <button class="NO buttons">No</button>
                    </div>
                </form>
                </li>
                <script>function Close(){
                    let modal = document.getElementById("Modal");
                    modal.style.display = "none";
                }</script>';
                Remove_Project_id($id);
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
function Remove_Project_id($id): void
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT Image FROM PROJECTS WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $Image = $stmt->fetch();
    unlink('"./includes/"'.$Image["Image"].'');

    $stmt = $pdo->prepare("DELETE FROM PROJECTS WHERE id = :id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    header("Location:Projects.php");
}

