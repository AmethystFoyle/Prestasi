document.addEventListener('DOMContentLoaded', function () {
    var buttons = document.getElementsByClassName('btn-multiple');

    // Add click event listener to all buttons with the 'btn' class
    Array.from(buttons).forEach(function (button) {
        button.addEventListener('click', function () {
            // Toggle the 'highlighted' class for the clicked button
            button.classList.toggle('btn-multiple-clicked');
        });
    });
});

// For specific modularity, I don't put the multiple buttons' code here. Initial multiple buttons' code are located at JS/LoginSignup/losi_main.js
