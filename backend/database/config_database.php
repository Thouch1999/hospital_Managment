<?php 
    ob_start();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
    $host= "localhost";
    $userName="root";
    $password ="";
    $database ="db_doctor_appointment_su54";

    $con = mysqli_connect($host,$userName,$password,$database);

    if(!$con){
      die("Connection failed" . mysqli_connect_error());
    }else{
      //echo "Conected";
    }

  function msgstyle($message, $type = 'success') {
  return '<div class="alert alert-' . $type . ' alert-dismissible fade show auto-hide-alert text-center" role="alert">
            ' . $message . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
}
  function msgstyle2($msg, $type){
    switch($type){
      case 'success':
        echo '
          <div class="col-lg-8 offset-lg-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> '.$msg.'.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          ';
        break;
      case 'warning':
        echo '
          <div class="col-lg-8 offset-lg-2">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> '.$msg.'.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          ';
        break;  
      case 'info':
        echo '
          <div class="col-lg-8 offset-lg-2">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <strong>Info!</strong> '.$msg.'.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          ';
        break;  
      case 'danger':
        echo '
          <div class="col-lg-8 offset-lg-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Danger!</strong> '.$msg.'.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          ';
        break;  
    }
  }

?>