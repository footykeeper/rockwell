var step = {
  index: 0
};

$(document).ready(function () {
  var steps = document.getElementsByClassName('stepDetails');
  var i;
  for (i = 0; i < steps.length; i++) {
    $(steps[i]).hide();
  }
  $(steps[step.index]).show();
});

$('.switch').click(function () {
  var direction = $(this).attr('id');
  var steps = document.getElementsByClassName('stepDetails');
  var i;
  
  if (direction === 'right') {
    if (step.index < 2) {
      step.index++;
    }
  } else if (direction === 'left') {
    if (step.index > 0) {
      step.index--;
    }
  }
  
  for (i = 0; i < steps.length; i++) {
    $(steps[i]).hide();
  }
  
  $(steps[step.index]).show();
});
