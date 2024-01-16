function SecondaPagina() {
    window.location.href = 'anagrafica2.html';
}
function dati() {
    let aAdati = new Array();
    localStorage.setItem('nom', document.getElementById("nome").value);
    localStorage.setItem('cog', document.getElementById("cognome").value);
    localStorage.setItem('ind', document.getElementById("indirizzo").value);
    localStorage.setItem('cit', document.getElementById("citta").value);
    localStorage.setItem('pro', document.getElementById("province").value);

    var radio = document.getElementById("maschio");
    if (radio.checked == true) {
        localStorage.setItem('ses', 'Maschio');
    }
    var radio = document.getElementById("femmina");

    if (radio.checked == true) {
        localStorage.setItem('ses', 'Femmina');
    }
    var checkBox = document.getElementById("ita");
    if (checkBox.checked == true) {
        localStorage.setItem('ita', 'Italiano');
    }
    var checkBox = document.getElementById("sto");

    if (checkBox.checked == true) {
        localStorage.setItem("sto", 'Storia');
    }
    var checkBox = document.getElementById("mat");

    if (checkBox.checked == true) {
        localStorage.setItem("mat", "Matematica");
    }
    var checkBox = document.getElementById("ing");

    if (checkBox.checked == true) {
        localStorage.setItem("ing", "Inglese");
    }
    var checkBox = document.getElementById("inf");

    if (checkBox.checked == true) {
        localStorage.setItem("inf", "Informatica");
    }
    var checkBox = document.getElementById("tps");

    if (checkBox.checked == true) {
        localStorage.setItem("tps", "TPSIT");
    }
}