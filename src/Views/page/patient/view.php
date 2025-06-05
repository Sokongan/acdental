<?php
$birthDate = new DateTime($patient['birth_date']);
$today = new DateTime();
$age = $today->diff($birthDate)->y;
?>
<div class="card profile-card p-4 shadow position-relative">
    <!-- Back Button: Top Right -->
    <a href="/patient" class="btn btn-secondary position-absolute">
        <i class="bi bi-arrow-left"></i>
    </a>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-end gap-2 mb-4">
        <a href="patient_delete.php?id=<?= $patient['id'] ?>" class="btn btn-danger">
            <i class='bi bi-trash'></i> Delete
        </a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
            <i class='bi bi-pencil'></i> Edit Profile
        </button>
        <a href="transaction.php?id=<?= $patient['id'] ?>" class="btn btn-warning">
            <i class='bi bi-list'></i> Transactions
        </a>
        <button onclick="window.print()" class="btn btn-info">
            <i class='bi bi-printer'></i> Print
        </button>
    </div>

    <!-- Profile Header -->
    <div class="card mb-4">
        <div class="card-body row">
            <h4 class="card-title mb-0">
                <?= htmlspecialchars($patient['last_name'] . ', ' . $patient['first_name'] . ' ' . $patient['middle_initial']) ?>
            </h4>
            <div class="mt-2">ID: <?= htmlspecialchars($patient['id']) ?></div>
            <div class="text-muted mt-1">Last Visit: <?= htmlspecialchars($patient['last_visit'] ?? '') ?></div>
            <div class="text-muted">No Remarks</div>
        </div>
    </div>

    <!-- Personal Details Form (disabled) -->
    <form class="row g-3">
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Age</label>
                <input type="text" class="form-control" value="<?= $age ?> yrs. old" disabled>
            </div>

            <div class="col-md-6">
                <label class="form-label">Birthday</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($patient['birth_date'] ?? '') ?>" disabled>
            </div>

            <div class="col-md-6">
                <label class="form-label">Gender</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($patient['gender'] ?? '') ?>" disabled>
            </div>

            <div class="col-md-6">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($patient['phone'] ?? '') ?>" disabled>
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($patient['email'] ?? '') ?>" disabled>
            </div>

            <div class="col-md-6">
                <label class="form-label">Civil Status</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($patient['civil_status'] ?? '') ?>" disabled>
            </div>
        </div>

        <div class="col-12">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($patient['address'] ?? '') ?>" disabled>
        </div>

        <div class="col-md-6">
            <label class="form-label">Occupation</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($patient['occupation'] ?? '') ?>" disabled>
        </div>

        <div class="col-md-6">
            <label class="form-label">Religion</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($patient['religion'] ?? '') ?>" disabled>
        </div>

        <div class="col-12">
            <label class="form-label">Guardian</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($patient['guardian'] ?? '') ?>" disabled>
        </div>

        <div class="col-md-6">
            <label class="form-label">Source/Referral</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($patient['source'] ?? '') ?>" disabled>
        </div>

        <div class="col-md-6">
            <label class="form-label">Record Created</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($patient['date_created'] ?? '') ?>" disabled>
        </div>
    </form>
</div>