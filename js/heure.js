var today = new Date();

var hh = String(today.getHours()).padStart(2, '0');
var min = String(today.getMinutes()).padStart(2, '0');
var time = hh + ':' + min;

// Définir la valeur des champs date et heure
document.getElementById("start-time-match").value = time;