function addPlayer () {
  var playerInput = '<br/><br/><input type="text" placeholder="Player Name" class="name"/>';
  $('#inputs').append(playerInput);
}

function createRoster () {
  var inputs = document.getElementsByClassName('name');
  var i;
  var roster = [];
  var build = {};
  var entireRoster = {};
  var result = '';
  
  for (i = 0; i < inputs.length; i++) {
    build = {};
    build.name = inputs[i].value;
    build.points = 0;
    roster.push(build);
  }
  
  entireRoster.teamName = $('#teamName').val();
  entireRoster.playerRoster = roster;
  
  result = JSON.stringify(entireRoster);
  return result;
}

$('#playerAdd').click(function () {
  addPlayer();
});

$('#create').click(function () {
  var fin = createRoster();
  $('#final').show();
  $('#display').text(fin);
  $('#string').val(fin);
  setTimeout(function () {
    $('#sendRoster').click();
  }, 50);
});
