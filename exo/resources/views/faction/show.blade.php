<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $faction->name; ?></title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
    <link rel="stylesheet" href="/css/exo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/cost.js"></script>
    <script type="text/javascript" src="/js/interstellarTrack.js"></script>
  </head>
  <body>
    <div class="row" style="background-color: #000;max-width: 108rem;">
      <div class="large-12 columns">
        <div class="card" style="width: 1579px;height:985px;margin:70px 0px 70px 59px;border-radius:15px;">
          <div class="card-divider">
            <h1>
                <? echo $faction->name; ?>
            </h1>

          </div>

          <div class="row expanded">
            <div class="large-4 columns" style="padding-right:0px;">
              <div class="callout" style="margin:15px 0px 15px 15px;">
                <h3><? echo $faction->body; ?></h3>
              </div>
              <div class="callout" style="margin:15px 0px 15px 15px;">
                <span style="font-style:italic;font-size:20pt;color:#aaa;"><? echo $faction->flavor_text; ?></span>
              </div>
            </div>
            <div class="large-8 columns">
              <canvas id="myCanvas" width="1100" height="505" style="background: url('/img/art/factions/<? 
                echo strtolower(str_replace(" ", "-", $faction->name)); 
              ?>.jpg');background-size: auto auto;"></canvas>
            </div>
          </div>
          

          <div class="callout" style="margin: 0px 10px 10px 10px;">
            <h2>Interplanetary Colony Ship
            <span style="float:right;color:#888;font-size:30px;">
              <canvas id="planetshipCostCanvas" width="150" height="100" style="display:inline-block;"></canvas>
              <script type="text/javascript">
                $(document).ready(function() {
                  <?
                    $costs = explode(",", $faction->planetship_cost);
                    $multiplier = 1;
                    for($i=0;$i<count($costs);$i++){
                      $cost = trim($costs[$i]);
                      if(is_numeric($cost[0])){
                        $multiplier = $cost[0];
                        $cost = substr($cost, 1);
                      }
                      if($cost[0] == "*"){
                        $multiplier = 0;
                      }
                      echo "var cost$i = new Cost('$cost', $multiplier, $i, 'planetshipCostCanvas');";
                    }
                  ?>
                });
              </script>
            </span>
            </h2>
            <h3>Pay fuel for launch and travel distance.  Decrease price of new colony's resource.</h3>
          </div>

          <div class="callout" style="margin: 0px 10px 10px 10px;padding-bottom:0px;">
            <h2>Interstellar Colony Ship
              <span style="float:right;color:#888;font-size:30px;">
                <canvas id="starshipCostCanvas" width="100" height="100" style="display:inline-block;"></canvas>
                <script type="text/javascript">
                  $(document).ready(function() {
                    <?
                      $costs = explode(",", $faction->starship_cost);
                      $multiplier = 1;
                      for($i=0;$i<count($costs);$i++){
                        $cost = trim($costs[$i]);
                        if(is_numeric($cost[0])){
                          $multiplier = $cost[0];
                          $cost = substr($cost, 1);
                        }
                        echo "var cost$i = new Cost('$cost', $multiplier, $i, 'starshipCostCanvas');";
                      }
                    ?>
                  });
                </script>
              </span>
            </h2>

            <canvas id="rocketCanvas" width="1300" height="110" style="display:inline-block;"></canvas>
            <script type="text/javascript">
              $(document).ready(function() {
                var track = new interstellarTrack(<? echo $faction->travel_time . ", " . $faction->colonize_time ?>);
              });
            </script>

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
