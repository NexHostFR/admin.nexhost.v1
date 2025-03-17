import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector("#generatorPassword").addEventListener("click", function(e) {
        e.preventDefault();
        const length = 10,
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,;:!?./§»~#{[|`\^@]}&"
        var pwd = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            pwd += charset.charAt(Math.floor(Math.random() * n));
        }

        document.querySelector("#password").value = pwd;
    });
    document.getElementById('showPassword').addEventListener('change', function () {
        let passwordInput = document.getElementById('password');
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
});