document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form');
    const submitButton = document.getElementById('submit_button');
  
    form.addEventListener('submit', function(event) {
      event.preventDefault(); 
  
      alert('Customer Information Submitted Successfully!');
      
    });
  });
  