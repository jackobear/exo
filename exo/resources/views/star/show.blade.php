<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $star->name; ?></title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
    <link rel="stylesheet" href="/css/exo.css">
    <script type="text/javascript" src="/js/world.js"></script>
  </head>
  <body>
    <div class="row" style="background-color: #000">
      <div class="large-12 columns">
        <div class="card" style="width: 700px;height:1132px;margin:70px 55px 70px 55px;border-radius:15px;">
          <div class="card-divider">
            <h1>
                <? echo $star->name; ?>
                <span style="float:right;color:#888;font-size:30px;margin-top:20px;"><? echo $star->type; ?> Star</span>
            </h1>

          </div>

            <canvas id="myCanvas" width="700" height="800" style="background: url('/img/luna.jpg');background-size: auto auto;"></canvas>
          
          <div class="card-section">
            <h3><? echo $star->body; ?></h3>
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
