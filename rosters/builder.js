function addPlayer () {
  var lineBreak = '<br/><br/>';
  var playerInput = '<input type="text" placeholder="Player Name" class="name"/>';
  $('#inputs').append(lineBreak + playerInput);
}

function createRoster () {
  var inputs = document.getElementsByClassName('name');
  var i;
  var roster = '[{';
  
  for (i = 0; i < inputs.length; i++) {
    if (i === 0) {
      roster += '"name":"' + inputs[i].value + '","points":0}';
    } else {
      roster += ',{"name":"' + inputs[i].value + '","points":0}';
    }
  }
  
  roster += ']';
  return roster;
}

$('#playerAdd').click(function () {
  addPlayer();
});

$('#create').click(function () {
  var fin = createRoster();
  $('#final').show();
  $('#display').text(fin);
  $('#string').val(fin);
});
