
let aDati2  = localStorage.getItem('dati').split(",");

document.getElementById("nome").innerHTML = aDati2[0];
document.getElementById("cognome").innerHTML = aDati2[1];
document.getElementById("indirizzo").innerHTML = aDati2[2];
document.getElementById("citta").innerHTML = aDati2[3];
document.getElementById("provincia").innerHTML= aDati2[4];
document.getElementById("sesso").innerHTML = aDati2[5];
document.getElementById("italiano").innerHTML = aDati2[6];
document.getElementById("storia").innerHTML = aDati2[7];
document.getElementById("matematica").innerHTML = aDati2[8];
document.getElementById("inglese").innerHTML = aDati2[9];
document.getElementById("informatica").innerHTML = aDati2[10];
document.getElementById("TPSIT").innerHTML = aDati2[11];
localStorage.clear();