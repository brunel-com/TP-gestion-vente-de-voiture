<?php

class EmployeeRepository
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($filters)
    {
        $sql = "SELECT * FROM employee";
        $statement = $this->pdo->query($sql);

        // get all objects
        $objects = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($objects) {
            return $objects;
        } else return [];
    }

    public function get($id)
    {
        $sql = "SELECT * FROM employee WHERE matricule = $id";
        $query = $this->pdo->query($sql);
        $query->execute();
        $car = $query->fetch();
        return $car;
    }

    public function search($filter)
    {
        $filter = strtolower(trim($filter));
        $sql = "SELECT * FROM employee WHERE nom LIKE '%$filter%' OR prenom LIKE '%$filter%'";
        $statement = $this->pdo->query($sql);

        // get all objects
        $objects = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($objects) {
            return $objects;
        } else return [];
    }

    public function create($object)
    {
        $sql = "INSERT INTO employee(`nom`, `prenom`, `date_naiss`, `date_emb`, `service`, `email`, `tel`)
            VALUES(:nom, :prenom, :date_naiss, :date_emb, :service_emp,  :email, :tel)
    ";

        $query = $this->pdo->prepare($sql);

        $query->bindParam(':nom', $object['nom']);
        $query->bindParam(':prenom', $object['prenom']);
        $query->bindParam(':date_naiss', $object['date_naiss']);
        $query->bindParam(':date_emb', $object['date_emb']);
        $query->bindParam(':service_emp', $object['service']);
        $query->bindParam(':email', $object['email']);
        $query->bindParam(':tel', $object['tel']);

        $query->execute();
    }

    public function update($object)
    {
        try {
        $sql = "UPDATE employee
                SET nom = :nom,
                    prenom = :prenom,
                    date_naiss = :date_naiss,
                    date_emb = :date_emb,
                    `service` = :service_emp,
                    email = :email,
                    tel = :tel
                WHERE matricule = :id
        ";

        $query = $this->pdo->prepare($sql);

        $query->bindParam(':id', $object['id']);
        $query->bindParam(':nom', $object['nom']);
        $query->bindParam(':prenom', $object['prenom']);
        $query->bindParam(':date_naiss', $object['date_naiss']);
        $query->bindParam(':date_emb', $object['date_emb']);
        $query->bindParam(':service_emp', $object['service']);
        $query->bindParam(':email', $object['email']);
        $query->bindParam(':tel', $object['tel']);

        $query->execute();
        } catch(Exception $e) {
            die($e);
        }
    }

    function destroy($id)
    {
        $sql = "DELETE FROM employee WHERE matricule = $id";
        $query = $this->pdo->query($sql);
        $query->execute();
    }
}