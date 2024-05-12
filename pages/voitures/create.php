<!DOCTYPE html>
<html>

<head>
  <title>Gestion Vente Voitures </title>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <script type="text/javascript" src="scripts/jquery-3.3.1.js"></script> -->
  <link rel="stylesheet" href="../../lib/fontawesome/css/fontawesome.css" />
  <link rel="stylesheet" href="../../lib/fontawesome/css/regular.css" />
  <link rel="stylesheet" href="../../lib/fontawesome/css/solid.css" />
  <!-- <link rel="stylesheet" href="lib/w3-theme-teal.css"/> -->
  <!-- <link rel="stylesheet" href="lib/w3-4.0.css"/> -->
  <link rel="stylesheet" href="../../css/app.css" />

  <?php
  $pdo = require '../../controllers/Connect.php';
  require '../../controllers/VoitureController.php';

  $controller = new CarController($pdo);

  if (isset($_POST['new-car'])) {
    $car = [];
    $car['marque'] = $_POST['marque'];
    $car['modele'] = $_POST['modele'];
    $car['prix'] = $_POST['prix'];
    $car['annee_fabrication'] = $_POST['annee_fabrication'];
    $car['kilometrage'] = $_POST['kilometrage'];
    $car['couleur'] = $_POST['couleur'];
    $car['etat'] = $_POST['etat'];
    $car['type_carburant'] = $_POST['type_carburant'];
    $car['statut'] = $_POST['statut'];
    $car['quantite'] = $_POST['quantite'];

    $controller->executeStore($car);

    header('Location: ../');
  }
  ?>
</head>

<body>
  <nav class="app-bar">
    <a href="/index.php">Tableau de bord</a>
    <a href="voitures">Voitures</a>
    <a href="../ventes.php">Ventes</a>
    <a href="../clients.php">Clients</a>
    <a href="../employes.php">Employés</a>
  </nav>

  <div class="content">
        <div class="flex justify-space-between items-center">
          <h1 class="inline-flex">Nouvelle voiture</h1>
          <div class="toolbar flex items-center">
            <!-- <form action="" method="get" class="flex gap-none" style="margin-right: 16px">
              <?php 
                /* $search = '';
                if (isset($_GET['search'])) {
                  $search = $_GET['search'];
                }
                echo <<<EOF
                  <input name="search" type="text" placeholder="Marque ou modèle ..." value="$search"> 
                EOF;  */
              ?>
              <button type="submit" class="btn default"><i class="fa-solid fa-magnifying-glass"></i> </button>
            </form> -->
            <a href="./" class="btn outlined primary"><i class="fa-solid fa-caret-left"></i> Liste de voitures</a>
          </div>
        </div>
        
        <form class="form-container" action="" method="post" style="margin-top: 2rem;">

          <input type="hidden" name="new-car" value="1" />

          <h2 style="font-weight: 500; color: darkgray">Informations de la voiture</h2>
          
          <div class="fieldset flex gap-3">
            <div class="field">
              <label for="marque"><b>Marque</b></label>
              <input type="text" placeholder="Marque..." name="marque" required>
            </div>

            <div class="field">
              <label for="modele"><b>Modèle</b></label>
              <input type="text" placeholder="Modèle..." name="modele" required>
            </div>

            <div class="field">
              <label for="prix"><b>Prix</b></label>
              <input type="text" placeholder="Prix" name="prix" required>
            </div>
          </div>

          <div class="fieldset flex gap-3">
            <div class="field">
              <label for="annee_fabrication"><b>Année de fabrication</b></label>
              <input type="date" name="annee_fabrication" required>
            </div>

            <div class="field">
              <label for="kilometrage"><b>Kilométrage</b></label>
              <input type="text" name="kilometrage" required>
            </div>

            <div class="field">
              <label for="couleur"><b>Couleur</b></label>
              <input type="text" name="couleur" required>
            </div>
          </div>

          <div class="fieldset flex gap-3">
            <div class="field">
              <label for="etat"><b>État</b></label>
              <select name="etat">
                <option disabled selected>Choisir un état...</option>
                <option>Neuve</option>
                <option>Occasion</option>
              </select>
            </div>

            <div class="field">
              <label for="type_carburant"><b>Type de carburant</b></label>
              <select name="type_carburant">
                <option disabled selected>Choisir un type...</option>
                <option>Diesel</option>
                <option>Essence</option>
                <option>Gasoil</option>
              </select>
              <!-- <input type="text" name="type_carburant" required> -->
            </div>

            <div class="field">
              <label for="statut"><b>Statut</b></label>
              <select name="statut">
                <option disabled selected>Choisir un statut...</option>
                <option>Disponible</option>
                <option>Acheté</option>
              </select>
            </div>
          </div>

          <div class="fieldset flex">
            <div class="field">
              <label for="quantite"><b>Quantité</b></label>
              <input type="number" name="quantite" required>
            </div>

            <div class="field">
              <label for="img"><b>Image</b></label>
              <input type="file" placeholder="Choisir une image pour la voiture..." name="img" required>
            </div>
          </div>

          <div class="flex" style="margin-top: 2rem;">
            <a href="./" class="btn default">Annuler</a>
            <button type="submit" class="btn primary">Enregistrer</button>
          </div>

        </form>
    </div>
</body>

</html>