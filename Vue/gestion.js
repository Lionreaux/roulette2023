window.onload = function() {
    prof();
};

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
                document.getElementById("resp").value=document.getElementById("Prof").textContent;
            }

        }
    }
    xhr.send();
}

function validerEtudiant() {
    var nom = document.getElementById("nom").value;
    var classe = document.getElementById("deroulClasse").value;
    var url = "/Controlleur/Json/insertEtud?nom=" + nom + "&classe=" + classe;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
        }
    };
    xhr.open("GET", url);
    xhr.send();

    document.getElementById("nom").value = "";

}

function creerClasse() {
    var nomClasse = document.getElementById("nomClasse").value;
    var resp = document.getElementById("resp").value;
    var url = "/Controlleur/Json/addClasse?nomClasse=" + nomClasse + "&resp=" + resp;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
        }
    };
    xhr.open("GET", url);
    xhr.send();

    location.reload();

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