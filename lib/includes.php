<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Dental Clinic List</title>
    <!-- Bootstrap CSS -->
    <link href="<?= BASE_URL ?>bootstrap/adminlte.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>bootstrap/bootstrap-icons.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>style.css" rel="stylesheet">
    <!-- <link href="<?= BASE_URL ?>bootstrap/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Bootstrap JS -->
    <script src="<?= BASE_URL ?>bootstrap/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>bootstrap/adminlte.min.js"></script>
    <script src="<?= BASE_URL ?>bootstrap/colorToggle.js"></script>

    <!-- jQuery and DataTables -->
    <link href="<?= BASE_URL ?>DataTables/datatables.min.css" rel="stylesheet">
 
    <script src="<?= BASE_URL ?>DataTables/datatables.min.js"></script>

    <script>
        $.extend(true, $.fn.dataTable.Buttons.defaults, {
            dom: {
                button: {
                    className: 'btn btn-secondary btn-sm'
                }
            }
        });

        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
               
                    'csvHtml5',
                    'excelHtml5',
                    'pdfHtml5',
                    'print',
                   
                ]
            });
        });
    </script>


</head>