<?php
  $name = htmlspecialchars($_POST['name']); //validates html form and secures it
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $website = htmlspecialchars($_POST['website']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($message)){ //if email field and message field is not empty
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //verifies if email is valid
      $receiver = "prjctnpt@gmail.com"; //enter the email address where you want to receive all messages
      $subject = "From: $name <$email>"; 
      $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){ //if mail reaches receiver from sender
         echo "Your message has been sent";
      }else{
         echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Email and message field is required!";
  }
?>
