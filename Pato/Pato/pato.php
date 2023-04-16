<!DOCTYPE html>
<html>
<head>
  <title>Mon Réseau Social</title>
  <link rel="stylesheet" href="style.css">
  <script src="java.js"></script>
</head>
<body>
  <!-- En-tête de la page -->
  <header>
    <h1>Pato</h1>
    <nav>
      <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Profil</a></li>
        <li><a href="#">Notifications</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
    </nav>
  </header>

  <!-- Contenu de la page -->
  <main>
    <section id="nouveauxTweets">
      <h2>Nouveaux Tweets</h2>
      <!-- Affichage des nouveaux tweets -->
      <!-- Exemple de structure pour un tweet -->
      <!-- <div class="tweet">
        <img src="avatar.png" alt="Avatar de l'utilisateur">
        <div class="contenu">
          <h3>Nom d'utilisateur</h3>
          <p>Contenu du tweet</p>
        </div>
      </div> -->
    </section>
<!-- Ajouter un bouton "Poster" dans la section des Nouveaux Tweets -->
<section id="nouveauxTweets">
    <h2>Nouveaux Tweets</h2>
    <!-- Bouton "Poster" -->
    <button id="btnPoster">Poster</button>
    <!-- Affichage des nouveaux tweets -->
    <!-- Exemple de structure pour un tweet -->
    <!-- <div class="tweet">
      <img src="avatar.png" alt="Avatar de l'utilisateur">
      <div class="contenu">
        <h3>Nom d'utilisateur</h3>
        <p>Contenu du tweet</p>
      </div>
    </div> -->
  </section>
  
  <!-- Ajouter une section pour afficher l'image ajoutée -->
  <section id="imageAjoutee">
    <h2>Image Ajoutée</h2>
    <img id="imgAjoutee" src="#" alt="Image ajoutée">
  </section>
  
  </main>
  <div class="categorie-container">
    <section class="categorie">
      <h2>Animaux</h2>
      <a href="#" class="btnCategorie">Animaux</a>
    </section>
    <section class="categorie">
      <h2>Sport</h2>
      <a href="#" class="btnCategorie">Sport</a>
    </section>
    <section class="categorie">
      <h2>Musique</h2>
      <a href="#" class="btnCategorie">Musique</a>
    </section>
    <section class="categorie">
      <h2>Actualité</h2>
      <a href="#" class="btnCategorie">Actualité</a>
    </section>
    <section class="categorie">
      <h2>France</h2>
      <a href="#" class="btnCategorie">France</a>
    </section>
  </div>
  <div class="categories">
    <button class="button" id="animaux">Animaux</button>
    <button class="button" id="sport">Sport</button>
    <button class="button" id="musique">Musique</button>
    <button class="button" id="france">France</button>
    <button class="button" id="actualite">Actualité</button>
</div>
<div id="image-container">
    <!-- Contenu des images à afficher ou masquer -->
    <img src="animaux.jpg" alt="Animaux" id="animaux-img" class="category-image">
    <img src="sport.jpg" alt="Sport" id="sport-img" class="category-image">
    <img src="musique.jpg" alt="Musique" id="musique-img" class="category-image">
    <img src="france.jpg" alt="France" id="france-img" class="category-image">
    <img src="actualite.jpg" alt="Actualité" id="actualite-img" class="category-image">
</div>


</body>

  <!-- Pied de page de la page -->
  <footer>
    <p>Mon Réseau Social - Tous droits réservés</p>
  </footer>
</html>
