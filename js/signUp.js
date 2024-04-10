// document.getElementById('login-link').addEventListener('click', function(e) {
//     e.preventDefault();
//     document.getElementById('signup-form').style.display = 'none';
//     document.getElementById('login-form').style.display = 'block';
// });

// document.getElementById('signup-btn').addEventListener('click', function(e) {
//     e.preventDefault();
//     // Handle signup functionality here
//     alert('Signup clicked');
// });


// document.getElementById('signup-btn').addEventListener('click', function(e) {
//     e.preventDefault(); // Prevent the default form submission
//     // Retrieve form data
//     var formData = new FormData(document.getElementById('signup-form'));

//     // Send AJAX request to the server
//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', 'signUp.php', true);
//     xhr.onload = function() {
//         if (xhr.status == 200) {
//             // Request was successful, handle response here if needed
//             console.log(xhr.responseText);
//         } else {
//             // Request failed, handle error here
//             console.error('Error:', xhr.statusText);
//         }
//     };
//     xhr.onerror = function() {
//         // Request failed, handle error here
//         console.error('Error: Request failed');
//     };
//     xhr.send(formData);
// });
