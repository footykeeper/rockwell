$(document).ready(function () {
  makeInputTable();
});

var players = [{"name":"Advik","points":0},{"name":"Aren","points":0},{"name":"Charles","points":0},{"name":"Connor","points":0},{"name":"Dorian","points":0},{"name":"Eugene","points":0},{"name":"Evan","points":0},{"name":"Smitty","points":0},{"name":"Josh T.","points":0},{"name":"Luke","points":0},{"name":"Martin","points":0},{"name":"Nick","points":0},{"name":"Noah","points":0},{"name":"Ryder","points":0},{"name":"Traeger","points":0}];

function makeInputTable (action) {
  var table = $('#inputTable');
  var i;
  var string = '';
  if (action === undefined) {
    for (i = 0; i < players.length; i++) {
      if (i % 3 === 0) {
        string += '<tr class="w3-container"><td class="w3-container">' + players[i].name + '</td>';
      } else if (i % 3 !== 0) {
        string += '<td class="w3-container">' + players[i].name + '</td>';
      }
    }
    string += '</tr>';
    table.html(string);
  }
}
