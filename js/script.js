
    fetch("https://www.data.economie.gouv.fr/api/records/1.0/search/?dataset=prix-carburants-fichier-quotidien-test-ods&q=&facet=prix_maj&facet=prix_nom&facet=com_arm_name&facet=epci_name&facet=dep_name&facet=reg_name&facet=services_service&facet=rupture_nom&facet=rupture_debut&facet=horaires_automate_24_24")
        .then(reponse => reponse.json())
        .then(reponse2 => console.log(reponse2.records))
