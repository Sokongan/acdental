<?php include('index.php'); ?>
    <!--MODAL!!!!-->
<?php include('modal/patient_add_modal.php'); ?>
<div class="content">
    <!-- Patients Section -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4">Patients</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newPatientModal">New Patient</button>
    </div>
<!--Live Search Code-->
    <div class="input-group mb-3">
        <input type="text" id="liveSearch" class="form-control" placeholder="Enter Patient Name" aria-label="Patient Name">
    </div>

    <div id="searchResults" class="list-group"></div>

    <script>
        document.getElementById('liveSearch').addEventListener('input', function () {
            const query = this.value;

            // Check if query is not empty
            if (query.length > 2) {
                fetch(`live_search.php?q=${encodeURIComponent(query)}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('searchResults').innerHTML = data;
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('searchResults').innerHTML = '';
            }
        });
    </script>
<!--Live Search Code END-->

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <select class="form-select w-auto" aria-label="Sort">
            <option value="1" selected>Last Visit (Descending)</option>
            <option value="2">Last Visit (Ascending)</option>
        </select>
        <button class="btn btn-secondary">Filter</button>
    </div>

    <div class="list-group">
        <?php
       require_once __DIR__ . '/config/bootstrap.php';

        // Pagination logic
        $limit = 3;
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        // Fetch total number of patients
        $totalResult = $pdo->query("SELECT COUNT(*) AS total FROM tbl_patient");
        $totalPatientsRow = $totalResult->fetch(); // PDO returns assoc by default
        $totalPatients = $totalPatientsRow['total'];
        $totalPages = ceil($totalPatients / $limit);

        // Fetch patients for the current page
        $stmt = $pdo->prepare("SELECT * FROM tbl_patient LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $patients = $stmt->fetchAll(); // gets all rows as associative arrays

        if ($patients) {
            foreach ($patients as $patient) {
                $fullName = htmlspecialchars($patient['last_name'] . ', ' . $patient['first_name'] . ' ' . $patient['middle_initial']);
                $phone = htmlspecialchars($patient['phone']);
                $patientId = (int)$patient['id'];
        
                echo "
                <div class='list-group-item d-flex justify-content-between align-items-center'>
                    <div>
                        <h5 class='mb-1'>{$fullName}</h5>
                        <p class='mb-0'>Last Visit:  | Phone: {$phone}</p>
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
        ?>
    </div>

    <!-- Pagination Links -->

    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>

