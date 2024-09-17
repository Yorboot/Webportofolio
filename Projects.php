<?php
require_once 'includes/Projects.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/Projects.css">
  <link rel="stylesheet" href="css/normalize.css">
  <title>Project</title>
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
    <ul>
      <li><h1>Projects</h1>
        <img src="Imgs/favcon.png" alt="Project Starbot">
        <a href="https://github.com/Roy123132123/Starbot"><p>Starbot is a long time project of mine which I have been working for over a year now it includes a full working login/register system and a discord bot which is being worked on</p></a>
      </li>
      <li>
        <img src="Imgs/Discordpf.png" alt="Project protofolio">
        <a href="https://github.com/Roy123132123/Webportofolio"><p>is this website my main webportfolio every so often I update it </p></a>
      </li>
      <li>
        <img src="Imgs/Gradient.jpg" alt="Project Gradient">
        <a href="https://github.com/Roy123132123/Gradient"><p>Gradients this is a gitHub repo with some documentation about all gradients in css and how to use them also includes code examples</p></a>
      </li>
        <?php
        Project();
        ?>
    </ul>
  </main>
  <footer>
    <span class="Coppyright">&copy;Roy</span>
  </footer>

</body>

</html>