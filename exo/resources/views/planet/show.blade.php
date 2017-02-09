<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $planet->name; ?></title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
    <link rel="stylesheet" href="/css/exo.css">
  </head>
  <body>
    <div class="row" style="background-color: #000">
      <div class="large-12 columns">
        <div class="card" style="width: 700px;margin:70px 55px 70px 55px;border-radius:15px;">
          <div class="card-divider">
            <h4>
                <? echo $planet->name; ?>
                <span style="color:#888;font-size:14px;float:right;margin-top:8px;"><? echo $planet->type; ?></span>
            </h4>

          </div>

            <canvas id="myCanvas" width="700" height="1000" style="background: url('/img/luna.jpg');background-size: auto auto;"></canvas>
            <script>

              var canvas = document.getElementById('myCanvas');
              var context = canvas.getContext('2d');
              var radius = 70;
              var bonus_radius = 25;
              var border_width = 5;
              var site_margin = 50;
              var bonus_margin = 110;
              var site_x = 600;
              var site_y = 250;

              var sites_str = "<? echo $planet->sites; ?>;";
              var sites = sites_str.split(",");

              // Push sites further down the card if there are fewer of them
              site_y += (4 - sites.length) * (radius + site_margin / 2);

              sites.forEach(function(site){
                create_site(context, site);
              });

              function create_site(context, site){
                var features = site.split("+");
                var blur = 0;
                features.forEach(function(feature){
                    if(feature == "EL") blur = 20;
                });

                features.forEach(function(feature){
                    feature = feature.trim().replace(";","");
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
                            context.arc(site_x - bonus_margin, site_y, bonus_radius, 0, 2 * Math.PI, false);
                            context.fillStyle = 'red';
                            context.fill();
                            context.lineWidth = border_width;
                            context.strokeStyle = '#000000';
                            context.stroke();
                            var balloonImage = new Image();
                            balloonImage.onload = function() {
                              context.shadowBlur = 0;
                              context.drawImage(balloonImage, site_x - bonus_margin - 20, site_y - 20, 40, 40);
                            };
                            balloonImage.src = '/img/balloon-original.png';
                            break;
                        case "Ca":
                        case "Cv":
                            context.beginPath();
                            context.shadowBlur = 0;
                            context.arc(site_x - bonus_margin, site_y, bonus_radius, 0, 2 * Math.PI, false);
                            context.fillStyle = 'silver';
                            context.fill();
                            context.lineWidth = border_width;
                            context.strokeStyle = '#000000';
                            context.stroke();
                            var caveImage = new Image();
                            var image_y = site_y - 20;
                            caveImage.onload = function() {
                              context.shadowBlur = 0;
                              context.drawImage(caveImage, site_x - bonus_margin - 20, image_y, 40, 40);
                            };
                            caveImage.src = '/img/cave-original.png';
                            break;
                        case "EL":
                            context.arc(site_x, site_y, radius, 0, 2 * Math.PI, false);
                            context.shadowBlur = blur + 30;
                            context.shadowColor = 'yellow';
                            break;
                        default:
                            // Must be some amount of coin or a typo
                            if(feature[1] == "C"){
                                context.beginPath();
                                context.shadowBlur = 0;
                                context.arc(site_x - bonus_margin, site_y, bonus_radius, 0, 2 * Math.PI, false);
                                context.fillStyle = 'yellow';
                                context.fill();
                                context.lineWidth = border_width;
                                context.strokeStyle = 'yellow';
                                context.stroke();
                                context.font = "30px Arial";
                                context.fillStyle = 'black';
                                context.fillText("+"+feature[0],site_x - bonus_margin - 20, site_y+10);
                            }
                            break;
                    }

                    if(multiplier > 1){
                        context.beginPath();
                        context.shadowBlur = 0;
                        context.arc(site_x - bonus_margin, site_y, bonus_radius, 0, 2 * Math.PI, false);
                        context.fill();
                        context.lineWidth = border_width;
                        context.stroke();
                        context.font = "30px Arial";
                        context.fillStyle = 'black';
                        context.fillText("+"+(multiplier-1),site_x - bonus_margin - 20, site_y+10);

                        bonus_margin += (2 * bonus_radius) + 20;
                    }else{
                        bonus_margin -= (2 * bonus_radius) + 20;
                    }
                });
                site_y += site_margin + (radius * 2);
              }

            </script>
          
          <div class="card-section">
            <span><? echo $planet->body; ?></span>
            <span style="float:right;">Launch Cost: <? echo $planet->escape_velocity; ?></span>
          </div>
        </div>
      </div>
    </div>

    <script src="/js/foundation/vendor/jquery.js"></script>
    <script src="/js/foundation/vendor/what-input.js"></script>
    <script src="/js/foundation/vendor/foundation.js"></script>
    <script src="/js/foundation/app.js"></script>
  </body>
</html>
