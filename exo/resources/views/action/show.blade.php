<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $action->name; ?></title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/Glyphter.css">
    <link rel="stylesheet" href="/css/exo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="row" style="background-color: #000">
      <div class="large-12 columns">
        <div class="card" style="width: 678px;height:980px;margin:73px 0px 72px 59px;border-radius:15px;">
          <div class="card-divider">
            <span style="font-size:48px;"><? echo $action->name; ?></span>
            <span style="float:right;color:#888;font-size:30px;">

                <?php
                    $costs = explode(",", $action->cost);
                    $multiplier = 1;
                    for($i=0;$i<count($costs);$i++){
                      $cost = trim($costs[$i]);
                      if(is_numeric($cost[0])){
                        $multiplier = $cost[0];
                        $cost = substr($cost, 1);
                      }
                      $resource = "coin";
                      switch($cost){
                        case "F":
                        case "Fo":
                          $resource = "food";
                          break;
                        case "Fu":
                        case "*Fu":
                        case "L":
                          $resource = "fuel";
                          break;
                        case "W":
                          $resource = "water";
                          break;
                        case "M":
                          $resource = "metal";
                          break;
                        default:
                          $resource = "coin";
                          break;
                      }
                      if($multiplier == 0 || $cost == "L") $multiplier = "&#x2197;";
                      if(($i == 2 && count($costs) < 5) || ($i == 3 && count($costs) > 4)) echo "<br />";
                      ?>

                      <span class="fa-stack fa-lg">
                        <i class="exo-<?php echo $resource ?> fa-stack-1x"></i>
                        <i class="fa-stack-1x cost"><?php echo $multiplier; ?></i>
                      </span>

                      <?php
                    }
                  ?>

            </span>
            <div style="color:#888;font-size:30px;margin-top:-10px;"><? echo $action->type; ?></div>
          </div>

            <canvas id="myCanvas" width="700" height="<?
              // Check if we need room for two lines of text
              $height = 750;
              if(strlen(strip_tags($action->body)) > 27) $height -= 43;
              if(strlen(strip_tags($action->body)) > 80) $height -= 43;
              if(strlen(strip_tags($action->body)) > 130) $height -= 43;
              if(strlen(strip_tags($action->body)) > 180) $height -= 43;
              if(strlen(strip_tags($action->body)) > 230) $height -= 43;
              echo $height;
            ?>" style="background: url('/img/art/actions/<? 
              echo strtolower(str_replace("'", "", str_replace(" ", "-", $action->name))); 
            ?>.jpg');background-size: auto auto;"></canvas>
          
          <div class="card-section">
            <h3><? echo $action->body; ?></h3>
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
