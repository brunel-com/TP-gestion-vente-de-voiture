<?php

class ClientRepository
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($filters)
    {
        $sql = "SELECT * FROM client";
        $statement = $this->pdo->query($sql);

        // get all objects
        $objects = $statement->fetchAll(PDO::FETCH_ASSOC);
        // $conn->close();

        if ($objects) {
            return $objects;
        } else return [];
    }

    public function get($id)
    {
        $sql = "SELECT * FROM client WHERE id = $id";
        $query = $this->pdo->query($sql);
        $query->execute();
        $car = $query->fetch();
        return $car;
    }

    public function search($filter)
    {
        $filter = strtolower(trim($filter));
        $sql = "SELECT * FROM client WHERE nom LIKE '%$filter%' OR prenom LIKE '%$filter%'";
        $statement = $this->pdo->query($sql);

        // get all objects
        $objects = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($objects) {
            return $objects;
        } else return [];
    }

    public function create($object)
    {
        $sql = "INSERT INTO client(`nom`, `prenom`, `email`, `tel`)
            VALUES(:nom, :prenom, :email, :tel)
    ";

        $query = $this->pdo->prepare($sql);

        $query->bindParam(':nom', $object['nom']);
        $query->bindParam(':prenom', $object['prenom']);
        $query->bindParam(':email', $object['email']);
        $query->bindParam(':tel', $object['tel']);

        $query->execute();
    }

    public function update($object)
    {
        $sql = "UPDATE client
                SET nom = :nom,
                    prenom = :prenom,
                    email = :email,
                    tel = :tel
                WHERE id = :id
        ";

        $query = $this->pdo->prepare($sql);

        $query->bindParam(':id', $object['id']);
        $query->bindParam(':nom', $object['nom']);
        $query->bindParam(':prenom', $object['prenom']);
        $query->bindParam(':email', $object['email']);
        $query->bindParam(':tel', $object['tel']);

        $query->execute();
    }

    function destroy($id)
    {
        $sql = "DELETE FROM client WHERE id = $id";
        $query = $this->pdo->query($sql);
        $query->execute();
    }
}
