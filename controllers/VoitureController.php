<?php
// $pdo = require './Connect.php';

class CarController
{
  public $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function executeIndex($filters)
  {
    $sql = "SELECT * FROM voiture";
    $statement = $this->pdo->query($sql);

    // get all cars
    $cars = $statement->fetchAll(PDO::FETCH_ASSOC);
    // $conn->close();

    if ($cars) {
      return $cars;
    } else return [];
  }

  public function executeGet($id)
  {
    $sql = "SELECT * FROM voiture";
    $query = $this->pdo->query($sql);
    $query->execute();
    $car = $query->fetch();
    return $car;
  }

  public function executeSearch($filter)
  {
    $sql = "SELECT * FROM voiture WHERE marque LIKE '%$filter%' OR modele LIKE '%$filter'";
    $statement = $this->pdo->query($sql);

    // get all cars
    $cars = $statement->fetchAll(PDO::FETCH_ASSOC);
    // $conn->close();

    if ($cars) {
      return $cars;
    } else return [];
  }

  public function executeStore($car) {
    $sql = "INSERT INTO voiture(`marque`, `modele`, `prix`, `annee_fabrication`, `kilometrage`, `couleur`, `etat`, `type_carburant`, `statut`, `quantite`)
            VALUES(:marque, :modele, :prix, :annee_fabrication, :kilometrage, :couleur, :etat, :type_carburant, :statut, :quantite)
    ";

    $query = $this->pdo->prepare($sql);

    $query->bindParam(':marque', $car['marque']);
    $query->bindParam(':modele', $car['modele']);
    $query->bindParam(':prix', $car['prix']);
    $query->bindParam(':annee_fabrication', $car['annee_fabrication']);
    $query->bindParam(':kilometrage', $car['kilometrage']);
    $query->bindParam(':couleur', $car['couleur']);
    $query->bindParam(':etat', $car['etat']);
    $query->bindParam(':type_carburant', $car['type_carburant']);
    $query->bindParam(':statut', $car['statut']);
    $query->bindParam(':quantite', $car['quantite']);

    $query->execute();

  }


}
