window.onload = function() {
    listClasse();
};

function listClasse() {
    console.log("OUI")
    const utilisateur = "Benjamin";
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

function validerEtudiant() {
    document.getElementById()
}