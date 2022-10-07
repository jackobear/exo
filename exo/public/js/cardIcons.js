// Used by worlds
$( document ).ready(function() {
	var body = $("body");
	var newBody = body.html().replace(/Dwarf Planet/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/dwarf-planets.png\' class=\'inline-card-icon\' />Dwarf</span>&nbsp;Planet')
		.replace(/ Planet/g, ' <span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/planets.png\' class=\'inline-card-icon\' />Planet</span>')
		.replace(/Moon/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/moons.png\' class=\'inline-card-icon\' />Moon</span>')
		.replace(/Habitable World/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/habitable-worlds.png\' class=\'inline-card-icon\' />Habitable</span> World')
		.replace(/Magnetic Shield/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/magnetic-shield.png\' class=\'inline-card-icon\' />Magnetic</span> Shield')
		.replace(/Magnetic Storm/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/magnetic-storm.png\' class=\'inline-card-icon\' />Magnetic</span> Storm')
		.replace(/Lifeform/g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/lifeforms.png\' class=\'inline-card-icon\' />Lifeform</span>')
		.replace(/Star /g, '<span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/stars.png\' class=\'inline-card-icon\' />Star</span> ');
	body.html(newBody);
});