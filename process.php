<?php

if(isset($_POST['message']))
{

	$name = $_POST['name'];
	$email = $_POST['email'];
	$company = $_POST['company'];
	$message = $_POST['message'];
	$email2 = 'aks007sonu@gmail.com';



	//$to      = 'enquiry@aspiresolution.in';
	$to      = 'aks007sonu@gmail.com';

	$subject = 'Site Enquiry Form';

	$headers = 'From: '. $email2 . "\r\n" .
    'Reply-To: '. $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	$message_full=$message;

	$message_full.="\r\nFrom \r\n".$name;
	$message_full.=" \r\nCompany- ".$company;


	$status = mail($to, $subject, $message_full, $headers);

	if($status == TRUE)
	{
		$res['sendstatus'] = 'done';

		//Edit your message here

		$res['message'] = 'Form Submission Successful!!';
		$res['c_message'] = '';
		$res['name']='';
		$res['email'] = '';
		$res['company'] = '';


    }
	else{
		$res['message'] = 'Failed to send mail. Please mail me at sanjivkumar@aspiresolution.in';
	}

	echo json_encode($res);
	//echo $name;

}

?>
