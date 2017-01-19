<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo</title>
    <link rel="stylesheet" href="css/foundation/foundation.css">
    <link rel="stylesheet" href="css/foundation/app.css">
    <link rel="stylesheet" href="css/exo.css">
  </head>
  <body>
    <div class="row" style="background-color: #000">
      <div class="large-12 columns">
        <div class="card" style="width: 700px;margin:70px 55px 70px 55px;border-radius:15px;">
          <div class="card-divider">
            <h4>
                Luna
                <span style="color:#888;font-size:14px;float:right;margin-top:8px;">Silicate</span>
            </h4>

          </div>

            <canvas id="myCanvas" width="700" height="1000" style="background: url('/img/luna.jpg');background-size: auto auto;"></canvas>
            <script>

              var canvas = document.getElementById('myCanvas');
              var context = canvas.getContext('2d');
              var radius = 70;
        
              // First Site
              context.beginPath();
              context.arc(600, 250, radius, 0, 2 * Math.PI, false);
              context.fillStyle = 'blue';
              context.fill();
              context.lineWidth = 5;
              context.strokeStyle = '#000033';
              context.shadowBlur = 20;
              context.shadowColor = 'yellow';
              context.stroke();
              // Peak glow
              context.beginPath();
              context.arc(600, 250, radius, 0, 2 * Math.PI, false);
              context.fillStyle = 'blue';
              context.fill();
              context.lineWidth = 5;
              context.strokeStyle = '#000033';
              context.shadowBlur = 50;
              context.shadowColor = 'yellow';
              context.stroke();

              // 2nd Site
              context.beginPath();
              context.shadowBlur = 0;
              context.arc(600, 440, radius, 0, 2 * Math.PI, false);
              context.fillStyle = 'silver';
              context.fill();
              context.lineWidth = 5;
              context.strokeStyle = '#000000';
              context.stroke();

              // 2nd Site Bonus
              context.beginPath();
              context.shadowBlur = 0;
              context.arc(490, 440, 25, 0, 2 * Math.PI, false);
              context.fillStyle = 'red';
              context.fill();
              context.lineWidth = 5;
              context.strokeStyle = '#000000';
              context.stroke();
              var balloonImage = new Image();
              balloonImage.onload = function() {
                context.shadowBlur = 0;
                context.drawImage(balloonImage, 470, 420, 40, 40);
              };
              balloonImage.src = '/img/balloon-original.png';


              // 3rd Site
              context.beginPath();
              context.arc(600, 630, radius, 0, 2 * Math.PI, false);
              context.fillStyle = 'green';
              context.fill();
              context.lineWidth = 5;
              context.strokeStyle = '#003300';
              context.shadowBlur = 0;
              context.stroke();
              // 3rd site bonus
              context.beginPath();
              context.shadowBlur = 0;
              context.arc(490, 630, 25, 0, 2 * Math.PI, false);
              context.fillStyle = 'silver';
              context.fill();
              context.lineWidth = 5;
              context.strokeStyle = '#000000';
              context.stroke();
              var caveImage = new Image();
              caveImage.onload = function() {
                context.shadowBlur = 0;
                context.drawImage(caveImage, 470, 610, 40, 40);
              };
              caveImage.src = '/img/cave-original.png';



              context.beginPath();
              context.arc(600, 820, radius, 0, 2 * Math.PI, false);
              context.fillStyle = 'red';
              context.fill();
              context.lineWidth = 5;
              context.strokeStyle = '#330000';
              context.shadowBlur = 20;
              context.shadowColor = "yellow";
              context.stroke();

              context.beginPath();
              context.arc(600, 820, radius, 0, 2 * Math.PI, false);
              context.fillStyle = 'red';
              context.fill();
              context.lineWidth = 5;
              context.strokeStyle = '#330000';
              context.shadowBlur = 50;
              context.shadowColor = "yellow";
              context.stroke();


            </script>
          
          <div class="card-section">
            <span>Vacuum Atmosphere</span>
            <span style="float:right;">Launch Cost: 1</span>
          </div>
        </div>
      </div>
    </div>

    <script src="js/foundation/vendor/jquery.js"></script>
    <script src="js/foundation/vendor/what-input.js"></script>
    <script src="js/foundation/vendor/foundation.js"></script>
    <script src="js/foundation/app.js"></script>
  </body>
</html>
