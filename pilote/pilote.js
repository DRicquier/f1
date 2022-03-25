"use strict";

window.onload = init;

function init() {
    // A METTRE QUAND SQL MARCHERA
    $.ajax({
        url: "ajax/getlespilotes.php",
        type: 'post',
        dataType: "json",
        success: afficher,
        error: reponse => console.log(reponse.responseText)
    });


/*
    // EN ATTENDANT POUR FAIRE DES TESTS
    let lesPilotes = [
        {id: "77", nom: "Bottas", prenom: "Valtteri", ordre: "1"},
        {id: "22", nom: "Tsunoda", prenom: "Yuki", ordre: "2"}
    ]
    afficher(lesPilotes)

 */
}

// affichage des données retournées
function afficher(data) {
    for (const pilote of data) {
        let tr = document.getElementById("lesLignes").insertRow();

        let img = new Image()
        img.src = "img/" + pilote.id + ".jpg"
        tr.insertCell(0).appendChild(img)

        tr.insertCell(1).innerText = pilote.nom
        tr.insertCell(2).innerText = pilote.prenom
        tr.insertCell(3).innerText = pilote.ordre


    }
}