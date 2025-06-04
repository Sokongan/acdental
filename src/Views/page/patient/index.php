<div class="card">
    <div class="card-body container-fluid">
        <h2 class="mb-4">Patient List</h2>
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="myTable" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Contact Number</th>
                                    <th>Date of Birth</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($patients)): ?>
                                    <?php foreach ($patients as $patient): ?>
                                        <tr>
                                            <td><?= ($patient['first_name'] ?? '-') ?></td>
                                            <td><?= ($patient['middle_initial'] ?? '-') ?></td>
                                            <td><?= ($patient['last_name'] ?? '-') ?></td>
                                            <td><?= ($patient['phone'] ?? '-') ?></td>
                                            <td><?= ($patient['birth_date'] ?? '-') ?></td>
                                            <td><?= ($patient['address'] ?? '-') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No patients found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>