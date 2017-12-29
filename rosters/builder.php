<?php

    echo file_get_contents('builder.min.js');

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
            $sql = 'INSERT INTO rosters (creator_name, roster_string) VALUES ("' . $username . '", "' . secure_input($_POST['data']) . '")';
            if ($link->query($sql) === TRUE) {
                echo "<div class='w3-green w3-container'><p>Roster Saved!</p></div>";
            }
        }
    }
?>
