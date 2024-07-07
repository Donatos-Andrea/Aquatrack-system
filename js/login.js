document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
  
    loginForm.addEventListener('submit', function(event) {
      event.preventDefault(); 

      alert('You are already Logged in!');
  
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      console.log('Email:', email);
      console.log('Password:', password);
  
      window.location.href = 'home.html';
    });
  });
  