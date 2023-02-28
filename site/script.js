
function main() {
    baseEtudiants()
}
var idClasse;
function baseEtudiants() {
    console.log('tetst')
    console.log(idClasse);
    const xhr = new XMLHttpRequest();
    xhr.open("GET", '/php/getEtudiant?idClasse=' + idClasse, true);
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
    xhr.open("GET", '/php/getClasse?classe=' + nomClasse, true);
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

}
function confirmer() {
    let formdata = new FormData();
    formdata.append("Statut", statut);
    formdata.append("nom", document.getElementById("Choisi").value);
    formdata.append("note", document.getElementById("note").value);
    //console.log(formdata.get("nom"));
    const xhr = new XMLHttpRequest();
    xhr.open("POST", '/php/changeEtudiant', true);
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

}

function recupAbsents() {
    let formdata = new FormData();
    formdata.append("idClasse", idClasse);
    formdata.append("Statut", "Absent");
    const xhr = new XMLHttpRequest();
    xhr.open("POST", '/php/getAbsent', true);
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
