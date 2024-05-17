<?php

class VenteRepository
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($filters)
    {
        $sql = "SELECT * FROM vente";
        $statement = $this->pdo->query($sql);

        // get all cars
        $cars = $statement->fetchAll(PDO::FETCH_ASSOC);
        // $conn->close();

        if ($cars) {
            return $cars;
        } else return [];
    }

    public function get($id)
    {
        $sql = "SELECT * FROM vente WHERE id = $id";
        $query = $this->pdo->query($sql);
        $query->execute();
        $car = $query->fetch();
        return $car;
    }

    public function search($filter)
    {
        $sql = "SELECT * FROM vente WHERE client LIKE '%$filter%' OR voiture LIKE '%$filter%'";
        $statement = $this->pdo->query($sql);

        // get all objects
        $cars = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($cars) {
            return $cars;
        } else return [];
    }

    public function create($object)
    {
        $sql = "INSERT INTO vente(`date`, `client`, `voiture`, `montant`, `modale_pay`)
            VALUES(:date_vente, :client, :voiture, :montant, :modale_pay)
    ";

        $query = $this->pdo->prepare($sql);
        print_r($object);
        $query->bindParam(':date_vente', $object['date']);
        $query->bindParam(':client', $object['client']);
        $query->bindParam(':voiture', $object['voiture']);
        $query->bindParam(':montant', $object['montant']);
        $query->bindParam(':modale_pay', $object['modale_pay']);

        $query->execute();
    }

    public function update($object)
    {
        try {
            $sql = "UPDATE vente
                    SET `date` = :date_vente,
                        client = :client,
                        voiture = :voiture,
                        montant = :montant,
                        modale_pay = :modale_pay
                    WHERE id = :id
            ";
    
            $query = $this->pdo->prepare($sql);
    
            $query->bindParam(':id', $object['id']);
            $query->bindParam(':date_vente', $object['date']);
            $query->bindParam(':client', $object['client']);
            $query->bindParam(':voiture', $object['voiture']);
            $query->bindParam(':montant', $object['montant']);
            $query->bindParam(':modale_pay', $object['modale_pay']);
    
            $query->execute();
        } catch (Exception $e) {
            die($e);
        }
    }

    function destroy($id)
    {
        $sql = "DELETE FROM vente WHERE id = $id";
        $query = $this->pdo->query($sql);
        $query->execute();
    }
}
