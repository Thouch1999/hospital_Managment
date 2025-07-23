<?php 
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
      
  }
    //--random  doctor code--//
  $timePart = substr(time(), -4); 
  $randomPart = random_int(1000, 9999); 
  $doctorCode = 'DR-' . $timePart . $randomPart;
  $doctor_name =$doctor_phone="";

    //-- declear varible message --/
    $d_name_message = '<small class="text-danger">Please Input Doctor Name!</small>';
    $d_phone_message = '<small class="text-danger">Please Input Doctor Phone!</small>';
    $d_photo_message = '<small class="text-danger">Please Choose Photo!</small>';

    $message1 = $message2 =$message3 =  '';




  if(isset($_POST['create_doctor'])){
    $doctor_code = $_POST['doctor_code'];
    $doctor_name = $_POST['txt_doctor_name'];
    $doctor_dob = $_POST['txt_doctor_dob'];
    $doctor_gender = $_POST['gender_id'];
    $doctor_phone =$_POST['txt_doctor_phone'];
    $doctor_email =$_POST['txt_doctor_email'];
    $doctor_address =$_POST['txt_doctor_address'];
    $doctor_profile =$_POST['txt_doctor_profile'];
    $doctor_status =$_POST['doctor_status'];
    $doctor_service =$_POST['service_id'];


    # fomart Date form #

    $formart_Date= date('Y-m-d', strtotime($doctor_dob));

    if(trim($doctor_name == '')){
      $message1 = $d_name_message;
    }
    if(trim($doctor_phone=='')){
      $message2 = $d_phone_message;
    }

    # file Upload 
    $fileName = $_FILES['doctot_photo']['name'];
    $fileSize = $_FILES['doctot_photo']['size'];
    $fileType = $_FILES['doctot_photo']['type'];
    $fileTmp = $_FILES['doctot_photo']['tmp_name'];
    
    $fileName_str = explode(".",$fileName); // photo.png => Png
    $file_ext =strtolower(end($fileName_str));// Png => png
    $extension = array("jpg","png","gif"); // allow file type 

    if($fileName == ''){
      $message3=$d_photo_message;
    }else{
      if($fileSize> 2097152){
        //echo "File size must be excactly 2MB.!";
        echo msgstyle("File size must be excactly 2MB.!","info");
      }else{
        if(in_array($file_ext,$extension)=== false){
          echo msgstyle("Please choose a file jpg,png,gif!","info");
        }else{
          move_uploaded_file($fileTmp,"C:/xampp/htdocs/dev/hospital/backend/assets/img/doctor/".$fileName);
          if($doctor_name !='' && $formart_Date!='' && $doctor_phone !='' && $fileName !=''){
            $query_insert = "
              INSERT INTO dpa_doctor(
                doctor_code,
                doctor_name,
                doctor_dob,
                doctor_phone,
                doctor_email,
                doctor_profile,
                doctor_address,
                doctor_status,
                gender_id,
                service_id,
                doctor_photo

              )VALUES(
               '$doctor_code',
               '$doctor_name',
               '$formart_Date',
               '$doctor_phone',
               '$doctor_email',
               '$doctor_profile',
               '$doctor_address',
               '$doctor_status',
               '$doctor_gender',
               '$doctor_service',
               '$fileName'

              );
            ";
            if(mysqli_query($con,$query_insert)){
              //echo msgstyle("Data doctor inserted!","success");
              $_SESSION['msg_created'] = "Doctor updated successfully!";
              $_SESSION['msg_type_created'] = "success";
              header("Location: index.php?p_doctor=list_doctor");
              exit();

            }else{

              echo "Erorr inserting $query_insert".mysqli_error($con);
            }
          }
        }
      }
    }

    
    


  }
  else{
    //echo "Error";

  }


?>


<div class="content">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <h4 class="page-title">Add Doctor</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 offset-lg-2">

      <!--start form-->
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">

          <!--field Doctor Code-->
          <div class="col-sm-6">
            <div class="form-group">
              <label>Doctor Code<span class="text-danger">*</span></label>
              <input class="form-control" type="text" value="<?= $doctorCode ?>" name="doctor_code" readonly>
            </div>
          </div>

           <!--field Full name-->
          <div class="col-sm-6">
            <div class="form-group">
              <label>Full Name<span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="txt_doctor_name" value="<?=$doctor_name?>">
              <?= $message1  ?>
            </div>
            
          </div>

          <!--field date of birth-->
          <div class="col-sm-6">
            <div class="form-group">
              <label>Date of Birth<span class="text-danger">*</span></label>
              <div class="cal-icon">
                <input type="text" class="form-control datetimepicker"  name="txt_doctor_dob">
              </div>
            </div>
          </div>
          
          <!--field Gender-->
          <div class="col-sm-6">
            <div class="form-group gender-select">
              <label class="gen-label">Gender:<span class="text-danger">*</span></label>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" checked name="gender_id" value="1" >Male
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="gender_id" value="2" require>Female
                </label>
              </div>
            </div>
          </div>

          <!--field phone-->
          <div class="col-sm-6">
            <div class="form-group">
              <label>Phone<span class="text-danger">*</span> </label>
              <input class="form-control" type="text"  name="txt_doctor_phone" value="<?=$doctor_name?>">
              <?= $message2 ?>
            </div>
          </div>

          <!--field Email-->
          <div class="col-sm-6">
            <div class="form-group">
              <label>Email <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="txt_doctor_email"  >
            </div>
          </div>

          <!--field Address-->
          <div class="col-sm-12">
            <div class="form-group">
              <label>Address<span class="text-danger">*</span> </label>
              <input class="form-control" type="text" name="txt_doctor_address" >
            </div>
          </div>

           <!--field Service-->
          <div class="col-sm-12">
							<div class="form-group">
								<label>Service<span class="text-danger">*</span></label>
								<select class="form-control select" name="service_id" required>
													<option value="">*** choose Service ***</option>
                          <?php $query = mysqli_query($con,"SELECT * FROM dpa_service;");
                            while($row = mysqli_fetch_array($query)){
                              echo "<option value=".$row[0].">".$row['service_name_kh']."</option>";
                            }
                           ?>
                          
								</select>
							</div>
					</div>

           <!--field photo-->
          <div class="col-sm-12">
            <div class="form-group">
              <label>Avatar<span class="text-danger">*</span></label>
              <div class="profile-upload">
                <div class="upload-img">
                  <img alt="" src="assets/img/user.jpg">
                </div>
                <div class="upload-input">
                  <input type="file" class="form-control" name="doctot_photo">
                  <?= $message3 ?>
                </div>
              </div>
            </div>
          </div>

        </div>

         <!--field Profile-->
        <div class="form-group">
          <label>Short Profile<span class="text-danger">*</span></label>
          <textarea class="form-control" rows="3" cols="30" name="txt_doctor_profile"></textarea>
        </div>

        <!--field Status-->
        <div class="form-group">
          <label class="display-block">Status<span class="text-danger">*</span></label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="doctor_status" id="doctor_active" value="1" checked>
            <label class="form-check-label" for="doctor_active">
              Active
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="doctor_status" id="doctor_inactive" value="0">
            <label class="form-check-label" for="doctor_inactive">
              Inactive
            </label>
          </div>
        </div>

      
        <div class="m-t-20 text-center">
          <button class="btn btn-primary submit-btn" type="submit" name="create_doctor">Create Doctor</button>
        </div>

      </form>

       <!--end form-->
    </div>
  </div>
</div>