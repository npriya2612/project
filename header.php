<?php
session_start();
$page = basename($_SERVER['PHP_SELF'], ".php"); // this function retrieves the name of the file from the link
//.php is to remove the .php extension from the string returned
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lux/bootstrap.min.css" integrity="sha384-9+PGKSqjRdkeAU7Eu4nkJU8RFaH8ace8HGXnkiKMP9I9Te0GJ4/km3L1Z8tXigpG" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allura">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CookBook</title>
    <style>
        body
        {
            <?php if($page=="front"){echo "background-image: url('static/parallax.png');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
            <?php if($page=="home"){echo "background-image: url('static/home.png');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
            <?php if($page=="login"){echo "background-image: url('static/login.jpeg');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
            <?php if($page=="signup"){echo "background-image: url('static/signup.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
            <?php if($page=="add_entry"){echo "background-image: url('static/add_entry.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
            <?php if($page=="entry"){echo "background-image: url('static/entry.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
            <?php if($page=="activities"){echo "background-image: url('static/activity.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
            <?php if($page=="progress_a" || $page=="progress_g" || $page=="progress_i"){echo "background-image: url('static/prog.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
             <?php if($page=="goals" || $page=="ideas"){echo "background-image: url('static/goals.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
            <?php if($page=="add_goals" || $page=="add_ideas" || $page=='add_activites' || $page=='edit_a' || $page=='edit_g' || $page=='edit_i'){echo "background-image: url('static/add.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
            <?php if($page=="edit_task" || $page=='edit_entry' || $page=='edit_goal' || $page=='edit_activity' || $page=='edit_idea'){echo "background-image: url('static/edit.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
            <?php if($page=="delete" || $page=='add_activity_progress' || $page=='add_idea_progress' || $page=='add_goal_progress' || $page=='add_task' || $page=='delete_task' || $page=='delete_goal' || $page=='delete_idea' || $page=='delete_activity' || $page=='del_activity' || $page=='del_goal' || $page=='del_idea'){echo "background-image: url('static/delete.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            height: 100vh;
            background-attachment:fixed;";}?>
        }
    </style>
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="front.php" style="color:#ecceae; text-transform:capitalize; font-family:allura;">CookBook</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home
          </a>
        </li>
        <?php
         if(isset($_SESSION['user_data']))
         {
            echo "<li class='nav-item'>
            <a class='nav-link' href=''></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href=''></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href=''></a>
          </li>";
         }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
        if(isset($_SESSION['user_data']))
        {
            $x = $_SESSION['user_data'][0];
            echo "<li class = 'nav-item'><a class='nav-link'>Welcome $x</a></li><li class = 'nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
        }
        else
        {
            echo "<li class = 'nav-item'><a class = 'nav-link' href='signup.php'>Sign Up</a></li><li class = 'nav-item'><a class = 'nav-link' href='login.php'>Login</a></li>";
        }
        echo "<li class='nav-item'>
            <a class='nav-link' href='subscribe.php'>Subscribe to email</a>
          </li>";
        ?>
    </ul>
    </div>
  </div>
</nav>