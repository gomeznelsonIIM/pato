// Script pour la gestion du bouton "Poster" et de l'ajout d'image
document.getElementById('btnPoster').addEventListener('click', function() {
    // Ouvrir la boîte de dialogue de fichier
    var input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';
    input.addEventListener('change', function(event) {
      var file = event.target.files[0];
      var reader = new FileReader();
      reader.onload = function(event) {
        // Afficher l'image ajoutée
        var imgAjoutee = document.getElementById('imgAjoutee');
        imgAjoutee.src = event.target.result;
        imgAjoutee.alt = file.name;
        document.getElementById('imageAjoutee').style.display = 'block';
      };
      reader.readAsDataURL(file);
    });
    input.click();
  });
  
  // Écouteurs d'événement pour les boutons de catégorie

document.getElementById("sportButton").addEventListener("click", function() {
  afficherImage("imageSport");
});

document.getElementById("musiqueButton").addEventListener("click", function() {
  afficherImage("imageMusique");
});

document.getElementById("animauxButton").addEventListener("click", function() {
  afficherImage("imageAnimaux");
});

document.getElementById("franceButton").addEventListener("click", function() {
  afficherImage("imageFrance");
});

document.getElementById("actualiteButton").addEventListener("click", function() {
  afficherImage("imageActualite");
});

// Fonction pour afficher une image spécifique et cacher les autres
function afficherImage(imageId) {
  // Cacher toutes les images
  var images = document.getElementsByClassName("image");
  for (var i = 0; i < images.length; i++) {
      images[i].style.display = "none";
  }

  // Afficher l'image spécifique
  document.getElementById(imageId).style.display = "block";
}
