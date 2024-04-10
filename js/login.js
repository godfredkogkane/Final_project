document.getElementById('signup-link').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('signup-form').style.display = 'block';
});

document.getElementById('login-btn').addEventListener('click', function(e) {
    e.preventDefault();
    // Handle login functionality here
    alert('Login clicked');
});
