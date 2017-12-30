<?php
session_start();
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/x-icon" href="media/images/favicon.ico"/>
  <style>
    body {
      background-image: url('media/images/footykeeper-screenshot.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    .spacer {
      height: 100%;
      width: 100%;
    }

    .centered {
      position: absolute;
      text-align: center;
      top: 50%;
      left: 50%;
      transform: translateX(-50%) translateY(-50%);
      color: #fff;
      text-shadow: 1px 1px 5px #000;
    }

    .navbar {
      position: fixed;
      z-index: 99;
    }
  </style>
  <title>Home // Footykeeper</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="w3-bar w3-large w3-blue navbar">
    <a href=""><div class="w3-button">Home</div></a>
    <a href="tracker/"><div class="w3-button">Tracker</div></a>
    <a href="rosters/"><div class="w3-button">Roster Maker</div></a>
  </div>
  <div class="spacer">
    <p class="centered w3-jumbo">Recording Stats Made Easy</p>
  </div>
  <div class="w3-container w3-blue">
    <p class="w3-center w3-xxlarge">Track Easily</p>
    <span class="w3-large">With Footykeeper, creating your roster and recording player performances is as easy as 1-2-3! Just input your roster, give the converted roster string to the tracker, and record player events!</span>
    <p>If you are struggling to use the roster import system, try this video!</p>
    <video width="100%" controls>
      <source type="video/webm" src="media/tutorials/footykeeper-basic-tutorial.webm"/>
    </video>
    <br/><br/>
  </div>
</body>
</html>
