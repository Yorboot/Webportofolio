<?php
require_once "includes/dbh.inc.php";
require_once "Remove.inc.php";
function Project(): void
{
    try {


        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM `Projects`");
        $stmt->execute();
        $rows= $stmt->fetchall(PDO::FETCH_ASSOC);
        if ($rows === false) {

            echo "No projects found.";
            return;
        }
        foreach ($rows as $row) {
            $image = htmlspecialchars($row['Image']);
            $title = htmlspecialchars($row['Titel']);
            $link = htmlspecialchars($row['Link']);
            $description = htmlspecialchars($row['Description']);

            echo '
                <li class="Cont">
                   <div class="Cont Row">
                    <img src="includes/' . $image . '" alt="Project ' . $title . '">
                    <form method ="POST">
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <button type="submit" class="Remove Flex" name="remove_project"></button>
                    </form>
                    
                   </div>

                    <a href="' . $link . '">
                        <p>' . $description . '</p>
                    </a>
                    
                </li>';
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST["id"])&&isset($_POST["remove_project"])){
                Remove_Project_id($rows['id']);
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
    unlink($Image["Image"]);

    $stmt = $pdo->prepare("DELETE FROM PROJECTS WHERE id = :id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    header("Location../Projects.php");
}

