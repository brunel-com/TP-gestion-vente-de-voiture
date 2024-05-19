<?php

class DashboardRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getCountCars()
    {
        return $this->pdo->query('SELECT COUNT(*) FROM voiture')->fetchColumn();
    }

    public function getCountClients()
    {
        return $this->pdo->query('SELECT COUNT(*) FROM client')->fetchColumn();
    }

    public function getCountEmployees()
    {
        return $this->pdo->query('SELECT COUNT(*) FROM employee')->fetchColumn();
    }

    public function getCountVentes()
    {
        return $this->pdo->query('SELECT COUNT(*) FROM vente')->fetchColumn();
    }
}