function connect(){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", '/Controlleur/Login.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            if (xhr.responseText.startsWith("/")){
                window.location = xhr.responseText;
            }else {
                alert(xhr.responseText);
            }
        }
    }
    xhr.send(("username="+document.getElementById("username").value+"&password="+document.getElementById("password").value));
}