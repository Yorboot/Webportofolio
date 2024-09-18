<?php
if(session_status() == PHP_SESSION_NONE ){
    session_start();
}
if(!isset($_SESSION['Err'])){$_SESSION['Err']= '';}

require_once "includes/Register.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>
<header>
    <label for="Check" class="Hamburger">
        <input type="checkbox" id="Check">
    </label>
    <aside class="sidebar">
        <ul class="Nav">
            <li class="link"><a href="AboutMe.html">About me</a></li>
            <li class="link"><a href="Skillset.html">Skillset</a></li>
            <li class="link"><a href="Projects.php">Projects</a></li>
            <li class="link"><a href="AddProject.html">Add Project</a></li>
            <li class="link"><a href="RemoveProject.html">Remove Project</a></li>
            <li class="link"><a href="Contact.html">Contact</a></li>
        </ul>
    </aside>
</header>
<main class="Flex">
    <form action="includes/Register.php" class="Flex Form" method="post" enctype="multipart/form-data">
        <h1 class="Title">Register</h1>
        <label for="Uname" class="Labels Dt">
            U-name
            <input type="text" id="Uname" class="input" name="uname">
        </label>
        <label for="Psw" class="Labels Dt">
            Password:
            <input type="password" id="Psw" class="input" name="psw">
            <span><input class="Togel" id="Togel" type="checkbox" onclick="Click()"></span>
            <script>
                let input = document.getElementById("Psw");
                function Click() {
                    if (input.type === "password") {
                        input.type = "text";
                    } else if (input.type === "text") {
                        input.type ="password";
                    }
                }
            </script>
        </label>

        <label for="Is_admin" class="Labels Dt">
            is_admin
            <input type="text" class="input" name="is_admin">
        </label>
        <span class="Err"><?php echo $_SESSION['Err']; ?></span>
        <button class="Submit" type="submit">Submit</button>
    </form>
</main>
<footer>
    <span class="Coppyright">&copy;Roy</span>
</footer>


</body>
</html>