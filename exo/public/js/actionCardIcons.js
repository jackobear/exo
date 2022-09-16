// Since Action cards have complex text, they use two letter codes to show icons
$( document ).ready(function() {
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('DP Dwarf Planet', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/dwarf-planets.png\' class=\'inline-card-icon\' />Dwarf Planet</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('PL Planet', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/planets.png\' class=\'inline-card-icon\' />Planet</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('MN Moon', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/moons.png\' class=\'inline-card-icon\' />Moon</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('HW Habitable World', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/habitable-worlds.png\' class=\'inline-card-icon\' />Habitable World</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('SH Magnetic Shield', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/magnetic-shield.png\' class=\'inline-card-icon\' />Magnetic Shield</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('MS Magnetic Storm', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/magnetic-storm.png\' class=\'inline-card-icon\' />Magnetic Storm</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('LF Lifeform', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/lifeforms.png\' class=\'inline-card-icon\' />Lifeform</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('ST Star', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/stars.png\' class=\'inline-card-icon\' />Star</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('AS Asteroid', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/asteroids.png\' class=\'inline-card-icon\' />Asteroid</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('AC Action', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/actions.png\' class=\'inline-card-icon\' />Action</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('TS Trade Ship', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/tradeships.png\' class=\'inline-card-icon\' />Trade Ship</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('CO Colony', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/colony-red.png\' class=\'inline-card-icon\' />Colony</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('EX Exocolony', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/exocolony-red.png\' class=\'inline-card-icon\' />Exocolony</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('SP Spaceport', '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/spaceport-red.png\' class=\'inline-card-icon\' />Spaceport</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('WA Water', '<span style=\'white-space:nowrap;\'><span class=\'fa-stack fa-lg\'><i class=\'exo-water fa-stack-1x\'></i></span>Water</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('FU Fuel', '<span style=\'white-space:nowrap;\'><span class=\'fa-stack fa-lg\'><i class=\'exo-fuel fa-stack-1x\'></i></span>Fuel</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('ME Metal', '<span style=\'white-space:nowrap;\'><span class=\'fa-stack fa-lg\'><i class=\'exo-metal fa-stack-1x\'></i></span>Metal</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('FO Food', '<span style=\'white-space:nowrap;\'><span class=\'fa-stack fa-lg\'><i class=\'exo-food fa-stack-1x\'></i></span>Food</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('CO Coin', '<span style=\'white-space:nowrap;\'><span class=\'fa-stack fa-lg\'><i class=\'exo-coin fa-stack-1x\'></i></span>Coin</span>');
});