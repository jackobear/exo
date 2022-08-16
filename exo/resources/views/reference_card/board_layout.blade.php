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
    <div class="row" style="background: url('/img/art/starfield.jpg');
          background-repeat: no-repeat;background-position:top;padding:0px;max-width: 108rem;">
      <div class="large-12 columns">
        <div class="glow" style="width: 1579px;height:985px;margin:70px 0px 70px 59px;border-radius:15px;">
            <h1>
                Board Layout
            </h1>

          <canvas id="myCanvas" width="1550" height="885" style="background-color: #c4cfd6;"></canvas>
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
                context.fillText("card",320,110);
                arrow(context, 410, 75, 435, 75);
                context.beginPath();
                context.rect(440, 40, 50, 70);
                context.stroke();

            // Player 2
            context.fillText("Player 2",825,30);
            context.fillText("Faction",855,85);
            context.beginPath();
            context.rect(850, 40, 110, 70);
            context.stroke();

                // Player 2's Action cards
                context.fillText("Starting",670,60);
                context.fillText("Action",670,85);
                context.fillText("card",670,110);
                arrow(context, 760, 75, 785, 75);
                context.beginPath();
                context.rect(790, 40, 50, 70);
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
            context.fillText("New Stars", 60,150);
            arrow(context, 160, 155, 195, 200);
            arrow(context, 160, 155, 195, 280);
            context.fillText("Home Star",30,275);
            context.fillText("(Sol)",30,300);
            arrow(context, 95, 280, 195, 370);

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

                // Action discard pile
                context.fillText("Action",320,205);
                context.fillText("discard pile",320,230);
                arrow(context, 420, 195, 470, 195);
                context.beginPath();
                context.setLineDash([6]);
                context.rect(480, 175, 50, 70);
                context.stroke();
                context.setLineDash([0]);

                // Action deck
                context.fillText("Action deck",645,220);
                arrow(context, 640, 210, 605, 210);
                context.beginPath();
                context.rect(550, 165, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(545, 170, 50, 70);
                context.rect(545, 170, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(540, 175, 50, 70);
                context.rect(540, 175, 50, 70);
                context.stroke();

                // Action card market
                context.fillText("Action card market",320,155);
                arrow(context, 580, 145, 620, 145);
                context.beginPath();
                context.rect(630, 120, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(690, 120, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(750, 120, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(810, 120, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(870, 120, 50, 70);
                context.stroke();

            // Centauri
            context.beginPath();
            context.rect(200, 280, 50, 70);
            context.stroke();

                // Exo2
                context.beginPath();
                context.rect(260, 280, 50, 70);
                context.stroke();

                // Asteroid Deck
                context.fillText("Asteroid deck",645,345);
                arrow(context, 640, 335, 600, 335);
                context.beginPath();
                context.rect(550, 260, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(545, 265, 50, 70);
                context.rect(545, 265, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(540, 270, 50, 70);
                context.rect(540, 270, 50, 70);
                context.stroke();

                // Asteroid discard pile
                context.fillText("Asteroid",320,305);
                context.fillText("discard pile",320,330);
                arrow(context, 440, 295, 470, 295);
                context.beginPath();
                context.setLineDash([6]);
                context.rect(480, 270, 50, 70);
                context.stroke();
                context.setLineDash([0]);

            // Player 3
            context.save();
            context.translate(130, 415);
            context.rotate(Math.PI/2);
            context.textAlign = "center";
            context.fillText("Player 3", 80, 0);
            context.fillText("Faction", 0, 55);
            context.fillText("Starting", 250, 30);
            context.fillText("Action", 250, 55);
            context.fillText("cards", 250, 80);
            arrow(context, 205, 50, 180, 50);
            context.restore();

            context.beginPath();
            context.rect(50, 360, 70, 110);
            context.stroke();

                // Player 3's Action cards
                context.beginPath();
                context.rect(50, 480, 70, 50);
                context.stroke();
                context.beginPath();
                context.rect(50, 540, 70, 50);
                context.stroke();

            // Sol
            //context.fillText("1", 216, 406);
            context.beginPath();
            context.rect(200, 360, 50, 70);
            context.stroke();

            // Mercury
            context.fillText("1", 276, 406);
            context.beginPath();
            context.rect(260, 360, 50, 70);
            context.stroke();

            // Venus
            context.fillText("2", 336, 406);
            context.beginPath();
            context.rect(320, 360, 50, 70);
            context.stroke();

            // Earth
            context.fillText("3", 396, 406);
            context.beginPath();
            context.rect(380, 360, 50, 70);
            context.stroke();

                // Luna
                context.fillText("8", 396, 486);
                context.beginPath();
                context.rect(380, 440, 50, 70);
                context.stroke();

            // Mars
            context.fillText("4", 456, 406);
            context.beginPath();
            context.rect(440, 360, 50, 70);
            context.stroke();

            // Asteroid Belt
            context.fillText("5", 516, 406);
            context.beginPath();
            context.rect(500, 360, 50, 70);
            context.stroke();

                // Ceres
                context.fillText("9", 516, 486);
                context.beginPath();
                context.rect(500, 440, 50, 70);
                context.stroke();
    
                // Vesta
                context.fillText("10", 506, 566);
                context.beginPath();
                context.rect(500, 520, 50, 70);
                context.stroke();
    
                // Pallas
                context.fillText("11", 506, 646);
                context.beginPath();
                context.rect(500, 600, 50, 70);
                context.stroke();

            // Jupiter
            context.fillText("6", 576, 406);
            context.beginPath();
            context.rect(560, 360, 50, 70);
            context.stroke();

                // Io
                context.fillText("12", 566, 486);
                context.beginPath();
                context.rect(560, 440, 50, 70);
                context.stroke();
    
                // Europa
                context.fillText("13", 566, 566);
                context.beginPath();
                context.rect(560, 520, 50, 70);
                context.stroke();
    
                // Ganymede
                context.fillText("14", 566, 646);
                context.beginPath();
                context.rect(560, 600, 50, 70);
                context.stroke();
    
                // Callisto
                context.fillText("15", 566, 726);
                context.beginPath();
                context.rect(560, 680, 50, 70);
                context.stroke();

            // Saturn
            context.fillText("7", 636, 406);
            context.beginPath();
            context.rect(620, 360, 50, 70);
            context.stroke();

                // Enceladus
                context.fillText("16", 629, 486);
                context.beginPath();
                context.rect(620, 440, 50, 70);
                context.stroke();
    
                // Titan
                context.beginPath();
                context.fillText("17", 629, 566);
                context.rect(620, 520, 50, 70);
                context.stroke();

/*
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
*/

            // Planets/Asteroid belts label
            context.fillText("Planets",710,405);
            arrow(context, 705, 395, 680, 395);

            // Moons and Dwarf Planets curly bracket and label
            var curlyHeight = 310;
            var linelength = (curlyHeight-60)/2;
            var curlyx = 685;
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
            context.fillText("Moons and",730,605);
            context.fillText("Dwarf Planets",730,630);

            // 3 Planets for Sol label
            var curlyLength = 170;
            var linelength = (curlyLength-60)/2;
            var curlyx = 260;
            var curlyy = 760;
            var curlyWidth = 20;
            context.beginPath();
            context.moveTo(curlyx, curlyy);
            context.arcTo(curlyx, curlyWidth+curlyy, curlyWidth+curlyx, curlyWidth+curlyy, curlyWidth);
            context.lineTo(curlyWidth+curlyx + linelength, curlyWidth+curlyy);
            context.arcTo((2*curlyWidth)+curlyx + linelength, curlyWidth+curlyy, (2*curlyWidth)+curlyx + linelength, (2*curlyWidth)+curlyy, curlyWidth);
            context.arcTo((2*curlyWidth)+curlyx + linelength, curlyWidth+curlyy, (3*curlyWidth)+curlyx + linelength, curlyWidth+curlyy, curlyWidth);
            context.lineTo((2*curlyWidth)+curlyx + (2*linelength), curlyWidth+curlyy);
            context.arcTo((3*curlyWidth)+curlyx + (2*linelength), curlyWidth+curlyy, (3*curlyWidth)+curlyx + (2*linelength), curlyy, curlyWidth);
            context.stroke();
            context.fillText("3 Planets for",280,830);
            context.fillText("1 Player with Sol",250,860);

            // Planets per player labels
            var curlyLength = 240;
            var linelength = (curlyLength-60)/2;
            var curlyx = 440;
            var curlyy = 760;
            var curlyWidth = 20;
            context.beginPath();
            context.moveTo(curlyx, curlyy);
            context.arcTo(curlyx, curlyWidth+curlyy, curlyWidth+curlyx, curlyWidth+curlyy, curlyWidth);
            context.lineTo(curlyWidth+curlyx + linelength, curlyWidth+curlyy);
            context.arcTo((2*curlyWidth)+curlyx + linelength, curlyWidth+curlyy, (2*curlyWidth)+curlyx + linelength, (2*curlyWidth)+curlyy, curlyWidth);
            context.arcTo((2*curlyWidth)+curlyx + linelength, curlyWidth+curlyy, (3*curlyWidth)+curlyx + linelength, curlyWidth+curlyy, curlyWidth);
            context.lineTo((2*curlyWidth)+curlyx + (2*linelength), curlyWidth+curlyy);
            context.arcTo((3*curlyWidth)+curlyx + (2*linelength), curlyWidth+curlyy, (3*curlyWidth)+curlyx + (2*linelength), curlyy, curlyWidth);
            context.stroke();
            context.fillText("4-7 Planets",530,830);
            context.fillText("for 2-5 Players",510,860);

            // Star deck
            context.fillText("Star",300, 500);
            context.fillText("deck",300, 530);
            arrow(context, 300, 505, 260, 505);
            context.beginPath();
            context.rect(200, 460, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(195, 465, 50, 70);
            context.rect(195, 465, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(190, 470, 50, 70);
            context.rect(190, 470, 50, 70);
            context.stroke();

            // Habitable World deck
            context.fillText("Habitable",300,590);
            context.fillText("World deck",300,620);
            arrow(context, 300, 595, 260, 595);
            context.beginPath();
            context.rect(200, 560, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(195, 565, 50, 70);
            context.rect(195, 565, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(190, 570, 50, 70);
            context.rect(190, 570, 50, 70);
            context.stroke();

            // Lifeforms deck
            context.fillText("Lifeform deck",300,705);
            arrow(context, 300, 695, 260, 695);
            context.beginPath();
            context.rect(200, 660, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(195, 665, 50, 70);
            context.rect(195, 665, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(190, 670, 50, 70);
            context.rect(190, 670, 50, 70);
            context.stroke();

            // Trade Ship deck
            context.fillText("Trade Ship",30,800);
            context.fillText("deck",50,830);
            arrow(context, 120, 820, 175, 820);
            context.beginPath();
            context.rect(200, 760, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(195, 765, 50, 70);
            context.rect(195, 765, 50, 70);
            context.stroke();

            context.beginPath();
            context.clearRect(190, 770, 50, 70);
            context.rect(190, 770, 50, 70);
            context.stroke();
      
            // Player 4
            context.fillText("Player 4", 1020, 440);
            context.fillText("Faction", 965, 495);
            context.beginPath();
            context.rect(960, 450, 110, 70);
            context.stroke();

                // Player 4's Action cards
                context.fillText("Starting",1230,470);
                context.fillText("Action",1230,495);
                context.fillText("cards",1230,520);
                arrow(context, 1225, 480, 1200, 480);
                context.beginPath();
                context.rect(1080, 450, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(1140, 450, 50, 70);
                context.stroke();
      
            // Player 5
            context.fillText("Player 5", 1020, 660);
            context.fillText("Faction", 965, 715);
            context.beginPath();
            context.rect(960, 670, 110, 70);
            context.stroke();

                // Player 5's Action cards
                context.fillText("Starting",1230,690);
                context.fillText("Action",1230,715);
                context.fillText("cards",1230,740);
                arrow(context, 1225, 700, 1200, 700);
                context.beginPath();
                context.rect(1080, 670, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(1140, 670, 50, 70);
                context.stroke();

/*
            // Player 6
            context.fillText("Player 6", 1220, 780);
            context.fillText("Faction", 1165, 835);
            context.beginPath();
            context.rect(1160, 790, 110, 70);
            context.stroke();

                // Player 6's Action cards
                context.fillText("Starting",1430,810);
                context.fillText("Action",1430,835);
                context.fillText("cards",1430,860);
                arrow(context, 1425, 820, 1400, 820);
                context.beginPath();
                context.rect(1280, 790, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(1340, 790, 50, 70);
                context.stroke();
*/

            // Beginner Setup
            context.fillText("Beginner Setup", 1100, 30);
            context.beginPath();
            context.moveTo(1100, 40);
            context.lineTo(1310, 40);
            context.stroke();
            //context.fillText("1. Sol", 1100, 70);
            context.fillText("1. Mercury", 1100, 70);
            context.fillText("2. Venus", 1100, 100);
            context.fillText("3. Earth", 1100, 130);
            context.fillText("4. Mars", 1100, 160);
            context.fillText("5. Asteroid Belt", 1100, 190);
            context.fillText("6. Jupiter", 1100, 220);
            context.fillText("7. Saturn", 1100, 250);
            context.fillText("8. Luna", 1100, 280);
            context.fillText("9. Ceres", 1100, 310);
            context.fillText("10. Vesta", 1310, 70);
            context.fillText("11. Pallas", 1310, 100);
            context.fillText("12. Io", 1310, 130);
            context.fillText("13. Europa", 1310, 160);
            context.fillText("14. Ganymede", 1310, 190);
            context.fillText("15. Callisto", 1310, 220);
            context.fillText("16. Enceladus", 1310, 250);
            context.fillText("17. Titan", 1310, 280);
            /*
            context.fillText("19. Callisto", 1310, 160);
            context.fillText("20. Enceladus", 1310, 190);
            context.fillText("21. Titan", 1310, 220);
            context.fillText("22. Ariel", 1310, 250);
            context.fillText("23. Umbriel", 1310, 280);
            context.fillText("24. Titania", 1310, 310);
            context.fillText("25. Oberon", 1310, 340);
            context.fillText("26. Triton", 1310, 370);
            context.fillText("27. Pluto", 1310, 400);
            context.fillText("28. Eris", 1310, 430);
            context.fillText("29. Makemake", 1310, 460);
            context.fillText("30. Humea", 1310, 490);
            */

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
