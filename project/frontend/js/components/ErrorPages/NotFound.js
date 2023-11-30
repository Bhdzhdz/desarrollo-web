
// Function to handle 404 Not Found error
function handleNotFound() {
  // You can customize this function to display content or perform specific actions for 404 errors
  console.log('Page Not Found: 404 Error');
  // Example: Display a message on the page
  const errorElement = document.getElementById('error-message');
  if (errorElement) {
    errorElement.innerText = 'Oops! Page Not Found.';
  }
}

// Invoke the error handling function when the page loads
window.onload = function () {
  handleNotFound();
};
