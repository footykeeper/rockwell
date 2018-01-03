<?php
  class url {
    public function __construct ($name, $href) {
      $this->name = $name;
      $this->href = $href;
    }
  }

  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    // User is not signed in
    $urls = array(new url('Home', '/'), new url('Log In', '/login.php'), new url('Register', '/register.php'));
  } else {
    // User is signed in
    $urls = array(new url('Home', '/'), new url('Tracker', '/tracker/'), new url('Roster Creator', '/rosters/'), new url('Log Out', '/logout.php'));
  }


  echo '<div class="w3-bar">';

  foreach ($urls as $value) {
    echo '<a href="' . $value->href . '"><div class="w3-button">' . $value->name . '</div></a>';
  }

  echo '</div>';
?>
