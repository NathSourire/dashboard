const getCities = () => {
    
    // Récupération du contenu du champs
    let search = zipcode.value;

    // On fait le traitement uniquement si il y a 5 caractères entrés
    if(search.length == 5){

        // Déclaration d'un objet formData
        let myForm = new FormData();
        myForm.append('zipcodeAjax', search);

        let options = {
            method: 'POST',
            body: myForm
        }

        // Appel ajax au fichier passé en premier paramètre. Le second paramètre est l'objet déclaré précédemment.
        fetch('/controllers/ajax/getCities.php', options)
        // Quand le controlleur a traité le résultat, on stocke la chaine retournée dans 'response' 
        .then(function(response){
            // La chaine est alors json encodé pour être interprété en javascript
            return response.json();
        })
        // Quand la chaine a fini d'etre encodée on place le json dans 'cities'
        .then(function(cities){
            
            let options = '';

            // On boucle sur le tableau cities et on génère toutes les futures options du select
            cities.forEach(function(city){
                options += '<option >'+city.nomCommune+'</option>';
            })

            // On injecte dans le DOM les options au bon endroit.
            city.innerHTML = options;
        })

    }
    
}

// value="'+city.codeCommune+'"

// Déclaration d'un event input sur le champs
zipcode.addEventListener('input', getCities);