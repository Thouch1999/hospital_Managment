<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include DB connection
// include('db.php'); // Uncomment if needed

$id = $_GET['d_id'] ?? 0;

// Fetch doctor info
$sql = "SELECT d.*, s.service_name_kh, s.service_name_en, g.gender_name 
        FROM dpa_doctor d
        INNER JOIN dpa_service s ON d.service_id = s.service_id
        INNER JOIN dpa_gender g ON d.gender_id = g.gender_id
        WHERE d.doctor_id = $id";

$result = mysqli_query($con, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $gender = $row['gender_id'];
    $status = $row['doctor_status'];
    $doctor_dob = date('d/m/Y', strtotime($row['doctor_dob']));
    $doctor_old_img = $row['doctor_photo'];
} else {
    die("Doctor not found.");
}

// Update logic
if (isset($_POST['btnUpdatedoctor'])) {
    // Collect inputs
    $doctor_code = $_POST['doctor_code'];
    $doctor_name = trim($_POST['txt_doctor_name']);
    $doctor_dob = strtr($_POST['txt_doctor_dob'], '/', '-');
    $doctor_gender = $_POST['gender_id'];
    $doctor_phone = trim($_POST['txt_doctor_phone']);
    $doctor_email = trim($_POST['txt_doctor_email']);
    $doctor_address = trim($_POST['txt_doctor_address']);
    $doctor_profile = trim($_POST['txt_doctor_profile']);
    $doctor_status = $_POST['doctor_status'];
    $doctor_service = $_POST['service_id'];
    $doctor_dob_format = date('Y-m-d', strtotime($doctor_dob));

    // Upload image
    $fileName = $_FILES['doctot_photo']['name'];
    $fileSize = $_FILES['doctot_photo']['size'];
    $fileTmp = $_FILES['doctot_photo']['tmp_name'];
    $file_ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed_ext = ['jpg', 'png', 'gif'];
    $upload_path = "C:/xampp/htdocs/dev/hospital/backend/assets/img/doctor/";

    if (empty($doctor_name) || empty($doctor_phone)) {
        echo "<div class='alert alert-danger'>Name and Phone are required.</div>";
    } else {
        if (empty($fileName)) {
            // No image uploaded
            $photo_to_save = $doctor_old_img;
        } else {
            if ($fileSize > 2097152) {
                echo "<div class='alert alert-warning'>File size must be less than 2MB.</div>";
                exit;
            }
            if (!in_array($file_ext, $allowed_ext)) {
                echo "<div class='alert alert-warning'>Invalid file type. Only jpg, png, gif allowed.</div>";
                exit;
            }

            // Delete old photo
            $old_path = $upload_path . $doctor_old_img;
            if (file_exists($old_path)) {
                unlink($old_path);
            }

            // Upload new photo
            move_uploaded_file($fileTmp, $upload_path . $fileName);
            $photo_to_save = $fileName;
        }

        $query_update = "UPDATE dpa_doctor SET
            doctor_code='$doctor_code',
            doctor_name='$doctor_name',
            doctor_dob='$doctor_dob_format',
            doctor_phone='$doctor_phone',
            doctor_email='$doctor_email',
            doctor_profile='$doctor_profile',
            doctor_address='$doctor_address',
            doctor_status='$doctor_status',
            gender_id='$doctor_gender',
            service_id='$doctor_service',
            doctor_photo='$photo_to_save'
            WHERE doctor_id=$id";

        if (mysqli_query($con, $query_update)) {
            $_SESSION['msg'] = "Doctor updated successfully!";
            $_SESSION['msg_type'] = "success";

            $return_page = $_POST['return_page'] ?? 'list_doctor';
            $doctor_id = $_GET['d_id'] ?? 0;

            if ($return_page === 'view_doctor' && $doctor_id > 0) {
                header("Location: index.php?p_doctor=view_doctor&d_id=" . $doctor_id);
                exit;
            } else {
                header("Location: index.php?p_doctor=list_doctor");
                exit;
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>

<!-- HTML FORM -->
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Update Doctor</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="?p_doctor=update_doctor&d_id=<?= $_GET['d_id'] ?>&return_page=<?= $_GET['return_page'] ?? 'list_doctor' ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="return_page" value="<?= $_GET['return_page'] ?? 'list_doctor' ?>">

                <div class="row">
                    <!-- Doctor Code -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Doctor Code</label>
                            <input class="form-control" type="text" value="<?= $row['doctor_code'] ?>" name="doctor_code" readonly>
                        </div>
                    </div>

                    <!-- Full Name -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Full Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" value="<?= $row['doctor_name'] ?>" name="txt_doctor_name">
                        </div>
                    </div>

                    <!-- DOB -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="text" class="form-control datetimepicker" value="<?= $doctor_dob ?>" name="txt_doctor_dob">
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="col-sm-6">
                        <div class="form-group gender-select">
                            <label class="gen-label">Gender:</label>
                            <label class="form-check-inline">
                                <input type="radio" name="gender_id" value="1" <?= $gender == 1 ? 'checked' : '' ?>> Male
                            </label>
                            <label class="form-check-inline">
                                <input type="radio" name="gender_id" value="2" <?= $gender == 2 ? 'checked' : '' ?>> Female
                            </label>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" value="<?= $row['doctor_phone'] ?>" name="txt_doctor_phone">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" value="<?= $row['doctor_email'] ?>" name="txt_doctor_email">
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" value="<?= $row['doctor_address'] ?>" name="txt_doctor_address">
                        </div>
                    </div>

                    <!-- Service -->
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Service</label>
                            <select class="form-control" name="service_id" required>
                                <option value="">-- Select Service --</option>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM dpa_service");
                                while ($r = mysqli_fetch_assoc($query)) {
                                    $selected = ($row['service_id'] == $r['service_id']) ? "selected" : "";
                                    echo "<option value='{$r['service_id']}' $selected>{$r['service_name_kh']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Photo -->
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Avatar</label>
                            <div class="profile-upload">
                                <div class="upload-img">
                                    <img src="assets/img/doctor/<?= $doctor_old_img ?>" alt="Doctor Photo" width="80">
                                </div>
                                <div class="upload-input">
                                    <input type="file" name="doctot_photo" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile -->
                <div class="form-group">
                    <label>Short Profile</label>
                    <textarea class="form-control" name="txt_doctor_profile" rows="3"><?= $row['doctor_profile'] ?></textarea>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <label class="form-check-inline">
                        <input type="radio" name="doctor_status" value="1" <?= $status == 1 ? 'checked' : '' ?>> Active
                    </label>
                    <label class="form-check-inline">
                        <input type="radio" name="doctor_status" value="0" <?= $status == 0 ? 'checked' : '' ?>> Inactive
                    </label>
                </div>

                <!-- Submit -->
                <div class="text-center mt-4">
                    <button type="submit" name="btnUpdatedoctor" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
