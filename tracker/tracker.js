var players = '';

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

$('#ready').click(function () {
  var rawRoster = $('#rosterInput').val();
  players = JSON.parse(rawRoster);
  makeInputTable();
  for (i = 0; i < players.length; i++) {
    players[i].position = 'SUB';
    players[i].goals = 0;
    players[i].assists = 0;
    players[i].keyPasses = 0;
    players[i].shots = 0;
    players[i].crosses = 0;
    players[i].dribbles = 0;
    players[i].dispossesions = 0;
    players[i].ownGoals = 0;
    players[i].cleanSheets = 0;
    players[i].saves = 0;
    players[i].interceptions = 0;
    players[i].tackles = 0;
    players[i].conceded = 0;
    players[i].penaltiesSaved = 0;
    players[i].yellows = 0;
    players[i].reds = 0;
    players[i].aerials = 0;
    players[i].clearances = 0;
  }
  $('#pre').hide();
  $('#main').show();
});

function makeInputTable (action) {
  var table = $('#inputTable');
  var i;
  var string = '';
  if (action === undefined) {
    for (i = 0; i < players.length; i++) {
      if (i % 3 === 0) {
        string += '<tr class="w3-container"><td class="w3-container w3-center w3-white"><canvas class="fifabadge" width="156px" height="250px"></canvas><br/><select class="event"><option value="null" hidden selected>Select Event</option><option value="goal" class="w3-green">Goal</option><option value="assist" class="w3-green">Assist</option><option value="keypass">Key Pass</option><option value="shotontarget">Shot on Target</option><option value="cross">Successful Cross</option><option value="dribble">Successful Dribble</option><option value="dispossesion">Dispossesion</option><option value="own" class="w3-red">Own Goal</option><option value="save">Save</option><option value="interception">Interception</option><option value="tackle">Tackle Won</option><option value="pk" class="w3-green">Penalty Saved</option><option value="yellow" class="w3-yellow">Yellow Card</option><option value="second" class="w3-yellow">Second Yellow</option><option value="red" class="w3-red">Red Card</option><option value="aerial">Aerial Won</option><option value="clear">Effective Clearance</option></select><br/><br/><select class="position"><option value="null" hidden selected>Select Position</option><option value="for">Forward</option><option value="mid">Midfielder</option><option value="def">Defender</option><option value="gk">Goalkeeper</option><option value="sub">Sub</option></select></td>';
      } else if (i % 3 !== 0) {
        string += '<td class="w3-container w3-center w3-white"><canvas class="fifabadge" width="156px" height="250px"></canvas><br/><select class="event"><option value="null" hidden selected>Select Event</option><option value="goal" class="w3-green">Goal</option><option value="assist" class="w3-green">Assist</option><option value="keypass">Key Pass</option><option value="shotontarget">Shot on Target</option><option value="cross">Successful Cross</option><option value="dribble">Successful Dribble</option><option value="dispossesion">Dispossesion</option><option value="own" class="w3-red">Own Goal</option><option value="save">Save</option><option value="interception">Interception</option><option value="tackle">Tackle Won</option><option value="pk" class="w3-green">Penalty Saved</option><option value="yellow" class="w3-yellow">Yellow Card</option><option value="second" class="w3-yellow">Second Yellow</option><option value="red" class="w3-red">Red Card</option><option value="aerial">Aerial Won</option><option value="clear">Effective Clearance</option></select><br/><br/><select class="position"><option value="null" hidden selected>Select Position</option><option value="for">Forward</option><option value="mid">Midfielder</option><option value="def">Defender</option><option value="gk">Goalkeeper</option><option value="sub">Sub</option></select></td>';
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
        players[i].conceded++;
      }
    }
  } else if (type === 'clean') {
    for (i = 0; i < players.length; i++) {
      var playerPositionClean = players[i].position;
      if (playerPositionClean === 'def') {
        players[i].points += 6;
        players[i].cleanSheets++;
      } else if (playerPositionClean === 'gk') {
        players[i].points += 8;
        players[i].cleanSheets++;
      }
    }
  } else if (type === 'all') {
    for (i = 0; i < players.length; i++) {
      var playerPositionAll = players[i].position;
      var eventAll = document.getElementsByClassName('event')[i].value;
      if (eventAll !== 'null') {
        if (eventAll === 'goal') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid') {
            players[i].points += 9;
          } else if (playerPositionAll === 'def' || playerPositionAll === 'gk') {
            players[i].points += 10;
          }
          players[i].goals++;
        } else if (eventAll === 'assist') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid') {
            players[i].points += 6;
          } else if (playerPositionAll === 'def') {
            players[i].points += 8;
          } else if (playerPositionAll === 'gk') {
            players[i].points += 9;
          }
          players[i].assists++;
        } else if (eventAll === 'keypass') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid' || playerPositionAll === 'def') {
            players[i].points += 2;
          } else if (playerPositionAll === 'gk') {
            players[i].points += 6;
          }
          players[i].keyPasses++;
        } else if (eventAll === 'shotontarget') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid' || playerPositionAll === 'def' || playerPositionAll === 'gk') {
            players[i].points += 2;
          }
          players[i].shots++;
        } else if (eventAll === 'cross' || eventAll === 'dribble') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid' || playerPositionAll === 'def' || playerPositionAll === 'gk') {
            players[i].points += 1;
          }
          if (eventAll === 'cross') {
            players[i].crosses++;
          } else {
            players[i].dribbles++;
          }
        } else if (eventAll === 'dispossession') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid' || playerPositionAll === 'def' || playerPositionAll === 'gk') {
            players[i].points -= 0.5;
          }
          players[i].dispossesions++;
        } else if (eventAll === 'own') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid' || playerPositionAll === 'def' || playerPositionAll === 'gk') {
            players[i].points -= 9;
          }
          players[i].ownGoals++;
        } else if (eventAll === 'save') {
          if (playerPositionAll === 'gk') {
            players[i].points += 2;
          }
          players[i].saves++;
        } else if (eventAll === 'interception' || eventAll === 'tackle') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid' || playerPositionAll === 'def' || playerPositionAll === 'gk') {
            players[i].points += 1;
          }
          if (eventAll === 'interception') {
            players[i].interceptions++;
          } else {
            players[i].tackles++;
          }
        } else if (eventAll === 'pk') {
          if (playerPositionAll === 'gk') {
            players[i].points += 8;
          }
          players[i].penaltiesSaved++;
        } else if (eventAll === 'yellow') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid' || playerPositionAll === 'def' || playerPositionAll === 'gk') {
            players[i].points -= 3;
          }
          players[i].yellows++;
        } else if (eventAll === 'second') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid' || playerPositionAll === 'def' || playerPositionAll === 'gk') {
            players[i].points -= 4;
          }
          players[i].yellows++;
        } else if (eventAll === 'red') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid' || playerPositionAll === 'def' || playerPositionAll === 'gk') {
            players[i].points -= 7;
          }
          players[i].reds++;
        } else if (eventAll === 'aerial') {
          if (playerPositionAll === 'for' || playerPositionAll === 'mid') {
            players[i].points += 0.5;
          } else if (playerPositionAll === 'def' || playerPositionAll === 'gk') {
            players[i].points += 1;
          }
          players[i].aerials++;
        } else if (eventAll === 'clear') {
          if (playerPositionAll === 'def' || playerPositionAll === 'gk') {
            players[i].points += 0.25;
          }
          players[i].clearances++;
        }
      }
    }
  }
  
  for (i = 0; i < players.length; i++) {
    document.getElementsByClassName('event')[i].value = 'null';
    players[i].card.clear();
    players[i].card.points(players[i].points);
    players[i].card.name(players[i].name);
    players[i].card.position(String(players[i].position).toUpperCase());
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
    if (position !== 'null' && position !== 'sub') {
      players[i].position = position;
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
});

