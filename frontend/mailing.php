<?php
include_once '../common/databaseConnection.php';

include_once '../common/php-mailer/PHPMailer.php';
include_once '../common/php-mailer/SMTP.php';
include_once '../common/php-mailer/Exception.php';


class email{

  public function sendEmail(){
    //message partials
    $db=new askDatabase();
    #get additional setups data from DB
    $sql="SELECT * FROM `wp_car_setup`;";
    $fetchedData=$db->getDataFromDatabase($sql);
    $setups=$fetchedData[0];
    $options='';

    foreach($setups as $id=>$setup){
      $counted=count($setups);
      if(@$_POST['option-'.$id]!=''){
        if($id<$counted){
          $options.='- '.@$_POST['option-'.$id].'</br>';
        }else{
          $options.='- '.@$_POST['option-'.$id];
        }
      }else{

      }
    }

    if($options==''){
      $options='brak';
    }
	.
	.
	.
	.


   $mail = new PHPMailer\PHPMailer\PHPMailer();
   $mail->IsSMTP(); // enable SMTP

   $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
   $mail->SMTPAuth = true; // authentication enabled
   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
   $mail->Host = "poczta.o2.pl";
   $mail->Port = 465; // or 587
   $mail->IsHTML(true);
   $mail->CharSet = 'UTF-8';
   $mail->AddEmbeddedImage($logo, 'logo');
   $mail->AddEmbeddedImage($fb_icon, 'fb');
	.
	.
	.
   $mail->Body = $msg;
   $mail->AddAddress($email);
   $mail->Send();


  }
}



?>
