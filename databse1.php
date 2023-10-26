<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fall2023";
$conn = mysqli_connect($servername, $username, $password, $dbname);



if (!$conn) {
  die("ERROR:Colud not connect " . mysqli_connect_error());
} else {
  echo "connected succesfully.";
  echo "<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $namePattern = '/^(?!.*\s{2})[a-zA-Z\s]{4,20}$/';
  $emailPattern = '/^\S+@\S+\.\S+$/';
  $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,25}$/';
  $ipPattern = '/^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)|([0-9a-fA-F]{0,4}:){7}[0-9a-fA-F]{0,4}$/';
  $urlPattern = '/^(http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/';
  $dobPattern = '/^\d{2}-\d{2}-\d{4}$/';
  $mobilePattern = '/^01[3-9]\d{8}$/';
  $infoPattern = '/^[a-zA-Z0-9\s]{1,50}$/';


  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $ip = $_POST["ip"];
  $url = $_POST["url"];
  $dob = $_POST["dob"];
  $gender = $_POST["gender"];
  $mobile = $_POST["mobile"];
  $info = $_POST["info"];

  $erros=[];

  if(empty($name)){
    $erros['name']='Name is required';
  }elseif(!preg_match($namePattern,$name)){
    $erros['name']='Name should have a first name and
    last name. Middle name is oprtional.';
  }

  if(empty($email)){
    $erros['email']='Email is required.';
  }elseif(!preg_match($emailPattern,$email)){
    $erros['email']='Invalid email Address.';
  }

  if(empty($password)){
    $erros['password']='Password is required';
  }elseif(!preg_match($passwordPattern,$password)){
    $erros['password']='Password must contain an uppercase, a lowercase, a number, and no special characters.';

  }

  if(empty($ip)){
    $erros['ip']='ip address is required';
  }elseif(!preg_match($ipPattern,$ip)){
    $erros['ip']='Invalid ip Address.';
  }

  if(empty($url)){
    $erros['url']='personal web url is required.';
  }elseif(preg_match($urlPattern,$url)){
    $erros['url']='Invalid web url.';
  }

  if(empty($dob)){
    $errors['dob']='Date of Birth is required.';
  }
  elseif(!preg_match($dobPattern, $dob)){
    $errors['dob']='Invalid date of birth format. Use DD-MM-YYYY format.';
  }

  if(empty($mobile)){
    $errors['mobile']='Mobile Number is required.';
  }
  elseif(!preg_match($mobilePattern, $mobile)){
    $errors['mobile']='Invalid mobile number. Must be a valid Bangladeshi number.';
  }

  if(empty($info)){
    $errors['info']='Brief info is required.';
  }elseif(str_word_count($info)>50 || !preg_match($infoPattern,$info)){
    $errors['info']='Brief info should not contain more than 50 words and must contain only alphanumeric characters.';
  }

  if(!empty($errors)){
    foreach($errors as $error){
      echo "<div class='error'>$error</div>";
    }
  }else{
    echo "Form submitted successfully!";
  }


  $sql = "INSERT INTO user (name, email, password, ip, url, dob, gender, mobile, info)
            VALUES ('$name', '$email', '$password', '$ip', '$url', '$dob', '$gender', '$mobile', '$info')";

  if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


$conn->close();
