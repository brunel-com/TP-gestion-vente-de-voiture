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
  require '../../controllers/VenteRepository.php';

  $repository = new VenteRepository($pdo);

  if (!isset($_GET['search'])) {
    $objects = $repository->getAll('');
  } else {
    $objects = $repository->search($_GET['search']);
  }

  // Supprimer un objet vente 
  if (isset($_POST['delete-object'])) {
    if (!empty($_POST['delete-object'])) {
      $repository->destroy($_POST['delete-object']);
      unset($_POST['delete-object']);
      header("Refresh:0");
    }
  }
  ?>
</head>

<body>
  <nav class="app-bar">
    <a href="../../">Tableau de bord</a>
    <a href="../voitures">Voitures</a>
    <a href="#" class="active">Ventes</a>
    <a href="../clients">Clients</a>
    <a href="../employes">Employés</a>
  </nav>

  <div class="content">
    <div class="flex justify-space-between items-center">
      <h1 class="inline-flex">Liste des ventes</h1>
      <div class="toolbar flex items-center">
      <form action="" method="get" class="flex gap-none" style="margin-right: 16px">
          <?php
          $search = '';
          if (isset($_GET['search'])) {
            $search = $_GET['search'];
          }
          echo <<<EOF
                  <input name="search" type="text" placeholder="Client ou voiture ..." value="$search"> 
                EOF;
          ?>
          <button type="submit" class="btn default"><i class="fa-solid fa-magnifying-glass"></i> </button>
        </form>
        <a href="create.php" class="btn primary">Nouvelle Vente</a>
      </div>
    </div>

    <div style="overflow-x: auto; margin-top: 1rem;">
      <table>
        <tr>
          <th>Date</th>
          <th>Client</th>
          <th>Voiture</th>
          <th>Montant (F)</th>
          <th>Modalité de paiement</th>
          <th>Actions</th>
        </tr>
        <?php
        if (count($objects) > 0) {
          foreach ($objects as $object) {
            echo <<<HTML
              <tr>
                <td>{$object['date']}</td>
                <td>{$object['client']}</td>
                <td>{$object['voiture']}</td>
                <td>{$object['montant']}</td>
                <td>{$object['modale_pay']}</td>
                <td style="width: 6rem ">
                  <div class="flex justify-end gap-3" style="margin-top: 12px;">
                    <a href="update.php?id={$object['id']}" class="btn outlined info" style="padding: 10px 12px"><i class="inline-flex fa-solid fa-pencil"></i></a>
                    <button type="button" onclick="deleteObject({$object['id']})" class="btn outlined danger" style="padding: 10px 12px"><i class="inline-flex fa-solid fa-trash"></i></button>
                    <form id="delete-object-{$object['id']}" action="" method="POST">
                      <input type="hidden" name="delete-object" value="{$object['id']}" />
                    </form>
                  </div>
                </td>
              </tr>
            HTML;
          }
        }
        ?>
      </table>
    </div>
  </div>


  <footer></footer>


  <script>
    function deleteObject(id) {
      const isDelete = confirm(`Voulez vous supprimer cette vente ?`);
      if (isDelete) {
        document.getElementById(`delete-object-${id}`).submit()
      }
    }
  </script>

</body>

</html>