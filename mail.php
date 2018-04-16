<?php
	
	$to = $_POST['to']; 
	$subject = $_POST['subject']; 
	$msg=$_POST['message'];
	$file_name=$_FILES['file']['tmp_name'];
	$file_type=$_FILES['file']['type'];

	$boundary = md5(date('r', time()));

	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "From: <shreya.anand8888@gmail.com>\r\n";
	$headers .= "Content-Type: multipart/mixed; boundary=" . $boundary . "\r\n"; 
	
	$message = "\r\n\r\n--" . $boundary . "\r\n"; 
	
	$message .= "Content-type: text/plain; charset=\"iso-8859-1\"\r\n";
	
	$message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";

	$message .= $msg."\r\n";
	$message .= "";
 
	$message .= "\r\n\r\n--" . $boundary . "\r\n"; 
	
	$message .= "Content-type:".$file_type."\r\n"; 
	$message .= "Content-Transfer-Encoding: base64\r\n";
	$message .= "Content-Disposition: attachment; filename=".$file_name."\r\n"; 
	
	$message .= base64_encode(file_get_contents($file_name)); 
	$message .= "\r\n\r\n--" . $boundary . "--"; 
	
	$mail_sent = @mail($to, $subject, $message, $headers); 

	echo $mail_sent ? "<script>alert('Mail Sent')</script>" :"<script>alert('Mail Failed')</script>";
	
	echo $mail_sent ? "<script>window.open('https://gmail.com')</script>" :"<script>window.open('https://google.com')</script>"; 
	?>