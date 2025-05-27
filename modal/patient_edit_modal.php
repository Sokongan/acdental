<?php
require_once __DIR__ . './../config/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get the submitted data
        $id = intval($_POST['id']);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $middle_initial = $_POST['middle_initial'];
        $phone = $_POST['phone'];
        $address = $_POST['address'] ?? null;

        // Update query using prepared statements
        $query = "
            UPDATE tbl_patient 
            SET 
                first_name = ?, 
                last_name = ?, 
                middle_initial = ?, 
                phone = ?, 
                address = ? 
            WHERE id = ?
        ";

        $stmt = $conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Statement preparation failed: " . $conn->error);
        }

        $stmt->bind_param("sssssi", $first_name, $last_name, $middle_initial, $phone, $address, $id);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Patient profile updated successfully!');
                    window.location.href = 'view_patient.php?id=$id';
                  </script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
}
?>



<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $patient['id'] ?>">

                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs" id="editProfileTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="personal-info-tab" data-bs-toggle="tab" data-bs-target="#personal-info" type="button" role="tab" aria-controls="personal-info" aria-selected="true">Personal Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-info-tab" data-bs-toggle="tab" data-bs-target="#contact-info" type="button" role="tab" aria-controls="contact-info" aria-selected="false">Contact Info</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="editProfileTabContent">
                        <!-- Personal Info -->
                        <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                            <h6 class="text-primary mt-3">Personal Information</h6>
                            <hr>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="last_name" value="<?= htmlspecialchars($patient['last_name']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" value="<?= htmlspecialchars($patient['first_name']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="middle_initial" class="form-label">Middle Initial</label>
                                <input type="text" class="form-control" id="middle_initial" name="middle_initial" value="<?= htmlspecialchars($patient['middle_initial']) ?>">
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="tab-pane fade" id="contact-info" role="tabpanel" aria-labelledby="contact-info-tab">
                            <h6 class="text-primary mt-3">Contact Information</h6>
                            <hr>
                            <div class="mb-3">
                                <label for="mobileNumber" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" id="mobileNumber" name="phone" value="<?= htmlspecialchars($patient['phone']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="2"><?= htmlspecialchars($patient['address'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
