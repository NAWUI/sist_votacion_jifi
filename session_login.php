 <?php
   include('connection.php');
   session_start();

   
   $user_check = $_SESSION['dni'];
   
   $ses_sql = mysqli_query($conn,"SELECT * FROM `tbl_alumnos` WHERE dni = '$user_check';");

  $row_usr = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

  $dni_usr = $row_usr['dni'];
  $name_usr = $row_usr['nombre'];
  $sname_usr = $row_usr['apellido'];

   if(!isset($_SESSION['dni'])){
       header("location:login.php");
     // die();
   }else if($dni_usr == 46355603){
    header("location:dashboard.php");
  }else{
      header("location:votar.php");

   }
?> 