<?php
  $card_types = [
    "Actions",
    "Asteroids",
    "Dwarf Planets",
    "Habitable Worlds",
    "Lifeforms",
    "Moons",
    "Planets",
    "Stars"
  ];
  $card_type = $card_types[$id - 1];
?><!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $card_type; ?></title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
    <link rel="stylesheet" href="/css/exo.css">
  </head>
  <body>
    <div class="row" style="background-color: #000">
      <div class="large-12 columns">
        <div class="card" style="width: 678px;height:980px;margin:73px 0px 72px 59px;border-radius:15px;">

            <canvas id="myCanvas" width="700" height="980?>" style="background-image: url('/img/art/card-backs/orion.jpg');background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;"></canvas>
            <script type="text/javascript">
              var canvas = document.getElementById('myCanvas');
              var context = canvas.getContext('2d');
              context.font = "80px Arial";
              context.strokeStyle = 'black';
              context.lineWidth = 6;
              context.textAlign = 'center';
              context.strokeText("<? echo $card_type; ?>", 350, 290);
              context.fillStyle = 'white';
              context.fillText("<? echo $card_type; ?>", 350, 290);
            </script>
          
        </div>
      </div>
    </div>

    <script src="/js/foundation/vendor/jquery.js"></script>
    <script src="/js/foundation/vendor/what-input.js"></script>
    <script src="/js/foundation/vendor/foundation.js"></script>
    <script src="/js/foundation/app.js"></script>
  </body>
</html>
