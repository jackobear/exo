// No longer in use...
// Displays the travel and colonize rocket progress track for a faction card

function interstellarTrack(travel_time, colonize_time){
  var canvas = document.getElementById('rocketCanvas');
  var context = canvas.getContext('2d');
  var travel_text_width = 75;
  var colonize_text_width = 110;
  var text_height = 20;
  var rocket_margin = 10;
  var rocket_line_width = 3;
  var fin_x = 15;
  var fin_y = 19;
  var rocket_body_length = 65;
  var rocket_tip_length = 55;

  var rocket_width = rocket_line_width+fin_x+rocket_body_length+rocket_tip_length;
  var rocket_y = text_height + rocket_margin;
  var rocket_offset = rocket_line_width;

  if(travel_time > 0){
    context.font = "26px Arial";
    context.fillStyle = 'black';
    context.fillText("Travel", 0, text_height);

    // Travel progress line
    var travel_line_end = (rocket_width + rocket_margin)*travel_time;
    context.lineWidth = rocket_line_width;
    context.beginPath();
    context.moveTo(travel_text_width, text_height/2);
    context.lineTo(travel_line_end, text_height/2);
    context.stroke();
    context.beginPath();
    context.moveTo(travel_line_end, 0);
    context.lineTo(travel_line_end, text_height);
    context.stroke();

    // Rocket tip width is assumed to be fin_y, hence the fin_y*4 for bottom fin y
    for(i=0;i<travel_time;i++){
      context.beginPath();
      context.lineJoin = 'round';
      context.moveTo(rocket_offset, rocket_y);
      context.lineTo(rocket_offset+fin_x, rocket_y+fin_y);
      context.lineTo(rocket_offset+fin_x+rocket_body_length, rocket_y+fin_y);
      context.quadraticCurveTo(rocket_offset+fin_x+rocket_body_length+(rocket_tip_length/2), rocket_y+fin_y, rocket_offset+fin_x+rocket_body_length+rocket_tip_length, rocket_y+fin_y*2);
      context.quadraticCurveTo(rocket_offset+fin_x+rocket_body_length+(rocket_tip_length/2), rocket_y+fin_y*3, rocket_offset+fin_x+rocket_body_length, rocket_y+fin_y*3);
      context.lineTo(rocket_offset+fin_x, rocket_y+fin_y*3);
      context.lineTo(rocket_offset, rocket_y+fin_y*4);
      context.lineTo(rocket_offset, rocket_y);
      context.closePath();
      context.fillStyle = '#dd0000';
      context.fill();
      context.lineWidth = rocket_line_width;
      context.strokeStyle = '#000';
      context.stroke();
      rocket_offset += rocket_line_width + rocket_width + rocket_margin;
    }
  }

  if(colonize_time > 0){
    context.font = "26px Arial";
    context.fillStyle = 'black';
    context.fillText("Colonize", travel_line_end + rocket_margin + rocket_line_width, text_height);

    // Colonize progress line
    var colonize_line_end = rocket_line_width + (rocket_width + rocket_margin) * (travel_time + colonize_time);
    context.beginPath();
    context.moveTo(travel_line_end + rocket_margin + colonize_text_width, text_height - text_height/2);
    context.lineTo(colonize_line_end, text_height - text_height/2);
    context.stroke();
    context.beginPath();
    context.moveTo(colonize_line_end, 0);
    context.lineTo(colonize_line_end, text_height);
    context.stroke();

    for(i=0;i<colonize_time;i++){
      context.beginPath();
      context.lineJoin = 'round';
      context.moveTo(rocket_offset, rocket_y);
      context.lineTo(rocket_offset+fin_x, rocket_y+fin_y);
      context.lineTo(rocket_offset+fin_x+rocket_body_length, rocket_y+fin_y);
      context.quadraticCurveTo(rocket_offset+fin_x+rocket_body_length+(rocket_tip_length/2), rocket_y+fin_y, rocket_offset+fin_x+rocket_body_length+rocket_tip_length, rocket_y+fin_y*2);
      context.quadraticCurveTo(rocket_offset+fin_x+rocket_body_length+(rocket_tip_length/2), rocket_y+fin_y*3, rocket_offset+fin_x+rocket_body_length, rocket_y+fin_y*3);
      context.lineTo(rocket_offset+fin_x, rocket_y+fin_y*3);
      context.lineTo(rocket_offset, rocket_y+fin_y*4);
      context.lineTo(rocket_offset, rocket_y);
      context.closePath();
      context.fillStyle = '#dd0000';
      context.fill();
      context.lineWidth = rocket_line_width;
      context.strokeStyle = '#000';
      context.stroke();
      rocket_offset += rocket_line_width + rocket_width + rocket_margin;
    }
  }
}

/* Mockup rocket values
      context.moveTo(10, 35);
      context.lineTo(20, 50);
      context.lineTo(70, 50);
      context.quadraticCurveTo(90, 50, 110, 65);
      context.quadraticCurveTo(90, 80, 70, 80);
      context.lineTo(20, 80);
      context.lineTo(10, 95);
      context.lineTo(10, 35);
*/