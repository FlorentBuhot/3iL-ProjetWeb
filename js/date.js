var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); // Janvier est 0 !
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;

// Définir la valeur de l'input date sur la date du jour
document.getElementById("start-match").value = today;
document.getElementById("start-match").min = today;