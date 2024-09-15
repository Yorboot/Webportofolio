<?php
require_once "includes/dbh.inc.php";



function Project():void
{
    GetProjects();
    $Project = '
    <li>
        <img src="includes/<?php echo $results; ?>" alt="<?php echo $Project . $Title; ?>">
        <a href="<?php echo $Link; ?>"><p><?php echo $Description; ?></p></a>
    </li>';
    for($i=0;$i<count($results);$i++)
    {

        echo $Project;
    }

}
function GetProjects(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT `Image` FROM `Projects` WHERE `id` = 6");
    $stmt->execute();
    return $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
}