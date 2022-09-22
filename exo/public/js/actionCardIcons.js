// Since Action and Faction cards have complex text, they use two letter codes to show icons
$( document ).ready(function() {
	var body = $("body");
	var newBody = body.html().replace(/DP Dwarf Planet/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/dwarf-planets.png\' class=\'inline-card-icon\' />Dwarf</span> Planet')
		.replace(/PL Planet/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/planets.png\' class=\'inline-card-icon\' />Planet</span>')
		.replace(/MN Moon/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/moons.png\' class=\'inline-card-icon\' />Moon</span>')
		.replace(/HW Habitable World/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/habitable-worlds.png\' class=\'inline-card-icon\' />Habitable</span> World')
		.replace(/SH Magnetic Shield/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/magnetic-shield.png\' class=\'inline-card-icon\' />Magnetic</span> Shield')
		.replace(/MS Magnetic Storm/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/magnetic-storm.png\' class=\'inline-card-icon\' />Magnetic</span> Storm')
		.replace(/LF Lifeform/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/lifeforms.png\' class=\'inline-card-icon\' />Lifeform</span>')
		.replace(/ST Star/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/stars.png\' class=\'inline-card-icon\' />Star</span>')
		.replace(/AS Asteroid/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/asteroids.png\' class=\'inline-card-icon\' />Asteroid</span>')
		.replace(/AC Action/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/actions.png\' class=\'inline-card-icon\' />Action</span>')
		.replace(/ACI /g, '<img src=\'/img/art/symbols/actions.png\' class=\'inline-card-icon\' />')
		.replace(/TS Trade Ship/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/tradeships.png\' class=\'inline-card-icon\' />Trade</span> Ship')
		.replace(/CO Colony/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/colony-red.png\' class=\'inline-card-icon\' />Colony</span>')
		.replace(/EX Exocolony/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/exocolony-red.png\' class=\'inline-card-icon\' />Exocolony</span>')
		.replace(/SP Spaceport/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/spaceport-red.png\' class=\'inline-card-icon\' />Spaceport</span>')
		.replace(/WA Water/g, '<span style=\'white-space:nowrap;\'><span class=\'fa-stack fa-lg\'><i class=\'exo-water fa-stack-1x\'></i></span>Water</span>')
		.replace(/FU Fuel/g, '<span style=\'white-space:nowrap;\'><span class=\'fa-stack fa-lg\'><i class=\'exo-fuel fa-stack-1x\'></i></span>Fuel</span>')
		.replace(/ME Metal/g, '<span style=\'white-space:nowrap;\'><span class=\'fa-stack fa-lg\'><i class=\'exo-metal fa-stack-1x\'></i></span>Metal</span>')
		.replace(/FO Food/g, '<span style=\'white-space:nowrap;\'><span class=\'fa-stack fa-lg\'><i class=\'exo-food fa-stack-1x\'></i></span>Food</span>')
		.replace(/CO Coin/g, '<span style=\'white-space:nowrap;\'><span class=\'fa-stack fa-lg\'><i class=\'exo-coin fa-stack-1x\'></i></span>Coin</span>')
		.replace(/LC Launch/g, '<span style=\'white-space:nowrap;\'><span class=\'fa-stack fa-lg\'><i class=\'exo-fuel fa-stack-1x\'></i><i class=\'fa-stack-1x cost\'>&#x2197;</i></span>Launch</span>');
	body.html(newBody);
});