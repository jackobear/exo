<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $star->name; ?></title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/Glyphter.css">
    <link rel="stylesheet" href="/css/exo.css">
    <script src="/js/foundation/vendor/jquery.js"></script>
    <script src="/js/foundation/vendor/what-input.js"></script>
    <script src="/js/foundation/vendor/foundation.js"></script>
    <script src="/js/foundation/app.js"></script>
    <script type="text/javascript" src="/js/cardIcons.js"></script>
    <script type="text/javascript" src="/js/world.js"></script>
  </head>
  <body>
    <div class="row" style="background-color: #000">
      <div class="large-12 columns" style="background: url('/img/art/stars/<?echo strtolower(str_replace(" ", "-", $star->name));?>.jpg');
          background-size: cover;background-repeat: no-repeat;background-position: center;">
        <div style="width: 695px;height:995px;margin:65px 0px 65px 50px;background:transparent;display: flex;flex-direction: column;">
          <div class="glow" style="padding-bottom:5px;">
            
            <img src="/img/art/symbols/stars.png" style='height:80px;float:left;margin-right:5px;' />
            <span style="">
              <!-- top margin misrenders in headless chrome -->
              <div style="margin: 5px 0px 0px 0px;font-size:1.5em;line-height: 0.8;"><? echo $star->name; ?></div>
              <span style="color:#e83614;font-size:30px;margin:0px;line-height: 1.1;">
                <? echo $star->type; ?> Star
              </span>
            </span>

          </div>

          <div id="canvas_wrapper">
            <canvas id="myCanvas" width="745" height="<?
              // Check if we need room for two lines of text
              $height = 800;
              //if(strlen(strip_tags($planet->body)) > 50) $height -= 43;
              if(strlen(strip_tags($star->body)) > 45) $height -= 43;
              if(strlen(strip_tags($star->body)) > 90) $height -= 43;
              if(strlen(strip_tags($star->body)) > 135) $height -= 43;
              if(strlen(strip_tags($star->body)) > 180) $height -= 43;
              echo $height;
            ?>"></canvas>
            <script type="text/javascript">
              var sites_str = "<? echo $star->sites; ?>";
              var satellites = "<? echo $star->satellites; ?>";
              var the_sites = new World(sites_str, satellites);
            </script>
          </div>
          
          <div class="glow" id="body">
            <h3><? echo $star->body; ?>
            </h3>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
