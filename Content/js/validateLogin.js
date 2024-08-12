document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    var error = document.getElementById('error-message');
    let valid = true;

    if(username.trim() == '') {
        error.innerHTML = "Vui lòng nhập tên đăng nhập!";
        error.style.display = block;
    }
})  