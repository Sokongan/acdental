<?php
include 'connection/db.php';

// Check if the ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Error: Patient ID is missing.'); window.location.href='index.php';</script>";
    exit;
}

$patient_id = intval($_GET['id']);

// Confirmation alert before deletion (client-side handled in the link or button, better than server-side)
if (!isset($_GET['confirm']) || $_GET['confirm'] !== 'true') {
    echo "<script>
        if (confirm('Are you sure you want to delete this patient?')) {
            window.location.href = 'patient_delete.php?id=$patient_id&confirm=true';
        } else {
            window.location.href = 'home.php';
        }
    </script>";
    exit;
}

// Prepare and execute delete statement
$stmt = $conn->prepare("DELETE FROM tbl_patient WHERE id = ?");
$stmt->bind_param("i", $patient_id);

if ($stmt->execute()) {
    echo "<script>alert('Patient record deleted successfully.'); window.location.href='home.php?message=deleted';</script>";
} else {
    echo "<script>alert('Error: Unable to delete the patient record.'); window.location.href='home.php';</script>";
}

$stmt->close();
$conn->close();
exit;
?>
