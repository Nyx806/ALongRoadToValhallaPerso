/* function ignorerVideo() {
    alert("Vidéo ignorée!");
}
document.getElementById("ignorerBtn").addEventListener("click", ignorerVideo);  */

const loginForm = document.getElementById('loginForm');

const loginBtn = document.getElementById('loginBtn');
loginBtn.addEventListener('click', function() {
    document.getElementById('loginBtn').className = "hidden";
    document.getElementById('loginForm').className = "loginForm";
});
