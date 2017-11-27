function fifaBadge (element) {
  var ctx = element.getContext('2d');
  var badge = document.getElementById("gold-card");
  ctx.drawImage(badge, 0, 0);
  this.points = function (number) {
    ctx.font = "25px Arial";
    ctx.fillText(number, 3, 70);
  };
  
  this.name = function (name) {
    ctx.font = "15px Arial";
    ctx.fillText(name, 35, 135);
  };
  
  this.position = function (position) {
    ctx.font = "15px Arial";
    ctx.fillText(position, 2, 90);
  };
  
  this.clear = function () {
    ctx.clearRect(0, 0, 156, 250);
    ctx.drawImage(badge, 0, 0);
  };
}

$(document).ready(function () {
  makeInputTable();
  for (i = 0; i < players.length; i++) {
    document.getElementsByClassName('points')[i].innerHTML = '(' + players[i].points + ')';
  }
});

var players = [{"name":"Advik","points":0},{"name":"Aren","points":0},{"name":"Charles","points":0},{"name":"Connor","points":0},{"name":"Dorian","points":0},{"name":"Eugene","points":0},{"name":"Evan","points":0},{"name":"Smitty","points":0},{"name":"Josh T.","points":0},{"name":"Luke","points":0},{"name":"Martin","points":0},{"name":"Nick","points":0},{"name":"Noah","points":0},{"name":"Ryder","points":0},{"name":"Traeger","points":0}];

function makeInputTable (action) {
  var table = $('#inputTable');
  var i;
  var string = '';
  if (action === undefined) {
    for (i = 0; i < players.length; i++) {
      if (i % 3 === 0) {
        string += '<tr class="w3-container"><td class="w3-container w3-center w3-white"><canvas class="fifabadge" width="156px" height="250px"></canvas><br/><select class="event"><option value="null" hidden selected>Select Event</option><option value="goal" class="w3-green">Goal</option><option value="assist" class="w3-green">Assist</option><option value="keypass">Key Pass</option><option value="shotontarget">Shot on Target</option><option value="cross">Successful Cross</option><option value="dribble">Successful Dribble</option><option value="dispossesion">Dispossesion</option><option value="own" class="w3-red">Own Goal</option><option value="save">Save</option><option value="interception">Interception</option><option value="tackle">Tackle Won</option><option value="pk" class="w3-green">Penalty Saved</option><option value="yellow" class="w3-yellow">Yellow Card</option><option value="second" class="w3-yellow">Second Yellow</option><option value="red" class="w3-red">Red Card</option><option value="aerial">Aerial Won</option><option value="clear">Effective Clearance</option></select><br/><br/><select class="position"><option value="null" hidden selected>Select Position</option><option value="for">Forward</option><option value="mid">Midfielder</option><option value="def">Defender</option><option value="gk">Goalkeeper</option></select></td>';
      } else if (i % 3 !== 0) {
        string += '<td class="w3-container w3-center w3-white"><canvas class="fifabadge" width="156px" height="250px"></canvas><br/><select class="event"><option value="null" hidden selected>Select Event</option><option value="goal" class="w3-green">Goal</option><option value="assist" class="w3-green">Assist</option><option value="keypass">Key Pass</option><option value="shotontarget">Shot on Target</option><option value="cross">Successful Cross</option><option value="dribble">Successful Dribble</option><option value="dispossesion">Dispossesion</option><option value="own" class="w3-red">Own Goal</option><option value="save">Save</option><option value="interception">Interception</option><option value="tackle">Tackle Won</option><option value="pk" class="w3-green">Penalty Saved</option><option value="yellow" class="w3-yellow">Yellow Card</option><option value="second" class="w3-yellow">Second Yellow</option><option value="red" class="w3-red">Red Card</option><option value="aerial">Aerial Won</option><option value="clear">Effective Clearance</option></select><br/><br/><select class="position"><option value="null" hidden selected>Select Position</option><option value="for">Forward</option><option value="mid">Midfielder</option><option value="def">Defender</option><option value="gk">Goalkeeper</option></select></td>';
      }
    }
    string += '</tr>';
    table.append(string);
    for (i = 0; i < players.length; i++) {
      players[i].card = new fifaBadge(document.getElementsByClassName('fifabadge')[i]);
      players[i].card.name(players[i].name);
      players[i].card.points(0);
    }
  }
}

function event (type) {
  if (type === 'concede') {
    for (i = 0; i < players.length; i++) {
      var playerPosition = players[i].position;
      if (playerPosition === 'def' || playerPosition === 'gk') {
        players[i].points -= 2;
      }
    }
  } else if (type === 'clean') {
    
  }
  for (i = 0; i < players.length; i++) {
    players[i].card.clear();
    players[i].card.points(players[i].points);
    players[i].card.name(players[i].name);
    players[i].card.position(players[i].position.toUpperCase());
  }
}

$('#concede').click(function () {
  event('concede');
});

$('#clean').click(function () {
  event('clean');
});

$('#submit').click(function () {
  event('all');
});

$('#positions').click(function () {
  for (i = 0; i < players.length; i++) {
    var position = document.getElementsByClassName('position')[i].value;
    if (position !== 'null') {
      players[i].card.clear();
      players[i].card.points(players[i].points);
      players[i].card.name(players[i].name);
      players[i].card.position(position.toUpperCase());
    } else {
      players[i].card.clear();
      players[i].position = 'sub';
      players[i].card.position('SUB');
      players[i].card.points(players[i].points);
      players[i].card.name(players[i].name);
    }
  }
  
  for (i = 0; i < players.length; i++) {
    document.getElementsByClassName('position')[i].value = 'null';
  }
});
