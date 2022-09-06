$( document ).ready(function() {
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('Dwarf Planet', '<img src=\'/img/art/symbols/dwarf-planets.png\' class=\'inline-card-icon\' />Dwarf&nbsp;Planet');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll(' Planet', ' <span style=\'white-space:nowrap;\'><img src=\'/img/art/symbols/planets.png\' class=\'inline-card-icon\' />Planet</span>');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('Moon', '<img src=\'/img/art/symbols/moons.png\' class=\'inline-card-icon\' />Moon');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('Habitable World', '<img src=\'/img/art/symbols/habitable-worlds.png\' class=\'inline-card-icon\' />Habitable World');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('Magnetic Shield', '<img src=\'/img/art/symbols/magnetic-shield.png\' class=\'inline-card-icon\' />Magnetic Shield');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('Magnetic Storm', '<img src=\'/img/art/symbols/magnetic-storm.png\' class=\'inline-card-icon\' />Magnetic Storm');
	document.getElementById('body').innerHTML = document.getElementById('body').innerHTML.replaceAll('Lifeform', '<img src=\'/img/art/symbols/lifeforms.png\' class=\'inline-card-icon\' />Lifeform');
});