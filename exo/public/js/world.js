// Draw all the Sites and Features for the given world string

// Helper function for rounded corners
CanvasRenderingContext2D.prototype.roundedRectangle = function(x, y, width, height, rounded) {
  const radiansInCircle = 2 * Math.PI;
  const halfRadians = (2 * Math.PI)/2;
  const quarterRadians = (2 * Math.PI)/4;  
  // top left arc
  this.arc(rounded + x, rounded + y, rounded, -quarterRadians, halfRadians, true);
  // line from top left to bottom left
  this.lineTo(x, y + height - rounded);
  // bottom left arc  
  this.arc(rounded + x, height - rounded + y, rounded, halfRadians, quarterRadians, true); 
  // line from bottom left to bottom right
  this.lineTo(x + width - rounded, y + height);
  // bottom right arc
  this.arc(x + width - rounded, y + height - rounded, rounded, quarterRadians, 0, true);  
  // line from bottom right to top right
  this.lineTo(x + width, y + rounded);
  // top right arc
  this.arc(x + width - rounded, y + rounded, rounded, 0, -quarterRadians, true); 
  // line from top right to top left
  this.lineTo(x + rounded, y);
}

function World(sites_str, satellites_str=''){
  var canvas = document.getElementById('myCanvas');
  var context = canvas.getContext('2d');
  var radius = 70; // site radius...actually a rectangle now, not a circle
  var bonus_radius = 40;
  var border_width = 5;
  var site_margin = 35;
  var bonus_margin = 185;
  var site_x = 560;
  var site_y = 100;
  var satellite_x = 630;
  var satellite_y = 220;
  var satellite_height = 100;
  var satellite_width = 90;
  var sites = sites_str.split(",");

  if (sites.length == 5){
  	site_y -= 10;
  	site_margin = 0;
  } else {
    // Push sites further down the card if there are fewer of them
    site_y += (4 - sites.length) * (radius + site_margin / 2);
  }

  if(sites_str != ""){
      sites.forEach(function(site){
        create_site(context, site);
      });
  }

  // Sometimes the world itself has features (Ganymede)
  /*
  if(body != '' && body.includes('Magnetosphere')) {
    const shieldImage = new Image();
    shieldImage.src = '/img/art/symbols/magnetic-shield.png';
    shieldImage.onload = function(){
      context.drawImage(shieldImage, 40, 50, 100, 100);
    }
  }*/

  var satellites = satellites_str.split(",").map(s => s.trim());
  const is_star = -1 < satellites.findIndex((satellite) => { return satellite.startsWith("PL");});
  const is_hab_world = sites.length > 4; // Habitable Worlds have so many sites that satellites should go on the left
  if (!is_star){
    satellite_y += (5 - satellites.length) * satellite_height;
  }
  if (is_hab_world) {
    satellite_x = 0;
  }
  if (sites.length < 2){  // Gas giant w/ lots of text
    satellite_y -= satellite_height;
  }
  if (satellites_str != ""){
    let satellite_index = 0;
    satellites.forEach(function(satellite){
      create_satellite(context, satellite, satellite_index);
      satellite_index++;
    });
  }

  function create_satellite(context, satellite, satellite_index){
    var features = satellite.split("+");
    if(features.length > 1){
        let featureImage = new Image(80, 80);
        featureImage.onload = function() {
            if(is_star){
                context.drawImage(featureImage, satellite_x - ((satellites.length - satellite_index - 2) * satellite_width) - 95, satellite_y + 325, 80, 80);
            } else {
                context.drawImage(featureImage, satellite_x - 95, satellite_y + 5 + (satellite_index * satellite_height), 80, 80);
            }
        }
        switch(features[1].trim()){
            case "SH":
                featureImage.src = '/img/art/symbols/magnetic-shield.png';
                break;
            case "MS":
                featureImage.src = '/img/art/symbols/magnetic-storm.png';
                break;
            case "PR":
                featureImage.src = '/img/art/symbols/players.png';
                break;
            case "PR-1":
                featureImage.src = '/img/art/symbols/players-minus-1.png';
                break;
            case "PR1":
                featureImage.src = '/img/art/symbols/players-plus-1.png';
                break;
            default:
                break;
        }
    }

    let satelliteImage = new Image(60, 80);
    satelliteImage.onload = function() {
        if(is_star){
            context.beginPath();
            context.shadowBlur = 0;
            context.roundedRectangle(satellite_x - ((satellites.length - satellite_index - 1) * satellite_width), satellite_y + 410, 70, 90, 5);
            context.fillStyle = '#fff';
            context.fill();
            context.beginPath();
            context.drawImage(satelliteImage, satellite_x + 5 - ((satellites.length - satellite_index - 1) * satellite_width), satellite_y + 415, 60, 80);
        } else {
            context.beginPath();
            context.shadowBlur = 0;
            context.roundedRectangle(satellite_x, satellite_y + (satellite_index * satellite_height), 70, 90, 5);
            context.fillStyle = '#fff';
            context.fill();
            context.beginPath();
            context.drawImage(satelliteImage, satellite_x + 5, satellite_y + 5 + (satellite_index * satellite_height), 60, 80);
        }
    };
    switch(features[0].trim()){
        case "MN":
            satelliteImage.src = '/img/art/symbols/moons.png';
            break;
        case "DP":
            satelliteImage.src = '/img/art/symbols/dwarf-planets.png';
            break;
        case "PL":
            satelliteImage.src = '/img/art/symbols/planets.png';
            break;
        case "HW":
            satelliteImage.src = '/img/art/symbols/habitable-worlds.png';
            break;
        default:
            break;
    }
  }


  function create_site(context, site){
    var features = site.split("+");
    var blur = 0;
    features.forEach(function(feature){
        if(feature == "EL") blur = 20;
    });

    // Sometimes the world itself has features like Ganymede's Magnet Shield
    // Now putting +SH in site string since leaving magnetosphere in the text adds cognitive load to user
    //if(body != '' && body.includes('Magnetosphere')) {
    //    features.push("SH");
    //}

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
                fillStyle = '#a24e16';
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
                featureType = 'peak';
                break;
            case "SH":
                fillStyle = '#7d7d7d';
                strokeStyle = '#000000';
                featureType = 'shield';
                break;
            default:
                fillStyle = '#fff8a8';
                strokeStyle = '#cccc00';
                featureType = 'coin';
                break;
        }
        if(feature_index == 0){

            // Main site
            //context.fillStyle = fillStyle; // add color of resource to main site
            //context.fillRect(site_x - radius, site_y - radius, radius * 4, radius * 1.8);
            context.lineWidth = border_width;
            context.strokeStyle = '#ddd'; //strokeStyle;
            context.setLineDash([16]);
            /*
            // Start glow
            context.shadowBlur = blur;
            context.shadowColor = 'yellow';
            */
            context.strokeRect(site_x - radius - 16, site_y - radius + 8, radius * 3.35, radius * 1.7);
            // for print...752px / 63.5mm = xpx / 20mm, x=237...height = 125px, y=117...spaceport is 20mmx10mm

            // Now putting main site in the same collection as features
            var x_position = site_x - (2 * bonus_radius * feature_index) - bonus_margin;
            var y_position = site_y - bonus_radius;
            var html = "<span class='fa-stack fa-lg site-bonus' style='position:absolute;top:"+y_position+"px;left:"+x_position+"px;'>";
            html += " <i class='exo-" + featureType + " fa-stack-1x'></i>";
            html += " <i class='fa-stack-1x cost'>"+multiplier+"</i>";
            html += "</span>";
            $("#canvas_wrapper").append(html);

        }else{
            // Extra bonuses
            context.setLineDash([0]);
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
                var image_y = site_y - 35;
                var image_x = site_x - (bonus_radius * feature_index) - bonus_margin - 35;
                caveImage.onload = function() {
                  context.shadowBlur = 0;
                  context.drawImage(caveImage, image_x, image_y, 70, 70);
                };
                caveImage.src = '/img/art/symbols/cave.png';
            }else if(featureType == 'peak'){
                context.beginPath();
                var peakImage = new Image();
                var image_y = site_y - 55;
                var image_x = site_x - (bonus_radius * feature_index) - bonus_margin - 50;
                peakImage.onload = function() {
                  context.shadowBlur = 0;
                  context.drawImage(peakImage, image_x, image_y, 100, 100);
                };
                peakImage.src = '/img/art/symbols/eternal-light.png';
                context.shadowBlur = 0; // Turn off glow
            }else if(featureType == 'shield'){
                context.beginPath();
                const shieldImage = new Image();
                var image_y = site_y - 40;
                var image_x = site_x - (bonus_radius * 2 * feature_index) - bonus_margin;
                console.log('shield at x=', image_x);
                shieldImage.onload = function() {
                  context.shadowBlur = 0;
                  context.drawImage(shieldImage, image_x, image_y, 75, 75);
                };
                shieldImage.src = '/img/art/symbols/magnetic-shield.png';
            /*
            }else if(featureType == 'glow'){
                context.lineWidth = border_width;
                context.strokeStyle = strokeStyle;
                context.shadowBlur = blur + 30;
                context.shadowColor = 'yellow';
                context.strokeRect(site_x - radius, site_y - radius, radius * 2.4, radius * 1.8);
                context.shadowBlur = 0; // Turn off glow
            */
            }else{
                // Resources, coins
                var x_position = site_x - (2 * bonus_radius * feature_index) - bonus_margin;
                var y_position = site_y - bonus_radius;
                var html = "<span class='fa-stack fa-lg site-bonus' style='position:absolute;top:"+y_position+"px;left:"+x_position+"px;'>";
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