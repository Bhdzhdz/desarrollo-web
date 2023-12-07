document.addEventListener('DOMContentLoaded', function () {
  const loginForm = document.getElementById('loginForm');

  loginForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission

    // Collect user input
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // AJAX request to the backend
    fetch('your_backend_login_endpoint.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ username, password })
    })
      .then(response => response.json())
      .then(data => {
        // Handle response from the backend
        if (data.success) {
          // Redirect to the dashboard or another page upon successful login
          window.location.href = 'dashboard.html';
        } else {
          // Display error message to the user
          alert('Login failed. Please check your credentials.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        // Handle error scenarios
      });
  });
});
