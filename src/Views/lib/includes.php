<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'My App') ?></title>

    <!-- Bootstrap CSS -->
    <link href="<?= $this->asset('bootstrap/adminlte.min.css') ?>" rel="stylesheet">
    <link href="<?= $this->asset('bootstrap/bootstrap-icons.min.css') ?>" rel="stylesheet">
    <link href="<?= $this->asset('style.css') ?>" rel="stylesheet">

    <!-- jQuery and DataTables CSS -->
    <link href="<?= $this->asset('DataTables/datatables.min.css') ?>" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="<?= $this->asset('bootstrap/bootstrap.min.js') ?>"></script>
    <script src="<?= $this->asset('bootstrap/adminlte.min.js') ?>"></script>
    <script src="<?= $this->asset('bootstrap/colorToggle.js') ?>"></script>

    <!-- jQuery and DataTables JS -->
    <script src="<?= $this->asset('DataTables/datatables.min.js') ?>"></script>

    <script>
        $(function() {
            const table = $('#patientsTable').DataTable({
                dom: "<'d-flex justify-content-between align-items-center mb-3'B<'custom-add-btn'>>" +
                     "<'row'<'col-sm-12'tr>>" +
                     "<'row mt-3'<'col-sm-6'i><'col-sm-6'p>>",
                buttons: ['csvHtml5', 'excelHtml5', 'pdfHtml5', 'print']
            });

            $('.custom-add-btn').html(
                '<a href="<?= $this->asset("patient/create") ?>" class="btn btn-success">' +
                '<i class="bi bi-plus"></i> Add Patient</a>'
            );
        });
    </script>
</head>

