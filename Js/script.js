document.addEventListener("DOMContentLoaded", function() {
    const checkboxes = document.querySelectorAll('tbody tr');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('click', () => {
            const checkboxInput = checkbox.querySelector('input[type="checkbox"]');
            checkboxInput.checked = !checkboxInput.checked;
        });
    });
});

//Dropdown user
document.addEventListener('DOMContentLoaded', function() {
    const userButton = document.querySelector('.user-info a');
    const userDropdown = document.getElementById('user-dropdown');

    userButton.addEventListener('click', function(event) {
        event.preventDefault();
        if (userDropdown.style.display === 'none') {
            userDropdown.style.display = 'block';
        } else {
            userDropdown.style.display = 'none';
        }
    });
});
