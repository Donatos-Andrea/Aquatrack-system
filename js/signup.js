document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signup-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch('http://localhost/Aquatrack-system/php/signup.php', { // Replace with actual path
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text(); // Assuming the server returns text
        })
        .then(data => {
            console.log(data); 
            alert('Registration successful!');
            // Optionally redirect to another page or perform additional actions
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again later.');
        });
    });
});
