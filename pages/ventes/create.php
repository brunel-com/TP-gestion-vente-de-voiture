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
  require '../../controllers/VenteRepository.php';
  require '../../controllers/ClientRepository.php';
  require '../../controllers/VoitureRepository.php';

  $repository = new VenteRepository($pdo);
  $clientRepository = new ClientRepository($pdo);
  $carRepository = new CarRepository($pdo);

  $clients = $clientRepository->getAll('');
  $cars = $carRepository->getAll('');

  if (isset($_POST['new-object'])) {
    $object = [];
    $object['date'] = $_POST['date'];
    $object['client'] = $_POST['client'];
    $object['voiture'] = $_POST['voiture'];
    $object['montant'] = $_POST['montant'];
    $object['modale_pay'] = $_POST['modale_pay'];

    $repository->create($object);

    header('Location: ./');
  }
  ?>
</head>

<body>
  <nav class="app-bar">
    <a href="../../">Tableau de bord</a>
    <a href="../voitures/">Voitures</a>
    <a href="../ventes">Ventes</a>
    <a href="../clients">Clients</a>
    <a href="../employes">Employés</a>
  </nav>

  <div class="content">
        <div class="flex justify-space-between items-center">
          <h1 class="inline-flex">Nouvelle vente</h1>
          <div class="toolbar flex items-center">
            <a href="../ventes" class="btn outlined primary"><i class="fa-solid fa-caret-left"></i> Liste de ventes</a>
          </div>
        </div>
              
        <form class="form-container" action="" method="post" style="margin-top: 2rem;">

          <input type="hidden" name="new-object" value="1" />

          <h2 style="font-weight: 500; color: darkgray">Informations de la vente</h2>
          
          <div class="fieldset flex gap-3">
            <div class="field">
              <label for="date"><b>Date</b></label>
              <input type="date" name="date" required>
            </div>

            <div class="field">
              <label for="client"><b>Client</b></label>
              <select name="client">
                <option disabled selected>Choisir un client...</option>
                <?php
                if (count($clients) > 0) {
                  foreach ($clients as $object) {
                    echo <<<HTML
                    <option>{$object['nom']} {$object['prenom']}</option>
                    HTML;
                  }
                }
                ?>
              </select>
            </div>

            <div class="field">
              <label for="voiture"><b>Voiture</b></label>
              <select name="voiture">
                <option disabled selected>Choisir une voiture...</option>
                <?php
                if (count($cars) > 0) {
                  foreach ($cars as $object) {
                    echo <<<HTML
                    <option>{$object['marque']} {$object['modele']}</option>
                    HTML;
                  }
                }
                ?>
              </select>
            </div>
          </div>

          <div class="fieldset flex gap-3">
            <div class="field">
              <label for="montant"><b>Montant</b></label>
              <input type="number" name="montant" required>
            </div>

            <div class="field">
              <label for="modale_pay"><b>Modalité de paiement</b></label>
              <select name="modale_pay">
                <option disabled selected>Choisir une modalité...</option>
                <option>Carte</option>
                <option>Cash</option>
                <option>Chèque</option>
              </select>
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