<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource Market</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/Glyphter.css">
    <link rel="stylesheet" href="/css/exo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="row" style="background: url('/img/art/starfield.jpg');
          background-repeat: no-repeat;background-position:top;padding:0px;max-width: 108rem;">
      <div class="large-12 columns">
        <div class="glow" style="width: 1579px;height:985px;margin:70px 0px 70px 59px;border-radius:15px;">
            <h1>
                Resource Market
            </h1>

          <div class="row expanded">
            <canvas id="myCanvas" width="1600" height="790" style=""></canvas>
          </div>
          <script type="text/javascript">
            var radius = 170;
            var price_x = radius + 40;
            var price_y = radius + 20;
            var canvas =  document.getElementById("myCanvas");
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
                price_y += 2*radius + 60;
                price_x = radius + 40;
              }
            }

            /*
            // Deprecated due to confusing players about buying cards counting as trade transactions
            var actionsImage = new Image();
            actionsImage.src = '/img/art/symbols/actions.png';
            actionsImage.onload = function(){
              context.drawImage(actionsImage, radius + 25, radius + radius/2, 40, 50)

              context.drawImage(actionsImage, 5 * radius + 500, radius + radius/2, 40, 50)
              context.drawImage(actionsImage, 5 * radius + 540, radius + radius/2, 40, 50)

              context.drawImage(actionsImage, 5 * radius + 480, 3 * radius + radius/2 + 60, 40, 50)
              context.drawImage(actionsImage, 5 * radius + 520, 3 * radius + radius/2 + 60, 40, 50)
              context.drawImage(actionsImage, 5 * radius + 560, 3 * radius + radius/2 + 60, 40, 50)
            }
            */

          </script>

          <h3 style="margin-left:40px;" class='pull-left'>
            Setup: <img src='/img/art/symbols/metal.png' class='inline-card-icon' />Metal and 
            <img src='/img/art/symbols/fuel.png' class='inline-card-icon' />Fuel:
            <span class='fa-stack fa-lg'><i class='exo-coin fa-stack-1x'></i><i class='fa-stack-1x cost'>2</i></span>,
            <img src='/img/art/symbols/water.png' class='inline-card-icon' />Water and 
            <img src='/img/art/symbols/food.png' class='inline-card-icon' />Food:
            <span class='fa-stack fa-lg'><i class='exo-coin fa-stack-1x'></i><i class='fa-stack-1x cost'>3</i></span>
          </h3>
        </div>
      </div>
    </div>

    <script src="/js/foundation/vendor/jquery.js"></script>
    <script src="/js/foundation/vendor/what-input.js"></script>
    <script src="/js/foundation/vendor/foundation.js"></script>
    <script src="/js/foundation/app.js"></script>
  </body>
</html>
