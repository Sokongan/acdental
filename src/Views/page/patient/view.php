<?php
$birthDate = new DateTime($patient['birth_date']);
$today = new DateTime();
$age = $today->diff($birthDate)->y;
$isEditMode = $_SESSION['edit_mode'] ?? false;
?>
<div class="card profile-card p-4">

    <!-- Action Buttons -->
    <form class="card" id="patient_view" action="/patient/update" method="POST">
        <div class="position-absolute top-0 p-3">
            <a href="/patient" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
        <input type="hidden" name="id" value="<?= $patient['id'] ?>" />
        <div class="d-flex justify-content-end gap-2 mb-4 mt-2 px-2" id="actionButtons">
            <?php if ($isEditMode): ?>
                <button type="submit" class="btn btn-success" id="saveBtn">
                    <i class="bi bi-check"></i> Save
                </button>
                <button type="button" class="btn btn-secondary" id="cancelBtn" onclick="window.location.href='/patient/view/id=<?= $patient['id'] ?>'">
                    <i class="bi bi-x"></i> Cancel
                </button>
            <?php else: ?>
                <button type="button" class="btn btn-primary" id="editBtn" onclick="window.location.href='/patient/update/id=<?= $patient['id'] ?>'">
                    <i class="bi bi-pencil"></i> Edit
                </button>

            <?php endif; ?>

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
                    <input type="text" class="form-control" name="age" value="<?= $age ?> yrs. old" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Birthday</label>
                    <input type="text" class="form-control" name="birthday" value="<?= htmlspecialchars($patient['birth_date'] ?? '') ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Gender</label>
                    <input type="text" class="form-control" name="gender" value="<?= htmlspecialchars($patient['gender'] ?? '') ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Mobile</label>
                    <input type="text" class="form-control" name="mobile" value="<?= htmlspecialchars($patient['phone'] ?? '') ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="<?= htmlspecialchars($patient['email'] ?? '') ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Civil Status</label>
                    <input type="text" class="form-control" name="civil_status" value="<?= htmlspecialchars($patient['civil_status'] ?? '') ?>" disabled>
                </div>
            </div>
        </div>

        <div class=" card-body border">
            <div class="row">
                <h5 class="card-title mb-2 ">Address</h5>
                <div class="col-12">
                    <input type="text" class="form-control" name="address" value="<?= htmlspecialchars($patient['address'] ?? '') ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Occupation</label>
                    <input type="text" class="form-control" name="occupation" value="<?= htmlspecialchars($patient['occupation'] ?? '') ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Religion</label>
                    <input type="text" class="form-control" name="religion" value="<?= htmlspecialchars($patient['religion'] ?? '') ?>" disabled>
                </div>
            </div>
        </div>

        <div class="card-body border ">
            <div class="row">
                <h5 class="card-title mb-2 ">Other Information</h5>
                <div class="col-12">
                    <label class="form-label">Guardian</label>
                    <input type="text" class="form-control" name="guardian" value="<?= htmlspecialchars($patient['guardian'] ?? '') ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Source/Referral</label>
                    <input type="text" class="form-control" name="referral" value="<?= htmlspecialchars($patient['source'] ?? '') ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Record Created</label>
                    <input type="text" class="form-control" name="record" value="<?= htmlspecialchars($patient['date_created'] ?? '') ?>" disabled>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Last Visit</label>
                    <input type="text" class="form-control" name="last_visit"
                        value="<?= htmlspecialchars($patient['last_visit'] ?? '') ?>" disabled>
                </div>
                <div class="mt-2 col-md-12">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control" rows="2" cols="100" disabled><?= htmlspecialchars($patient['remarks'] ?? '') ?></textarea></br>
                </div>

            </div>
        </div>

    </form>
</div>