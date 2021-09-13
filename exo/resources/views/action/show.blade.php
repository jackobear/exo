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
      <div class="large-12 columns" style="background: url('/img/art/actions/<?echo strtolower(str_replace(" ", "-", str_replace("'", "", $action->name)));?>.jpg');
          background-size: cover;background-repeat: no-repeat;background-position: center;">
        <div style="width: 695px;height:995px;margin:65px 0px 65px 50px;background:transparent;display: flex;flex-direction: column;">
          <div class="glow" style="padding-bottom:5px;">
            
            <?php if($action->name === 'Tradeship') {?>
              <img src="/img/art/symbols/tradeships.png" style='height:80px;float:left;margin-right:5px;' />
            <?php }else{ ?>
              <img src="/img/art/symbols/actions.png" style='height:80px;float:left;margin-right:5px;' />
            <?php } ?>

            <span style="">

              <span style="float:right;color:#888;font-size:30px;">
              <?php
                  if ($action->cost !== ''){
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
                          case "L":
                            $multiplier = "&#x2197;";
                          case "Fu":
                          case "*Fu":
                            $resource = "fuel";
                            break;
                          case "W":
                            $resource = "water";
                            break;
                          case "M":
                            $resource = "metal";
                            break;
                          case "O":
                            $multiplier = "&#x2194;";
                            $resource = "coin";
                          default:
                            $resource = "coin";
                            break;
                        }
                        // No longer multiline
                        // if(($i == 2 && count($costs) < 5) || ($i == 3 && count($costs) > 4)) echo "<br />";

                        // Adjust cost symbol font size depending on how many different resources are in the cost
                        switch(count($costs)){
                          case 3:
                            $font_size = 2;
                            $line_height = 80;
                            $width = 65;
                            $margin_top = 5;
                            $margin_left = 2;
                            $font_margin_top = 5;
                            break;
                          case 2:
                            $font_size = 4;
                            $line_height = 75;
                            $width = 110;
                            $margin_top = -20;
                            $margin_left = 4;
                            $font_margin_top = 15;
                            break;
                          default:
                            $font_size = 5;
                            $line_height = 73;
                            $width = 140;
                            $margin_top = -32;
                            $margin_left = 7;
                            $font_margin_top = 20;
                            break;
                        }

                        if(count($costs) === 3){
                        }
                        ?>

                        <span class="fa-stack fa-lg" style="font-size:<?php echo $font_size; ?>em;line-height:<?php echo $line_height; ?>px;width:<?php echo $width; ?>px;">
                          <i class="exo-<?php echo $resource ?> fa-stack-1x" style="margin-top:<?php echo $margin_top; ?>px;"></i>
                          <i class="fa-stack-1x cost" style="margin-left:<?php echo $margin_left; ?>px;margin-top:<?php echo $font_margin_top; ?>px;"><?php echo $multiplier; ?></i>
                        </span>

                        <?php
                      }
                  }
              ?>
            </span>

              <div style="margin: 5px 0px 0px 0px;font-size:1.5em;line-height: 0.8;"><? echo $action->name; ?></div>

                <?php if($action->name === 'Tradeship') {?>
                  <span style="color:#ffff00;font-size:30px;margin:0px;line-height: 1.1;">
                    Tradeship
                  </span>
                <?php }else{ ?>
                  <span style="color:#bc14aa;font-size:30px;margin:0px;line-height: 1.1;">
                    Action - <? echo $action->type; ?>
                  </span>
                <?php } ?>

            </span>


          </div>

          <div style="height:100%;">&nbsp;</div>

          <div class="glow" style="">
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
