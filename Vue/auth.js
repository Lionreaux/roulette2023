function connect(){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", '/Controlleur/Login.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            alert(xhr.responseText);
            if (xhr.responseText.startsWith("/")){
                window.location = xhr.responseText;
            }else {
                alert(xhr.responseText);
                alert("BIEN LA")
            }
        }
    }
    xhr.send(("username="+document.getElementById("username").value+"&password="+document.getElementById("password").value));
}