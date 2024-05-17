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
    require '../../controllers/EmployeeRepository.php';

    $repository = new EmployeeRepository($pdo);

    $object = $repository->get($_GET['id']);

    if (!isset($_GET['id'])) {
        die('ERREUR - Aucun ID renseigné dans l\'url');
    }

    if (isset($_POST['update-object'])) {
        $updated_object = [];
        $updated_object['id'] = $_GET['id'];
        $updated_object['nom'] = $_POST['nom'];
        $updated_object['prenom'] = $_POST['prenom'];
        $updated_object['date_naiss'] = $_POST['date_naiss'];
        $updated_object['date_emb'] = $_POST['date_emb'];
        $updated_object['service'] = $_POST['service'];
        $updated_object['email'] = $_POST['email'];
        $updated_object['tel'] = $_POST['tel'];

        $repository->update($updated_object);

        header('Location: ./');
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
        <a href="../voitures/">Voitures</a>
        <a href="../ventes">Ventes</a>
        <a href="../clients">Clients</a>
        <a href="../employes">Employés</a>
    </nav>

    <div class="content">
        <div class="flex justify-space-between items-center">
            <h1 class="inline-flex">Éditer Employé(e)</h1>
            <div class="toolbar flex items-center">
                <a href="../employes" class="btn outlined primary"><i class="fa-solid fa-caret-left"></i> Liste des employé(e)s</a>
            </div>
        </div>
    <?php echo <<<HTML
        
        <form class="form-container" action="" method="post" style="margin-top: 2rem;">

          <input type="hidden" name="update-object" value="1" />

          <h2 style="font-weight: 500; color: darkgray">Informations de l'employé(e)</h2>
          
          <div class="fieldset flex gap-3">
            <div class="field">
              <label for="nom"><b>Nom</b></label>
              <input type="text" name="nom" value="{$object['nom']}" required>
            </div>

            <div class="field">
              <label for="prenom"><b>Prénom</b></label>
              <input type="text" name="prenom" value="{$object['prenom']}" required>
            </div>

            <div class="field">
              <label for="service"><b>Service</b></label>
              <input type="text" name="service" value="{$object['service']}" required>
            </div>
          </div>

          <div class="fieldset flex gap-3">
            <div class="field">
              <label for="email"><b>Email</b></label>
              <input type="email" name="email" value="{$object['email']}" required>
            </div>

            <div class="field">
              <label for="tel"><b>Tel</b></label>
              <input type="tel" name="tel" value="{$object['tel']}" required>
            </div>

            <div class="field">
              <label for="date_naiss"><b>Date de naissance</b></label>
              <input type="date" name="date_naiss" value="{$object['date_naiss']}" required>
            </div>

            <div class="field">
              <label for="date_emb"><b>Date d'embauche</b></label>
              <input type="date" name="date_emb" value="{$object['date_emb']}" required>
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