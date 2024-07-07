document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault();

  const validEmail = 'user@example.com';
  const validPassword = 'password123';

  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  if (email === validEmail && password === validPassword) {
    alert('Login successful!');
  } else {
    document.getElementById('error-message').style.display = 'block';
  }
});
