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
    <form class="card" id="patient_view" method="POST">
        <div class="d-flex justify-content-end gap-2 mb-4 mt-2 px-2" id="actionButtons">
            <button type="button" class="btn btn-primary" onclick="toggleEditMode(true)">
                <i class='bi bi-pencil'></i> Edit
            </button>
            <button type="button" class="btn btn-danger">
                <i class='bi bi-trash'></i> Delete
            </button>
            <button type="submit" class="btn btn-success d-none" id="saveBtn">
                <a href="/patient/update" class="text-white text-decoration-none">
                    <i class="bi bi-check"></i>Save
                </a>
            </button>
            <button type="button" class="btn btn-secondary d-none" id="cancelBtn" onclick="toggleEditMode(false)">
                <i class='bi bi-x'></i> Cancel
            </button>
        </div>
        <!-- Personal Details Form (disabled) -->

        <div class="card-body border">
            <div class="row">
                <h5 class="card-title mb-2 ">Personal Information</h5>
                <div class="col-md-4">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name"
                        value="<?= htmlspecialchars($patient['last_name']) ?>" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name"
                        value="<?= htmlspecialchars($patient['first_name']) ?>" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Middle Initial</label>
                    <input type="text" class="form-control" name="middle_initial"
                        value="<?= htmlspecialchars($patient['middle_initial']) ?>" disabled>
                </div>
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
        </div>

        <div class=" card-body border">
            <div class="row">
                <h5 class="card-title mb-2 ">Address</h5>
                <div class="col-12">
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
            </div>
        </div>

        <div class="card-body border ">
            <div class="row">
                <h5 class="card-title mb-2 ">Other Information</h5>
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
                <div class="col-md-12">
                    <label class="form-label">Last Visit</label>
                    <input type="text" class="form-control" name="last_visit"
                        value="<?= htmlspecialchars($patient['last_visit'] ?? '') ?>" disabled>
                </div>
                <div class="mt-2 col-md-12">
                    <label class="form-label">Remarks</label>
                    <textarea name="comment" class="form-control" rows="2" cols="100" disabled><?= htmlspecialchars($patient['remarks'] ?? '') ?></textarea></br>
                </div>

            </div>
        </div>

    </form>
</div>