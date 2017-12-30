<?php
session_start();
require_once '../config.php';
$username = $_SESSION['username'];
require_once 'builder.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/x-icon" href="../media/images/favicon.ico"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
  <title>Roster Creator // Footykeeper</title>
</head>
<body>
  <?php
  require_once '../navigation.php';
  ?>
  <div class="w3-container">
    <br/>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
      <div id="inputs">
        <input type="text" placeholder="Player Name" class="name"/><br/><br/>
        <input type="text" placeholder="Player Name" class="name"/><br/><br/>
        <input type="text" placeholder="Player Name" class="name"/><br/><br/>
        <input type="text" placeholder="Player Name" class="name"/><br/><br/>
        <input type="text" placeholder="Player Name" class="name"/>
        <input id="string" name="data" hidden/>
      </div>
      <hr/>
      <input type="submit" id="sendRoster" hidden/>
    </form>
    <button class="w3-button w3-blue" id="create">Create Roster</button>
    <br/><br/>
    <button class="w3-button w3-blue" id="playerAdd">Add Player</button>
    <div id="final" hidden>
      <p>Your Roster:</p>
      <p id="display"></p>
    </div>
  </div>
  <script src="builder.min.js"></script>
</body>
</html>
