
function main() {
    baseEtudiants()
}
function baseEtudiants() {
    console.log('tetst')
    const xhr = new XMLHttpRequest();
    xhr.open("GET", '/php/getEtudiant', true);
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

            for (let i = 0; i < listeNoms.length; i++) {
                const li = document.createElement('li');
                li.textContent = listeNoms[i];
                ul.appendChild(li);
            }

            // Ajout de la liste à la page
            const container = document.getElementById('listeEtudiants');
            container.appendChild(ul);

            console.log(listeNoms);
        }
    }
    xhr.send();
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

