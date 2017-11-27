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
}
