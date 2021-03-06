<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $moon->name; ?></title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/Glyphter.css">
    <link rel="stylesheet" href="/css/exo.css">
    <script src="/js/foundation/vendor/jquery.js"></script>
    <script src="/js/foundation/vendor/what-input.js"></script>
    <script src="/js/foundation/vendor/foundation.js"></script>
    <script src="/js/foundation/app.js"></script>
    <script type="text/javascript" src="/js/world.js"></script>
  </head>
  <body>
    <div class="row" style="background-color: #000">
      <div class="large-12 columns">
        <div class="card" style="width: 678px;height:980px;margin:73px 0px 72px 59px;border-radius:15px;">
          <div class="card-divider">
            <h1>
                <? echo $moon->name; ?>
                <span style="float:right;color:#888;font-size:30px;margin-top:20px;"><? echo $moon->type; ?> Moon</span>
            </h1>

          </div>

          <div id="canvas_wrapper">
            <canvas id="myCanvas" width="700" height="<?
              // Check if we need room for two lines of text
              $height = 800;
              if(strlen(strip_tags($moon->body)) > 27) $height -= 43;
              echo $height;
            ?>" style="background: url('/img/art/moons/<? 
              echo strtolower(str_replace(" ", "-", $moon->name)); 
            ?>.jpg');background-size: auto auto;"></canvas>
            <script type="text/javascript">
                var sites_str = "<? echo $moon->sites; ?>";
                var the_sites = new World(sites_str, "<? echo $moon->body; ?>");
            </script>
          </div>
          
          <div class="card-section" style="padding-top:0px;">
            <h3><? echo $moon->body; ?>
                <div style="float:right;">Launch Cost: 
                 <span class="fa-stack fa-lg">
                   <i class="exo-fuel fa-stack-1x"></i>
                   <i class="fa-stack-1x cost"><?php echo $moon->escape_velocity; ?></i>
                 </span>
                </div>
            </h3>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
