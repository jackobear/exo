// Draw all the Sites and Features for the given world string

function World(sites_str, body=''){
  var canvas = document.getElementById('myCanvas');
  var context = canvas.getContext('2d');
  var radius = 70; // site radius
  var bonus_radius = 25;
  var border_width = 5;
  var site_margin = 35;
  var bonus_margin = 110;
  var site_x = 560;
  var site_y = 100;

  if(sites_str == "") return;
  var sites = sites_str.split(",");

  // Push sites further down the card if there are fewer of them
  site_y += (4 - sites.length) * (radius + site_margin / 2);

  sites.forEach(function(site){
    create_site(context, site);
  });

  // Sometimes the world itself has features (Ganymede)
  if(body != '' && body.includes('Magnetosphere')) {
    const shieldImage = new Image();
    shieldImage.src = '/img/art/symbols/magnetic-shield.png';
    shieldImage.onload = function(){
      context.drawImage(shieldImage, 40, 50, 100, 100);
    }
  }

  function create_site(context, site){
    var features = site.split("+");
    var blur = 0;
    features.forEach(function(feature){
        if(feature == "EL") blur = 20;
    });

    var feature_index = 0;
    features.forEach(function(feature){
        feature = feature.trim();
        var multiplier = 1;
        if(!isNaN(parseInt(feature[0], 10))){
            multiplier = feature[0];
            feature = feature.slice(1);
        }

        var fillStyle = '';
        var strokeStyle = '';
        var featureType = '';
        switch(feature){
            case "F":
            case "Fo":
                fillStyle = '#47331b';
                strokeStyle = '#170400';
                featureType = 'food';
                break;
            case "Fu":
                fillStyle = '#e60000';
                strokeStyle = '#330000';
                featureType = 'fuel';
                break;
            case "W":
                fillStyle = '#3567cc';
                strokeStyle = '#000033';
                featureType = 'water';
                break;
            case "M":
                fillStyle = '#7d7d7d';
                strokeStyle = '#000000';
                featureType = 'metal';
                break;
            case "He":
                fillStyle = '#e60000';
                strokeStyle = '#000000';
                featureType = 'helium';
                break;
            case "Ca":
            case "Cv":
                fillStyle = '#7d7d7d';
                strokeStyle = '#000000';
                featureType = 'cave';
                break;
            case "EL":
                fillStyle = 'yellow';
                strokeStyle = '#cccc00';
                featureType = 'glow';
                break;
            default:
                fillStyle = '#fff8a8';
                strokeStyle = '#cccc00';
                featureType = 'coin';
                break;
        }
        if(feature_index == 0){
            // Main site
            context.fillStyle = fillStyle;
            context.fillRect(site_x - radius, site_y - radius, radius * 2.4, radius * 1.8);
            context.lineWidth = border_width;
            context.strokeStyle = strokeStyle;
            context.shadowBlur = blur;
            context.shadowColor = 'yellow';
            context.strokeRect(site_x - radius, site_y - radius, radius * 2.4, radius * 1.8);
        }else{
            // Extra bonuses
            if(featureType == 'helium'){
                context.beginPath();
                context.shadowBlur = 0;
                context.rect(site_x - (2 * bonus_radius * feature_index) - bonus_margin, site_y - bonus_radius, 2 * bonus_radius, 2 * bonus_radius);
                context.fillStyle = 'red';
                context.fill();
                context.lineWidth = border_width;
                context.strokeStyle = '#000000';
                context.stroke();
                var balloonImage = new Image();
                var image_y = site_y - 20;
                balloonImage.onload = function() {
                  context.shadowBlur = 0;
                  context.drawImage(balloonImage, site_x - (bonus_radius * feature_index) - bonus_margin + 5, image_y, 40, 40);
                };
                balloonImage.src = '/img/balloon-original.png';
            }else if(featureType == 'cave'){
                context.beginPath();
                context.shadowBlur = 0;
                context.rect(site_x - (2 * bonus_radius * feature_index) - bonus_margin, site_y - bonus_radius, 2 * bonus_radius, 2 * bonus_radius);
                context.fillStyle = 'silver';
                context.fill();
                context.lineWidth = border_width;
                context.strokeStyle = '#000000';
                context.stroke();
                var caveImage = new Image();
                var image_y = site_y - 20;
                caveImage.onload = function() {
                  context.shadowBlur = 0;
                  context.drawImage(caveImage, site_x - (bonus_radius * feature_index) - bonus_margin + 5, image_y, 40, 40);
                };
                caveImage.src = '/img/cave-original.png';
            }else if(featureType == 'glow'){
                context.lineWidth = border_width;
                context.strokeStyle = strokeStyle;
                context.shadowBlur = blur + 30;
                context.shadowColor = 'yellow';
                context.strokeRect(site_x - radius, site_y - radius, radius * 2.4, radius * 1.8);
                context.shadowBlur = 0;
            }else{
                var x_position = site_x - (2 * bonus_radius * feature_index) - bonus_margin;
                var y_position = site_y - bonus_radius;
                var html = "<span class='fa-stack fa-lg' style='position:absolute;top:"+y_position+"px;left:"+x_position+"px;'>";
                html += " <i class='exo-" + featureType + " fa-stack-1x'></i>";
                html += " <i class='fa-stack-1x cost'>"+multiplier+"</i>";
                html += "</span>";
                $("#canvas_wrapper").append(html);
            }
        }
        feature_index++;
    });
    site_y += site_margin + (radius * 2);
  }
}