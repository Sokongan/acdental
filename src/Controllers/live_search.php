<?php
require_once __DIR__ . '/config/bootstrap.php';

if (isset($_GET['q'])) {
    $query = trim($_GET['q']);
    $likeQuery = '%' . $query . '%';

    $sql = "SELECT * FROM tbl_patient WHERE 
            first_name LIKE :q OR 
            last_name LIKE :q OR 
            CONCAT(first_name, ' ', last_name) LIKE :q
            LIMIT 10";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':q', $likeQuery, PDO::PARAM_STR);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        foreach ($results as $patient) {
            $fullName = htmlspecialchars($patient['last_name'] . ', ' . $patient['first_name'] . ' ' . ($patient['middle_initial'] ?? ''));
            $lastVisit = htmlspecialchars($patient['last_visit'] ?? '');
            $phone = htmlspecialchars($patient['phone'] ?? '');
            $patientId = (int)$patient['id'];

            echo "
            <div class='mb-3 list-group-item d-flex justify-content-between align-items-center'>
                <div>
                    <h5 class='mb-1'>{$fullName}</h5>
                    <p class='mb-0'>Last Visit: {$lastVisit} | Phone: {$phone}</p>
                </div>
                <div>
                    <a href='view_patient.php?id={$patientId}' class='btn btn-outline-primary btn-sm' title='View'>
                        <i class='bi bi-eye'></i>
                    </a>
                </div>
            </div>";
        }
    } else {
        echo "<div class='alert alert-info'>No patients found.</div>";
    }
}
?>
