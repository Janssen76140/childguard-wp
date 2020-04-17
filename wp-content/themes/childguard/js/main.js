// $(function () {
//     $('#formulaireMesInfos').on('submit', function () {
//         var donnees = $(this).serialize();

//         $.post('/childguard-wp/mes-infos/',
//             {
//                 donnees
//             },
            
//             fonction_de_retour_ajax(),
//             console.log(fonction_de_retour_ajax()),
//             'html'
//         );
//     });
// });

// function fonction_de_retour_ajax() {
//     document.getElementById('email').innerHTML = '<p>' + donnees + '</p>';
// }


// function ajax() {
//     // Instancier objet XHR
//     var xhr = new XMLHttpRequest();
//     // Préparation de la requête, 1er argument: methode d'envoi: POST, 2ème argument adresse où soumettre la requete
//     xhr.open('POST', '/childguard-wp/mes-infos/');
//     // Reception des données 
//     // fonction de callback
//     // Si état de la requete est à Done et que le status est à 200 on continue
//     xhr.addEventListener('readystatechange', function () {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             console.log(xhr.responseText);
//             document.getElementById('email').innerHTML = '<p>' + xhr.responseText + '</p>';
//         }
//     });
//     // Envoyer avec la methode send()
//     xhr.send();
// }

// (function () {

//     var element = document.getElementById('submitted');
//     element.addEventListener('click', function () {
//         ajax(this.value); // À chaque clique, un fichier sera chargé dans la page
//     });
// })();
