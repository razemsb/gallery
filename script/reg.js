const message = document.getElementById("uploadMessage");
if (message.innerHTML) {
    message.style.display = "block";
    setTimeout(() => {
        message.classList.add("fade-out");
        setTimeout(() => {
            message.style.display = "none";
        }, 1000); // время анимации изчезновения
    }, 3000);  // время существования message
}
document.getElementById("switchToLogin").addEventListener("click", function(e) {
e.preventDefault();
document.getElementById("form2").classList.add("hidden");
document.getElementById("form1").classList.remove("hidden");
});

document.getElementById("switchToRegister").addEventListener("click", function(e) {
e.preventDefault();
document.getElementById("form2").classList.remove("hidden");
document.getElementById("form1").classList.add("hidden");
});
