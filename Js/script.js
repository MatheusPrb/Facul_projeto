document.addEventListener("DOMContentLoaded", function() {
    const checkboxes = document.querySelectorAll('tbody tr');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('click', () => {
            const checkboxInput = checkbox.querySelector('input[type="checkbox"]');
            checkboxInput.checked = !checkboxInput.checked;
        });
    });
});