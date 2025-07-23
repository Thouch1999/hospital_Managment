<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Ensure database connection is available

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['doctor_id'])) {
    $doctor_id = intval($_POST['doctor_id']);

    // Use prepared statement to avoid SQL injection
    $stmt = $con->prepare("SELECT doctor_photo FROM dpa_doctor WHERE doctor_id = ?");
    $stmt->bind_param("i", $doctor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $photo = $row['doctor_photo'];
        $photo_path = "assets/img/doctor/" . $photo;

        $update = $con->prepare("UPDATE dpa_doctor SET doctor_status = '0' WHERE doctor_id = ?");
        $update->bind_param("i", $doctor_id);

        if ($update->execute()) {
            // Delete the photo if it exists
            if (!empty($photo) && file_exists($photo_path)) {
                unlink($photo_path);
            }
            $_SESSION['delete_status'] = 'success';
        } else {
            $_SESSION['delete_status'] = 'error';
        }
    } else {
        $_SESSION['delete_status'] = 'error';
    }

    // Redirect after handling the request
    header("Location: index.php?p_doctor=list_doctor");
    exit();
}
?>
