function log_in() {
    var log = document.getElementById("email");
    var pas = document.getElementById("password");

    if (log.value == "admin@admin.com" && pas.value == "admin") {
        window.location.replace("painelassoci/index.html");
    }
    else {
        window.alert("O usuário ou senha está incorreto.");
    }
}