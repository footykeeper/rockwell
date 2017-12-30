class url {
  public function __construct ($name, $href) {
    $this->name = $name;
    $this->href = $href;
  }
}

$urls = array(new url('Home', '/'), new url('Tracker', '/tracker/'), new url('Roster Creator', '/rosters/'));

echo '<div class="w3-bar">';

foreach ($urls as $value) {
  echo '<a href="' . $value->href . '"><div class="w3-button">' . $value->name . '</div></a>';
}

echo '</div>';
