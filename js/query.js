function displayContacts(data) {
    var tableBody = $('#listContactsContainer table');

    for (var i = 0; i < data.length; i++) {
        var contactHtml = '<tr class="contact">';
        contactHtml += '<td class="id">' + data[i].contactID + '</td>';
        contactHtml += '<td class="avatar"><img src="' + data[i].avatar + '" alt=""></td>';
        contactHtml += '<td class="name">' + data[i].firstName + ' ' + data[i].lastName + '</td>';
        contactHtml += '<td class="cat">' + data[i].categoryName + '</td>';
        contactHtml += '<td class="num1">' + data[i].numberPhone + '</td>';
        contactHtml += '<td class="num2">' + data[i].secondNumberPhone + '</td>';
        contactHtml += '<td class="email">' + data[i].email + '</td>';
        contactHtml += '<td class="option">';
        contactHtml += '<button><i class="fa-solid fa-eye"></i></button>';
        contactHtml += '<button><i class="fa-solid fa-pen"></i></button>';
        contactHtml += '<button><i class="fa-solid fa-trash"></i></button>';
        contactHtml += '</td>';
        contactHtml += '</tr>';

        tableBody.append(contactHtml);
    }
}

// Fonction pour convertir une image en base64
function convertImageToBase64(file, callback) {
    var reader = new FileReader();

    reader.onload = function (e) {
        var base64String = e
            .target
            .result
            .split(',')[1]; // Récupérer la partie après la virgule
        callback(base64String);
    };

    reader.readAsDataURL(file);
}


// Function to send an Ajax request
function sendAjaxRequest(url, method, data, successCallback, errorCallback) {
    $.ajax({
        url: url,
        type: method,
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            successCallback(response);
        },
        error: function (error) {
            errorCallback(error);
        }
    });
}


$(document).ready(function () {
    // Charger les contacts existants
    $.ajax({
        url: './php/ajax.php',
        type: 'POST',
        data: {
            action: 'getAllContacts'
        },
        success: function (response) {
            var data = JSON.parse(response);
            displayContacts(data);
        },
        error: function (error) {
            console.error("Erreur Ajax : ", error);
        }
    });

    // Soumettre le formulaire d'ajout de contact
    $('#popUpAddContact').on('submit', function (e) {
        e.preventDefault();

        // Lire le fichier image
        var avatarInput = $('#avatarInput')[0].files[0];

        // Convertir l'image en base64
        convertImageToBase64(avatarInput, function (base64Image) {
            var formData = new FormData();
            formData.append('avatarInput', base64Image);
            formData.append('firstName', $('#firstName').val().trim());
            formData.append('lastName', $('#lastName').val().trim());
            formData.append('email', $('#email').val().trim());
            formData.append('category', $('#category').val().trim());
            formData.append('numberPhone', $('#numberPhone').val().trim());
            formData.append('secondNumberPhone', $('#secondNumberPhone').val().trim());
            formData.append('action', 'addContact');

            // Utilisez directement l'objet FormData dans la requête AJAX
            sendAjaxRequest('./php/ajax.php', 'POST', formData, function (response) {
                // Traitement de la réponse (par exemple, actualiser la liste des contacts)
            }, function (error) {
                console.error("Erreur Ajax : ", error);
            });
        });
    });
});