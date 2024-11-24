// Select hamburger and navigation
const hamburger = document.getElementById('hamburger');
const navLinks = document.querySelector('.nav-links');

// Add event listener to the hamburger
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active'); // Toggle animation class
    navLinks.classList.toggle('active'); // Show/hide menu
});
