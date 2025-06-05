<?php
// src/Models/PatientModel.php

namespace App\Models;

use PDO;

class PatientModel
{
    private PDO $pdo;

    // The container will inject PDO automatically
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllPatients(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM tbl_patient ORDER BY date_created DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findPatientById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_patient WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}
