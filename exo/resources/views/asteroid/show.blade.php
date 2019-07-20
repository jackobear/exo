<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $asteroid->name; ?></title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/Glyphter.css">
    <link rel="stylesheet" href="/css/exo.css">
    <script type="text/javascript" src="/js/world.js"></script>
  </head>
  <body>
    <div class="row" style="background-color: #000">
      <div class="large-12 columns">
        <div class="card" style="width: 678px;height:980px;margin:73px 0px 72px 59px;border-radius:15px;">
          <div class="card-divider">
            <span style="font-size:48px;"><? echo $asteroid->name; ?></span>
            <div style="color:#888;font-size:30px;margin-top:-10px;"><? echo $asteroid->type; ?></div>
          </div>

            <canvas id="myCanvas" width="700" height="<?
              // Check if we need room for two lines of text
              $height = 750;
              if(strlen(strip_tags($asteroid->body)) > 27) $height -= 43;
              if(strlen(strip_tags($asteroid->body)) > 80) $height -= 43;
              if(strlen(strip_tags($asteroid->body)) > 130) $height -= 43;
              echo $height;
            ?>" style="background: url('/img/art/asteroids/<? 
              echo strtolower(str_replace(" ", "-", $asteroid->name)); 
            ?>.jpg');background-size: auto auto;-moz-background-size: cover;"></canvas>
          
          <div class="card-section">
            <h3><? echo $asteroid->body; ?></h3>
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
