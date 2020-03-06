<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';
  
  $data = json_decode(file_get_contents('php://input'), true);
  if(!empty($data['receiveFormData']) && $data['receiveFormData'] == true){
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->CharSet = PHPMailer::CHARSET_UTF8;
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth   = true;
    $mail->Username   = $GMAIL_USER;
    $mail->Password   = $GMAIL_PASSWD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    
    $mail->setFrom($GMAIL_USER, 'Flux Growth Agency');
    $mail->addAddress('dev@ffffflux.com');
    $mail->isHTML(true);
    $mail->Subject = 'Solicitud de información de '.$data['name'];
    $mail->Body    = '<b>Información del expediente</b><br/>Nombre: <b>'.$data['name'].'</b><br/>Teléfono: <b>'.$data['phone'].'</b><br/>E-mail: <b>'.$data['email'].'</b>';
    $mail->AltBody = 'Información del expediente\r\nNombre: '.$data['name'].'\r\nTeléfono: '.$data['phone'].'\r\nE-mail: '.$data['email'];
    
    if($mail->send()){
      header("HTTP/1.0 200 OK");
      echo json_encode(array('status'=>200,'message'=>'Message sent'));
    }else{
      header("HTTP/1.0 500 Internal Server Error");
      echo json_encode(array('status'=>500,'message'=>"An error has occurred while sending email: ".$mail->ErrorInfo));
    }
  }
  else{
    header("HTTP/1.0 403 Forbidden");
    echo json_encode(array('status'=>403,'message'=>'Forbidden'));
  }

?>