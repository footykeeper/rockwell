function addPlayer(){$("#inputs").append('<br/><br/><input type="text" placeholder="Player Name" class="name"/>')}function createRoster(){var e,a=document.getElementsByClassName("name"),t="[{";for(e=0;e<a.length;e++)t+=0===e?'"name":"'+a[e].value+'","points":0}':',{"name":"'+a[e].value+'","points":0}';return t+="]"}$("#playerAdd").click(function(){addPlayer()}),$("#create").click(function(){var e=createRoster();$("#final").show(),$("#display").text(e),$("#string").val(e)});

<?php
    function secure_input ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
            // Do nothing
        } else {
            // The user is signed in; do cool stuff
            $sql = 'INSERT INTO rosters (creator_name, roster_string) VALUES (' . $username . ',' . secure_input($_POST['data']) . ')';
        }
    }
?>
