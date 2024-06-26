<!DOCTYPE html>
<html>

<head>
  <title>Gestion Vente Voitures </title>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../../lib/fontawesome/css/fontawesome.css" />
  <link rel="stylesheet" href="../../lib/fontawesome/css/regular.css" />
  <link rel="stylesheet" href="../../lib/fontawesome/css/solid.css" />
  <link rel="stylesheet" href="../../css/app.css" />

  <?php
  $pdo = require '../../controllers/Connect.php';
  require '../../controllers/VoitureRepository.php';

  $repository = new CarRepository($pdo);
  if (!isset($_GET['id'])) {
    die('ERREUR - Aucun ID renseigné dans l\'url');
  }
  $car = $repository->get($_GET['id']);

  $isSelectedOption = function($condition) {
    if ($condition) {
      return "selected";
    }
  };

  if (isset($_POST['update-car'])) {
    $updated_car = [];
    $updated_car['id'] = $_GET['id'];
    $updated_car['marque'] = $_POST['marque'];
    $updated_car['modele'] = $_POST['modele'];
    $updated_car['prix'] = $_POST['prix'];
    $updated_car['annee_fabrication'] = $_POST['annee_fabrication'];
    $updated_car['kilometrage'] = $_POST['kilometrage'];
    $updated_car['couleur'] = $_POST['couleur'];
    $updated_car['etat'] = $_POST['etat'];
    $updated_car['type_carburant'] = $_POST['type_carburant'];
    $updated_car['statut'] = $_POST['statut'];
    $updated_car['quantite'] = $_POST['quantite'];

    $repository->update($updated_car);

    header('Location: ./index.php');
  }
  ?>
</head>

<body>
  <nav class="app-bar">
    <a href="../../">Tableau de bord</a>
    <a href="../voitures">Voitures</a>
    <a href="../ventes">Ventes</a>
    <a href="../clients">Clients</a>
    <a href="../employes">Employés</a>
  </nav>

  <div class="content">
        <div class="flex justify-space-between items-center">
          <h1 class="inline-flex">Éditer voiture</h1>
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

          <input type="hidden" name="update-car" value="1" />

          <h2 style="font-weight: 500; color: darkgray">Informations de la voiture</h2>
          <?php echo <<<HTML
            <div class="fieldset flex gap-3">
              <div class="field">
                <label for="marque"><b>Marque</b></label>
                <input type="text" value="{$car['marque']}" name="marque" required>
              </div>

              <div class="field">
                <label for="modele"><b>Modèle</b></label>
                <input type="text" value="{$car['modele']}" name="modele" required>
              </div>

              <div class="field">
                <label for="prix"><b>Prix</b></label>
                <input type="text" value="{$car['prix']}" name="prix" required>
              </div>
            </div>

            <div class="fieldset flex gap-3">
              <div class="field">
                <label for="annee_fabrication"><b>Année de fabrication</b></label>
                <input type="date" value="{$car['annee_fabrication']}" name="annee_fabrication" required>
              </div>

              <div class="field">
                <label for="kilometrage"><b>Kilométrage</b></label>
                <input type="text" value="{$car['kilometrage']}" name="kilometrage" required>
              </div>

              <div class="field">
                <label for="couleur"><b>Couleur</b></label>
                <input type="text" value="{$car['couleur']}" name="couleur" required>
              </div>
            </div>

            <div class="fieldset flex gap-3">
              <div class="field">
                <label for="etat"><b>État</b></label>
                <select name="etat">
                  <option disabled>Choisir un état...</option>
                  <option {$isSelectedOption(trim($car['etat']) == 'Neuve')}>Neuve</option>
                  <option {$isSelectedOption(trim($car['etat']) == 'Occasion')}>Occasion</option>
                </select>
              </div>

              <div class="field">
                <label for="type_carburant"><b>Type de carburant</b></label>
                <select name="type_carburant">
                  <option disabled>Choisir un type...</option>
                  <option {$isSelectedOption(trim($car['type_carburant']) == 'Diesel')}>Diesel</option>
                  <option {$isSelectedOption(trim($car['type_carburant']) == 'Essence')}>Essence</option>
                  <option {$isSelectedOption(trim($car['type_carburant']) == 'Gasoil')}>Gasoil</option>
                </select>
                <!-- <input type="text" name="type_carburant" required> -->
              </div>

              <div class="field">
                <label for="statut"><b>Statut</b></label>
                <select name="statut">
                  <option disabled>Choisir un statut...</option>
                  <option {$isSelectedOption(trim($car['statut']) == 'Disponible')}>Disponible</option>
                  <option {$isSelectedOption(trim($car['statut']) == 'Acheté')}>Acheté</option>
                </select>
              </div>
            </div>

            <div class="fieldset flex">
              <div class="field">
                <label for="quantite"><b>Quantité</b></label>
                <input type="number" value="{$car['quantite']}" name="quantite" required>
              </div>
            </div>

          HTML; ?>

          <div class="flex" style="margin-top: 2rem;">
            <a href="./" class="btn default">Annuler</a>
            <button type="submit" class="btn primary">Enregistrer</button>
          </div>

        </form>
    </div>
</body>

</html>