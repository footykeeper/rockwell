<?php
    echo '<script>' . file_get_contents('builder.min.js') . '</script>';

    function secure_input ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $string = secure_input($_POST['data']);
        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
            // Do nothing
        } else {
            // The user is signed in; do cool stuff
            $sql = 'INSERT INTO rosters (creator_name, roster_string) VALUES ("' . $username . '", "' . $string . '");';
            if ($link->query($sql) === TRUE) {
                echo "<br/><br/><div class='w3-green w3-container'><p>(alpha phase) Roster saved to your account, " . $username . "!</p><hr/>Your string was" . $string . ", and your sql query was " . $sql . "</div>";
            }
        }
    }
?>
