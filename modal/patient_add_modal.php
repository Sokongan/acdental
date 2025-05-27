<?php
require_once __DIR__ . './../config/bootstrap.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve form data
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $date_created = date('Y-m-d H:i:s'); // Current timestamp

    // Insert data into tbl_patient
    try {
        $query = "INSERT INTO tbl_patient (last_name, first_name, middle_initial, phone, gender, birth_date, address, date_created)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            throw new Exception("Statement preparation failed: " . $conn->error);
        }

        $stmt->bind_param("ssssssss", $last_name, $first_name, $middle_name, $phone, $gender, $birthdate, $address, $date_created);

        if ($stmt->execute()) {
            echo "<script>alert('Patient saved successfully!'); window.location.href='home.php';</script>";
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

<!-- Add Patient Modal -->
<div class="modal fade" id="newPatientModal" tabindex="-1" aria-labelledby="newPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="newPatientModalLabel">Patient Library</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" method="POST" id="patientForm">
                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs" id="patientLibraryTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="personal-info-tab" data-bs-toggle="tab" data-bs-target="#personal-info" type="button" role="tab" aria-controls="personal-info" aria-selected="true">Personal Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-info-tab" data-bs-toggle="tab" data-bs-target="#contact-info" type="button" role="tab" aria-controls="contact-info" aria-selected="false">Contact Info</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="patientLibraryTabContent">
                        <!-- Personal Info -->
                        <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                            <h6 class="text-primary mt-3">Personal Information</h6>
                            <hr>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter your last name" required>
                            </div>
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter your first name" required>
                            </div>
                            <div class="mb-3">
                                <label for="middleName" class="form-label">Middle Initial</label>
                                <input type="text" class="form-control" id="middleName" name="middle_name" placeholder="Enter your middle initial">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Birthdate</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="tab-pane fade" id="contact-info" role="tabpanel" aria-labelledby="contact-info-tab">
                            <h6 class="text-primary mt-3">Contact Information</h6>
                            <hr>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" placeholder="Enter your address" rows="2" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="mobileNumber" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" id="mobileNumber" name="phone" pattern="\d{11}" maxlength="11" title="Please enter exactly 11 digits" placeholder="Example: 09912345618" inputmode="numeric" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Patient</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Number script for limiting digits input -->
<script>
    const input = document.getElementById('mobileNumber');

    input.addEventListener('input', function () {
        // Remove non-digits
        this.value = this.value.replace(/\D/g, '');

        // Limit to 11 digits
        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11);
        }
    });
</script>
