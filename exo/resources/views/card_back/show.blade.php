<!doctype html>
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

            <canvas id="myCanvas" width="700" height="980" style="background-image: url('/img/art/card-backs/<? echo $card_type; ?>.jpg');background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;"></canvas>
        </div>
      </div>
    </div>

    <script src="/js/foundation/vendor/jquery.js"></script>
    <script src="/js/foundation/vendor/what-input.js"></script>
    <script src="/js/foundation/vendor/foundation.js"></script>
    <script src="/js/foundation/app.js"></script>
  </body>
</html>
