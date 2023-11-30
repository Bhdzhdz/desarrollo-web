
// Function to handle 500 Internal Server Error
function handleInternalServerError() {
  // You can customize this function to display content or perform specific actions for 500 errors
  console.log('Internal Server Error: 500 Error');
  // Example: Display a message on the page
  const errorElement = document.getElementById('error-message');
  if (errorElement) {
    errorElement.innerText = 'Oops! Something went wrong on the server.';
  }
}

// Invoke the error handling function when the page loads
window.onload = function () {
  handleInternalServerError();
};
