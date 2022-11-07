<?php
include('../assets/db_connect.php');
//insert into database

if (isset(($_POST["username"]),($_POST["email"]),($_POST["phone"]),($_POST["password"]))){
 $name=$_POST["username"];
 $email=$_POST["email"];
 $phone=$_POST["phone"];
 $password=$_POST["password"];
 $insert="insert into users(Username,Email,Phone_number,Password) values('$name','$email',$phone,'$password')";
 if ($conn->query($insert) === TRUE) {
    echo "<script>alert('Registered Successfully')</script>";
    exit;
  } else {
    echo "Error: " . $insert . "<br>" . $conn->error;
  }
}
//username_availability

if(isset($_POST["username"]))
{
  $username=mysqli_real_escape_string($conn, $_POST["username"]);
  if($username==" ")
  {
    echo '<span class="text-danger">please enter username</span>';
  }
  else
  {
    if (strlen($username)<5 || strlen($username)>25)
    {
      echo '<span class="text-danger"> Username should be between 5 and 25 characters</span>';
    }
    else
    {
      $sql="select * from users where Username='".$username."'";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)==1){
          echo '<span class="text-danger">Username already exist</span> ';
        }
      else{ echo '<span class="text-success">Accepted</span>';
      }
    }
  }
}
//Email availability

if(isset($_POST["email"]))
{
  $email=mysqli_real_escape_string($conn, $_POST["email"]);
  if($email==" ")
  {
    echo '<span class="text-danger">please enter mailid</span>';
  }
  else
  {
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
      echo '<span class="text-danger">Enter valid emailid</span>';
    }
    else
    {
      $sql="select * from users where Email='".$email."'";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)==1){
          echo '<span class="text-danger">email already registered</span>';
        }
      else{ echo '<span class="text-success">Not registered</span>';
      }
    }
  }
}
if(isset($_POST["phone"])){
  $phone=mysqli_real_escape_string($conn, $_POST["phone"]);
  if(!preg_match('/^[0-9]{10}+$/', $phone)){
    echo '<span class="text-danger">Enter valid phone number</span>';
  }
  else{
    echo '<span class="text-success">Valid</span>';
  }
}
if(isset($_POST["password"])){
  $password=mysqli_real_escape_string($conn, $_POST["password"]);
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo '<span class="text-danger"> Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</span>';
}else{
    echo '<span class="text-success">Strong password</span>';
}}
?>