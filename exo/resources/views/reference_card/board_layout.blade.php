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
    <script src="/js/foundation/vendor/jquery.js"></script>
    <script src="/js/foundation/vendor/what-input.js"></script>
    <script src="/js/foundation/vendor/foundation.js"></script>
    <script src="/js/foundation/app.js"></script>
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
            // this shoulda been shopped instead...
            var canvas = document.getElementById('myCanvas');
            var context = canvas.getContext('2d');
            context.font = "30px Arial";
            context.lineWidth = 1;
            context.strokeStyle = '#333';

            // Player 1
            /*
            context.fillText("Player 1",515,30);
            context.fillText("Faction",545,85);
            context.beginPath();
            context.rect(540, 40, 110, 70);
            context.stroke();

                // Player 1's Action cards
                const actionsImage = new Image(59, 80);
                actionsImage.src = '/img/art/symbols/actions.png';
                context.drawImage(actionsImage, 320, 55, 30, 40);
                context.fillText("Starting",360,60);
                context.fillText("Action",360,85);
                context.fillText("card(s)",360,110);
                arrow(context, 450, 75, 475, 75);
                context.beginPath();
                context.rect(480, 40, 50, 70);
                context.stroke();
            */

            // Player 2
            /*
            context.fillText("Player 2",865,30);
            context.fillText("Faction",895,85);
            context.beginPath();
            context.rect(890, 40, 110, 70);
            context.stroke();

                // Player 2's Action cards
                context.drawImage(actionsImage, 670, 55, 30, 40);
                context.fillText("Starting",710,60);
                context.fillText("Action",710,85);
                context.fillText("card(s)",710,110);
                arrow(context, 800, 75, 825, 75);
                context.beginPath();
                context.rect(830, 40, 50, 70);
                context.stroke();
            */

            // Market
            context.fillText("Resource",690,250);
            context.fillText("Market",690,280);
            context.beginPath();
            context.rect(685, 220, 140, 70);
            context.stroke();

            // Scoring Track
            context.fillText("Scoring",855,250);
            context.fillText("Track",855,280);
            context.beginPath();
            context.rect(850, 220, 140, 70);
            context.stroke();

            // Stars Label
            drawIcon('stars', 0, 255, 30, 40);
            context.fillText("New", 0,250);
            context.fillText("    Stars", 0,285);
            arrow(context, 110, 280, 190, 240);
            arrow(context, 110, 280, 190, 320);
            drawIcon('stars', 0, 380, 30, 40);

            context.fillText("Home",0,375);
            context.fillText("    Star",0,410);
            context.fillText("(Sol)",0,445);
            arrow(context, 105, 390, 195, 390);

            // Eridani
            context.beginPath();
            context.rect(200, 200, 50, 70);
            context.stroke();

                // New Hab worlds Label
                drawIcon('habitable-worlds', 50, 85, 30, 40);
                context.fillText("New",90,85);
                context.fillText("Habitable",90,115);
                context.fillText("Worlds",90,145);
                arrow(context, 160, 150, 275, 220);
                arrow(context, 160, 150, 275, 300);

                // Exo1
                context.beginPath();
                context.rect(260, 200, 50, 70);
                context.stroke();

                // Action discard pile
                drawIcon('actions', 320, 185, 30, 40);
                context.fillText("Action",360,205);
                context.fillText("discard pile",360,230);
                arrow(context, 460, 195, 510, 195);
                context.beginPath();
                context.setLineDash([6]);
                context.rect(520, 175, 50, 70);
                context.stroke();
                context.setLineDash([0]);

                // Action deck
                drawIcon('actions', 685, 170, 30, 40);
                context.fillText("Action deck",725,200);
                arrow(context, 680, 190, 645, 190);
                context.beginPath();
                context.rect(590, 165, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(585, 170, 50, 70);
                context.rect(585, 170, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(580, 175, 50, 70);
                context.rect(580, 175, 50, 70);
                context.stroke();
                drawIcon('actions', 685, 170, 30, 40);
                drawIcon('actions', 590, 190, 30, 40);

                // Action card market
                drawIcon('actions', 320, 105, 30, 40);
                context.fillText("Action card market",360,135);
                arrow(context, 620, 125, 670, 125);
                context.beginPath();
                context.rect(685, 90, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(745, 90, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(805, 90, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(865, 90, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(925, 90, 50, 70);
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
                drawIcon('asteroids', 685, 300, 30, 40);
                context.fillText("Asteroid deck",720,330);
                arrow(context, 680, 320, 645, 320);
                context.beginPath();
                context.rect(590, 260, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(585, 265, 50, 70);
                context.rect(585, 265, 50, 70);
                context.stroke();

                context.beginPath();
                context.clearRect(580, 270, 50, 70);
                context.rect(580, 270, 50, 70);
                context.stroke();
                drawIcon('asteroids', 590, 285, 30, 40);

                // Asteroid discard pile
                drawIcon('asteroids', 320, 285, 30, 40);
                context.fillText("Asteroid",360,305);
                context.fillText("discard pile",360,330);
                arrow(context, 480, 295, 510, 295);
                context.beginPath();
                context.setLineDash([6]);
                context.rect(520, 270, 50, 70);
                context.stroke();
                context.setLineDash([0]);

            // Player 3
            /*
            context.save();
            context.translate(130, 415);
            context.rotate(Math.PI/2);
            context.textAlign = "center";
            context.fillText("Player 3", 80, 0);
            context.fillText("Faction", 0, 55);
            context.drawImage(actionsImage, 210,30, 30, 40);
            context.fillText("Starting", 297, 30);
            context.fillText("Action", 290, 55);
            context.fillText("card(s)", 294, 80);
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
            */

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

            // Planets/Hab world label
            drawIcon('planets', 730, 355, 30, 40);
            context.fillText("Planets and a", 770, 385);
            drawIcon('habitable-worlds', 730, 400, 30, 40);
            context.fillText("Habitable World", 770, 430);
            arrow(context, 725, 395, 680, 395);

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
            drawIcon('moons', 730, 565, 30, 40);
            context.fillText("Moons and",770,595);
            drawIcon('dwarf-planets', 730, 610, 30, 40);            
            context.fillText("Dwarf Planets",770,640);

            // 3 Planets for Sol label
            var curlyLength = 170;
            var linelength = (curlyLength-60)/2;
            var curlyx = 260;
            var curlyy = 750;
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
            drawIcon('planets', 280, 795, 30, 40);
            context.fillText("3     Planets for",255,830);
            //context.drawImage(starsImage, 430, 835, 30, 40);
            context.fillText("1 Player with Sol",250,860);

            // Planets per player labels
            var curlyLength = 240;
            var linelength = (curlyLength-60)/2;
            var curlyx = 440;
            var curlyy = 750;
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
            drawIcon('planets', 562, 795, 30, 40);
            context.fillText("4-7     Planets",510,830);
            context.fillText("for 2-5 Players",510,860);

            // Star deck
            drawIcon('stars', 285, 485, 30, 40);
            context.fillText("Star",320, 500);
            context.fillText("deck",320, 530);
            arrow(context, 280, 505, 260, 505);
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
            drawIcon('stars', 200, 485, 30, 40);

            // Habitable World deck
            drawIcon('habitable-worlds', 285, 575, 30, 40);
            context.fillText("Habitable",320,590);
            context.fillText("World deck",320,620);
            arrow(context, 280, 595, 260, 595);
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
            drawIcon('habitable-worlds', 200, 585, 30, 40);

            // Lifeforms deck
            drawIcon('lifeforms', 285, 675, 30, 40);
            context.fillText("Lifeform deck",320,705);
            arrow(context, 280, 695, 260, 695);
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
            drawIcon('lifeforms', 200, 685, 30, 40);

            // Trade Ship deck
            drawIcon('tradeships', 0, 785, 30, 40);
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
            drawIcon('tradeships', 200, 785, 30, 40);
 
            // Player layout
            context.fillText("Player Layout", 1180, 620);
            context.fillText("Faction", 1065, 695);
            context.beginPath();
            context.rect(1060, 650, 110, 70);
            context.stroke();

                // Player layout Starting Action cards
                drawIcon('actions', 1330,665, 30, 40);
                context.fillText("Starting",1370,670);
                context.fillText("Action",1370,695);
                context.fillText("card(s)",1370,720);
                arrow(context, 1325, 680, 1300, 680);
                context.beginPath();
                context.rect(1180, 650, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(1240, 650, 50, 70);
                context.stroke();

                // Tradeship
                drawIcon('tradeships', 1110, 770, 30, 40);
                context.fillText("Trade Ship", 1150, 800);
                arrow(context, 1205, 775, 1205, 725);

            // Player 4
            /*
            context.fillText("Player 4", 1120, 640);
            context.fillText("Faction", 1065, 695);
            context.beginPath();
            context.rect(1060, 650, 110, 70);
            context.stroke();

                // Player 4's Action cards
                context.drawImage(actionsImage, 1330,665, 30, 40);
                context.fillText("Starting",1370,670);
                context.fillText("Action",1370,695);
                context.fillText("card(s)",1370,720);
                arrow(context, 1325, 680, 1300, 680);
                context.beginPath();
                context.rect(1180, 650, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(1240, 650, 50, 70);
                context.stroke();
                */
      
            // Player 5
            /*
            context.fillText("Player 5", 1120, 760);
            context.fillText("Faction", 1065, 815);
            context.beginPath();
            context.rect(1060, 770, 110, 70);
            context.stroke();

                // Player 5's Action cards
                context.drawImage(actionsImage, 1330,785, 30, 40);
                context.fillText("Starting",1370,790);
                context.fillText("Action",1370,815);
                context.fillText("card(s)",1370,840);
                arrow(context, 1325, 800, 1300, 800);
                context.beginPath();
                context.rect(1180, 770, 50, 70);
                context.stroke();
                context.beginPath();
                context.rect(1240, 770, 50, 70);
                context.stroke();
            */

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
            context.fillText("Beginner Setup", 1060, 30);
            context.beginPath();
            context.moveTo(1060, 40);
            context.lineTo(1510, 40);
            context.stroke();
            //context.fillText("1. Sol", 1060, 70);
            drawIcon('planets', 1095, 45, 30, 40);
            context.fillText("1.     Mercury", 1060, 75);
            drawIcon('planets', 1095, 90, 30, 40);
            context.fillText("2.     Venus", 1060, 120);
            drawIcon('habitable-worlds',  1095, 135, 30, 40);
            context.fillText("3.     Earth", 1060, 165);
            drawIcon('planets', 1095, 180, 30, 40);
            context.fillText("4.     Mars", 1060, 210);
            drawIcon('planets', 1095, 225, 30, 40);
            context.fillText("5.     Asteroid Belt", 1060, 255);
            drawIcon('planets', 1095, 270, 30, 40);
            context.fillText("6.     Jupiter", 1060, 300);
            drawIcon('planets', 1095, 315, 30, 40);
            context.fillText("7.     Saturn", 1060, 345);
            drawIcon('moons', 1095, 360, 30, 40);
            context.fillText("8.     Luna", 1060, 390);
            drawIcon('moons', 1095, 405, 30, 40);
            context.fillText("9.     Ceres", 1060, 435);
            drawIcon('dwarf-planets', 1360, 45, 30, 40);
            context.fillText("10.     Vesta", 1310, 75);
            drawIcon('dwarf-planets', 1360, 90, 30, 40);
            context.fillText("11.     Pallas", 1310, 120);
            drawIcon('moons', 1360, 135, 30, 40);
            context.fillText("12.     Io", 1310, 165);
            drawIcon('moons', 1360, 180, 30, 40);
            context.fillText("13.     Europa", 1310, 210);
            drawIcon('moons', 1360, 225, 30, 40);
            context.fillText("14.     Ganymede", 1310, 255);
            drawIcon('moons', 1360, 270, 30, 40);
            context.fillText("15.     Callisto", 1310, 300);
            drawIcon('moons', 1360, 315, 30, 40);
            context.fillText("16.     Enceladus", 1310, 345);
            drawIcon('moons', 1360, 360, 30, 40);
            context.fillText("17.     Titan", 1310, 390);
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

            function drawIcon(type, x, y, w, h){
              const worldImage = new Image(59, 80);
              worldImage.src = `/img/art/symbols/${type}.png`;
              worldImage.onload = function() {
                context.shadowBlur = 0;
                context.drawImage(worldImage, x, y, w, h);
              };
            }

          </script>

        </div>
      </div>
    </div>
  </body>
</html>
