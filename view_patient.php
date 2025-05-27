<?php
//connection
include('index.php');

//getting information from database
if (!isset($_GET['id'])) {
    echo "No patient ID provided.";
    exit;
}

$id = intval($_GET['id']);

// Use prepared statement to avoid injection
$stmt = $pdo->prepare("SELECT * FROM tbl_patient WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);


if ($result) {
    $patient = $result;
} else {
    echo "Patient not found.";
    exit;
}

// age query
$birthDate = new DateTime($patient['birth_date']);
$today = new DateTime();
$age = $today->diff($birthDate)->y;
$patient['age'] = $age;
?>

<!-- Your HTML code here remains the same -->

    <style>
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: ;
        }

        .action-buttons button {
            margin-right: 10px;
        }
        .profile-card {
            max-width: 700px;
            margin: auto;
        }
    </style>

<body class="container py-1">

<div class="card profile-card p-4 shadow">
    <a href="home.php" class="btn btn-secondary position-absolute" style="top: 15px; left: 15px;">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div class="profile-header">
        <img src="img/avatar.png" alt="User" class="mb-2 rounded-circle" width="80" height="80">
        <h4><?= htmlspecialchars($patient['last_name'] . ', ' . $patient['first_name'] . ' ' . $patient['middle_initial']) ?></h4>
        <div>ID: <?= htmlspecialchars($patient['id']) ?></div>
        <div class="text-muted mt-1">Last Visit: <?= htmlspecialchars($patient['last_visit']?? '') ?></div>
        <div class="text-muted">No Remarks</div>
    </div>

    <div class="action-buttons text-center my-3">
        <a href="patient_delete.php?id=<?= $patient['id'] ?>" class="btn btn-danger"><i class='bi bi-trash'></i> Delete</a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
            <i class='bi bi-pencil'></i> Edit Profile
        </button>
        <a href="transaction.php?id=<?= $patient['id'] ?>" class="btn btn-warning"><i class='bi bi-list'></i> Transactions</a>
        <button onclick="window.print()" class="btn btn-info"><i class='bi bi-printer'></i> Print</button>

    </div>


    <div class="row">
        <div class="col-6">
            <strong>Age:</strong>
            <?php
            $birthDate = new DateTime($patient['birth_date']);
            $today = new DateTime();
            echo $today->diff($birthDate)->y;
            ?> yrs. old
        </div>

        <div class="col-6"><strong>Birthday:</strong> <?= htmlspecialchars($patient['birth_date'] ?? '') ?></div>
        <div class="col-6"><strong>Gender:</strong> <?= htmlspecialchars($patient['gender'] ?? '') ?></div>
        <div class="col-6"><strong>Mobile:</strong> <?= htmlspecialchars($patient['phone']?? '') ?></div>
        <div class="col-6"><strong>Email:</strong> <?= htmlspecialchars($patient['email'] ?? '') ?></div>
        <div class="col-6"><strong>Status:</strong> <?= htmlspecialchars($patient['civil_status'] ?? '') ?></div>
        <div class="col-12"><strong>Address:</strong> <?= htmlspecialchars($patient['address'] ?? '') ?></div>
        <div class="col-6"><strong>Occupation:</strong> <?= htmlspecialchars($patient['occupation'] ?? '') ?></div>
        <div class="col-6"><strong>Religion:</strong> <?= htmlspecialchars($patient['religion']?? '') ?></div>
        <div class="col-12"><strong>Guardian:</strong> <?= htmlspecialchars($patient['guardian']?? '') ?></div>
        <div class="col-6"><strong>Source/Referral:</strong> <?= htmlspecialchars($patient['source']??'') ?></div>
        <div class="col-6"><strong>Record Created:</strong> <?= htmlspecialchars($patient['date_created']??'') ?></div>
    </div>


</div>


<!--    MODAL!!!-->
    <?php include('modal/patient_edit_modal.php'); ?>
</body>
