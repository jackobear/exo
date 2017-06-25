<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board Layout</title>
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

          <canvas id="myCanvas" width="1579" height="985" style="background-color: #FFF;"></canvas>
          <script type="text/javascript">
            var canvas = document.getElementById('myCanvas');
            var context = canvas.getContext('2d');

            // Market
            context.beginPath();
            context.rect(440, 200, 110, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

            // Scoring Track
            context.beginPath();
            context.rect(560, 200, 110, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

            // Eridani
            context.beginPath();
            context.rect(200, 200, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

                // Exo1
                context.beginPath();
                context.rect(260, 200, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

                // Life deck
                context.beginPath();
                context.rect(350, 165, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

                context.beginPath();
                context.clearRect(345, 170, 50, 70);
                context.rect(345, 170, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

                context.beginPath();
                context.clearRect(340, 175, 50, 70);
                context.rect(340, 175, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

            // Centauri
            context.beginPath();
            context.rect(200, 280, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

                // Exo2
                context.beginPath();
                context.rect(260, 280, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

                // Habitable Deck
                context.beginPath();
                context.rect(350, 260, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

                context.beginPath();
                context.clearRect(345, 265, 50, 70);
                context.rect(345, 265, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

                context.beginPath();
                context.clearRect(340, 270, 50, 70);
                context.rect(340, 270, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

            // Sol
            context.beginPath();
            context.rect(200, 360, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

            // Mercury
            context.beginPath();
            context.rect(260, 360, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

            // Venus
            context.beginPath();
            context.rect(320, 360, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

            // Earth
            context.beginPath();
            context.rect(380, 360, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

                // Luna
                context.beginPath();
                context.rect(380, 440, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

            // Mars
            context.beginPath();
            context.rect(440, 360, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

            // Asteroid Belt
            context.beginPath();
            context.rect(500, 360, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

                // Ceres
                context.beginPath();
                context.rect(500, 440, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Vesta
                context.beginPath();
                context.rect(500, 520, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Pallas
                context.beginPath();
                context.rect(500, 600, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

            // Jupiter
            context.beginPath();
            context.rect(560, 360, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

                // Io
                context.beginPath();
                context.rect(560, 440, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Europa
                context.beginPath();
                context.rect(560, 520, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Ganymede
                context.beginPath();
                context.rect(560, 600, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Callisto
                context.beginPath();
                context.rect(560, 680, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

            // Saturn
            context.beginPath();
            context.rect(620, 360, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

                // Enceladus
                context.beginPath();
                context.rect(620, 440, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Titan
                context.beginPath();
                context.rect(620, 520, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

            // Uranus
            context.beginPath();
            context.rect(680, 360, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

                // Ariel
                context.beginPath();
                context.rect(680, 440, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Umbriel
                context.beginPath();
                context.rect(680, 520, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Titania
                context.beginPath();
                context.rect(680, 600, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Oberon
                context.beginPath();
                context.rect(680, 680, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

            // Neptune
            context.beginPath();
            context.rect(740, 360, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

                // Triton
                context.beginPath();
                context.rect(740, 440, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();

            // Kuiper Belt
            context.beginPath();
            context.rect(800, 360, 50, 70);
            context.lineWidth = 3;
            context.strokeStyle = '#333';
            context.stroke();

                // Pluto
                context.beginPath();
                context.rect(800, 440, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Eris
                context.beginPath();
                context.rect(800, 520, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Makemake
                context.beginPath();
                context.rect(800, 600, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
    
                // Humea
                context.beginPath();
                context.rect(800, 680, 50, 70);
                context.lineWidth = 3;
                context.strokeStyle = '#333';
                context.stroke();
      
          </script>

        </div>
      </div>
    </div>

    <script src="/js/foundation/vendor/jquery.js"></script>
    <script src="/js/foundation/vendor/what-input.js"></script>
    <script src="/js/foundation/vendor/foundation.js"></script>
    <script src="/js/foundation/app.js"></script>
  </body>
</html>
