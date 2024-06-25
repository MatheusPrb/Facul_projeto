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

// function openMenu() {
//     let sideMenu = document.querySelector(".side-menu");
//     if (sideMenu.classList.contains("open")) {
//         sideMenu.classList.remove("open");
//         document.querySelector(".button-mobile img").src = "./assets/menu.png";
//     } else {
//         sideMenu.classList.add("open");
//         document.querySelector(".button-mobile img").src = "./assets/close-button.png";
//     }
// }


function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var menuButton = document.getElementById("menuButton");
    var closeButton = document.getElementById("closeButton");
    
    if (sidebar.style.width === "280px") {
        sidebar.style.width = "0";
        menuButton.style.display = "block";
        closeButton.style.display = "none";
    } else {
        sidebar.style.width = "280px";
        menuButton.style.display = "none";
        closeButton.style.display = "block";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    // Seleciona os botões de atualização
    const refreshButton1 = document.getElementById('atualizar_pontos2');
    const refreshButton2 = document.getElementById('atualizar_pontos');

    // Função para adicionar e remover a classe de animação
    function rotateButton(button) {
        button.classList.add('rotating');
        setTimeout(function () {
            button.classList.remove('rotating');
        }, 1000); // Tempo da animação em milissegundos
    }

    // Adiciona evento de clique para o primeiro botão
    refreshButton1.addEventListener('click', function () {
        rotateButton(refreshButton1);
        // Aqui vai o código para atualizar os pontos para o botão atualizar_pontos2
    });

    // Adiciona evento de clique para o segundo botão
    refreshButton2.addEventListener('click', function () {
        rotateButton(refreshButton2);
        // Aqui vai o código para atualizar os pontos para o botão atualizar_pontos
    });
});


