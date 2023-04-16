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
  