      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Doctors</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
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

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member">
                  <div class="member-img">
                    <img src="backend/assets/img/doctor/<?= $row['doctor_photo'] ?>" class="img-fluid" alt="">
                    <div class="social">
                      <a href=""><i class="bi bi-twitter-x"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                  <div class="member-info">
                    <h4 ><?=$row['doctor_name']?></h4>
                    <span><?=$row['service_name_kh']?></span>
                  </div>
                </div>
              </div><!-- End Team Member -->


          <?php

            }
          } else {
            echo "<div class='text-danger text-center' style='width:100%'>No Record found!</div>";
          }
          ?>
        </div>

      </div>