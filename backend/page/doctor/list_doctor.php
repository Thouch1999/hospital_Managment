<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<?php

if(isset($_SESSION['msg_created'])){
  $msg=$_SESSION['msg_created'];
  $type= $_SESSION['msg_type_created'];
  echo msgstyle("Data doctor inserted!","success");
  unset($_SESSION['msg_created']);
  unset($_SESSION['msg_type_created']);
}
if (isset($_SESSION['msg'])) {
  $msg = $_SESSION['msg'];
  $type = $_SESSION['msg_type'];
  echo msgstyle("Data doctor updated!","success");
  unset($_SESSION['msg']);
  unset($_SESSION['msg_type']);
}

?>
<?php if (isset($_SESSION['delete_status'])): ?>
  <script>
    $(document).ready(function() {
      <?php if ($_SESSION['delete_status'] == 'success'): ?>
        swal({
          title: "Remove successful ...",
          text: "Information has been removed from the system",
          icon: "success",
          button: "OK",
        });
      <?php else: ?>
        swal({
          title: "ERROR!",
          text: "Cannot remove...",
          icon: "error",
          button: "Try again!",
        });
      <?php endif; ?>
    });
  </script>
  <?php unset($_SESSION['delete_status']); ?>
<?php endif; ?>





<div class="content">
  <div class="row">
    <div class="col-sm-4 col-3">
      <h4 class="page-title">Doctors</h4>
    </div>
    <?php 
      if($_SESSION['user_role']=='1'){
    ?>
    <div class="col-sm-8 col-9 text-right m-b-20">
      <a href="index.php?p_doctor=create_doctor" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i>Add Doctor</a>
    </div>
    <?php
      }
     ?>
  </div>
  <div class="row doctor-grid">
    <?php
    $sql = "SELECT d.* ,s.service_name_kh,s.service_name_en,g.gender_name FROM dpa_doctor d     INNER JOIN dpa_service s on d.service_id = s.service_id
            INNER JOIN dpa_gender g on d.gender_id =g.gender_id 
            WHERE d.doctor_status='1'";
            

    $result = mysqli_query($con, $sql);
    $num_row = $result->num_rows;
    //echo $num_row;
    if ($num_row > 0) {
      while ($row = mysqli_fetch_array($result)) {

    ?>

        <div class="col-md-4 col-sm-4  col-lg-3">
          <div class="profile-widget">
            <div class="doctor-img">
              <a class="avatar" href="index.php?p_doctor=view_doctor&d_id=<?= $row[0] ?>"><img alt="" src="assets/img/doctor/<?= $row['doctor_photo'] ?>"></a>
            </div>
            <?php
                if($_SESSION['user_role']=='1'){
            ?>
            <div class="dropdown profile-action">
              <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu dropdown-menu-right">

                <a class="dropdown-item" href="index.php?p_doctor=update_doctor&d_id=<?= $row[0] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <!--delete Button-->

                  <form action="index.php?p_doctor=delete_doctor" method="POST">
                    <input type="hidden" name="doctor_id" value="<?= $row[0] ?>">
                    <button type="submit" class="dropdown-item text-danger btn-delete" style="border:none; background:none;">
                      <i class="fa fa-trash-o m-r-5"></i> Delete
                    </button>
                  </form>
                


              </div>
            </div>
                <?php }?>
            <h4 class="doctor-name text-ellipsis">
              <a href="index.php?p_doctor=view_doctor&d_id=<?= $row[0] ?>">
                <?= $row['doctor_name'] ?>
              </a>
            </h4>
            <div class="doc-prof"><?= $row['service_name_kh'] ?></div>
            <div class="user-country">
              <i class="fa fa-map-marker"></i> <?= $row['doctor_address'] ?>
            </div>
          </div>
        </div>
    <?php

      }
    } else {
      echo "<div class='text-danger text-center' style='width:100%'>No Record found!</div>";
    }
    ?>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="see-all">
        <a class="see-all-btn" href="javascript:void(0);">Load More</a>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
  $('.btn-delete').click(function (e) {
    e.preventDefault(); // always prevent immediate form submit

    const form = $(this).closest('form');

    swal({
      title: "Are you sure?",
      text: "This doctor will be permanently deleted.",
      icon: "warning",
      buttons: ["Cancel", "Yes, delete it!"],
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        form.submit(); // only submit if user confirms
      }
    });
  });
});


  $(document).ready(function () {
    // Automatically close success or error messages after 3 seconds
    setTimeout(function () {
      $(".auto-hide-alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
      });
    }, 3000); // 3 seconds
  });


</script>