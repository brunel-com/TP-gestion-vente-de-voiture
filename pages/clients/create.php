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
    require '../../controllers/ClientRepository.php';

    $repository = new ClientRepository($pdo);

    if (isset($_POST['new-object'])) {
        $object = [];
        $object['nom'] = $_POST['nom'];
        $object['prenom'] = $_POST['prenom'];
        $object['email'] = $_POST['email'];
        $object['tel'] = $_POST['tel'];

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
            <h1 class="inline-flex">Nouveau Client</h1>
            <div class="toolbar flex items-center">
                <a href="../clients" class="btn outlined primary"><i class="fa-solid fa-caret-left"></i> Liste des clients</a>
            </div>
        </div>
        <?php echo <<<HTML
        
        <form class="form-container" action="" method="post" style="margin-top: 2rem;">

          <input type="hidden" name="new-object" value="1" />

          <h2 style="font-weight: 500; color: darkgray">Informations du client</h2>
          
          <div class="fieldset flex gap-3">
            <div class="field">
              <label for="nom"><b>Nom</b></label>
              <input type="text" name="nom" required>
            </div>

            <div class="field">
              <label for="prenom"><b>Prénom</b></label>
              <input type="text" name="prenom" required>
            </div>
          </div>

          <div class="fieldset flex gap-3">
            <div class="field">
              <label for="email"><b>Email</b></label>
              <input type="email" name="email" required>
            </div>

            <div class="field">
              <label for="tel"><b>Tel</b></label>
              <input type="tel" name="tel" required>
            </div>
          </div>

          <div class="flex" style="margin-top: 2rem;">
            <a href="./" class="btn default">Annuler</a>
            <button type="submit" class="btn primary">Enregistrer</button>
          </div>

        </form>
      HTML;
        ?>
    </div>
</body>

</html>