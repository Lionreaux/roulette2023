window.onload = function() {
    prof();
};


function hide() {
    const select = document.getElementById('deroulClasse');
    select.style.display = 'none';
}

function main() {
    baseEtudiants()
}
var idClasse;
function baseEtudiants() {
    console.log('tetst')
    console.log(idClasse);
    const xhr = new XMLHttpRequest();
    xhr.open("GET", '/Controlleur/Json/getEtudiant?idClasse=' + idClasse, true);
    xhr.setRequestHeader("Content-Type", "application/json;");
    xhr.onreadystatechange = () => {
        console.log(xhr.readyState)
        if (xhr.readyState === XMLHttpRequest.DONE) {
            console.log(xhr.responseText);

            const jsonEtudiants = xhr.responseText;

            const etudiants = JSON.parse(jsonEtudiants);
            const listeNoms = [];

            for (let i = 0; i < etudiants.length; i++) {
                listeNoms.push(etudiants[i].nom);
            }

            // Création de la liste HTML
            const ul = document.getElementById('listeEtudiants');
            const li = ul.querySelectorAll("li");

            for (let i = 0; i < li.length; i++) {
                li[i].remove();
            }

            for (let i = 0; i < listeNoms.length; i++) {
                const li = document.createElement('li');
                li.textContent = listeNoms[i];
                ul.appendChild(li);
            }


            console.log(listeNoms);
        }
    }
    xhr.send();
}

function getClasse() {
    var nomClasse = document.getElementById("deroulClasse").value;
    console.log(nomClasse);
    const xhr = new XMLHttpRequest();
    xhr.open("GET", '/Controlleur/Json/getClasse?classe=' + nomClasse, true);
    xhr.setRequestHeader("Content-Type", "application/json;");
    xhr.onreadystatechange = () => {
        console.log(xhr.readyState)
        if (xhr.readyState === XMLHttpRequest.DONE) {
            let json = JSON.parse(xhr.responseText)
            console.log(xhr.responseText);
            idClasse = json[0]['id'];
            console.log(idClasse);
            baseEtudiants();
        }
    }
    xhr.send();


}


var f;
var statut;

function checkStatut(statutEtud) {
    statut = statutEtud;

    if (statut === "Present") {
        var btnPresent = document.getElementById('btnPresent');
        btnPresent.classList.add('success');

        setTimeout(function() {
            btnPresent.classList.remove('success'); // Supprime la classe "success-border" après 1 seconde
        }, 1000);
    }
    else if (statut === "Absent") {
        var btnAbsent = document.getElementById('btnAbsent');
        btnAbsent.classList.add('success');

        setTimeout(function() {
            btnAbsent.classList.remove('success'); // Supprime la classe "success-border" après 1 seconde
        }, 1000);
    }
}
function confirmer() {
    let formdata = new FormData();
    formdata.append("Statut", statut);
    formdata.append("nom", document.getElementById("Choisi").value);
    formdata.append("note", document.getElementById("note").value);
    formdata.append("classe", document.getElementById("deroulClasse").value);
    //console.log(formdata.get("nom"));
    const xhr = new XMLHttpRequest();
    xhr.open("POST", '/Controlleur/Json/changeEtudiant', true);
    xhr.onreadystatechange = () => {
        console.log(xhr.status)
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status == 200) {
            console.log("Succès");
        }
    }
    xhr.send(formdata);
    document.getElementById("note").value="";
}
function recupEtudiant() {
    const maListe = document.getElementById('listeEtudiants');
    console.log(maListe);

    const elements = maListe.getElementsByTagName('li');

    f = elements.length - 1;
    console.log(f);

    const i = Math.floor(Math.random() * f) ;

    console.log(i);

    console.log(elements[i].textContent);
    document.getElementById('Choisi').value = elements[i].textContent;
    maListe.removeChild(elements[i]);

    const listeEtudiants = document.querySelector('#listeEtudiants');
    if (listeEtudiants.children.length === 0) {
        getClasse();
    }
}

function recupAbsents() {
    let formdata = new FormData();
    formdata.append("idClasse", idClasse);
    formdata.append("Statut", "Absent");
    const xhr = new XMLHttpRequest();
    xhr.open("POST", '/Controlleur/Json/getAbsent', true);
    xhr.onreadystatechange = () => {
        console.log(xhr.status)
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status == 200) {
            const jsonAbsent = xhr.responseText;
            console.log(xhr.responseText);

            const absent = JSON.parse(jsonAbsent);
            const listeNoms = [];

            for (let i = 0; i < absent.length; i++) {
                listeNoms.push(absent[i].nom);
            }

            // Création de la liste HTML
            const ul = document.getElementById('listeEtudiants');
            const li = ul.querySelectorAll("li");

            for (let i = 0; i < li.length; i++) {
                li[i].remove();
            }

            for (let i = 0; i < listeNoms.length; i++) {
                const li = document.createElement('li');
                li.textContent = listeNoms[i];
                ul.appendChild(li);
            }


            console.log(listeNoms);
        }
    }
    xhr.send(formdata);
}

function reinitialiser() {
    var nomClasse = document.getElementById("deroulClasse").value;
    console.log(nomClasse);
    const xhr = new XMLHttpRequest();
    xhr.open("GET", '/Controlleur/Json/rezClasse?classe=' + nomClasse, true);
    xhr.setRequestHeader("Content-Type", "application/json;");
    xhr.onreadystatechange = () => {
        console.log(xhr.readyState)
        if (xhr.readyState === XMLHttpRequest.DONE) {
            console.log("Reussi")
        }
    }
    xhr.send();
}

function listClasse() {
    console.log("OUI")
    const utilisateur = document.getElementById("Prof").textContent;
    const xhr = new XMLHttpRequest();
    xhr.open("GET", '/Controlleur/Json/listClasse?utilisateur=' + utilisateur, true);
    xhr.setRequestHeader("Content-Type", "application/json;");
    xhr.onreadystatechange = () => {
        console.log(xhr.readyState)
        if (xhr.readyState === XMLHttpRequest.DONE) {
            let json = JSON.parse(xhr.responseText)
            console.log(xhr.responseText);
            for (let i = 0; i < json.length; i++) {
                let option = document.createElement("option");
                option.value = json[i].nom;
                option.text = json[i].nom;
                document.getElementById("deroulClasse").appendChild(option);
            }

        }
    }
    xhr.send();
}
function prof(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            console.log(response.username);
            document.getElementById("Prof").textContent = response.username;
        }
    };
    xhr.open('GET', '/Controlleur/Json/getSession');
    xhr.send();
    setTimeout(() => { listClasse();}, 500);

}

function finCours() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            window.location="/";
        }
    };
    xhr.open('GET', '/Controlleur/Json/finCours');
    xhr.send();
}

