 <!-- <?php 
  include('config_database.php');

  function insertDoctor(){
    if(isset($_POST['create_doctor'])){
      $doctor_code =$_POST['dpa_doctor_code'];
      $doctor_name =$_POST['dpa_doctor_name'];
      $doctor_dob  =$_POST['dpa_doctor_dob'];
      $doctor_gender=$_POST['dpa_doctor_gender'];
      $doctor_phone=$_POST['dpa_doctor_phone'];
      $doctor_email =$_POST['dpa_doctor_email'];
      $doctor_address =$_POST['dpa_doctor_address'];
      $service_id =$_POST['dpa_service_id'];
      $doctor_profile=$_POST['dpa_doctor_profile'];
      $doctor_status=$_POST['dpa_doctor_status'];

      $dpa_doctot_photo=date("YmdHis"). "-".$_FILES['dpa_doctot_photo']["name"];
      $path="C:/xampp/htdocs/dev/hospital/backend/assets/img/doctor/".$dpa_doctot_photo;
      move_uploaded_file($_FILES['dpa_doctot_photo']['tmp_name'],$path);
      if(!empty($doctor_code) && !empty($doctor_name)&& !empty($doctor_dob) &&!empty($doctor_gender)&& !empty($doctor_phone) && !empty($doctor_email) && !empty($doctor_address) && !empty($service_id) && !empty($dpa_doctot_photo) && !empty($doctor_profile) && !empty($doctor_status) ){
        global $con;
        
      }else{
        echo "faill";

      }


   

    }else{

      //echo "Error";
      
    }
  } 

  insertDoctor();


?> --> 