$('#table').click(function () {
  $('#stats').empty();
  for (i = 0; i < players.length; i++) {
    $('#stats').append('<tr><td>' + players[i].name + '</td><td>' + players[i].points + '</td><td>' + players[i].goals + '</td><td>' + players[i].assists + '</td><td>' + players[i].keyPasses + '</td><td>' + players[i].shots + '</td><td>' + players[i].crosses + '</td><td>' + players[i].dribbles + '</td><td>' + players[i].dispossesions + '</td><td>' + players[i].ownGoals + '</td><td>' + players[i].cleanSheets + '</td><td>' + players[i].saves + '</td><td>' + players[i].interceptions + '</td><td>' + players[i].tackles + '</td><td>' + players[i].conceded + '</td><td>' + players[i].penaltiesSaved + '</td><td>' + players[i].yellows + '</td><td>' + players[i].reds + '</td><td>' + players[i].aerials + '</td><td>' + players[i].clearances + '</td></tr>');
  }
  $('#fin').show();
});

$('#hide').click(function () {
  $('#fin').hide();
});

$('#print').click(function () {
  $('#printTable').empty();
  for (i = 0; i < players.length; i++) {
    $('#printTable').append('<tr><td>' + players[i].name + '</td><td>' + players[i].points + '</td><td>' + players[i].goals + '</td><td>' + players[i].assists + '</td><td>' + players[i].keyPasses + '</td><td>' + players[i].shots + '</td><td>' + players[i].crosses + '</td><td>' + players[i].dribbles + '</td><td>' + players[i].dispossesions + '</td><td>' + players[i].ownGoals + '</td><td>' + players[i].cleanSheets + '</td><td>' + players[i].saves + '</td><td>' + players[i].interceptions + '</td><td>' + players[i].tackles + '</td><td>' + players[i].conceded + '</td><td>' + players[i].penaltiesSaved + '</td><td>' + players[i].yellows + '</td><td>' + players[i].reds + '</td><td>' + players[i].aerials + '</td><td>' + players[i].clearances + '</td></tr>');
  }
  $('#main').hide();
  $('#fin').hide();
  $('#printArea').show();
});

$('#hidePrint').click(function () {
  $('#main').show();
  $('#printArea').hide();
});
