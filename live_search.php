<?php
include 'connection/db.php';

if (isset($_GET['q'])) {
    $query = trim($_GET['q']);
    $query = $conn->real_escape_string($query);

    $sql = "SELECT * FROM tbl_patient WHERE 
            first_name LIKE '%$query%' OR 
            last_name LIKE '%$query%' OR 
            CONCAT(first_name, ' ', last_name) LIKE '%$query%'
            LIMIT 10";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($patient = $result->fetch_assoc()) {
            $fullName = htmlspecialchars($patient['last_name'] . ', ' . $patient['first_name'] . ' ' . $patient['middle_initial']);
            $lastVisit = htmlspecialchars($patient['last_visit']);
            $phone = htmlspecialchars($patient['phone']);
            $patientId = (int)$patient['id'];

            echo "
            <div class='list-group-item d-flex justify-content-between align-items-center'>
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
