/*
 Inscription.js
 */
function initInscription() {
    console.table("initInscription")
    // Quand l'utilisateur clique sur le bouton "valider"
    // On sollicite la fonction valider
    document.getElementById("inputNom").value = ""
    document.getElementById("inputPrenom").value = ""
    document.getElementById("inputPseudo").value = ""
    document.getElementById("inputVille").value = ""
    document.getElementById("inputMail").value = ""
    document.getElementById("inputMdp").value = ""
    document.getElementById("inputMdp2").value = ""
    document.getElementById("Checkbox").onclick = afficherMasquer
    document.getElementById("lblMessage").innerHTML = ""
    let btValidez = document.getElementById("btValidez")
    btValidez.addEventListener("click", function (e) {
        e.preventDefault()
        valider()
    }
    )
}
function valider() {
    console.table("valider")
    // Déclaration d'une variable et affectation d'une valeur
    // Récupération d'une saisie de l'utilisateur
    let inputNom = document.getElementById("inputNom").value
    let inputPrenom = document.getElementById("inputPrenom").value
    let inputPseudo = document.getElementById("inputPseudo").value
    let inputVille = document.getElementById("inputVille").value
    let inputMail = document.getElementById("inputMail").value
    let inputMdp = document.getElementById("inputMdp").value
    let inputMdp2 = document.getElementById("inputMdp2").value
    // Test des valeurs saisies
    // trim() enlève les espaces avant et après
    // Si le pseudo est vide ou si le mdp est vide alors
    if (inputNom.trim() === "" || inputPrenom.trim() === "" || inputPseudo.trim() === "" || inputVille.trim() === "" || inputMail.trim() === "" || inputMdp.trim() === "" || inputMdp2.trim() === "") {
        // Affectation de "Il faut tout saisir" à la variable message
        document.getElementById("lblMessage").innerHTML = "Toutes les saisies sont obligatoires"
    }
    else {
        document.getElementById("formInscription").submit()
    }
    // Affichage d'une valeur (0K ou Il faut tout saisir) dans le <label>
} /// init
Checkbox=true
function afficherMasquer(){
    if(Checkbox){
        document.getElementById("inputMdp").setAttribute("type","text")
        document.getElementById("inputMdp2").setAttribute("type","text")
        document.getElementById("lblCheckbox").innerHTML = "Masquer le mot de passe"
        Checkbox=false
    }
    else{
        document.getElementById("inputMdp").setAttribute("type","password")
        document.getElementById("inputMdp2").setAttribute("type","password")
        document.getElementById("lblCheckbox").innerHTML = "Afficher le mot de passe"
        Checkbox=true
    }
}
// Au chargement de la page et de la lecture du fichier js on sollicite la fonction init
window.onload = initInscription