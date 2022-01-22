
const togglepass = document.getElementById("togglePassword");
const pass = document.getElementById("pass");
const login = document.getElementById("login");


//Toggle to show and hide password
togglepass.addEventListener("click",display)
function display()
{
    const type = pass.getAttribute("type")==="text" ? "password" : "text";
    pass.setAttribute("type",type);
    togglepass.classList.toggle("fa-eye-slash")
}


//To check if username and password field is empty


