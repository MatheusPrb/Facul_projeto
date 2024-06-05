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
document.addEventListener('DOMContentLoaded', (event) => {
    const userIcon = document.querySelector('.user-info a');
    const userDropdown = document.querySelector('.user-dropdown');
    
    userIcon.addEventListener('click', (e) => {
        e.preventDefault();
        userDropdown.style.display = userDropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Fechar o dropdown se clicar fora dele
    document.addEventListener('click', (e) => {
        if (!userIcon.contains(e.target) && !userDropdown.contains(e.target)) {
            userDropdown.style.display = 'none';
        }
    });
});