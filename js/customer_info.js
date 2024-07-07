document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('form');

  form.addEventListener('submit', function(event) {
      event.preventDefault();

      const formData = new FormData(form);

      fetch('http://localhost/Aquatrack-system/php/customer.php', {
          method: 'POST',
          body: formData
      })
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          return response.text(); 
      })
      .then(data => {
          alert(data);
          window.location.href = 'customers_information.html'; 
      })
      .catch(error => {
          console.error('Error:', error);
          alert('An error occurred. Please try again later.');
      });
  });
});
