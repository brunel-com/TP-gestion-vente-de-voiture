<!DOCTYPE html>
<html>

<head>
    <title>Gestion Vente Voitures </title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <script type="text/javascript" src="scripts/jquery-3.3.1.js"></script> -->
    <link rel="stylesheet" href="../../lib/fontawesome/css/fontawesome.css"/>
    <link rel="stylesheet" href="../../lib/fontawesome/css/regular.css"/>
    <link rel="stylesheet" href="../../lib/fontawesome/css/solid.css"/>
    <!-- <link rel="stylesheet" href="lib/w3-theme-teal.css"/> -->
    <!-- <link rel="stylesheet" href="lib/w3-4.0.css"/> -->
    <link rel="stylesheet" href="../../css/app.css"/>

    <?php 
      $pdo = require '../../controllers/Connect.php';
      require '../../controllers/VoitureController.php';

      $controller = new CarController($pdo)
    ?>
</head>

<body>
    <nav class="app-bar">
        <a href="/index.php">Tableau de bord</a>
        <a href="#" class="active">Voitures</a>
        <a href="../ventes.php">Ventes</a>
        <a href="../clients.php">Clients</a>
        <a href="../employes.php">Employés</a>
    </nav>

    <div class="content">
        <div class="flex justify-space-between items-center">
          <h1 class="inline-flex">Liste de voitures</h1>
          <div class="toolbar flex items-center">
            <form action="" method="get" class="flex gap-none" style="margin-right: 16px">
              <?php 
                $search = '';
                if (isset($_GET['search'])) {
                  $search = $_GET['search'];
                }
                echo <<<EOF
                  <input name="search" type="text" placeholder="Marque ou modèle ..." value="$search"> 
                EOF; 
              ?>
              <button type="submit" class="btn default"><i class="fa-solid fa-magnifying-glass"></i> </button>
            </form>
            <a href="create.php" class="btn primary">Nouvelle Voiture</a>
          </div>
        </div>
        <br class="divider" />
        <div class="flex flex-wrap">
            <?php 
              if (!isset($_GET['search'])) {
                $cars = $controller->executeIndex('');
              } else {
                $cars = $controller->executeSearch($_GET['search']);
              }
              $isAvailableTag = function ($condition, $true, $false) { return $condition ? $true : $false; };
              $availableTag = function($car) { 
                return  <<<HTML
                          <span class="tag">
                            {$car['statut']}
                          </span>
                        HTML;
              };

              $notAvailableTag = function($car) { 
                return  <<<HTML
                          <span class="tag warning">
                            {$car['statut']}
                          </span>
                        HTML;
              };

              if (count($cars) > 0) {
                foreach ($cars as $car) {
                  echo <<<EOF
                    <div class="car-card">
                      <img src="https://images.pexels.com/photos/116675/pexels-photo-116675.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Image Voiture" />
                      <div class="content">
                        <span class="title">{$car['marque']} {$car['modele']}</span>
                        <span class="price">{$car['prix']} F CFA</span>
                        <div class="flex justify-space-between items-center" style="margin-top: 0.2rem;">
                          <span>{$car['etat']}</span>
                          {$isAvailableTag($car['statut'] == 'Disponible', $availableTag($car), $notAvailableTag($car))}
                        </div>
                        <div style="margin-top: 8px; font-size: small">
                          Kilométrage: {$car['kilometrage']} Km
                        </div>

                        <div class="flex justify-end gap-3" style="margin-top: 12px;">
                          <a href="" class="btn outlined info" style="padding: 10px 12px"><i class="inline-flex fa-solid fa-pencil"></i></a>
                          <a href="" class="btn outlined danger" style="padding: 10px 12px"><i class="inline-flex fa-solid fa-trash"></i></a>
                        </div>
                      </div>
                    </div>
                  EOF;
                }
              }

            ?>
        </div>
    </div>
    

    <footer></footer>

</body>

</html>