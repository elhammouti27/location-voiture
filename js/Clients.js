// 🔍 Recherche AJAX
function Recherche(input) {
    let val = input.value;

    let x = new XMLHttpRequest();
    x.open("GET", "../Controller/C_Clients.php?info=" + encodeURIComponent(val), true);

    x.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("infomations").innerHTML = this.responseText;
        }
    };

    x.send();
}

// ✏️ CLICK SUR UNE LIGNE (MODAL EDIT)
function get(tr) {

    let tds = tr.querySelectorAll("td");
    let inputs = document.getElementsByClassName("inputs");

    for (let i = 0; i < inputs.length && i < tds.length; i++) {
        inputs[i].value = tds[i].innerText;
    }

    document.getElementById("oldcin").value = tds[0].innerText;
}

// ⏱️ AUTO HIDE MESSAGE
setTimeout(function () {
    let msg = document.getElementById('message');
    if (msg) msg.style.display = 'none';
}, 2000);