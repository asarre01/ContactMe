const popUp = document.getElementById("popUp");
const ajouterContactButton = document.getElementById("ajouterContactButton");
const ajouterCatButton = document.getElementById("ajouterCatButton");
const quitButton = document.getElementById("quitButton");
const avatarInput = document.getElementById("avatarInput");
const filterButton = document.getElementById("filterButton");
const filterOptions = document.getElementById("filterOptions");
const mesContacts = document.getElementById("mesContats");
const mesCategories = document.getElementById("mesCategories");

// Fonction pour afficher la popup
function showPopup() {
    if (popUp.classList.contains('hidden')) {
        popUp
            .classList
            .remove("hidden");
        popUp
            .classList
            .add("show");
    }
}

// Fonction pour masquer la popup
function hidePopup() {
    if (popUp.classList.contains('show')) {
        popUp
            .classList
            .remove("show");
        popUp
            .classList
            .add("hidden");
    }
}

ajouterContactButton.addEventListener('click', showPopup);
quitButton.addEventListener('click', hidePopup);

document.addEventListener('DOMContentLoaded', () => {
    const mesContacts = document.getElementById("mesContacts");
    const ajouterContactButton = document.getElementById("ajouterContactButton");
    const ajouterCatButton = document.getElementById("ajouterCatButton");

    mesContacts.addEventListener('click', () => {
        ajouterContactButton.classList.toggle("hidden");
        ajouterContactButton.classList.toggle("show");

        ajouterCatButton.classList.toggle("hidden");
        ajouterCatButton.classList.toggle("show");
    });

    mesCategories.addEventListener('click', () => {
        ajouterContactButton.classList.toggle("hidden");
        ajouterContactButton.classList.toggle("show");

        ajouterCatButton.classList.toggle("hidden");
        ajouterCatButton.classList.toggle("show");
    });
});




mesCategories.addEventListener('click', () =>{
    if (ajouterCatButton.classList.contains('hidden')) {
        ajouterCatButton
            .classList
            .remove("hidden");
        ajouterCatButton
            .classList
            .add("show");
    } else if (ajouterCatButton.classList.contains('show')) {
        ajouterCatButton
            .classList
            .remove("show");
        ajouterCatButton
            .classList
            .add("hidden");
    }
})

filterButton.addEventListener('click', () =>{
    if (filterOptions.classList.contains('hidden')) {
        filterOptions
            .classList
            .remove("hidden");
        filterOptions
            .classList
            .add("show");
    } else if (filterOptions.classList.contains('show')) {
        filterOptions
            .classList
            .remove("show");
        filterOptions
            .classList
            .add("hidden");
    }
})

function previewAvatar() {
    const avatarInput = document.getElementById('avatarInput');
    const avatarImage = document.getElementById('avatarImage');
    const avatarPreview = document.querySelector('.avatar-preview');

    const file = avatarInput.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            avatarImage.src = e.target.result;
            avatarPreview.querySelector('span').style.display = 'none';
        };

        reader.readAsDataURL(file);
    }
}

avatarInput.addEventListener('change', previewAvatar);

