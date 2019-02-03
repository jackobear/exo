<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Market</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
    <link rel="stylesheet" href="/css/exo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/cost.js"></script>
    <script type="text/javascript" src="/js/interstellarTrack.js"></script>
  </head>
  <body>
    <div class="row" style="background-color: #000;max-width: 108rem;">
      <div class="large-12 columns">
        <div class="card" style="width: 1579px;height:985px;margin:70px 0px 70px 59px;border-radius:15px;">
          <div class="card-divider">
            <h1>
                Space Market
            </h1>
          </div>

          <div class="row expanded">
            <canvas id="myCanvas" width="1600" height="650"></canvas>
          </div>
          <script type="text/javascript">
            var radius = 150;
            var price_x = radius + 40;
            var price_y = radius + 20;
            var canvas = document.getElementById("myCanvas");
            var context = canvas.getContext('2d');
            for(var i=1;i<7;i++){
              context.beginPath();
              context.arc(price_x, price_y, radius, 0, 2 * Math.PI, false);
              context.fillStyle = 'yellow';
              context.fill();
              context.lineWidth = 3;
              context.strokeStyle = '#aa0';
              context.stroke();
              context.font = "150px Arial";
              context.fillStyle = 'black';
              context.fillText(i, price_x - 40, price_y + 47);
              price_x += 2*radius + 250;
              if(i == 3){
                price_y += 2*radius + 10;
                price_x = radius + 40;
              }
            }

          </script>

          <p style="margin-left:20px;">
            Starting prices are Metal:1, Fuel:2, Water:3, Food:4.
          </p>
        </div>
      </div>
    </div>

    <script src="/js/foundation/vendor/jquery.js"></script>
    <script src="/js/foundation/vendor/what-input.js"></script>
    <script src="/js/foundation/vendor/foundation.js"></script>
    <script src="/js/foundation/app.js"></script>
  </body>
</html>
