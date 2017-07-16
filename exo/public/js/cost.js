function Cost(cost_str, multiplier, index, canvas='myCostCanvas'){
  var canvas = document.getElementById(canvas);
  var context = canvas.getContext('2d');
  var radius = 20;
  var border_width = 2;
  var cost_margin = (radius * 2) + 10;
  var cost_x = 75;
  var cost_y = 25;


  // x,y Positioning adjustment
  switch(index){
    case 1:
        cost_x -= cost_margin;
        break;
    case 2:
        cost_y += cost_margin;
        break;
    case 3:
        cost_x -= cost_margin;
        cost_y += cost_margin;
        break;
    case 4:
        cost_x -= (2 * cost_margin);
        break;
    case 5:
        cost_x -= (2 * cost_margin);
        break;
        cost_y += cost_margin;
    default:
        break;
  }

  switch(cost_str){
      case "F":
      case "Fo":
          context.beginPath();
          context.rect(cost_x - radius, cost_y - radius, 2 * radius, 2 * radius);
          context.fillStyle = 'green';
          context.fill();
          context.lineWidth = border_width;
          context.strokeStyle = '#003300';
          context.stroke();
          break;
      case "Fu":
      case "*Fu":
          context.beginPath();
          context.rect(cost_x - radius, cost_y - radius, 2 * radius, 2 * radius);
          context.fillStyle = 'red';
          context.fill();
          context.lineWidth = border_width;
          context.strokeStyle = '#330000';
          context.stroke();
          break;
      case "W":
          context.beginPath();
          context.rect(cost_x - radius, cost_y - radius, 2 * radius, 2 * radius);
          context.fillStyle = 'blue';
          context.fill();
          context.lineWidth = border_width;
          context.strokeStyle = '#000033';
          context.stroke();
          break;
      case "M":
          context.beginPath();
          context.rect(cost_x - radius, cost_y - radius, 2 * radius, 2 * radius);
          context.fillStyle = 'silver';
          context.fill();
          context.lineWidth = border_width;
          context.strokeStyle = '#000000';
          context.stroke();
          break;
      case "L":
          // Launch icon
          multiplier = 0;
          context.beginPath();
          context.moveTo(cost_x - 20, cost_y + 20);
          context.lineTo(cost_x - 10, cost_y + 10);
          context.lineTo(cost_x - 10, cost_y + 10);
          context.quadraticCurveTo(cost_x - 10, cost_y + 20 - 40, cost_x, cost_y + 20 - 40);
          context.quadraticCurveTo(cost_x + 10, cost_y + 20 - 40, cost_x + 10, cost_y + 10);
          context.lineTo(cost_x + 10, cost_y + 20 - 10);
          context.lineTo(cost_x + 20, cost_y + 20);
          context.lineTo(cost_x - 10, cost_y + 20);
          context.closePath();
          context.fillStyle = '#dd0000';
          context.fill();
          context.lineWidth = 2;
          context.strokeStyle = '#600';
          context.stroke();
          break;
      default:
          // Must be some amount of coin or a typo
          if(cost_str == "C"){
              context.beginPath();
              context.arc(cost_x, cost_y, radius, 0, 2 * Math.PI, false);
              context.fillStyle = 'yellow';
              context.fill();
              context.lineWidth = border_width;
              context.strokeStyle = '#cccc00';
              context.stroke();
              context.font = "26px Arial";
              context.fillStyle = 'black';
              context.fillText(multiplier,cost_x - 6, cost_y + 9);
          }
          break;
  }
  context.font = "26px Arial";
  context.fillStyle = 'black';
  if(multiplier == 0){
    multiplier = "*";
  }
  context.fillText(multiplier,cost_x - 7, cost_y + 9);
}