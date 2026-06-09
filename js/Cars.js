function Recherche(ip) {

    let val = ip.value;

    var x = new XMLHttpRequest();
    x.open("GET", "../Controller/C_Cars.php?info=" + val, true);

    x.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("infomations").innerHTML = this.responseText;
        }
    };

    x.send();
}

/* =========================
   GET ROW DATA (EDIT / DELETE)
========================= */
function get(tr) {

    let tds = tr.querySelectorAll("td");
    let inputs = document.getElementsByClassName("inputs");

    /*
      Mapping basé sur ton tableau :
      0 = id_car
      1 = registration_number
      2 = brand
      3 = model
      4 = price
      5 = notes
      6 = categorie
    */

    for (let i = 0; i < inputs.length && i < tds.length; i++) {
        inputs[i].value = tds[i].innerText;
    }

    // IMPORTANT : id pour delete/update
    document.getElementById("id_car").value = tds[0].innerText;
}

/* =========================
   AUTO HIDE MESSAGE
========================= */
setTimeout(function () {
    let msg = document.getElementById('message');
    if (msg) msg.style.display = 'none';
}, 2000);