<?php
session_start();
require_once '../config.php';
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/x-icon" href="../media/images/favicon.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Free Soccer/Football Player Stat Tracker">
  <meta name="keywords" content="soccer,football,point,points,tracker,https,free,online">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
  <title>Footykeeper Performance Tracker</title>
  <style>.full {width: 100%;}</style>
</head>
<body>
  <?php
  require_once '../navigation.php';
  ?>
  <div id="pre">
    <div class="w3-container">
      <p>Enter your roster here:</p>
<?php
    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        echo '<input type="text" class="w3-input" id="rosterInput" placeholder="Roster"/>';
    } else {
        $sql = 'SELECT roster_string FROM rosters WHERE creator_name = "' . $username . '";';
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo '<select class="w3-input" id="rosterInput">';
            while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["roster_string"] . '"/>';
            }
            echo '</select>';
        } else {
            echo '<input type="text" class="w3-input" id="rosterInput" placeholder="Roster"/>';
        }  
    }
?>
      <br/><br/>
      <button class="w3-button w3-blue" id="ready">Submit</button>
      <hr/>
      <p>Don't have a roster? Get one <a target="_blank" href="../rosters/">here</a>!</p>
    </div>
  </div>
  <div id="main" hidden>
    <img id="gold-card" src="../media/images/gold-card.png" hidden/>
    <div class="w3-container w3-gray w3-center">
      <br/>
      <button class="w3-button w3-light-grey" id="concede">Goal Conceded</button>
      <button class="w3-button w3-light-grey" id="clean">Clean Sheet (select this at the end of the game)</button>
    </div>
    <table id="inputTable" class="w3-container w3-gray w3-container full"></table>
    <div class="w3-gray w3-container w3-center">
      <button class="w3-button w3-light-grey" id="submit">Submit Events</button>
      <button class="w3-button w3-light-grey" id="positions">Submit Positions (important)</button>
      <br/><br/>
      <button class="w3-light-grey w3-button" id="table">View Complete Stats</button>
      <br/><br/>
      <button class="w3-light-grey w3-button" id="print">Print</button>
      <br/><br/>
    </div>
  </div>
  <!-- The stats table -->
  <div id="fin" class="w3-center" style="overflow-x: scroll; width: 100%" hidden>
    <br/><button class="w3-red w3-button" id="hide">Hide Stats</button><br/><br/><table class="w3-table w3-striped w3-hoverable"><thead><tr><th>Player</th><th>Points</th><th>Goals</th><th>Assists</th><th>Key Passes</th><th>Shots on Target</th><th>Successful Open Play Crosses</th><th>Successful Dribbles</th><th>Dispossessed</th><th>Own Goals</th><th>Clean Sheets</th><th>Saves</th><th>Interceptions</th><th>Tackles Won</th><th>Goals Conceded</th><th>Penalties Saved</th><th>Yellow Card</th><th>Red Cards</th><th>Aerials Won</th><th>Effective Clearance</th></tr></thead><tbody id="stats"></tbody></table></div>
  <!-- The printer-friendly section -->
  <div id="printArea" class="w3-center" style="overflow-x: scroll; width: 100%" hidden>
    <table class="w3-table w3-striped w3-hoverable" style="font-size: 7px"><thead><tr><th>Player</th><th>Points</th><th>Goals</th><th>Assists</th><th>Key Passes</th><th>Shots on Target</th><th>Successful Open Play Crosses</th><th>Successful Dribbles</th><th>Dispossessed</th><th>Own Goals</th><th>Clean Sheets</th><th>Saves</th><th>Interceptions</th><th>Tackles Won</th><th>Goals Conceded</th><th>Penalties Saved</th><th>Yellow Card</th><th>Red Cards</th><th>Aerials Won</th><th>Effective Clearance</th></tr></thead><tbody id="printTable"></tbody></table>
    <br/><br/>
    <button class="w3-red w3-button" id="hidePrint">Show Tracker</button>
    <br/><br/>
  </div>
  <script src="tracker.min.js"></script>
</body>
</html>
