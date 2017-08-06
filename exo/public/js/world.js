// Draw all the Sites and Features for the given world string

function World(sites_str){
  var canvas = document.getElementById('myCanvas');
  var context = canvas.getContext('2d');
  var radius = 70;
  var bonus_radius = 25;
  var border_width = 5;
  var site_margin = 50;
  var bonus_margin = 110;
  var site_x = 600;
  var site_y = 100;

  var sites = sites_str.split(",");

  // Push sites further down the card if there are fewer of them
  site_y += (4 - sites.length) * (radius + site_margin / 2);

  sites.forEach(function(site){
    create_site(context, site);
  });

  function create_site(context, site){
    var bonus_margin_temp = bonus_margin;
    var features = site.split("+");
    var blur = 0;
    features.forEach(function(feature){
        if(feature == "EL") blur = 20;
    });

    features.forEach(function(feature){
        feature = feature.trim();
        var multipliers = feature.split("x");
        var multiplier = 1;
        if(multipliers.length > 1){
            multiplier = multipliers[0];
            feature = multipliers[1];
        }

        switch(feature){
            case "F":
            case "Fo":
                context.beginPath();
                context.arc(site_x, site_y, radius, 0, 2 * Math.PI, false);
                context.fillStyle = 'green';
                context.fill();
                context.lineWidth = border_width;
                context.strokeStyle = '#003300';
                context.shadowBlur = blur;
                context.shadowColor = 'yellow';
                context.stroke();
                break;
            case "Fu":
                context.beginPath();
                context.arc(site_x, site_y, radius, 0, 2 * Math.PI, false);
                context.fillStyle = 'red';
                context.fill();
                context.lineWidth = border_width;
                context.strokeStyle = '#330000';
                context.shadowBlur = blur;
                context.shadowColor = 'yellow';
                context.stroke();
                break;
            case "W":
                context.beginPath();
                context.arc(site_x, site_y, radius, 0, 2 * Math.PI, false);
                context.fillStyle = 'blue';
                context.fill();
                context.lineWidth = border_width;
                context.strokeStyle = '#000033';
                context.shadowBlur = blur;
                context.shadowColor = 'yellow';
                context.stroke();
                break;
            case "M":
                context.beginPath();
                context.shadowBlur = 0;
                context.arc(site_x, site_y, radius, 0, 2 * Math.PI, false);
                context.fillStyle = 'silver';
                context.fill();
                context.lineWidth = border_width;
                context.strokeStyle = '#000000';
                context.shadowBlur = blur;
                context.shadowColor = 'yellow';
                context.stroke();
                break;
            case "He":
                context.beginPath();
                context.shadowBlur = 0;
                context.rect(site_x - bonus_radius - bonus_margin_temp, site_y - bonus_radius, 2 * bonus_radius, 2 * bonus_radius);
                context.fillStyle = 'red';
                context.fill();
                context.lineWidth = border_width;
                context.strokeStyle = '#000000';
                context.stroke();
                var balloonImage = new Image();
                var image_y = site_y - 20;
                balloonImage.onload = function() {
                  context.shadowBlur = 0;
                  context.drawImage(balloonImage, site_x - bonus_margin_temp - 20, image_y, 40, 40);
                };
                balloonImage.src = '/img/balloon-original.png';
                break;
            case "Ca":
            case "Cv":
                context.beginPath();
                context.shadowBlur = 0;
                context.rect(site_x - bonus_radius - bonus_margin_temp, site_y - bonus_radius, 2 * bonus_radius, 2 * bonus_radius);
                context.fillStyle = 'silver';
                context.fill();
                context.lineWidth = border_width;
                context.strokeStyle = '#000000';
                context.stroke();
                var caveImage = new Image();
                var image_y = site_y - 20;
                caveImage.onload = function() {
                  context.shadowBlur = 0;
                  context.drawImage(caveImage, site_x - bonus_margin_temp - 20, image_y, 40, 40);
                };
                caveImage.src = '/img/cave-original.png';
                break;
            case "EL":
                // Extra glow layer
                context.arc(site_x, site_y, radius, 0, 2 * Math.PI, false);
                context.shadowBlur = blur + 30;
                context.shadowColor = 'yellow';
                context.stroke();
                break;
            default:
                if(feature[0] == "C"){
                    // Coin Site
                    context.beginPath();
                    context.shadowBlur = 0;
                    context.arc(site_x, site_y, radius, 0, 2 * Math.PI, false);
                    context.fillStyle = 'yellow';
                    context.fill();
                    context.lineWidth = border_width;
                    context.strokeStyle = '#cccc00';
                    context.shadowBlur = blur;
                    context.shadowColor = 'yellow';
                    context.stroke();
                    break;
                }else if(feature[1] == "C"){
                    // Coin Feature
                    context.beginPath();
                    context.shadowBlur = 0;
                    context.arc(site_x - bonus_margin_temp, site_y, bonus_radius, 0, 2 * Math.PI, false);
                    context.fillStyle = 'yellow';
                    context.fill();
                    context.lineWidth = border_width;
                    context.strokeStyle = '#cccc00';
                    context.stroke();
                    context.font = "30px Arial";
                    context.fillStyle = 'black';
                    context.fillText("+"+feature[0],site_x - bonus_margin_temp - 20, site_y+10);
                }
                break;
        }

        if(multiplier > 1){
            context.beginPath();
            context.shadowBlur = 0;
            context.rect(site_x - bonus_radius - bonus_margin_temp, site_y - bonus_radius, 2 * bonus_radius, 2 * bonus_radius);
            context.fill();
            context.lineWidth = border_width;
            context.stroke();
            context.font = "30px Arial";
            context.fillStyle = 'black';
            context.fillText("+"+(multiplier-1),site_x - bonus_margin_temp - 20, site_y+10);

            bonus_margin_temp += (2 * bonus_radius) + 20;
        }else if(multipliers.length > 1){
            bonus_margin_temp -= (2 * bonus_radius) + 20;
        }
    });
    site_y += site_margin + (radius * 2);
  }
}