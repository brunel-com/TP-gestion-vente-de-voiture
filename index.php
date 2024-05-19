<!DOCTYPE html>
<html>

<head>
    <title>Gestion Vente Voitures </title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <script type="text/javascript" src="scripts/jquery-3.3.1.js"></script> -->
    <!-- <link rel="stylesheet" href="lib/font-awesome.min.css"/> -->
    <!-- <link rel="stylesheet" href="lib/w3-theme-teal.css"/> -->
    <!-- <link rel="stylesheet" href="lib/w3-4.0.css"/> -->
    <link rel="stylesheet" href="css/app.css"/>
    <?php
    $pdo = require './controllers/Connect.php';
    require './controllers/DashboardRepository.php';
  
    $repository = new DashboardRepository($pdo);

    $countCars = $repository->getCountCars();
    $countClients = $repository->getCountClients();
    $countEmployees = $repository->getCountEmployees();
    $countVentes = $repository->getCountVentes();
    ?>
</head>

<body>
    <nav class="app-bar">
        <a class="active" href="#home">Tableau de bord</a>
        <a href="pages/voitures">Voitures</a>
        <a href="pages/ventes">Ventes</a>
        <a href="pages/clients">Clients</a>
        <a href="pages/employes">Employés</a>
    </nav>
<?php echo <<<HTML
    <div class="content">
        <div class="flex justify-space-between">
            <div class="stat-card">
                <h3 class="title">Nombre de voitures</h3>
                <span class="number">$countCars</span>
            </div>

            <div class="stat-card">
                <h3 class="title">Nombre de clients</h3>
                <span class="number">$countClients</span>
            </div>

            <div class="stat-card">
                <h3 class="title">Nombre d'employés</h3>
                <span class="number">$countEmployees</span>
            </div>

            <div class="stat-card">
                <h3 class="title">Nombre de ventes</h3>
                <span class="number">$countVentes</span>
            </div>
        </div>
    </div>
HTML;
?>
    

    <footer></footer>

</body>

</html>