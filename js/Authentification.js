/*

 Authentification.js

 */

function initAuthentification() {

    console.table("initAuthentification")
    // Quand l'utilisateur clique sur le bouton "valider"

    // On sollicite la fonction valider
    document.getElementById("pseudo").value = ""
    document.getElementById("mdp").value = ""
    document.getElementById("Checkbox").onclick = afficherMasquer
    document.getElementById("btValider").addEventListener("click", (event)=>{
        event.preventDefault()
        valider()
    }
    )
} /// init

/**

 *

 * @returns {undefined}

 */

function valider() {
    console.table("valider")
    // Déclaration d'une variable et affectation d'une valeur

    // Récupération d'une saisie de l'utilisateur

    let pseudo = document.getElementById("pseudo").value

    let mdp = document.getElementById("mdp").value


    let ko = 0
    let message = ""

    if(!isMDPFort(mdp)) {
        ko++
        message += "<br>Mot de passe incorrect"
    }





    // Test des valeurs saisies

    // trim() enlève les espaces avant et après

    // Si le pseudo est vide ou si le mdp est vide alors

    if (pseudo.trim() === "" || mdp.trim() === "") {

        // Affectation de "Il faut tout saisir" à la variable message

        document.getElementById("lblMessage").innerHTML = "Toutes les saisies sont obligatoires"

    }else {
       // document.getElementById("formLogin").submit()
    }

    // Affichage d'une valeur (0K ou Il faut tout saisir) dans le <label>



} /// initAuthentification






Checkbox = true

function afficherMasquer(){

    if(Checkbox){

        document.getElementById("mdp").setAttribute("type","text")

        document.getElementById("lblCheckbox").innerHTML = "Masquer le mot de passe"

        Checkbox = false
    }

    else{

        document.getElementById("mdp").setAttribute("type","password")

        document.getElementById("lblCheckbox").innerHTML = "Afficher le mot de passe"

        Checkbox = true
    }

}






/**

 * MAIN

 */

// Au chargement de la page et de la lecture du fichier js on sollicite la fonction init

window.onload = initAuthentification