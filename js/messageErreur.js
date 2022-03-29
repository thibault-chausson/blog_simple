

    // Quand on déclare les scripts en plein milieu du body
    // Il faut les mettre APRES les éléments sur lesquels on intervient,
    // car le script est éxécuté "en cours de route"

    // Variables globales
    div_colorDiv = document.getElementById('colorAnim');
    couleurs = ['black', 'red' ];
    currentStep = 0;

    // Fonction qui ré-écrit le style pour faire "l'étape suivante" de l'anim
    function AnimNextStep() {

    div_colorDiv.style.color = couleurs[currentStep];

    currentStep++;
    if (currentStep >= couleurs.length){ currentStep = 0; }
    setTimeout('AnimNextStep()',500)
}

    //On lance la fonction
    AnimNextStep();

