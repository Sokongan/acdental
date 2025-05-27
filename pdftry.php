<?php
require_once('tcpdf/tcpdf.php'); // Ensure you include TCPDF in your project

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create PDF instance
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Philippine Dental Association');
    $pdf->SetTitle('Dental Chart');
    $pdf->SetMargins(15, 15, 15);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->AddPage();

    // Title
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Philippine Dental Association', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Dental Chart', 0, 1, 'C');

    // Form Data
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Patient Information Record', 0, 1);

    $pdf->SetFont('helvetica', '', 10);

    $name = htmlspecialchars($_POST['name']);
    $birthdate = htmlspecialchars($_POST['birthdate']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);

    $pdf->Cell(50, 8, 'Name:', 0, 0);
    $pdf->Cell(0, 8, $name, 0, 1);

    $pdf->Cell(50, 8, 'Birthdate (mm/dd/yyyy):', 0, 0);
    $pdf->Cell(0, 8, $birthdate, 0, 1);

    $pdf->Cell(50, 8, 'Home Address:', 0, 0);
    $pdf->MultiCell(0, 8, $address, 0, 1);

    $pdf->Cell(50, 8, 'Cell/Mobile No:', 0, 0);
    $pdf->Cell(0, 8, $phone, 0, 1);

    // Medical History
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Medical History:', 0, 1);

    $history = $_POST['history'] ?? [];
    if (!empty($history)) {
        foreach ($history as $item) {
            $pdf->Cell(0, 8, '- ' . htmlspecialchars($item), 0, 1);
        }
    } else {
        $pdf->Cell(0, 8, 'No medical history provided.', 0, 1);
    }

    // Output PDF
    $pdf->Output('Dental_Chart.pdf', 'D');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Chart Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
        }
        .checkbox-group label {
            margin-right: 15px;
        }
        .submit-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h1>Dental Chart Form</h1>
    <form method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate (mm/dd/yyyy):</label>
            <input type="date" id="birthdate" name="birthdate" required>
        </div>
        <div class="form-group">
            <label for="address">Home Address:</label>
            <textarea id="address" name="address" required></textarea>
        </div>
        <div class="form-group">
            <label for="phone">Cell/Mobile No:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label>Medical History:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="history[]" value="High Blood Pressure"> High Blood Pressure</label>
                <label><input type="checkbox" name="history[]" value="Heart Disease"> Heart Disease</label>
                <label><input type="checkbox" name="history[]" value="Diabetes"> Diabetes</label>
                <label><input type="checkbox" name="history[]" value="Stroke"> Stroke</label>
            </div>
        </div>
        <button type="submit" class="submit-button">Export to PDF</button>
    </form>
</div>
</body>
</html>
