<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $dwarf_planet->name; ?></title>
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
      <div class="large-12 columns" style="background: url('/img/art/dwarf-planets/<?echo strtolower(str_replace(" ", "-", $dwarf_planet->name));?>.jpg');
          background-size: cover;background-repeat: no-repeat;background-position: center;">
        <div style="width: 695px;height:995px;margin:65px 0px 65px 50px;background:transparent;">
          <div class="glow" style="">
            
            <img src="/img/art/symbols/dwarf-planets.png" style='height:80px;float:left;margin-right:5px;' />
            <span style="">
              <div style="margin: 0px;font-size:1.5em;line-height: 0.8;"><? echo $dwarf_planet->name; ?></div>
              <span style="color:#a52315;font-size:30px;margin:0px;line-height: 1.1;">
                <? echo $dwarf_planet->type; ?> Dwarf Planet
              </span>
            </span>

          </div>

          <div id="canvas_wrapper">
            <canvas id="myCanvas" width="745" height="<?
              // Check if we need room for two lines of text
              $height = 800;
              if(strlen(strip_tags($dwarf_planet->body)) > 27) $height -= 43;
              echo $height;
            ?>"></canvas>
            <script type="text/javascript">
                var sites_str = "<? echo $dwarf_planet->sites; ?>";
                var the_sites = new World(sites_str, "<? echo $dwarf_planet->body; ?>");
            </script>
          </div>
          
          <div class="glow" style="">
            <h3><? echo $dwarf_planet->body; ?>
                <div style="float:right;">Launch Cost: 
                 <span class="fa-stack fa-lg">
                   <i class="exo-fuel fa-stack-1x"></i>
                   <i class="fa-stack-1x cost"><?php echo $dwarf_planet->escape_velocity; ?></i>
                 </span>
                </div>
            </h3>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
