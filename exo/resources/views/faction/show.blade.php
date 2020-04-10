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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="row" style="background-color: #000;max-width: 108rem;">
      <div class="large-12 columns">
        <div class="card" style="height:1579px;width:985px;margin:70px 0px 70px 59px;border-radius:15px;">
          <div class="card-divider">
            <h1>
                <? echo $faction->name; ?>
            </h1>

          </div>

          <div class="row">
            <canvas id="myCanvas" width="1000" height="350" style="background: url('/img/art/factions/<? 
              echo strtolower(str_replace(" ", "-", $faction->name)); 
            ?>.jpg');background-size: auto auto;background-position: center; "></canvas>
          </div>

          <div class="callout" style="margin: 0px 10px 10px 10px;padding: 10px 16px 10px 16px;">
            <h3><? echo $faction->body; ?></h3>
          </div>

          <div class="callout" style="margin: 0px 10px 10px 10px;padding: 10px 16px 10px 16px;">
            <span style="font-style:italic;font-size:20pt;color:#aaa;"><? echo $faction->flavor_text; ?></span>
          </div>

          <div class="callout" style="margin: 0px 10px 10px 10px;padding: 10px 16px 10px 16px;">
            <h2>Colony Ship
            <span style="float:right;color:#888;font-size:30px;">

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
                        $styles = "margin-top:-5px";
                      }else if($multiplier == 0 || $cost == "L") {
                        $multiplier = "&#x2197;";
                      }
                      if(($i == 2 && count($costs) < 5) || ($i == 3 && count($costs) > 4)) echo "<br />";
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
            <h3>Pay fuel for launch and travel distance.  Decrease price of new colony's resource. +1 VP when built, +1 VP for first Colony on a world.</h3>
          </div>

          <div class="callout" style="margin: 0px 10px 10px 10px;padding: 10px 16px 10px 16px;">
            <h2>Launch System
            <span style="float:right;color:#888;font-size:30px;">

                <?php
                    // TODO: Add launch_system_cost to faction model
                    $costs = explode(",", "2M, 2Fu, 1W");
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
            </h2>
            <h3>Requires Colony on world with launch cost of 2 or less.  Ignore Fuel cost to leave planet. +1 Trade per turn. +1 VP.  Any player with a Colony on this world may use this to launch. Gain 1C per launch by any player.</h3>
          </div>

          <div class="callout" style="margin: 0px 10px 10px 10px;padding: 10px 16px 10px 16px;">
            <h2><?php echo $faction->name === 'Rock Hoppers' ? 'Asteroid Colony' : 'Exocolony Ship'; ?>
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
                      if($cost == "O") {
                        $multiplier = "&#x2194;";
                        $styles = "margin-top:-5px";
                      }else if($multiplier == 0 || $cost == "L") {
                        $multiplier = "&#x2197;";
                      }
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
            </h2>
            <h3>
              <?php if($faction->name !== 'Rock Hoppers') { ?>
                <?php echo sprintf("%+d", $faction->colonize_time) . " VP: Colonize time bonus,"; ?>
                +1 VP: First life detection,
                +1 VP: Detect life,
                +1 VP: First ship to enter a new star system,
                +1 VP: First Colony outside starting star system,
                +1 VP: First Colony in a new star system.
              <?php }else{ ?>
                Take any Asteroid card from the discarded Asteroid pile and your Colony and place them in any orbit.
                These colonized asteroids provide
                <span class='fa-stack fa-lg'><i class='exo-coin fa-stack-1x'></i><i class='fa-stack-1x cost'>2</i></span>
                per turn and an extra victory point when built.
                You cannot colonize it again and no other player may colonize the Asteroid.
                Note there is no Coin cost for this colony.
              <?php } ?>
            </h3>
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
