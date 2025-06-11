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

    public function updatePatient(int $id, array $data): bool
    {

        $sql = "
            UPDATE tbl_patient 
            SET 
                first_name = :first_name,
                last_name = :last_name,
                middle_initial = :middle_initial,
                phone = :phone,
                email = :email,
                last_visit = NOW(),
                occupation = :occupation,
                religion = :religion,
                address = :address
            WHERE id = :id
        ";
    
        $stmt = $this->pdo->prepare($sql);
    
        $stmt->bindValue(':first_name', $data['first_name']);
        $stmt->bindValue(':last_name', $data['last_name']);
        $stmt->bindValue(':middle_initial', $data['middle_initial']);
        $stmt->bindValue(':phone', $data['phone']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':occupation', $data['occupation']);
        $stmt->bindValue(':religion', $data['religion']);
        $stmt->bindValue(':address', $data['address']);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
        return $stmt->execute(); // returns true on success
    }
}  
