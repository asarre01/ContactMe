<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/styleIndex.css">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"/>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="./js/main.js" defer="defer"></script>
        <script src="./js/query.js" defer></script>

        <title>ContactMe</title>
    </head>
    <body>

        <header>
            <div>
                <h1>ContactMe</h1>
            </div>
            <div class="optionHeader">
                <div class="inputGroupSearch">
                    <label for="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                    <input type="text" name="search" id="search" placeholder="Rechercher ...">
                </div>
                <div>
                    <button class='show' id="ajouterContactButton">
                        <i class="fa-solid fa-user-plus"></i>
                        Ajouter Contact
                    </button>

                    <button class="hidden" id="ajouterCatButton">
                        <i class="fa-solid fa-user-plus"></i>
                        Ajouter Catégorie
                    </button>

                </div>
            </div>
        </header>

        <section id="sectionContact">
            <div id="popUp" class="hidden">
                
                <form action="" method="post" id="popUpAddContact">
                    <div id="quitButton">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <h1>
                        <i class="fa-solid fa-user-plus"></i>
                        Ajouter Contact
                    </h1>
                    <div class="avatarContainer">
                        <input type="file" id="avatarInput" accept="image/*">
                        <label for="avatarInput" class="avatar-preview">
                            <img id="avatarImage" src="./res/avatarDefault.png" alt="Avatar">
                            <span>Choisir une image</span>
                        </label>
                    </div>
                    <div class="inputGroup">
                        <label for="firstName">
                            <i class="fa-solid fa-user"></i>
                            Prénom</label>
                        <input type="text" name="firstName" id="firstName" required>
                    </div>

                    <div class="inputGroup">
                        <label for="lastName">
                            <i class="fa-solid fa-user"></i>
                            Nom</label>
                        <input type="text" name="lastName" id="lastName" required>
                    </div>

                    <div class="inputGroup">
                        <label for="email">
                            <i class="fa-solid fa-user"></i>
                            E-mail</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="inputGroup">
                        <select id="category" name="category" required>
                            <option value="0">Sélectionner une catégorie</option>
                            <option value="1">Amis</option>
                            <option value="2">Famille</option>
                            <option value="3">Collègues</option>
                        </select>
                    </div>

                    <div class="inputGroup">
                        <label for="numberPhone"required>
                            <i class="fa-solid fa-phone"></i>
                            Numéro de Téléphone</label>
                        <input type="text" name="numberPhone" id="numberPhone">
                    </div>

                    <div class="inputGroup">
                        <label for="secondNumberPhone">
                            <i class="fa-solid fa-phone"></i>
                            Second Numéro de Téléphone</label>
                        <input type="text" name="secondNumberPhone" id="secondNumberPhone">
                    </div>

                    <button type="submit">
                        <i class="fa-solid fa-user-plus"></i>
                        Ajouter Contact
                    </button>
                </form>
            </div>

            <div id="listContact">
                <div class="headerListContact">
                    <div class="headerTitle">
                        <button id="mesContacts">
                            <i class="fa-solid fa-users"></i> 
                            Mes Contacts
                        </button>

                        <button id="mesCategories">
                            <i class="fa-solid fa-layer-group"></i>
                            Mes Catégories
                        </button>

                    </div>
                    <div id="filter">
                        <button id="filterButton">
                            <i class="fa-solid fa-filter"></i>
                            Filtrer
                        </button>
                        <div class="hidden" id="filterOptions">
                            <div>
                                <label><input type="checkbox" value="option1">
                                    Option 1</label>
                            </div>
                            <div>
                                <label><input type="checkbox" value="option1">
                                    Option 1</label>
                            </div>
                            <div>
                                <label><input type="checkbox" value="option1">
                                    Option 1</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="listContactsContainer">
                    <table class="tableContact" >
                        <tr class="contact">
                            <th class="id">#</th>
                            <th class="avatar">Avatar</th>
                            <th class="name">Prénom & Nom</th>
                            <th class="cat">Catégorie</th>
                            <th class="num1">Num. Téléphone 1</th>
                            <th class="num2">Num. Téléphone 2</th>
                            <th class="email">E-mail</th>
                            <th class="option">Options</th>
                        </tr>
                        <!-- <tr class="contact">
                            <td class="id">1</td>
                            <td class="avatar">
                                <img src="./res/avatarDefault.png"  alt="">
                            </td>
                            <td class="name">Prénom  Nom</td>
                            <td class="cat">Amis</td>
                            <td class="num1">77 225 45 45</td>
                            <td class="num2">-</td>
                            <td class="email">prenom.nom@test.sn</td>
                            <td class="option">
                                <button><i class="fa-solid fa-eye"></i></button>
                                <button><i class="fa-solid fa-pen"></i></button>
                                <button><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr> -->
                    </table>

                </div>
            </div>

            <!-- <div id="popUpCat" class="hidden">
                <form action="" method="get" id="popUpAddContact">
                    <div id="quitButton">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <h1>
                        <i class="fa-solid fa-user-plus"></i>
                        Ajouter Catégorie
                    </h1>
                    
                    <div class="inputGroup">
                        <label for="cat">
                            <i class="fa-solid fa-user"></i>
                            Catégorie</label>
                        <input type="text" name="cat" id="cat">
                    </div>

                    <button type="submit">
                        <i class="fa-solid fa-user-plus"></i>
                        Ajouter Catégorie
                    </button>
                </form>
            </div> -->

        </section>

        <?php
            require_once('./php/contact.class.php')
        ?>
    </body>
</html>