// Select elements
const hamburger = document.getElementById('hamburger');
const navLinks = document.querySelector('.nav-links');
const emailButton = document.querySelector('.emailButton');

// Toggle active class on hamburger click
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('active'); // Show/hide nav links
    emailButton.classList.toggle('active'); // Show/hide email button
});
