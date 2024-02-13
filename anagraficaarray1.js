function SecondaPagina() {
    window.location.href = 'anagraficaarray2.html';
}
function dati() {
    let aDati = new Array();
    aDati[0] = document.getElementById("nome").value;
    aDati[1] = document.getElementById("cognome").value;
    aDati[2] = document.getElementById("indirizzo").value;
    aDati[3] = document.getElementById("citta").value;
    aDati[4] = document.getElementById("province").value;

    var radio = document.getElementById("maschio");
    if (radio.checked == true) {
        aDati[5] = document.getElementById("maschio").value;
    }
    var radio = document.getElementById("femmina");

    if (radio.checked == true) {
        aDati[5] = document.getElementById("femmina").value;
    }
    var checkBox = document.getElementById("ita");
    if (checkBox.checked == true) {
        aDati[6] = 'Italiano';
    }
    var checkBox = document.getElementById("sto");

    if (checkBox.checked == true) {
        aDati[7] = 'Storia';
    }
    var checkBox = document.getElementById("mat");

    if (checkBox.checked == true) {
        aDati[8] = 'Matematica';
    }
    var checkBox = document.getElementById("ing");

    if (checkBox.checked == true) {
        aDati[9] = 'Inglese';
    }
    var checkBox = document.getElementById("inf");

    if (checkBox.checked == true) {
        aDati[10] = 'Informatica';
    }
    var checkBox = document.getElementById("tps");

    if (checkBox.checked == true) {
        aDati[11] = 'TPSIT';
    }
    let aDatiJSON = JSON.stringify(aDati);
    localStorage.setItem('dati', aDatiJSON);
}