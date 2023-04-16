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
        <li class="nav"><a href="#">Accueil</a></li>
        <li class="nav" ><a href="#">Profil</a></li>
        <li class="nav" ><a href="#">Notifications</a></li>
        <li class="nav" ><a href="#">Messages</a></li>
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
    <!-- Boutons de catégorie -->
    <button class="button" id="sportButton">Sport</button>
    <button class="button" id="musiqueButton">Musique</button>
    <button class="button" id="animauxButton">Animaux</button>
    <button class="button" id="franceButton">France</button>
    <button class="button" id="actualiteButton">Actualité</button>

    <!-- Images -->
    <img src="sport.jpg" alt="Image Sport" class="image" id="imageSport">
    <img src="musique.jpg" alt="Image Musique" class="image" id="imageMusique">
    <img src="chien.jpg" alt="Image Animaux" class="image" id="imageAnimaux">
    <img src="france.jpg" alt="Image France" class="image" id="imageFrance">
    <img src="actualite.jpg" alt="Image Actualité" class="image" id="imageActualite">
    <?php

// Je me connecte à la base de données :
$pdo = new PDO('mysql:host=localhost;dbname=bridgeconnect', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// Je vérifie :
// var_dump($pdo);


// Si le formulaire a été posté :
if($_POST) {
    // Préparation de la requête :
    $stmt = $pdo->prepare("INSERT INTO msg (pseudo, message, date_heure_message) VALUES (?, ?, NOW())");
    // Bind des paramètres :
    $stmt->bindParam(1, $_POST['pseudo']);
    $stmt->bindParam(2, $_POST['message']);
    // Exécution de la requête :
    $stmt->execute();
}





// Si une demande de suppression a été envoyée :
if(isset($_POST['delete_msg_id'])) {
    // Préparation de la requête :
    $stmt = $pdo->prepare("DELETE FROM msg WHERE id = ?");
    // Bind des paramètres :
    $stmt->bindParam(1, $_POST['delete_msg_id']);
    // Exécution de la requête :
    $stmt->execute();
}





// Si une recherche a été effectuée :
if(isset($_GET['search'])) {
    // Préparation de la requête :
    $stmt = $pdo->prepare("SELECT * FROM msg WHERE message LIKE ?");
    // Bind des paramètres :
    $search_term = '%' . $_GET['search'] . '%';
    $stmt->bindParam(1, $search_term);
    // Exécution de la requête :
    $stmt->execute();
} else {
    // Affichage de tous les messages du plus récent au plus ancien :
    $stmt = $pdo->query("SELECT * FROM msg ORDER BY date_heure_message DESC");
}

// Si l'un des boutons de tri est cliqué :
if(isset($_GET['sort_newest']) || isset($_GET['sort_oldest'])) {
    // Préparation de la requête :
    if(isset($_GET['sort_newest'])) {
        $stmt = $pdo->query("SELECT * FROM msg ORDER BY date_heure_message DESC");
    } else {
        $stmt = $pdo->query("SELECT * FROM msg ORDER BY date_heure_message ASC");
    }
}
// On affiche les messages :
while($message = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="message">';
    echo '<p class="pseudo">' . $message['pseudo'] . ' : ' . '</p>';
    echo '<p class="texte">' . $message['message'] . '</p>';
    echo '<form method="post">';
    echo '<input type="hidden" name="delete_message_id" value="' . $message['id'] . '">';
    echo '<button type="submit">Supprimer</button>';
    echo '</form>';
    echo '<p class="meta">' . $message['date_heure_message'] . '</p>';
    echo '</div>';
}

?>


<!-- Boutons de tri : -->
<form method="get">
    <input type="submit" name="sort_newest" value="Du plus récent au plus ancien">
    <input type="submit" name="sort_oldest" value="Du plus ancien au plus récent">
</form>

<!-- Barre de recherche : -->
<form method="get">
    <input type="text" name="search" placeholder="Recherche de message">
    <input type="submit" value="Go">
    <?php if(isset($_GET['search'])): ?>
        <a href="pato.php"><input type="button" value="Retour"></a>
    <?php endif; ?>
</form>

<!-- Formulaire pour poster un message : -->
<form method="post">
    <input type="text" name="pseudo" placeholder="Pseudo" required>
    <textarea name="message" placeholder="Message (280 caractères maximum)" required maxlength="280"></textarea>
    <input type="submit" class="tweet" value="Tweet">
</form>
</body>

  <!-- Pied de page de la page -->
  <footer>
    <p>Mon Réseau Social - Tous droits réservés</p>
  </footer>
</html>
