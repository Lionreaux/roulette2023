
function main() {
    baseEtudiants()
}
function baseEtudiants() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", 'php/getEtudiant', true);
    xhr.setRequestHeader("Content-Type", "application/json;");
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            console.log(xhr.responseText);
        }
    }
    xhr.send;
}


var f;
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

