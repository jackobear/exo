<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $faction->name; ?></title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/Glyphter.css">
    <link rel="stylesheet" href="/css/exo.css">
    <script src="/js/foundation/vendor/jquery.js"></script>
    <script src="/js/foundation/vendor/what-input.js"></script>
    <script src="/js/foundation/vendor/foundation.js"></script>
    <script src="/js/foundation/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/actionCardIcons.js"></script>
  </head>
  <body style='overflow: hidden;'>
    <div class="row" style="background-color: #000;max-width: 1725px;">
      <div class="large-12 columns" style="background: url('/img/art/factions/<?echo strtolower(str_replace(" ", "-", str_replace("'", "", $faction->name)));?>.jpg');
          background-repeat: no-repeat;background-position:top;padding:0px;">
        <div style="width: 1725px;height:1125px;background:transparent;display: flex;flex-direction: column;">
          <div class="glow" style="width:max-content;margin:65px 0px 65px 75px;">
            <div style="margin-top: 5px;font-size:1.5em;line-height: 0.8;display:inline-block;"><? echo $faction->name; ?></div>
          </div>

          <div style="height:100%;">&nbsp;</div>

          <div class="glow" id="body" style="vertical-align: bottom;padding:5px 65px 50px 65px;border-radius:0px;box-shadow: 0 0 5px #fff, -10px 0 20px #5290c6, 10px 0 20px #5290c6;">
            <div class="row expanded">
              <div class="columns large-6" style="border-right:1px solid #aaa;">
                <h3><? echo $faction->body; ?></h3>
                <span style="font-style:italic;font-size:1.9375rem;color:#444;"><? echo $faction->flavor_text; ?></span>
              </div>

              <div class="columns large-6" style="">
                <h2 style="border-bottom:1px solid #aaa;">Settle CO Colony
                <span style="float:right;color:#888;font-size:30px;margin-top:5px;">

                    <?php
                        $costs = explode(",", $faction->planetship_cost);
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
                          $styles = "";
                          if($cost == "O") {
                            $multiplier = "&#x2194;";
                            $styles = "margin-top:-2px";
                          }else if($multiplier == 0 || $cost == "L") {
                            $multiplier = "&#x2197;";
                          }
                          // if(($i == 2 && count($costs) < 5) || ($i == 3 && count($costs) > 4)) echo "<br />";
                          ?>

                          <span class="fa-stack fa-lg">
                            <i class="exo-<?php echo $resource ?> fa-stack-1x"></i>
                            <i class="fa-stack-1x cost" style="<?php echo $styles; ?>"><?php echo $multiplier; ?></i>
                          </span>

                          <?php
                        }
                      ?>

                </span>
                </h2>
                <h3>Place a CO Colony on a landing site in the home star system. Decrease the price of the new CO Colony's resource in the
                  Resource Market. Gain 
                  <span class='fa-stack fa-lg'><i class='exo-victory fa-stack-1x'></i><i class='fa-stack-1x cost'>1</i></span>
                  and another <span class='fa-stack fa-lg'><i class='exo-victory fa-stack-1x'></i><i class='fa-stack-1x cost'>1</i></span>
                  if its the first CO Colony on that world.</h3>
              </div>
            </div>
            <div class="row expanded">

              <div class="columns large-6" style="border-top:1px solid #aaa;border-right:1px solid #aaa;padding-top:10px;">
                <h2 style="border-bottom:1px solid #aaa;">Build SP Spaceport
                <span style="float:right;color:#888;font-size:30px;">

                    <?php
                        // TODO: Add launch_system_cost to faction model
                        $costs = explode(",", "2W, 2F, 1Fu");
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
                          if($multiplier == 0 || $cost == "L") $multiplier = "X";
                          //if(($i == 2 && count($costs) < 5) || ($i == 3 && count($costs) > 4)) echo "<br />";
                          ?>

                          <span class="fa-stack fa-lg">
                            <i class="exo-<?php echo $resource ?> fa-stack-1x"></i>
                            <i class="fa-stack-1x cost"><?php echo $multiplier; ?></i>
                          </span>

                          <?php
                        }
                      ?>

                </span>
                </h2>
                <h3>Upgrade a CO Colony to a SP Spaceport. Gain <span class='fa-stack fa-lg'><i class='exo-victory fa-stack-1x'></i><i class='fa-stack-1x cost'>1</i></span> and a TS Trade Ship. 
                  Requires a CO Colony on world with LC Launch Cost of
                  <span class='fa-stack fa-lg'><i class='exo-fuel fa-stack-1x'></i><i class='fa-stack-1x cost'>2</i></span>
                  or less.  Ignore FU Fuel cost to launch from this world.
                </h3>
              </div>

              <div class="columns large-6" style="border-top:1px solid #aaa;padding-top:10px;">
                <h2 style="border-bottom:1px solid #aaa;">
                  <?php if($faction->name === 'Rock Hoppers'){ ?>
                    Settle Asteroid Colony 
                    <!--
                    <img src='/img/art/symbols/exocolony-red.png' style='height:50px;width:50px;' />,
                    <img src='/img/art/symbols/colony-red.png' style='height:50px;width:50px;' />
                    -->
                  <?php }else{ ?>
                    Settle EX Exocolony
                  <?php }?>

                  <span style="float:right;color:#888;font-size:30px;">

                    <?php
                        $costs = explode(",", $faction->starship_cost);
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
                          $styles = '';
                          if($cost == "O") {
                            $multiplier = "&#x2194;";
                            $styles = "margin-top:-2px";
                          }else if($cost == 'T') {
                            $multiplier = "&#x2191";
                            $styles = "margin-top:-4px";
                          }else if($multiplier == 0 || $cost == "L") {
                            $multiplier = "&#x2197;";
                          }
                          //if(($i == 2 && count($costs) < 5) || ($i == 3 && count($costs) > 4)) echo "<br />";
                          ?>

                          <span class="fa-stack fa-lg">
                            <i class="exo-<?php echo $resource ?> fa-stack-1x"></i>
                            <i class="fa-stack-1x cost" style="<?php echo $styles; ?>"><?php echo $multiplier; ?></i>
                          </span>

                          <?php
                        }
                      ?>

                  </span>
                </h2>
                <h3>
                  <?php if($faction->name !== 'Rock Hoppers') { ?>
                    Place an EX Exocolony on a landing site on a HW Habitable World outside the home system.
                    <?php if ($faction->colonize_time > 0) { ?>
                      Gain 
                      <span class='fa-stack fa-lg'><i class='exo-victory fa-stack-1x'></i><i class='fa-stack-1x cost'><?php echo $faction->colonize_time ?></i></span>
                      as a Faction bonus. Check the victory points reference card to gain up to another 
                    <?php } else { ?>
                      Check the victory points reference card to gain up to
                    <?php } ?>
                    <span class='fa-stack fa-lg'><i class='exo-victory fa-stack-1x'></i><i class='fa-stack-1x cost'>6</i></span>.
                  <?php }else{ ?>
                    Take any AS Asteroid card from the discarded AS Asteroid pile and your CO Colony or EX Exocolony and place them below any MN Moon, PL Planet or DP Dwarf Planet.
                    These colonized AS Asteroids provide
                    <span class='fa-stack fa-lg'><i class='exo-coin fa-stack-1x'></i><i class='fa-stack-1x cost'>1</i></span>
                    per turn and a total of
                    <span class='fa-stack fa-lg'><i class='exo-victory fa-stack-1x'></i><i class='fa-stack-1x cost'>3</i></span>
                    when placed.
                  <?php } ?>
                </h3>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
