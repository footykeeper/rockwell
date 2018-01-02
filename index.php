<?php
session_start();
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/x-icon" href="media/images/favicon.ico"/>
  <title>Home // Footykeeper</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
    .switch{cursor:pointer;}
  </style>
</head>
<body>
  <div class="w3-blue-gray">
    <?php
    require_once 'navigation.php';
    ?>
  </div>
  <div class="w3-container w3-center w3-blue">
    <p class="w3-xxlarge">Recording Stats Is Easy as 1 - 2 - 3, and It's All Free!</p>
    <div class="stepDetails">
      <p class="w3-xlarge">Step 1: Sign Up</p>
      <p class="w3-large">To begin, go to the <a href="register.php">Register</a> page to create your free account with unlimited rosters, games, and access to all Footykeeper features.</p>
    </div>
    <div class="stepDetails">
      <p class="w3-xlarge">Step 2: Create Your Roster</p>
      <p class="w3-large">After creating your free account, head over to the <a href="rosters/">Roster Creator</a> to create and save your roster to your account! The roster creator interface is simple and easy to understand.</p>
    </div>
    <div class="stepDetails">
      <p class="w3-xlarge">Step 3: Start recording stats</p>
      <p class="w3-large">Now that your free account has been created and you have a roster saved, go to the <a href="tracker/">Tracker</a>, select one of your teams, and begin recording events such as (hopefully) goals, assists, saves, and (hopefully not) bookings.</p>
    </div>
    <p class="w3-xxlarge"><span class="switch" id="left">&laquo;</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="switch" id="right">&raquo;</span></p>
  </div>
  <script src="homepage-scripts/slideshow.min.js"></script>
</body>
</html>
