
// Function to handle 403 Forbidden error
function handleForbidden() {
  // You can customize this function to display content or perform specific actions for 403 errors
  console.log('Forbidden: 403 Error');
  // Example: Display a message on the page
  const errorElement = document.getElementById('error-message');
  if (errorElement) {
    errorElement.innerText = 'Access Forbidden.';
  }
}

// Invoke the error handling function when the page loads
window.onload = function () {
  handleForbidden();
};
