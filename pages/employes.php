<!DOCTYPE html>
<html>

<head>
  <title>Gestion Vente Voitures </title>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <script type="text/javascript" src="scripts/jquery-3.3.1.js"></script> -->
  <link rel="stylesheet" href="../lib/fontawesome/css/fontawesome.css" />
  <link rel="stylesheet" href="../lib/fontawesome/css/regular.css" />
  <link rel="stylesheet" href="../lib/fontawesome/css/solid.css" />
  <!-- <link rel="stylesheet" href="lib/w3-theme-teal.css"/> -->
  <!-- <link rel="stylesheet" href="lib/w3-4.0.css"/> -->
  <link rel="stylesheet" href="../css/app.css" />
</head>

<body>
  <nav class="app-bar">
    <a href="/index.php">Tableau de bord</a>
    <a href="voiture.php">Voitures</a>
    <a href="ventes.php">Ventes</a>
    <a href="clients.php">Clients</a>
    <a href="#" class="active">Employés</a>
  </nav>

  <div class="content">
    <div class="flex justify-space-between items-center">
      <h1 class="inline-flex">Liste des employés</h1>
      <div class="toolbar flex items-center">
        <div class="flex gap-none" style="margin-right: 16px">
          <input type="text" placeholder="Rechercher..">
          <button class="btn default"><i class="fa-solid fa-magnifying-glass"></i> </button>
        </div>
        <button class="btn primary">Nouvel employé</button>
      </div>
    </div>

    <div style="overflow-x: auto; margin-top: 1rem;">
      <table>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date de naissance</th>
          <th>Date Embauche</th>
          <th>Service</th>
          <th>Email</th>
          <th>Téléphone</th>
        </tr>
        <tr>
          <td>8998423</td>
          <td>Smith</td>
          <td>John</td>
          <td>02/05/1990</td>
          <td>23/11/2011</td>
          <td>RH</td>
          <td>someone@example.com</td>
          <td>+241 893 832 893 </td>
        </tr>
      </table>
    </div>
  </div>


  <footer></footer>

</body>

</html>