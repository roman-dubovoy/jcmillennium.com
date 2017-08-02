var map = L.map('map').setView([46.461232, 30.665444], 13);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([46.462571, 30.711438]).addTo(map)
    .bindPopup('КДЮСШ №4, ул.Михайловская, 29');

L.marker([46.440242, 30.700360]).addTo(map)
    .bindPopup('Гимназия №8, ул. Ицхака Рабина, 8');

L.marker([46.447529, 30.710677]).addTo(map)
    .bindPopup('Студия йоги и восточных единоборств "КАЙЛАС"');

L.circle([46.469825, 30.614793], {
    color: 'blue',
    fillColor: 'light-blue',
    fillOpacity: 0.5,
    radius: 400
}).addTo(map)
    .bindPopup('пгт. Авангард, стадион, зал борьбы "МИЛЛЕННИУМ"');;
