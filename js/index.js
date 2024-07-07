document.addEventListener('DOMContentLoaded', () => {
    const a = document.querySelector('.get-started');
    
    a.addEventListener('click', () => {
        a.classList.add('clicked');
        
        setTimeout(() => {
            a.classList.remove('clicked');
            alert('Are you sure you want to get started?');
        }, 300);
    });
});