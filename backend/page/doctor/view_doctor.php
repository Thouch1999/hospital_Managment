<?php 
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $id=$_GET['d_id'];

    $sql = "SELECT d.* ,s.service_name_kh,s.service_name_en,g.gender_name FROM dpa_doctor d     INNER JOIN dpa_service s on d.service_id = s.service_id
            INNER JOIN dpa_gender g on d.gender_id =g.gender_id
            WHERE d.doctor_id=$id";

           
    //  echo $sql;      
    $result =mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);

  if (isset($_SESSION['msg'])) {
  $msg = $_SESSION['msg'];
  $type = $_SESSION['msg_type'];
  echo msgstyle("Data doctor updated!","success");
  unset($_SESSION['msg']);
  unset($_SESSION['msg_type']);
}

?>

<div class="content">
  <div class="row">
    <div class="col-sm-7 col-6">
      <h4 class="page-title">My Profile</h4>
    </div>
    <?php 
      if($_SESSION['user_role']=='1'){
    ?>
    <div class="col-sm-5 col-6 text-right m-b-30">
      <a href="index.php?p_doctor=update_doctor&d_id=<?= $row[0] ?>&return_page=view_doctor" class="btn btn-primary btn-rounded">Edit Profile</a>
    </div>
      <?php }?>
  </div>
  <div class="card-box profile-header">
    <div class="row">
      <div class="col-md-12">
        <div class="profile-view">
          <div class="profile-img-wrap">
            <div class="profile-img">
              <a href="#"><img class="avatar" src="assets/img/doctor/<?= $row['doctor_photo'] ?>" alt=""></a>
            </div>
          </div>
          <div class="profile-basic">
            <div class="row">
              <div class="col-md-5">
                <div class="profile-info-left">
                  <h3 class="user-name m-t-0 mb-0">
                    <?= $row['doctor_name']?>
                  </h3>
                  <small class="text-muted"> <?= $row['service_name_kh']?></small>
                  <div class="staff-id">Employee ID : <?= $row['doctor_code']?></div>
                </div>
              </div>
              <div class="col-md-7">
                <ul class="personal-info">
                  <li>
                    <span class="title">Phone:</span>
                    <span class="text"><a href="#"><?=$row['doctor_phone'] ?></a></span>
                  </li>
                  <li>
                    <span class="title">Email:</span>
                    <span class="text"><a href="#"><?=$row['doctor_email'] ?></a></span>
                  </li>
                  <li>
                    <span class="title">Birthday:</span>
                    <span class="text"><?=$row['doctor_dob'] ?></span>
                  </li>
                  <li>
                    <span class="title">Address:</span>
                    <span class="text"><?=$row['doctor_address'] ?></span>
                  </li>
                  <li>
                    <span class="title">Gender:</span>
                    <span class="text"><?=$row['gender_name'] ?></span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="profile-tabs">
    <ul class="nav nav-tabs nav-tabs-bottom">
      <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
      <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Profile</a></li>
      <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Messages</a></li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane show active" id="about-cont">
        <div class="row">
          <div class="col-md-12">
            <div class="card-box">
              <h3 class="card-title">Education Informations</h3>
              <div class="experience-box">
                <ul class="experience-list">
                  <li>
                    <div class="experience-user">
                      <div class="before-circle"></div>
                    </div>
                    <div class="experience-content">
                      <div class="timeline-content">
                        <a href="#/" class="name">International College of Medical Science (UG)</a>
                        <div>MBBS</div>
                        <span class="time">2001 - 2003</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="experience-user">
                      <div class="before-circle"></div>
                    </div>
                    <div class="experience-content">
                      <div class="timeline-content">
                        <a href="#/" class="name">International College of Medical Science (PG)</a>
                        <div>MD - Obstetrics & Gynaecology</div>
                        <span class="time">1997 - 2001</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-box mb-0">
              <h3 class="card-title">Experience</h3>
              <div class="experience-box">
                <ul class="experience-list">
                  <li>
                    <div class="experience-user">
                      <div class="before-circle"></div>
                    </div>
                    <div class="experience-content">
                      <div class="timeline-content">
                        <?=$row['doctor_profile']?>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="experience-user">
                      <div class="before-circle"></div>
                    </div>
                    <div class="experience-content">
                      <div class="timeline-content">
                        <a href="#/" class="name">Consultant Gynecologist</a>
                        <span class="time">Jan 2009 - Present (6 years 1 month)</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="experience-user">
                      <div class="before-circle"></div>
                    </div>
                    <div class="experience-content">
                      <div class="timeline-content">
                        <a href="#/" class="name">Consultant Gynecologist</a>
                        <span class="time">Jan 2004 - Present (5 years 2 months)</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="bottom-tab2">
      </div>
      <div class="tab-pane" id="bottom-tab3">
        Tab content 3
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function () {
    // Automatically close success or error messages after 3 seconds
    setTimeout(function () {
      $(".auto-hide-alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
      });
    }, 2000); // 3 seconds
  });

</script>