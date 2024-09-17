<?php
require_once "includes/dbh.inc.php";
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
                <li>
                    <img src="includes/' . $image . '" alt="Project ' . $title . '">
                    <a href="' . $link . '">
                        <p>' . $description . '</p>
                    </a>
                    <button type="submit" class="Remove"></button>
                </li>';
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
