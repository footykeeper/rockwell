<?php
  session_start();
  $username = $_SESSION['username'];
  if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    // Run standard version of Footykeeper; user is not signed in
    echo 'function fifaBadge(e){var i=e.getContext("2d"),s=document.getElementById("gold-card");i.drawImage(s,0,0),this.points=function(e){i.font="25px Arial",i.fillText(e,3,70)},this.name=function(e){i.font="15px Arial",i.fillText(e,35,135)},this.position=function(e){i.font="15px Arial",i.fillText(e,2,90)},this.clear=function(){i.clearRect(0,0,156,250),i.drawImage(s,0,0)}}function makeInputTable(e){var i,s=$("#inputTable"),a="";if(void 0===e){for(i=0;i<players.length;i++)i%3==0?a+=\'<tr class="w3-container"><td class="w3-container w3-center w3-white"><canvas class="fifabadge" width="156px" height="250px"></canvas><br/><select class="w3-input event"><option value="null" hidden selected>Select Event</option><option value="goal" class="w3-green">Goal</option><option value="assist" class="w3-green">Assist</option><option value="keypass">Key Pass</option><option value="shotontarget">Shot on Target</option><option value="cross">Successful Cross</option><option value="dribble">Successful Dribble</option><option value="dispossesion">Dispossesion</option><option value="own" class="w3-red">Own Goal</option><option value="save">Save</option><option value="interception">Interception</option><option value="tackle">Tackle Won</option><option value="pk" class="w3-green">Penalty Saved</option><option value="yellow" class="w3-yellow">Yellow Card</option><option value="second" class="w3-yellow">Second Yellow</option><option value="red" class="w3-red">Red Card</option><option value="aerial">Aerial Won</option><option value="clear">Effective Clearance</option></select><br/><br/><select class="w3-input position"><option value="null" hidden selected>Select Position</option><option value="for">Forward</option><option value="mid">Midfielder</option><option value="def">Defender</option><option value="gk">Goalkeeper</option><option value="sub">Sub</option></select></td>\':i%3!=0&&(a+=\'<td class="w3-container w3-center w3-white"><canvas class="fifabadge" width="156px" height="250px"></canvas><br/><select class="w3-input event"><option value="null" hidden selected>Select Event</option><option value="goal" class="w3-green">Goal</option><option value="assist" class="w3-green">Assist</option><option value="keypass">Key Pass</option><option value="shotontarget">Shot on Target</option><option value="cross">Successful Cross</option><option value="dribble">Successful Dribble</option><option value="dispossesion">Dispossesion</option><option value="own" class="w3-red">Own Goal</option><option value="save">Save</option><option value="interception">Interception</option><option value="tackle">Tackle Won</option><option value="pk" class="w3-green">Penalty Saved</option><option value="yellow" class="w3-yellow">Yellow Card</option><option value="second" class="w3-yellow">Second Yellow</option><option value="red" class="w3-red">Red Card</option><option value="aerial">Aerial Won</option><option value="clear">Effective Clearance</option></select><br/><br/><select class="w3-input position"><option value="null" hidden selected>Select Position</option><option value="for">Forward</option><option value="mid">Midfielder</option><option value="def">Defender</option><option value="gk">Goalkeeper</option><option value="sub">Sub</option></select></td>\');for(a+="</tr>",s.append(a),i=0;i<players.length;i++)players[i].card=new fifaBadge(document.getElementsByClassName("fifabadge")[i]),players[i].card.name(players[i].name),players[i].card.points(0)}}function event(e){if("concede"===e)for(i=0;i<players.length;i++){var s=players[i].position;"def"!==s&&"gk"!==s||(players[i].points-=2,players[i].conceded++)}else if("clean"===e)for(i=0;i<players.length;i++){var a=players[i].position;"def"===a?(players[i].points+=6,players[i].cleanSheets++):"gk"===a&&(players[i].points+=8,players[i].cleanSheets++)}else if("all"===e)for(i=0;i<players.length;i++){var o=players[i].position,t=document.getElementsByClassName("event")[i].value;"null"!==t&&("goal"===t?("for"===o||"mid"===o?players[i].points+=9:"def"!==o&&"gk"!==o||(players[i].points+=10),players[i].goals++):"assist"===t?("for"===o||"mid"===o?players[i].points+=6:"def"===o?players[i].points+=8:"gk"===o&&(players[i].points+=9),players[i].assists++):"keypass"===t?("for"===o||"mid"===o||"def"===o?players[i].points+=2:"gk"===o&&(players[i].points+=6),players[i].keyPasses++):"shotontarget"===t?("for"!==o&&"mid"!==o&&"def"!==o&&"gk"!==o||(players[i].points+=2),players[i].shots++):"cross"===t||"dribble"===t?("for"!==o&&"mid"!==o&&"def"!==o&&"gk"!==o||(players[i].points+=1),"cross"===t?players[i].crosses++:players[i].dribbles++):"dispossession"===t?("for"!==o&&"mid"!==o&&"def"!==o&&"gk"!==o||(players[i].points-=.5),players[i].dispossesions++):"own"===t?("for"!==o&&"mid"!==o&&"def"!==o&&"gk"!==o||(players[i].points-=9),players[i].ownGoals++):"save"===t?("gk"===o&&(players[i].points+=2),players[i].saves++):"interception"===t||"tackle"===t?("for"!==o&&"mid"!==o&&"def"!==o&&"gk"!==o||(players[i].points+=1),"interception"===t?players[i].interceptions++:players[i].tackles++):"pk"===t?("gk"===o&&(players[i].points+=8),players[i].penaltiesSaved++):"yellow"===t?("for"!==o&&"mid"!==o&&"def"!==o&&"gk"!==o||(players[i].points-=3),players[i].yellows++):"second"===t?("for"!==o&&"mid"!==o&&"def"!==o&&"gk"!==o||(players[i].points-=4),players[i].yellows++):"red"===t?("for"!==o&&"mid"!==o&&"def"!==o&&"gk"!==o||(players[i].points-=7),players[i].reds++):"aerial"===t?("for"===o||"mid"===o?players[i].points+=.5:"def"!==o&&"gk"!==o||(players[i].points+=1),players[i].aerials++):"clear"===t&&("def"!==o&&"gk"!==o||(players[i].points+=.25),players[i].clearances++))}for(i=0;i<players.length;i++)document.getElementsByClassName("event")[i].value="null",players[i].card.clear(),players[i].card.points(players[i].points),players[i].card.name(players[i].name),players[i].card.position(String(players[i].position).toUpperCase())}var players="";$("#ready").click(function(){var e=$("#rosterInput").val();for(players=JSON.parse(e),makeInputTable(),i=0;i<players.length;i++)players[i].position="SUB",players[i].goals=0,players[i].assists=0,players[i].keyPasses=0,players[i].shots=0,players[i].crosses=0,players[i].dribbles=0,players[i].dispossesions=0,players[i].ownGoals=0,players[i].cleanSheets=0,players[i].saves=0,players[i].interceptions=0,players[i].tackles=0,players[i].conceded=0,players[i].penaltiesSaved=0,players[i].yellows=0,players[i].reds=0,players[i].aerials=0,players[i].clearances=0;$("#pre").hide(),$("#main").show()}),$("#concede").click(function(){event("concede")}),$("#clean").click(function(){event("clean")}),$("#submit").click(function(){event("all")}),$("#positions").click(function(){for(i=0;i<players.length;i++){var e=document.getElementsByClassName("position")[i].value;"null"!==e&&"sub"!==e?(players[i].position=e,players[i].card.clear(),players[i].card.points(players[i].points),players[i].card.name(players[i].name),players[i].card.position(e.toUpperCase())):(players[i].card.clear(),players[i].position="sub",players[i].card.position("SUB"),players[i].card.points(players[i].points),players[i].card.name(players[i].name))}}),$("#table").click(function(){for($("#stats").empty(),i=0;i<players.length;i++)$("#stats").append("<tr><td>"+players[i].name+"</td><td>"+players[i].points+"</td><td>"+players[i].goals+"</td><td>"+players[i].assists+"</td><td>"+players[i].keyPasses+"</td><td>"+players[i].shots+"</td><td>"+players[i].crosses+"</td><td>"+players[i].dribbles+"</td><td>"+players[i].dispossesions+"</td><td>"+players[i].ownGoals+"</td><td>"+players[i].cleanSheets+"</td><td>"+players[i].saves+"</td><td>"+players[i].interceptions+"</td><td>"+players[i].tackles+"</td><td>"+players[i].conceded+"</td><td>"+players[i].penaltiesSaved+"</td><td>"+players[i].yellows+"</td><td>"+players[i].reds+"</td><td>"+players[i].aerials+"</td><td>"+players[i].clearances+"</td></tr>");$("#fin").show()}),$("#hide").click(function(){$("#fin").hide()}),$("#print").click(function(){for($("#printTable").empty(),i=0;i<players.length;i++)$("#printTable").append("<tr><td>"+players[i].name+"</td><td>"+players[i].points+"</td><td>"+players[i].goals+"</td><td>"+players[i].assists+"</td><td>"+players[i].keyPasses+"</td><td>"+players[i].shots+"</td><td>"+players[i].crosses+"</td><td>"+players[i].dribbles+"</td><td>"+players[i].dispossesions+"</td><td>"+players[i].ownGoals+"</td><td>"+players[i].cleanSheets+"</td><td>"+players[i].saves+"</td><td>"+players[i].interceptions+"</td><td>"+players[i].tackles+"</td><td>"+players[i].conceded+"</td><td>"+players[i].penaltiesSaved+"</td><td>"+players[i].yellows+"</td><td>"+players[i].reds+"</td><td>"+players[i].aerials+"</td><td>"+players[i].clearances+"</td></tr>");$("#main").hide(),$("#fin").hide(),$("#printArea").show(),print()}),$("#hidePrint").click(function(){$("#main").show(),$("#printArea").hide()});';
  } else {
    
  }
?>