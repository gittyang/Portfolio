<?php 

  if (isset($_POST['submit'])) {
    
  $userName = $_POST['name'];
  $userEmail = $_POST['email']
  $userMessage = $_POST['message'];
  
  $emailFrom = 'nreply@fnagtasticbrows.com';
  $emailSubject = "New Form Submission";
  $emailBody = 
  
    "Name: $userName.\n".
    "Email Id: $userEmail.\n".
    "User Message: $userMessage.\n";

  $mailTo = "ttyang251@gmail.com";
  $headers = "From: $emailFrom \r\n";

  $secretKey = "6LfbuOMUAAAAAOXNyofK4PHoX-n6hSFVJA0FDdAy";
  $responseKey = $_POST['g-recaptcha-response'];
  $userIp = $_SERVER[''];
  $url = " https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIp";


  $reponse = file_get_contents($url);
  $response = json.decode($reponse);
  
  if ($response->success) {

    mail($mailTo, $emailSubject, $emailBody, $headers);
    echo "Message sent successfully";
  } else {
      echo "Invalid captcha, please try again"
  }

?>