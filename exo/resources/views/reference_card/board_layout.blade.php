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
    <script type="text/javascript" src="/js/arrow.js"></script>
    <script type="text/javascript" src="/js/interstellarTrack.js"></script>
  </head>
  <body>
    <div class="row" style="background-color: #000;max-width: 108rem;">
      <div class="large-12 columns">
        <div class="card" style="width: 1579px;height:985px;margin:70px 0px 70px 59px;border-radius:15px;">
          <div class="card-divider">
            <h1>
                Board Layout
            </h1>
          </div>

          <canvas id="myCanvas" width="1579" height="985" style="background-color: #FFF;"></canvas>
          <script type="text/javascript">
            var canvas = document.getElementById('myCanvas');
            var context = canvas.getContext('2d');
            context.font = "30px Arial";
            context.lineWidth = 1;
            context.strokeStyle = '#333';

            // Player 1
            context.fillText("Player 1",475,30);
            context.fillText("Faction",505,85);
            context.beginPath();
            context.rect(500, 40, 110, 70);
            context.stroke();

                // Player 1's Action cards
                context.fillText("Starting",320,60);
                context.fillText("Action",320,85);
                context.fillText("cards",320,110);
                arrow(context, 410, 75, 435, 75);
                context.beginPath();
                context.rect(440, 40, 50, 70);
                context.stroke();

            // Market
            context.fillText("Space",625,270);
            context.fillText("Market",625,300);
            context.beginPath();
            context.rect(620, 240, 110, 70);
            context.stroke();

            // Scoring Track
            context.fillText("Scoring",745,270);
            context.fillText("Track",745,300);
            context.beginPath();
            context.rect(740, 240, 110, 70);
            context.stroke();

            // Stars Label
            context.fillText("Stars",130,150);
            arrow(context, 160, 155, 195, 200);
            arrow(context, 160, 155, 195, 280);
            context.fillText("Starting",30,250);
            context.fillText("Star",30,275);
            arrow(context, 90, 275, 195, 370);

            // Eridani
            context.beginPath();
            context.rect(200, 200, 50, 70);
            context.stroke();

                // Habitable Exoplanets Label
                context.fillText("Habitable",130,75);
                context.fillText("Exoplanets",130,100);
                arrow(context, 200, 105, 255, 200);
                arrow(context, 200, 105, 255, 280);

                // Exo1
                context.beginPath();
                context.rect(260, 200, 50, 70);
                context.stroke();

                // Action deck
                context.fillText("Action",320,205);
                context.fillText("deck",320,230);
                arrow(context, 410, 205, 450, 205);
                context.beginPath();
                context.rect(470, 165, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(465, 170, 50, 70);
                context.rect(465, 170, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(460, 175, 50, 70);
                context.rect(460, 175, 50, 70);
                context.stroke();

                // Action discard pile
                context.fillText("Action discard pile",645,215);
                arrow(context, 640, 205, 600, 205);
                context.beginPath();
                context.setLineDash([6]);
                context.rect(540, 175, 50, 70);
                context.stroke();
                context.setLineDash([0]);

            // Centauri
            context.beginPath();
            context.rect(200, 280, 50, 70);
            context.stroke();

                // Exo2
                context.beginPath();
                context.rect(260, 280, 50, 70);
                context.stroke();

                // Asteroid Deck
                context.fillText("Asteroid",320,305);
                context.fillText("deck",320,330);
                arrow(context, 430, 305, 450, 305);
                context.beginPath();
                context.rect(470, 260, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(465, 265, 50, 70);
                context.rect(465, 265, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(460, 270, 50, 70);
                context.rect(460, 270, 50, 70);
                context.stroke();

                // Asteroid discard pile
                context.fillText("Asteroid discard pile",645,345);
                arrow(context, 640, 335, 600, 335);
                context.beginPath();
                context.setLineDash([6]);
                context.rect(540, 270, 50, 70);
                context.stroke();
                context.setLineDash([0]);

            // Player 2
            context.save();
            context.translate(130, 415);
            context.rotate(Math.PI/2);
            context.textAlign = "center";
            context.fillText("Player 2", 80, 0);
            context.fillText("Faction", 0, 55);
            context.fillText("Starting", 250, 30);
            context.fillText("Action", 250, 55);
            context.fillText("cards", 250, 80);
            arrow(context, 205, 50, 180, 50);
            context.restore();

            context.beginPath();
            context.rect(50, 360, 70, 110);
            context.stroke();

                // Player 2's Action cards
                context.beginPath();
                context.rect(50, 480, 70, 50);
                context.stroke();
                context.beginPath();
                context.rect(50, 540, 70, 50);
                context.stroke();

            // Sol
            context.fillText("1", 216, 406);
            context.beginPath();
            context.rect(200, 360, 50, 70);
            context.stroke();

            // Mercury
            context.fillText("2", 276, 406);
            context.beginPath();
            context.rect(260, 360, 50, 70);
            context.stroke();

            // Venus
            context.fillText("3", 336, 406);
            context.beginPath();
            context.rect(320, 360, 50, 70);
            context.stroke();

            // Earth
            context.fillText("4", 396, 406);
            context.beginPath();
            context.rect(380, 360, 50, 70);
            context.stroke();

                // Luna
                context.fillText("12", 386, 486);
                context.beginPath();
                context.rect(380, 440, 50, 70);
                context.stroke();

            // Mars
            context.fillText("5", 456, 406);
            context.beginPath();
            context.rect(440, 360, 50, 70);
            context.stroke();

            // Asteroid Belt
            context.fillText("6", 516, 406);
            context.beginPath();
            context.rect(500, 360, 50, 70);
            context.stroke();

                // Ceres
                context.fillText("13", 506, 486);
                context.beginPath();
                context.rect(500, 440, 50, 70);
                context.stroke();
    
                // Vesta
                context.fillText("14", 506, 566);
                context.beginPath();
                context.rect(500, 520, 50, 70);
                context.stroke();
    
                // Pallas
                context.fillText("15", 506, 646);
                context.beginPath();
                context.rect(500, 600, 50, 70);
                context.stroke();

            // Jupiter
            context.fillText("7", 576, 406);
            context.beginPath();
            context.rect(560, 360, 50, 70);
            context.stroke();

                // Io
                context.fillText("16", 566, 486);
                context.beginPath();
                context.rect(560, 440, 50, 70);
                context.stroke();
    
                // Europa
                context.fillText("17", 566, 566);
                context.beginPath();
                context.rect(560, 520, 50, 70);
                context.stroke();
    
                // Ganymede
                context.fillText("18", 566, 646);
                context.beginPath();
                context.rect(560, 600, 50, 70);
                context.stroke();
    
                // Callisto
                context.fillText("19", 566, 726);
                context.beginPath();
                context.rect(560, 680, 50, 70);
                context.stroke();

            // Saturn
            context.fillText("8", 636, 406);
            context.beginPath();
            context.rect(620, 360, 50, 70);
            context.stroke();

                // Enceladus
                context.fillText("20", 629, 486);
                context.beginPath();
                context.rect(620, 440, 50, 70);
                context.stroke();
    
                // Titan
                context.beginPath();
                context.fillText("21", 629, 566);
                context.rect(620, 520, 50, 70);
                context.stroke();

            // Uranus
            context.fillText("9", 696, 406);
            context.beginPath();
            context.rect(680, 360, 50, 70);
            context.stroke();

                // Ariel
                context.fillText("22", 689, 486);
                context.beginPath();
                context.rect(680, 440, 50, 70);
                context.stroke();
    
                // Umbriel
                context.fillText("23", 689, 566);
                context.beginPath();
                context.rect(680, 520, 50, 70);
                context.stroke();
    
                // Titania
                context.fillText("24", 689, 646);
                context.beginPath();
                context.rect(680, 600, 50, 70);
                context.stroke();
    
                // Oberon
                context.fillText("25", 689, 726);
                context.beginPath();
                context.rect(680, 680, 50, 70);
                context.stroke();

            // Neptune
            context.fillText("10", 746, 406);
            context.beginPath();
            context.rect(740, 360, 50, 70);
            context.stroke();

                // Triton
                context.fillText("26", 749, 486);
                context.beginPath();
                context.rect(740, 440, 50, 70);
                context.stroke();

            // Kuiper Belt
            context.fillText("11", 806, 406);
            context.beginPath();
            context.rect(800, 360, 50, 70);
            context.stroke();

                // Pluto
                context.fillText("27", 809, 486);
                context.beginPath();
                context.rect(800, 440, 50, 70);
                context.stroke();
    
                // Eris
                context.fillText("28", 809, 566);
                context.beginPath();
                context.rect(800, 520, 50, 70);
                context.stroke();
    
                // Makemake
                context.fillText("29", 809, 646);
                context.beginPath();
                context.rect(800, 600, 50, 70);
                context.stroke();
    
                // Humea
                context.fillText("30", 809, 726);
                context.beginPath();
                context.rect(800, 680, 50, 70);
                context.stroke();

            // Planets/Asteroid belts label
            context.fillText("Planets and",890,390);
            context.fillText("Asteroid Belts",890,415);
            arrow(context, 885, 400, 860, 400);

            // Moons label
            var curlyHeight = 310;
            var linelength = (curlyHeight-60)/2;
            var curlyx = 855;
            var curlyy = 440;
            var curlyWidth = 20;
            context.beginPath();
            context.moveTo(curlyx, curlyy);
            context.arcTo(curlyWidth+curlyx, curlyy, curlyWidth+curlyx, curlyWidth+curlyy, curlyWidth);
            context.lineTo(curlyWidth+curlyx, curlyWidth+curlyy + linelength);
            context.arcTo(curlyWidth+curlyx, (2*curlyWidth)+curlyy + linelength, (2*curlyWidth)+curlyx, (2*curlyWidth)+curlyy + linelength, curlyWidth);
            context.arcTo(curlyWidth+curlyx, (2*curlyWidth)+curlyy + linelength, curlyWidth+curlyx, (3*curlyWidth)+curlyy + linelength, curlyWidth);
            context.lineTo(curlyWidth+curlyx, curlyHeight - curlyWidth+curlyy);
            context.arcTo(curlyWidth+curlyx, curlyHeight + curlyy, curlyx, curlyHeight + curlyy, curlyWidth);
            context.stroke();
            context.fillText("Moons",900,615);

            // Habitable World deck
            context.fillText("Habitable",300,540);
            context.fillText("World deck",300,570);
            arrow(context, 300, 545, 260, 545);
            context.beginPath();
            context.rect(200, 500, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(195, 505, 50, 70);
            context.rect(195, 505, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(190, 510, 50, 70);
            context.rect(190, 510, 50, 70);
            context.stroke();

            // Lifeforms deck
            context.fillText("Lifeform deck",300,645);
            arrow(context, 300, 635, 260, 635);
            context.beginPath();
            context.rect(200, 600, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(195, 605, 50, 70);
            context.rect(195, 605, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(190, 610, 50, 70);
            context.rect(190, 610, 50, 70);
            context.stroke();

            // Star deck
            context.fillText("Star deck",300, 745);
            arrow(context, 300, 735, 260, 735);
            context.beginPath();
            context.rect(200, 700, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(195, 705, 50, 70);
            context.rect(195, 705, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(190, 710, 50, 70);
            context.rect(190, 710, 50, 70);
            context.stroke();
      
            // Player 3
            context.fillText("Player 3", 480, 790);
            context.fillText("Faction", 425, 845);
            context.beginPath();
            context.rect(420, 800, 110, 70);
            context.stroke();

                // Player 3's Action cards
                context.fillText("Starting",690,820);
                context.fillText("Action",690,845);
                context.fillText("cards",690,870);
                arrow(context, 685, 830, 660, 830);
                context.beginPath();
                context.rect(540, 800, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(600, 800, 50, 70);
                context.stroke();

            // Beginner Setup
            context.fillText("Beginner Setup", 1100, 40);
            context.beginPath();
            context.moveTo(1100, 50);
            context.lineTo(1310, 50);
            context.stroke();
            context.fillText("1. Sol", 1100, 80);
            context.fillText("2. Mercury", 1100, 110);
            context.fillText("3. Venus", 1100, 140);
            context.fillText("4. Earth", 1100, 170);
            context.fillText("5. Mars", 1100, 200);
            context.fillText("6. Asteroid Belt", 1100, 230);
            context.fillText("7. Jupiter", 1100, 260);
            context.fillText("8. Saturn", 1100, 290);
            context.fillText("9. Uranus", 1100, 320);
            context.fillText("10. Neptune", 1100, 350);
            context.fillText("11. Kuiper Belt", 1100, 380);
            context.fillText("12. Luna", 1100, 410);
            context.fillText("13. Ceres", 1100, 440);
            context.fillText("14. Vesta", 1100, 470);
            context.fillText("15. Pallas", 1100, 500);
            context.fillText("16. Io", 1310, 80);
            context.fillText("17. Europa", 1310, 110);
            context.fillText("18. Ganymede", 1310, 140);
            context.fillText("19. Callisto", 1310, 170);
            context.fillText("20. Enceladus", 1310, 200);
            context.fillText("21. Titan", 1310, 230);
            context.fillText("22. Ariel", 1310, 260);
            context.fillText("23. Umbriel", 1310, 290);
            context.fillText("24. Titania", 1310, 320);
            context.fillText("25. Oberon", 1310, 350);
            context.fillText("26. Triton", 1310, 380);
            context.fillText("27. Pluto", 1310, 410);
            context.fillText("28. Eris", 1310, 440);
            context.fillText("29. Makemake", 1310, 470);
            context.fillText("30. Humea", 1310, 500);

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
